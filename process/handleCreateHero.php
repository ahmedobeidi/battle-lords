<?php

include_once '../utils/autoloader.php';

session_start();

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Auth";
    header("Location: ../public/createHero.php?error=Auth");
    return;
}

// $name = SecurityService::validateCreateHeroForm($_POST);
$heroName = SecurityService::validateCreateHeroName($_POST);
$heroImage = SecurityService::validateCreateHeroImage($_FILES);

$heroRepository = new HeroesRepository();

$hero = $heroRepository->findByName($heroName);

if (!$hero){
    $hero = new Hero(0, $heroName, $heroImage);
    $heroRepository->create($hero);
    header("Location: ../public/home.php?m=success");
    exit();
}

// Il faut faire le header
header("Location: ../public/home.php?m=alreadyExist");
exit();
