<html>
<head>
    <title> Game test </title>
</head>
<body>
<p>

<?php

//include('Player.php');
//include('Card.php');
//include('ArrayList.php');

require('Player.php');



class debug{

//    public function drawStartingHand($g){
//        for ($i = 0; $i <= 3; $i++) {
//            $g->draw();
//            $this->index++;
//        }
//
//    }

public $player;



    public function draw($deck, $hand, $card)
    {
        $p = new Player(0,0);
        $p->deck = $deck;
        $p->hand= $hand;
        $p->card= $card;

        $p->drawHelper();
    }

    public function buildDeck($deck)
    {
        $p = new Player(0,10);
        $p->deck = $deck;
        $p->buildDeckHelper();
    }

    public function printDeck($deck){
        foreach($deck->toArray() as $key => $value){
            echo $value .',';
        }
    }
    public function beginTurn($player){
        $player->addManaSlot();
        $player->refillMana();
//        $player->draw();

    }

//    public function playCard($hand, $mana){
//        arsort($hand->toArray());
//        foreach($hand->toArray() as $key => $value){
//            if ($value <= $mana){
//                echo "Playing card :" .$value;
//                $mana -= $value;
//            }
//        }
//    }

//asort() = ascending order by key
//asort() = descending order by key

//    public function playCard($hand, $mana){
//        $this->mana = $mana;
//        $this->hand = $hand;
//        $playedCard = reset($this->hand->toArray());
//        echo "Reset: " .$playedCard;
//        echo "<br />";
//        echo "Playing card: " .$playedCard;
//        $this->mana -= $playedCard;
//        echo"<br />";
//
//    }

public function playCard($card){

}

    public function canPlay($hand, $mana){
        foreach($hand->toArray() as $key => $value){
            if ($value <= $mana){
                return true;
            }
        }
    }

    public function sortHand($hand){
        asort($hand->toArray());
    }

    public function sortDeck($deck){
        $this->deck = $deck;
        $array = new ArrayObject($deck);
        $array->asort();
    }

    public function getPlayableCard($hand, $mana){
        foreach($hand->toArray() as $key => $value){
            if ($value <= $mana){
//                $count++;
                return $value;
            }
        }
    }






}

$activePlayer = new Player(20, 0);
$opponent = new Player(20,0);

$manaSlotsActivePlayer = 0;
$manaSlotsOpponent = 0;

$coinToss = rand(0,1);

$coinToss == 1 ? $activePlayer->setIsStarting(true) : $opponent->setIsStarting(true);
echo $coinToss == 1 ? "<h3>Active player is starting<h3></h3>" : "<h3>Opponent is starting</h3>";

$g = new debug;

//----------------------------------------------------------------------------------------------------------------------

$deck_activePlayer = new ArrayList();

$g->buildDeck($deck_activePlayer);
$deck_activePlayer->shuffle();

echo "Active player's shuffled deck:";
echo "<br />";
echo "<br />";

$g->printDeck($deck_activePlayer);

echo "<br />";

$hand_activePlayer = new ArrayList();



$index_activePlayer = 0;

$g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
$deck_activePlayer->remove($index_activePlayer);
$index_activePlayer++;
$g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
$deck_activePlayer->remove($index_activePlayer);
$index_activePlayer++;
$g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
$deck_activePlayer->remove($index_activePlayer);
$index_activePlayer++;


echo "<br />";
echo "Active player's starting hand:";
echo "<br />";
echo "<br />";

$g->printDeck($hand_activePlayer);

echo "<br />";
echo "<br />";

echo "Active player's deck after drawing hand: ";
echo "<br />";
$g->printDeck($deck_activePlayer);

//echo "<br >";
//echo "size of deck after draw(): " .$deck_activePlayer->Size();


echo "<br >";
echo "<br >";
echo "<br >";


// ---------------------------------------------------------------------------------------------------------------------//

//$deck_opponent = new ArrayList();
//
//$g->buildDeck($deck_opponent);
//$deck_opponent->shuffle();
//
//echo "Opponent's shuffled deck:";
//echo "<br />";
//echo "<br />";
//
//$g->printDeck($deck_opponent);
//
//echo "<br />";
//
//$hand_opponent = new ArrayList();
//
//
//
//$index_opponent = 0;
//
//$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//$deck_opponent->remove($index_opponent);
//$index_opponent++;
//$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//$deck_opponent->remove($index_opponent);
//$index_opponent++;
//$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//$deck_opponent->remove($index_opponent);
//$index_opponent++;

