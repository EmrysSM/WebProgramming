<html>
<head>
    <title> Game test </title>
</head>
<body>
    <?php

    //include('Player.php');
//    include('Card.php');
    //include('ArrayList.php');

    require('Player.php');



    class Game{
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


        public function getWInner($cardPlayed_activePlayer, $cardPlayed_opponent, $activePlayer, $opponent){
            $this->activePlayer = $activePlayer;
            $this->opponent = $opponent;
            if ($cardPlayed_activePlayer > $cardPlayed_opponent){
                $difference = $cardPlayed_activePlayer-$cardPlayed_opponent;
                echo "<h3> Active Player wins and deals " .$difference ." to opponent</h3>";
                $_SESSION['opponent']->receiveDamage($difference);
            } else {
                $difference = $cardPlayed_opponent-$cardPlayed_activePlayer;
                $_SESSION['activePlayer']->receiveDamage($difference);
                echo "<h3> Opponent wins and deals " .$difference." to Active player</h3>";
            }
        }

    }

    session_start();


//    $activePlayer = new Player(20, 0);
//    $opponent = new Player(20,0);
//
//    $manaSlotsActivePlayer = 0;
//    $manaSlotsOpponent = 0;

//    $coinToss = rand(0,1);
//
//    $coinToss == 1 ? $activePlayer->setIsStarting(true) : $opponent->setIsStarting(true);
//    echo $coinToss == 1 ? "<h3>Active player is starting<h3></h3>" : "<h3>Opponent is starting</h3>";

    $g = new Game;

    //----------------------------------------------------------------------------------------------------------------------

//    $deck_activePlayer = new ArrayList();
//
//    $g->buildDeck($deck_activePlayer);
//    $deck_activePlayer->shuffle();
//
//    $_SESSION['deck_activePlayer'] = $deck_activePlayer;

//    $hand_activePlayer = new ArrayList();
//
//
//
//    $index_activePlayer = 0;
//
//    $g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
//    $deck_activePlayer->remove($index_activePlayer);
//    $index_activePlayer++;
//
//    $g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
//    $deck_activePlayer->remove($index_activePlayer);
//    $index_activePlayer++;
//
//    $g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
//    $deck_activePlayer->remove($index_activePlayer);
//    $index_activePlayer++;
//
//
//
//    // ---------------------------------------------------------------------------------------------------------------------//
//
//    $deck_opponent = new ArrayList();
//
//    $g->buildDeck($deck_opponent);
//    $deck_opponent->shuffle();
//
//
//    $hand_opponent = new ArrayList();
//
//
//
//    $index_opponent = 0;
//
//    $g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//    $deck_opponent->remove($index_opponent);
//    $index_opponent++;
//
//    $g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//    $deck_opponent->remove($index_opponent);
//    $index_opponent++;
//
//    $g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//    $deck_opponent->remove($index_opponent);
//    $index_opponent++;
//
//    // ---------------------------------------------------------------------------------------------------------------------
//
//    $g->beginTurn($activePlayer);
//    echo "<br />";
//    echo "<br />";

