<?php

class Ranger extends Character
{

    function __construct($pseudo) {
        parent::__construct($pseudo);
        $this->carquois = 20;
        $this->speAtk = $this->atk * 2;
    }

    public function action($target){
      $rand = rand(1 , 10);
      if ($rand < 5 && $this->carquois > 0){
        $this->attack($target);
        $status = "{$this->pseudo} décoche une flèche sur {$target->pseudo} ! Il lui reste {$this->carquois} flèches ! Il reste {$target->lifePoint} points de vie à {$target->pseudo}.";
      } elseif ($rand > 5 && $this->carquois > 2){
        $this->lifePoint -= $damage;
        return;
        $spAtk = $this->atk *2;
        $target->setHP($spAtk);
        $status = "{$this->pseudo} décoche deux flèches  sur {$target->pseudo} ! Il lui reste {$this->carquois} flèches ! Il reste {$target->lifePoint} points de vie à {$target->pseudo}.";
      };
      if ($this->carquois = 0) {
        $damage = $this->atk / 2;
        $target->setHP($damage);
        $status = "{$this->pseudo} saisi sa dague et attaque {$target->pseudo} ! Il reste {$target->lifePoint} points de vie à {$target->pseudo}.";
      }
        echo $status;
  }

  public function attack($target){
    $damage = $this->atk;
    $target->setHP($damage);
    $this->carquois -= 1;

  }

  public function setHP($damage){
    $this->lifePoint -= $damage;
    echo "<br>";
    return;
  }

  public function speAtk($target){
    if ($this->lifePoint < 0){
      $this->lifePoint = 0;
    }
    $this->lifePoint -= $damage;
    $this->speAtk;
    $damageSp = $this->speAtk;
    $target->setHP($damageSp);
    $this->carquois -= 2;

  }

}
