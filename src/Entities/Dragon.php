<?php 

final class Dragon extends Monster
{
    public function __construct(string $name, string $image, int $health, int $healthMax)
    {
        parent::__construct($name, $image, $health, $healthMax);
    }
}