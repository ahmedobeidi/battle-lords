<?php

class HeroManager {     

    public function findAll(): array{

        $myHeroRepo = new HeroesRepository();

        $heros = $myHeroRepo->findAllHeroes();

        return $heros;
    }
}