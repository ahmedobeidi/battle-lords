<?php

require_once '../utils/autoloader.php';

session_start();

// Need to check auth to enter this page //


if (!isset($_SESSION['hero']) || !isset($_SESSION['monster'])) {
    header('Location: ./heros.php');
    exit;
}

/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];

/**
 * @var Monster $monster
 */
$monster = $_SESSION['monster'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/fight.css">
</head>
<body>
    <header>
        <a>Battle Lords</a>
    </header>

    <main>
        <section>
            <div>
                <img src="./assets/images/heros_unique_id/<?= htmlspecialchars($hero->getImage()); ?>" alt="Hero">
            </div>

            <form action="../process/handleFight.php" method="POST">
                <input type="submit" value="Attack" class="button">
            </form>

            <?php if(isset($_SESSION['result'])): ?>
                
            <?php endif ?>

            <div>
                <img src="./assets/images/monster/<?= htmlspecialchars($monster->getImage()); ?>" alt="Monster">
            </div>
        </section>
    </main>
</body>
</html>