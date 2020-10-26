<?php
    namespace project\battle;

    class Game{
        private $p1;
        private $p2;
        private $cardCount = 52;
        private $hero = 'Starfox';

        public function __construct($p1, $p2){
            $this->p1 = $p1;
            $this->p2 = $p2;
        }

        public function setCardCount($count){
            if($count % 2 == 0) $this->cardCount = $count;
            else throw new \Exception('Card number must be even.');
        }

        private function deal(){
            $given = array();
            $i = 1;
            while($i <= $this->cardCount){
                $cardvalue = rand(1, $this->cardCount);
                if(!in_array($cardvalue, $given)){
                    if($i % 2 == 0) $this->p1->addCard($cardvalue);
                    else $this->p2->addCard($cardvalue);
                    array_push($given, $cardvalue);
                    $i++;
                }
            }
        }

        public function play(){
            $this->deal();

            $i = ($this->cardCount-2) / 2;
            while($i >= 0){
                $card1 = $this->p1->getCard($i);
                $card2 = $this->p2->getCard($i);
                
                if($card1 > $card2){
                    $this->p1->addScore($card2);
                    $this->displayCurrent($this->p1, $this->p2, $card1, $card2);
                }else{
                    $this->p2->addScore($card1);
                    $this->displayCurrent($this->p2, $this->p1, $card2, $card1);
                }

                $i--;
            }

            if($this->p1->getScore() > $this->p2->getScore()) $this->displayResults($this->p1, $this->p2);
            elseif($this->p2->getScore() > $this->p1->getScore()) $this->displayResults($this->p2, $this->p1);
            else echo ln(2)."Seriously ? Not a single chance i play to this crap again.";
        }

        private function displayResults($winner, $looser){
            echo ln(2).$winner->getName()." won the game ".$winner->getScore()." to ".$looser->getScore();
            if($looser->getName() == $this->hero) echo ln(3)."Well, at the end ".$this->hero." won anyway.";
        }

        private function displayCurrent($winner, $looser, $bigcard, $littlecard){
            echo $winner->getName()." beated ". $looser->getName()." and won "
                    .$littlecard." points. (".$bigcard." - ".$littlecard.")".ln();
        }
    }