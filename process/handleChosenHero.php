<?php 

include_once '../utils/autoloader.php';

// Need to check auth to enter this page //

if (isset($_SESSION['hero']) || isset($_SESSION['monster'])) {
    session_start();
    session_unset($_SESSION['hero']);
    session_unset($_SESSION['monster']);
}

$heroRepository = new HeroRepository();
$hero = $heroRepository->find($_POST['name']);

if (!$hero) {
    header('Location: ../public/heros.php?message=NotFound');
    exit;
}

$randomNumber = rand(1, 15);

// 1/15 chance to fight a dragon
if ($randomNumber == 1) {
    $monster = new Dragon("Dragon", "dragon.gif", 100, 100);
} 
// 5/15 chance to fight an ogre
elseif ($randomNumber <= 6) {
    $monster = new Ogre("Ogre", "ogre.gif", 100, 100);
} 
// 9/15 chance to fight a goblin
else {
    $monster = new Goblin("Goblin", "goblin.gif", 100, 100);
}

session_start();

$_SESSION['hero'] = $hero;
$_SESSION['monster'] = $monster;

header('Location: ../public/fight.php');
exit;