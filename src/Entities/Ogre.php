<?php

final class Ogre extends Monster
{
    public function __construct(string $name = "Ogre", int $health = 80, int $healthMax = 80)
    {
        parent::__construct($name, $health, $healthMax);
    }
}