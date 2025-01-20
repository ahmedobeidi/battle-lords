<?php


class Hero {

    private int $id;
    private string $name;
    private string $image;
    private int $health;
    private int $attack;
    // private int $healthMax;

    public function __construct(int $id, string $name, $image) {
        $this->name = $name;
        $this->image = $image;
        $this->health = 100;
        $this->attack = 15;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * Get the value of name
     */ 
    public function getName(): string 
    {
        return $this->name;
    }

    public function getImage(): string 
    {
        return $this->image;
    }

    public function getHealth(): int 
    {
        return $this->health;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function attack(Monster $monster): void {
        $monster->takeDamage($this->attack);
    }

    public function takeDamage(int $damage): void {
        $this->health -= $damage;
    }

    
}