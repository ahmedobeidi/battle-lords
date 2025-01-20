<?php

class HeroMapper 
{
    public static function mapToObject(array $datas)
    {
        return new Hero(
            $datas['id'],
            $datas['name'],
            $datas['image'],
            $datas['health'],
            $datas['healthMax'],
        );
    }

    public static function mapToArray(Hero $hero)
    {
        return [
            'name' => $hero->getName(),
            'image' => $hero->getImage(),
            'health' => $hero->getHealth(),
            'healthMax' => $hero->getHealthMax(),
        ];
    }
}