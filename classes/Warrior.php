<?php

class Warrior extends Character
{

    function action($target) {
        $rand = rand(1, 10);
        $damage = $this->atk + $rand;
        $target->setHP($damage);
        $status = "{$this->pseudo} attaque {$target->pseudo} avec Deuillegivre ! Il inflige $damage points de dégâts à {$target->pseudo} ! Il reste {$target->lifePoint} points de vie à {$target->pseudo}!";
        return $status;
      }
    //$target->setHP($damage);
    //$target->isAlive();
}
