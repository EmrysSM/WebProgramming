<html>
<head>
    <title> Game test </title>
    <style>
        #stats {
            background-color: #FFCC00;
            overflow: hidden;
        }

        #stats .opponent {
            float: left;
            color: #003366;
            background-color: #98FB98;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            border-right: 20px solid #003366;
        }

        #stats .player {
            float: right;
            color: #003366;
            background-color: #98FB98;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            border-right: 20px solid #003366;
        }
    </style>
</head>
<body>
<div id="stats">
    <p class="opponent"><?php echo "Opponent: H:".$opponent->getHealth()." M:".$opponent->getMana() ?></p>
    <p class="player"><?php echo "Player: H:".$activePlayer->getHealth()." M:".$activePlayer->getMana() ?></p>
</div>
<p>

<?php

//include('Player.php');
//include('Card.php');
//include('ArrayList.php');

require('Player.php');


class Game{

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

    }

    public function getValidCards($hand, $mana){
        arsort($hand->toArray());
        foreach($hand->toArray() as $key => $value){
            if ($value <= $mana){
                echo "Playing card :" .$value;
                $mana -= $value;
                echo "Removing card: " .$value;
                $hand->remove(1);
            }
        }
    }

//    public function getValidCards($hand, $mana){
//        foreach($hand->toArray() as $key => $value){
//            if (in_array($mana, $hand)){
//                echo "Playing card";
//            }
//        }
//    }



}

$activePlayer = new Player(20, 0);
$opponent = new Player(20,0);

$manaSlotsActivePlayer = 0;
$manaSlotsOpponent = 0;

$coinToss = rand(0,1);

$coinToss == 1 ? $activePlayer->setIsStarting(true) : $opponent->setIsStarting(true);
echo $coinToss == 1 ? "<h3>Active player is starting<h3></h3>" : "<h3>Opponent is starting</h3>";

$g = new Game;

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


$g->printDeck($deck_activePlayer);

echo "<br >";
echo "size of deck after draw(): " .$deck_activePlayer->Size();


echo "<br >";
echo "<br >";
echo "<br >";


// ---------------------------------------------------------------------------------------------------------------------//

$deck_opponent = new ArrayList();

$g->buildDeck($deck_opponent);
$deck_opponent->shuffle();

echo "Opponent's shuffled deck:";
echo "<br />";
echo "<br />";

$g->printDeck($deck_opponent);

echo "<br />";

$hand_opponent = new ArrayList();



$index_opponent = 0;

$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
$deck_opponent->remove($index_opponent);
$index_opponent++;
$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
$deck_opponent->remove($index_opponent);
$index_opponent++;
$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
$deck_opponent->remove($index_opponent);
$index_opponent++;

//$g->drawStartingHand($g);                 //not working

echo "<br />";
echo "Opponent's starting hand:";
echo "<br />";
echo "<br />";

$g->printDeck($hand_opponent);

echo "<br />";
echo "<br />";


$g->printDeck($deck_opponent);

echo "<br >";
echo "size of deck after draw(): " .$deck_opponent->Size();

echo "<br >";
echo "<br >";
echo "<br >";

// ---------------------------------------------------------------------------------------------------------------------

$g->beginTurn($activePlayer);

echo "Active Player: ";
echo "<br />";

echo "Mana slots: " .$activePlayer->getManaSlots();
echo "<br >";
echo "Current mana: " .$activePlayer->getMana();
echo "<br >";
echo "Current health: " .$activePlayer->getHealth();

echo "<br>";
echo "<br>";

$g->getValidCards($hand_activePlayer, $activePlayer->getMana());





echo "<br>";
echo "<br>";

$g->beginTurn($activePlayer);
$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
$deck_opponent->remove($index_opponent);
$index_opponent++;

echo "Active Player: ";
echo "<br />";

echo "Mana slots: " .$activePlayer->getManaSlots();
echo "<br >";
echo "Current mana: " .$activePlayer->getMana();
echo "<br >";
echo "Current health: " .$activePlayer->getHealth();

echo "<br>";
echo "<br>";

$g->getValidCards($hand_activePlayer, $activePlayer->getMana());





echo "<br>";
echo "<br>";

$g->beginTurn($activePlayer);
$g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
$deck_opponent->remove($index_opponent);
$index_opponent++;

echo "Active Player: ";
echo "<br />";

echo "Mana slots: " .$activePlayer->getManaSlots();
echo "<br >";
echo "Current mana: " .$activePlayer->getMana();
echo "<br >";
echo "Current health: " .$activePlayer->getHealth();

echo "<br>";
echo "<br>";

$g->getValidCards($hand_activePlayer, $activePlayer->getMana());





echo "<br>";
echo "<br>";

































echo "Current health of active player is:" . $activePlayer->getHealth();

echo "<br />";

$damageAmount = 10;
$activePlayer->receiveDamage($damageAmount);

echo "Active player received "  .$damageAmount. " " ."damage";

echo "<br />";

echo "Current health of active player is:" . $activePlayer->getHealth();
echo  "<br />";
echo  "<br />";

echo "Current health of opponent is:" . $opponent->getHealth();




































?>

</p>
</body>
</html>



