<?php

final class HeroesRepository extends AbstractRepository 
{
    public function __construct()
    {
        parent::__construct();
    }


    public function findAllHeroes(): array 
    {
        $stmt = $this->pdo->query('SELECT * FROM hero');
        $heroDatas = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $heroes = [];

        foreach ($heroDatas as $heroData)
        {
            $heroes[] = HeroMapper::mapToObject($heroData);
        }

        return $heroes;

    }

    public function findByName(string $name): ?Hero
    {
        $stmt = $this->pdo->prepare("SELECT * FROM hero WHERE name = :name");
        $stmt->execute([
            ':name' => $name
        ]);
        $heroData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$heroData){
            return null;
        }

        return HeroMapper::mapToObject($heroData);
    }

    public function create(Hero $hero): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO hero (name, image) VALUES (:name, :image)');
        $stmt->execute([
            ":name" => $hero->getName(), 
            ":image" => $hero->getImage(), 
        ]);
    }
}