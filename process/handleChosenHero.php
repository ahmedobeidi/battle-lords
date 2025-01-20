<?php 

include_once '../utils/autoloader.php';

$heroRepository = new HeroRepository();
$hero = $heroRepository->find($_POST['name']);

var_dump($hero);
die();

if (!$hero) {
    header('Location: /public/choice-hero.php');
    exit;
}

$monster = new Ogre();

var_dump($monster);
die();

session_start();

$_SESSION['hero'] = $hero;
$_SESSION['monster'] = $monster;

header('Location: /public/fight.php');
exit;