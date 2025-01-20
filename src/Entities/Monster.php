<?php

abstract class Monster extends Character
{
    public function __construct(string $name = "Ogre", string $image = "", int $health = 80, int $healthMax = 80)
    {
        parent::__construct($name, $image, $health, $healthMax);
    }
}