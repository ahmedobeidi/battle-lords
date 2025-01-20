<?php


class FightsManager {
    public function startFight(Hero $hero, Monster $monster): string {
        while ($hero->getHealth() > 0 && $monster->getHealth() > 0) {
            $hero->attack($monster);
            if ($monster->getHealth() <= 0) {
                return "{$hero->getName()} wins!";
            }

            $monster->attack($hero);
            if ($hero->getHealth() <= 0) {
                return "{$monster->getName()} wins!";
            }
        }
    }
}
