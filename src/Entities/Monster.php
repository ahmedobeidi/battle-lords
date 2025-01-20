<?php

abstract class Monster extends Character
{
    public function __construct(string $name, int $health, int $healthMax)
    {
        parent::__construct($name, $health, $healthMax);
    }
}