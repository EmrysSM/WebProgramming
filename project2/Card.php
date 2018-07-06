<?php

class Card{

    public $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue(){
        return $this->value;
    }

    public function compareTo(Card $other){
        return $this->value - $other->getValue();
    }



}