//    echo "Active player : ";
//    echo "<br />";
//    echo "Current mana: " .$activePlayer->getMana();
//    echo "<br >";
//    echo "Current health: " .$activePlayer->getHealth();
//
//    echo "<br />";
//
//    $canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());
//
//    if ($canPlayCard == true){
//        $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
//        echo "Playing card: " .$card;
//        $cardPlayed_activePlayer=$card;
//        echo "<br />";
//        $key = array_search($card, $hand_activePlayer->toArray());
//        $hand_activePlayer->remove($key);
//    } else{
//        $cardPlayed_activePlayer = -1;
//    }
//    echo "<br />";
//
//
//
////------------------------------------------------------------------------------------------------------------------------
//
//    $g->beginTurn($opponent);
//
//    echo "Opponent : ";
//    echo "<br />";
//    echo "Current mana: " .$opponent->getMana();
//    echo "<br >";
//    echo "Current health: " .$opponent->getHealth();
//
//    echo "<br />";
//
//
//    $canPlayCard = $g->canPlay($hand_opponent, $opponent->getMana());
//
//    if ($canPlayCard == true){
//        $card = $g->getPlayableCard($hand_opponent, $opponent->getMana());
//        echo "Playing card: " .$card;
//        $cardPlayed_opponent=$card;
//        echo "<br />";
//        $key = array_search($card, $hand_opponent->toArray());
//        $hand_opponent->remove($key);
//    } else{
//        $cardPlayed_opponent= 0;
//
//    }
//
//
// //---------------------------------------------------------------------------------------------------------------------
//    echo "<br />";
//    echo "<br />";
//
////    if ($cardPlayed_activePlayer == $cardPlayed_opponent){
////        echo "<h1> DRAW </h1>";
////    } else {
////        echo $cardPlayed_activePlayer > $cardPlayed_opponent ? "<h1>ACTIVE PLAYER WINS</h1>" : "<h1>OPPONENT WINS</h1>" ;
////    }
//
//    if ($cardPlayed_activePlayer > $cardPlayed_opponent){
//        $difference = $cardPlayed_activePlayer-$cardPlayed_opponent;
//        echo "<h3> Active Player wins and deals " .$difference ." to opponent</h3>";
//        $opponent->receiveDamage($difference);
//    } else {
//        $difference = $cardPlayed_opponent-$cardPlayed_activePlayer;
//        $activePlayer->receiveDamage($difference);
//        echo "<h3> Opponent wins and deals " .$difference." to Active player</h3>";
//    }
//    echo "<br />";
//    echo "<br />";
//
//    //--------------------------------------------------------------------------------------------------------------------
//
//    $g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
//    $deck_activePlayer->remove($index_activePlayer);
//    $index_activePlayer++;
//
//    $g->beginTurn($activePlayer);
//    echo "<br />";
//    echo "<br />";
//    echo "Active player : ";
//    echo "<br />";
//    echo "Current mana: " .$activePlayer->getMana();
//    echo "<br >";
//    echo "Current health: " .$activePlayer->getHealth();
//
//    echo "<br />";
//
//    $canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());
//
//    if ($canPlayCard == true){
//        $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
//        echo "Playing card: " .$card;
//        $cardPlayed_activePlayer=$card;
//        echo "<br />";
//        $key = array_search($card, $hand_activePlayer->toArray());
//        $hand_activePlayer->remove($key);
//    } else{
//        $cardPlayed_activePlayer = 0;
//    }
//    echo "<br />";
//
//    //-------------------------------------------------------------------------------------------------------------------
//    $g->draw($deck_opponent, $hand_opponent, $deck_opponent->get($index_opponent));
//    $deck_opponent->remove($index_opponent);
//    $index_opponent++;
//
//    $g->beginTurn($opponent);
//
//    echo "Opponent : ";
//    echo "<br />";
//    echo "Current mana: " .$opponent->getMana();
//    echo "<br >";
//    echo "Current health: " .$opponent->getHealth();
//
//    echo "<br />";
//
//
//    $canPlayCard = $g->canPlay($hand_opponent, $opponent->getMana());
//
//    if ($canPlayCard == true){
//        $card = $g->getPlayableCard($hand_opponent, $opponent->getMana());
//        echo "Playing card: " .$card;
//        $cardPlayed_opponent=$card;
//        echo "<br />";
//        $key = array_search($card, $hand_opponent->toArray());
//        $hand_opponent->remove($key);
//    } else{
//        $cardPlayed_opponent= 0;
//
//    }
//
//    //---------------------------------------------------------------------------------------------------------------------
//    echo "<br />";
//    echo "<br />";
//
//
//
//    if ($cardPlayed_activePlayer > $cardPlayed_opponent){
//        $difference = $cardPlayed_activePlayer-$cardPlayed_opponent;
//        echo "<h3> Active Player wins and deals " .$difference ." to opponent</h3>";
//        $opponent->receiveDamage($difference);
//    } else {
//        $difference = $cardPlayed_opponent-$cardPlayed_activePlayer;
//        $activePlayer->receiveDamage($difference);
//        echo "<h3> Opponent wins and deals " .$difference." to Active player</h3>";
//    }
//
//    echo "<br />";
//    echo "<br />";
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//    // -------------------------------------------------------------------------------------------------------------------
//
//    $g->draw($deck_activePlayer, $hand_activePlayer, $deck_activePlayer->get($index_activePlayer));
//    $deck_activePlayer->remove($index_activePlayer);
//    $index_activePlayer++;
//
//    $g->beginTurn($activePlayer);
//
//
//    $canPlayCard = $g->canPlay($hand_activePlayer, $activePlayer->getMana());
//
//    if ($canPlayCard == true){
//        $card = $g->getPlayableCard($hand_activePlayer, $activePlayer->getMana());
//        $cardPlayed_activePlayer=$card;
//        $key = array_search($card, $hand_activePlayer->toArray());
//        $hand_activePlayer->remove($key);
//    } else{
//        $cardPlayed_activePlayer = 0;
//    }


    ?>

<form method="post" action="" >
    <input type="submit" name="turn" id="turn" value="NEXT TURN">
    <br />
    <input type="submit" name="new_game" id="new_game" value="NEW GAME">
    <br />
    <input type="submit" name="reset" id="turn" value="RESET">
    <br />
    <input type="submit" name="reset_session" id="turn" value="RESET SESSION">
    <br />
    <input type="submit" name="play" id="play" value="play">
</form>


</body>
</html>

<?php

