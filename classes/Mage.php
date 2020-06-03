<?php

class Mage extends Character
{
    private $shield = false;

    function __construct($pseudo) {
        parent::__construct($pseudo);
        $this->magicPoint = 30;
    }

    public function action($target) {
        $rand = rand(1, 100);
        if ($rand <= 50 && !$this->shield) {
            $status = $this->shield(true);
        } else {
            $status = $this->attack($target);
        }
        return $status;
    }

    public function attack($target) {
        $rand = rand(1 , 5);
        $manaAtk = rand(1 , 17);
        if ($this->magicPoint >= $manaAtk) {
            $damage = $manaAtk * $rand;
            $target->setHP($damage);
            $this->magicPoint -= $manaAtk;
            //$target->isAlive();
            $status = "{$this->pseudo} lance un éclair des arcanes sur {$target->pseudo} ! Il lui inflige $damage points de dégâts ! Il reste {$target->lifePoint} HP à {$target->pseudo}! Il reste {$this->magicPoint} mp à {$this->pseudo}!";
        } elseif ($this->magicPoint > 0) {
            $damage = $this->magicPoint * $rand;
            $target->setHP($damage);
            $this->magicpoint = 0;
            //$target->isAlive();
            $status = "{$this->pseudo} attaque {$target->pseudo} qui a {$target->lifePoint} points de vie! Il reste {$this->magicPoint} mp à {$this->pseudo}!";
        } else {
            $status = "{$this->pseudo} n'a plus de mana, et ne peut pas attaquer!";
        }

        return $status;
    }

    public function shield() {
        $this->shield = true;
        $status = "{$this->pseudo} a activé son bouclier!";
        return $status;
    }

    public function setHP($damage) {
        if ($this->shield === false) {
            // Shield down, take normal damage
            $this->lifePoint -= $damage;
        } else {
            // Shield up, don't take damage and disable shield
            $this->lifePoint -= 0;
            $this->shield = false;
        }
        if ($this->lifePoint < 0) {
            $this->lifePoint = 0;
        }
        return;
    }
}
