<?php

class HeroMapper 
{
    public static function mapToObject(array $datas): Hero
    {
        return new Hero(
            $datas['id'],
            $datas['name'],
            $datas['image'],
            $datas['health'],
            $datas['healthMax'],
        );
    }

    public static function mapToArray(Hero $hero): array
    {
        return [
            'name' => $hero->getName(),
            'image' => $hero->getImage(),
            'health' => $hero->getHealth(),
            'healthMax' => $hero->getHealthMax(),
        ];
    }
}