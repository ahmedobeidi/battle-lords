<?php

abstract class Character 
{
    private string $name;
    private string $image;
    private int $health;
    private int $healthMax;

    public function __construct(string $name, string $image, int $health, int $healthMax)
    {
        $this->name = $name;
        $this->image = $image;
        $this->health = $health;
        $this->healthMax = $healthMax;
    }

    /**
     * Get the value of name
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of image
     */ 
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Get the value of health
     */ 
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * Set the value of health
     */ 
    public function setHealth(int $health): self
    {
        $this->health = $health;
        return $this;
    }

    /**
     * Get the value of healthMax
     */ 
    public function getHealthMax(): int
    {
        return $this->healthMax;
    }


    public function attack(Character $target)
    {

        if($target->getHealth() - 15 <= 0){
            $target->setHealth(0);
        } else {
            $target->setHealth($target->getHealth() - 15);
        }
        
    }
}