<html>
<head>
    <title> Game test </title>
</head>
<body>
<p>

    <?php

    //include('Player.php');
    include('Card.php');
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


        public function canPlay($hand, $mana){
            foreach($hand->toArray() as $key => $value){
                if ($value <= $mana){
                    return true;
                }
            }
        }

        public function getPlayableCard($hand, $mana){
            foreach($hand->toArray() as $key => $value){
                if ($value <= $mana){
                    return $value;
                }
            }
        }

//        public function play($){
//
//        }

        public function getWInner($cardPlayed_activePlayer, $cardPlayed_opponent, $activePlayer, $opponent){
            $this->activePlayer = $activePlayer;
            $this->opponent = $opponent;
            if ($cardPlayed_activePlayer > $cardPlayed_opponent){
                $difference = $cardPlayed_activePlayer-$cardPlayed_opponent;
                echo "<h3> Active Player wins and deals " .$difference ." to opponent</h3>";
                $opponent->receiveDamage($difference);
            } else {
                $difference = $cardPlayed_opponent-$cardPlayed_activePlayer;
                $activePlayer->receiveDamage($difference);
                echo "<h3> Opponent wins and deals " .$difference." to Active player</h3>";
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

    $g = new Game;

    //----------------------------------------------------------------------------------------------------------------------

    $deck_activePlayer = new ArrayList();

    $g->buildDeck($deck_activePlayer);
    $deck_activePlayer->shuffle();

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



    // ---------------------------------------------------------------------------------------------------------------------//

    $deck_opponent = new ArrayList();

    $g->buildDeck($deck_opponent);
    $deck_opponent->shuffle();


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

    // ---------------------------------------------------------------------------------------------------------------------

    $g->beginTurn($activePlayer);
    echo "<br />";
    echo "<br />";
    echo "Active player : ";
    echo "<br />";
    echo "Current mana: " .$activePlayer->getMana();
    echo "<br >";
    echo "Current health: " .$activePlayer->getHealth();

    echo "<br />";

    $canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());

    if ($canPlayCard == true){
        $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
        echo "Playing card: " .$card;
        $cardPlayed_activePlayer=$card;
        echo "<br />";
        $key = array_search($card, $hand_activePlayer->toArray());
        $hand_activePlayer->remove($key);
    } else{
        $cardPlayed_activePlayer = -1;
    }
    echo "<br />";



//------------------------------------------------------------------------------------------------------------------------

    $g->beginTurn($opponent);

    echo "Opponent : ";
    echo "<br />";
    echo "Current mana: " .$opponent->getMana();
    echo "<br >";
    echo "Current health: " .$opponent->getHealth();

    echo "<br />";


    $canPlayCard = $g->canPlay($hand_opponent, $opponent->getMana());

    if ($canPlayCard == true){
        $card = $g->getPlayableCard($hand_opponent, $opponent->getMana());
        echo "Playing card: " .$card;
        $cardPlayed_opponent=$card;
        echo "<br />";
        $key = array_search($card, $hand_opponent->toArray());
        $hand_opponent->remove($key);
    } else{
        $cardPlayed_opponent= 0;

    }


 //---------------------------------------------------------------------------------------------------------------------
    echo "<br />";
    echo "<br />";

//    if ($cardPlayed_activePlayer == $cardPlayed_opponent){
//        echo "<h1> DRAW </h1>";
//    } else {
//        echo $cardPlayed_activePlayer > $cardPlayed_opponent ? "<h1>ACTIVE PLAYER WINS</h1>" : "<h1>OPPONENT WINS</h1>" ;
//    }

    if ($cardPlayed_activePlayer > $cardPlayed_opponent){
        $difference = $cardPlayed_activePlayer-$cardPlayed_opponent;
        echo "<h3> Active Player wins and deals " .$difference ." to opponent</h3>";
        $opponent->receiveDamage($difference);
    } else {
        $difference = $cardPlayed_opponent-$cardPlayed_activePlayer;
        $activePlayer->receiveDamage($difference);
        echo "<h3> Opponent wins and deals " .$difference." to Active player</h3>";
    }
    echo "<br />";
    echo "<br />";

    //--------------------------------------------------------------------------------------------------------------------

    $g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
    $deck_activePlayer->remove($index_activePlayer);
    $index_activePlayer++;

    $g->beginTurn($activePlayer);
    echo "<br />";
    echo "<br />";
    echo "Active player : ";
    echo "<br />";
    echo "Current mana: " .$activePlayer->getMana();
    echo "<br >";
    echo "Current health: " .$activePlayer->getHealth();

    echo "<br />";

    $canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());

    if ($canPlayCard == true){
        $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
        echo "Playing card: " .$card;
        $cardPlayed_activePlayer=$card;
        echo "<br />";
        $key = array_search($card, $hand_activePlayer->toArray());
        $hand_activePlayer->remove($key);
    } else{
        $cardPlayed_activePlayer = 0;
    }
    echo "<br />";

    //-------------------------------------------------------------------------------------------------------------------
    $g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
    $deck_opponent->remove($index_opponent);
    $index_opponent++;

    $g->beginTurn($opponent);

    echo "Opponent : ";
    echo "<br />";
    echo "Current mana: " .$opponent->getMana();
    echo "<br >";
    echo "Current health: " .$opponent->getHealth();

    echo "<br />";


    $canPlayCard = $g->canPlay($hand_opponent, $opponent->getMana());

    if ($canPlayCard == true){
        $card = $g->getPlayableCard($hand_opponent, $opponent->getMana());
        echo "Playing card: " .$card;
        $cardPlayed_opponent=$card;
        echo "<br />";
        $key = array_search($card, $hand_opponent->toArray());
        $hand_opponent->remove($key);
    } else{
        $cardPlayed_opponent= 0;

    }

    //---------------------------------------------------------------------------------------------------------------------
    echo "<br />";
    echo "<br />";



    if ($cardPlayed_activePlayer > $cardPlayed_opponent){
        $difference = $cardPlayed_activePlayer-$cardPlayed_opponent;
        echo "<h3> Active Player wins and deals " .$difference ." to opponent</h3>";
        $opponent->receiveDamage($difference);
    } else {
        $difference = $cardPlayed_opponent-$cardPlayed_activePlayer;
        $activePlayer->receiveDamage($difference);
        echo "<h3> Opponent wins and deals " .$difference." to Active player</h3>";
    }

    echo "<br />";
    echo "<br />";




































    // -------------------------------------------------------------------------------------------------------------------

    $g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
    $deck_activePlayer->remove($index_activePlayer);
    $index_activePlayer++;

    $g->beginTurn($activePlayer);


    $canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());

    if ($canPlayCard == true){
        $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
        $cardPlayed_activePlayer=$card;
        $key = array_search($card, $hand_activePlayer->toArray());
        $hand_activePlayer->remove($key);
    } else{
        $cardPlayed_activePlayer = 0;
    }


    ?>

</p>
</body>
</html>




