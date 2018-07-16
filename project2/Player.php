<html>
<head>
    <title> Player test </title>
</head>
<body>
<p>

<?php
require_once('Card.php');
//require_once('ArrayList.php');
include('ArrayList.php');

class Player extends ArrayList {

    public $deck;
    public $hand;
    public $card;
//    public $index;

    public function drawHelper()
    {

        echo "Drawing card : " .($this->card);
        echo "<br />";
        $this->hand->add($this->card);
    }

    public function buildDeckHelper()
    {

        echo "Building deck";
        echo "<br />";
        echo "<br />";
        $this->deck->add(0);
        $this->deck->add(0);
        $this->deck->add(1);
        $this->deck->add(1);
        $this->deck->add(2);
        $this->deck->add(2);
        $this->deck->add(2);
        $this->deck->add(3);
        $this->deck->add(3);
        $this->deck->add(3);
        $this->deck->add(3);
        $this->deck->add(4);
        $this->deck->add(4);
        $this->deck->add(4);
        $this->deck->add(5);
        $this->deck->add(5);
        $this->deck->add(6);
        $this->deck->add(6);
        $this->deck->add(7);
        $this->deck->add(8);
    }



    public $health;
    public $mana;
    public $manaSlots;
    public $isStarting = false;


//    public $deck = [Card::class];

//    public function draw($deck,$hand){
//
//        foreach ($deck as $card){
//            $hand->ArrayList->add($card);
//        }
//    }

    public function __construct($health, $mana) {
        $this->health = $health;
        $this->mana = $mana;
//        $this->manaSlots = $manaSlots;
    }


      public function getHealth() {
        return  $this->health;
    }

    public function getMana(){
        return $this->mana;
    }

    public function refillMana(){
        $this->mana=$this->manaSlots;
    }

    public function getManaSlots(){
        return $this->manaSlots;
    }

    public function addManaSlot(){
        $this->manaSlots++;
    }

    public  function setIsStarting($isStarting){
        $this->isStarting = $isStarting;
    }

    public function drawCard($deck, $hand){



    }

    public function receiveDamage($damageAmount){
        $this->health -= $damageAmount;
    }



    public function initialDraw($deck, $hand){
        $arrayList = new ArrayList();
        $firstThreeCards = array_slice($deck->$arrayList->toArray(), 0, 3);

        foreach ($firstThreeCards as $card){

            $hand->$arrayList->add($card);
        }

        $deck->$arrayList->remove(0);
        $deck->$arrayList->remove(1);
        $deck->$arrayList->remove(2);
    }
}



?>

<?php
//$p1 = new Player(20, 0);
//
//$deck = new ArrayList();
//$deck->add(0);
//$deck->add(1);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//$deck->add(3);
//
//$hand = new ArrayList();
//
//echo "Original deck:";
//echo "<br>";
//print_r($deck);
//echo "<br>";
//echo "<br>";
//
////$deck2->remove(2);
//
//$deck->shuffle();

//echo "Shuffled deck:";
//echo "<br>";
//print_r($deck);
//echo "<br>";
//echo $deck->Size();
//
//$firstThreeCards = array_slice($deck->toArray(), 0, 3);
//
//foreach ($firstThreeCards as $card){
//
//    $hand->add($card);
//}
//
//$deck->remove(0);
//$deck->remove(1);
//$deck->remove(2);

//$p1->initialDraw($deck, $hand);    // try to get this to work


//
//
//echo "<br>";
//echo "<br>";
//
//
//echo "Starting hand:";
//echo "<br>";

//print_r($drawnCards);


//print_r($hand);
//
//echo "<br>";
//echo "<br>";
//
//echo "Deck after initial hand is drawn:";
//echo "<br>";
//print_r($deck);
//echo "<br>";
//echo $deck->Size();





//print_r($deck);

//$card = new Card(3);

//$hand[] = $deck[array_rand($deck)];
//$hand[] = $deck[array_rand($deck)];
//$hand[] = $deck[array_rand($deck)];

//print_r($hand);



//echo "<br>";
//echo "<br>";
//
//
//
//echo "Current health of p1 is:" . $p1->getHealth();
//
//echo "<br />";
//
//$damageAmount = 10;
//$p1->receiveDamage($damageAmount);
//
//echo "p1 received "  .$damageAmount. " " ."damage";
//
//echo "<br />";
//
//echo "Current health of p1 is:" . $p1->getHealth();
?>

</p>
</body>
</html>