if(array_key_exists('play',$_POST)){
    echo "<br />";
    echo "<br />";

    echo "Active player : ";
    echo "<br />";
    echo "Current mana: " .$_SESSION['activePlayer']->getMana();
    echo "<br >";
    echo "Current health: " .$_SESSION['activePlayer']->getHealth();

    echo "<br />";

    $canPlayCard = $g->canPlay($_SESSION['hand_activePlayer'], $_SESSION['activePlayer']->getMana());

    if ($canPlayCard == true){
        $card = $g->getPlayableCard($_SESSION['hand_activePlayer'], $_SESSION['activePlayer']->getMana());
        echo "Playing card: " .$card;
        $cardPlayed_activePlayer=$card;
        echo "<br />";
        $key = array_search($card, $_SESSION['hand_activePlayer']->toArray());
        $_SESSION['hand_activePlayer']->remove($key);
    } else{
        $cardPlayed_activePlayer = 0;
    }
    echo "<br />";



//------------------------------------------------------------------------------------------------------------------------

    echo "Opponent : ";
    echo "<br />";
    echo "Current mana: " .$_SESSION['opponent']->getMana();
    echo "<br >";
    echo "Current health: " .$_SESSION['opponent']->getHealth();

    echo "<br />";


    $canPlayCard = $g->canPlay($_SESSION['hand_opponent'], $_SESSION['opponent']->getMana());

    if ($canPlayCard == true){
        $card = $g->getPlayableCard($_SESSION['hand_opponent'], $_SESSION['opponent']->getMana());
        echo "Playing card: " .$card;
        $cardPlayed_opponent=$card;
        echo "<br />";
        $key = array_search($card, $_SESSION['hand_opponent']->toArray());
        $_SESSION['hand_opponent']->remove($key);
    } else {
        $cardPlayed_opponent= 0;

    }


 //---------------------------------------------------------------------------------------------------------------------
    echo "<br />";
    echo "card played active player: ".$cardPlayed_activePlayer."<br>";
    echo "card played opponent: ".$cardPlayed_opponent."<br>";
    echo "<br />";

    $g->getWInner($cardPlayed_activePlayer, $cardPlayed_opponent, $_SESSION['activePlayer'], $_SESSION['opponent']);
    }
    echo "<br />";
    echo "<br />";



if(array_key_exists('reset',$_POST)){
    $_POST = array();
}

if(array_key_exists('reset_session', $_POST)){
    $_SESSION = array();
}

if(array_key_exists('new_game', $_POST)){

    $activePlayer = new Player(20, 0);
    $opponent = new Player(20,0);

    $_SESSION['activePlayer'] = $activePlayer;
    $_SESSION['opponent'] = $opponent;

    $manaSlotsActivePlayer = 0;
    $manaSlotsOpponent = 0;

    $_SESSION['manaSlotsActivePlayer'] = $manaSlotsActivePlayer;
    $_SESSION['manaSlotsOpponent'] = $manaSlotsOpponent;

    $deck_activePlayer = new ArrayList();
    $deck_opponent = new ArrayList();

    $g->buildDeck($deck_activePlayer);
    $g->buildDeck($deck_opponent);

    $deck_activePlayer->shuffle();
    $deck_opponent->shuffle();

    $_SESSION['deck_activePlayer'] = $deck_activePlayer;
    $_SESSION['deck_opponent'] = $deck_opponent;

    $index_activePlayer = 0;
    $index_opponent = 0;

    $_SESSION['index_activePlayer'] = $index_activePlayer;
    $_SESSION['index_opponent'] = $index_opponent;

    $hand_activePlayer = new ArrayList();
    $hand_opponent = new ArrayList();

    $_SESSION['hand_activePlayer'] = $hand_activePlayer;
    $_SESSION['hand_opponent'] = $hand_opponent;

    echo "active player deck: ";
    echo "<br>";
    $g->printDeck($deck_activePlayer);
//    print_r($_SESSION['deck_activePlayer']);


    echo "<br>";
    echo "<br>";
    echo "<br>";

    echo "opponent deck: ";
    echo "<br>";
    $g->printDeck($deck_opponent);


    echo "<br>";
    echo "<br>";
    echo "<br>";
//    var_dump($_SESSION);







//        $g->printDeck($_SESSION['deck_activePlayer']);
}


if(array_key_exists('turn',$_POST)){
    $g->beginTurn($_SESSION['activePlayer']);
    $g->beginTurn($_SESSION['opponent']);

    echo "<br>";
    echo "active player hand:";
    echo "<br>";

    $g->draw($_SESSION['deck_activePlayer'], $_SESSION['hand_activePlayer'], $_SESSION['deck_activePlayer']->get($_SESSION['index_activePlayer']));
    $_SESSION['deck_activePlayer']->remove($_SESSION['index_activePlayer']);
    $_SESSION['index_activePlayer']++;

    echo "<br>";
    echo "<br>";
//    print_r($_SESSION['deck_activePlayer']);
//    $g->printDeck($_SESSION['deck_activePlayer']);


}

?>




