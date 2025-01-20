<?php

class Monster {
    private string $name;
    private int $health;
    private int $attack;

    public function __construct(string $name, int $health, int $attack) {
        $this->name = $name;
        $this->health = $health;
        $this->attack = $attack;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getHealth(): int {
        return $this->health;
    }

    public function attack(Hero $hero): void {
        $hero->takeDamage($this->attack);
    }

    public function takeDamage(int $damage): void {
        $this->health -= $damage;
    }
}