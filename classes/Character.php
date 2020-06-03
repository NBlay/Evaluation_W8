<?php

abstract class Character
{
    public $pseudo;
    protected $lifePoint = 100;
    public $magicPoint = 15; // a voire si laisser la
    public $atk = 15;
    protected $isAlive = true;

    public function __construct($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function isAlive() {
        if ($this->lifePoint <= 0){
            $this->isAlive = false;
    }
    return $this->isAlive;
  }

  public function setHP($damage) {
      $this->lifePoint -= $damage;
      if ($this->lifePoint < 0) {
          $this->lifePoint = 0;
      }
      return;
  }

  public function spAtk($target){
    $this->lifePoint -= $damage;
    $status = "{$this->pseudo} prépare une attaque spéciale !";
  }
}
