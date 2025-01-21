<?php 

include_once '../utils/autoloader.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../public/fight.php?error=Auth");
    return;
}

session_start();
$hero = $_SESSION['hero'];
$monster = $_SESSION['monster'];
$results = [];

while ($hero->getHealth() > 0 && $monster->getHealth() > 0) {
    $results[] = " - " . $hero->getName() . " attaque " . $monster->getName();
    $hero->attack($monster);
    $results[] = " - " . $hero->getName() . " inflige 15 dégats ";

    if ($monster->getHealth() > 0) {
        $results[] = " - " . $monster->getName() . " attaque " . $hero->getName();

        $monster->attack($hero);

        $results[] = " - " . $monster->getName() . " inflige 15 dégats ";
    }
}

$_SESSION["results"] = $results;

header("Location: ../public/result.php?message=result");
return;
