<?php

abstract class Monster extends Character
{
    public function __construct(string $name, string $image, int $health, int $healthMax)
    {
        parent::__construct($name, $image, $health, $healthMax);
    }
}