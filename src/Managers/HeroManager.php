<?php

class HeroManager {     

    public function findAll(): array{

        $heroRepo = new HeroRepository();

        $heros = $heroRepo->findAll();

        return $heros;
    }
}