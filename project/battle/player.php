<?php
    namespace project\battle;

    class Player{
        private $name;
        private $score = 0;
        private $cardList = array();
        
        public function __construct($name){
            $this->name = $name;
        }

        public function addScore($points){
            $this->score += $points;
        }

        public function addCard($card){
            array_push($this->cardList, $card);
        }

        public function getName(){
            return $this->name;
        }

        public function getCard($index){
            return $this->cardList[$index];
        }

        public function getScore(){
            return $this->score;
        }
    }