//$g->drawStartingHand($g);                 //not working

//echo "<br />";
//echo "Opponent's starting hand:";
//echo "<br />";
//echo "<br />";
//
//$g->printDeck($hand_opponent);
//
//echo "<br />";
//echo "<br />";
//
//
//$g->printDeck($deck_opponent);
//
//echo "<br >";
//echo "size of deck after draw(): " .$deck_opponent->Size();
//
//echo "<br >";
//echo "<br >";
//echo "<br >";

// ---------------------------------------------------------------------------------------------------------------------

$g->beginTurn($activePlayer);


echo "Mana slots: " .$activePlayer->getManaSlots();
echo "<br >";
echo "Current mana: " .$activePlayer->getMana();
echo "<br >";
echo "Current health: " .$activePlayer->getHealth();

echo "<br>";
echo "<br>";


$canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());
//asort($hand_activePlayer->toArray());

if ($canPlayCard == true){
    $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
    //$g->playCard($hand_activePlayer, $activePlayer->getMana());
    echo "Playing card: " .$card;
    //echo reset($hand_activePlayer->toArray());
    echo "<br />";
    $key = array_search($card, $hand_activePlayer->toArray());
    $hand_activePlayer->remove($key);
}

echo "Current hand :";
$g->printDeck($hand_activePlayer);
echo "<br />";
echo "<br />";
echo "<br />";





//echo "<br>";
//echo "<br>";
//
//$g->beginTurn($activePlayer);
//$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//$deck_opponent->remove($index_opponent);
//$index_opponent++;








$g->beginTurn($activePlayer);

echo "Mana slots: " .$activePlayer->getManaSlots();
echo "<br >";
echo "Current mana: " .$activePlayer->getMana();
echo "<br >";
echo "Current health: " .$activePlayer->getHealth();

echo "<br>";
echo "<br>";

$canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());
asort($hand_activePlayer->toArray());
echo "<br />";
if ($canPlayCard == true){
    $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
    //$g->playCard($hand_activePlayer, $activePlayer->getMana());
    echo "Playing card: " .$card;
//        echo reset($hand_activePlayer->toArray());
    echo "<br />";
    $key = array_search($card, $hand_activePlayer->toArray());
    $hand_activePlayer->remove($key);
}

echo "Current hand :";
$g->printDeck($hand_activePlayer);
echo "<br />";





//echo "<br>";
//echo "<br>";
//
//$g->beginTurn($activePlayer);
//$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//$deck_opponent->remove($index_opponent);
//$index_opponent++;

$g->beginTurn($activePlayer);

echo "Mana slots: " .$activePlayer->getManaSlots();
echo "<br >";
echo "Current mana: " .$activePlayer->getMana();
echo "<br >";
echo "Current health: " .$activePlayer->getHealth();

echo "<br>";
echo "<br>";

$canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());
asort($hand_activePlayer->toArray());
echo "<br />";
if ($canPlayCard == true){
    $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
    //$g->playCard($hand_activePlayer, $activePlayer->getMana());
    echo "Playing card: " .$card;
//    echo reset($hand_activePlayer->toArray());
    echo "<br />";
    $key = array_search($card, $hand_activePlayer->toArray());
    $hand_activePlayer->remove($key);
}

echo "Current hand : ";
$g->printDeck($hand_activePlayer);
echo "<br />";




echo "<br>";
echo "<br>";

































//echo "Current health of active player is:" . $activePlayer->getHealth();
//
//echo "<br />";
//
//$damageAmount = 10;
//$activePlayer->receiveDamage($damageAmount);
//
//echo "Active player received "  .$damageAmount. " " ."damage";
//
//echo "<br />";
//
//echo "Current health of active player is:" . $activePlayer->getHealth();
//echo  "<br />";
//echo  "<br />";
//
//echo "Current health of opponent is:" . $opponent->getHealth();




































?>

</p>
</body>
</html>



