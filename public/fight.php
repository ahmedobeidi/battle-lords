<?php

require_once '../utils/autoloader.php';

session_start();

// Check if the "Play Again" button is clicked
if (isset($_POST['playAgain'])) {
    // Destroy the session to clear all data
    session_destroy(); // This will remove all session variables
    header('Location: ./heros.php'); // Redirect to start page or hero selection page
    exit;
}

// Check if hero and monster exist in session
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

// Check if it's the first turn
if (!isset($_SESSION['turn'])) {
    $_SESSION['turn'] = 'hero'; // Start with the hero's turn
}

// Process the attack
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['playAgain'])) {
    if ($_SESSION['turn'] === 'hero') {
        // Hero attacks the monster
        $hero->attack($monster);
        $_SESSION['turn'] = 'monster'; // Switch to monster's turn
    } else {
        // Monster attacks the hero
        $monster->attack($hero);
        $_SESSION['turn'] = 'hero'; // Switch back to hero's turn
    }
}

// Check for game over condition
if ($hero->getHealth() <= 0 || $monster->getHealth() <= 0) {
    $_SESSION['gameOver'] = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/button.css">
    <link rel="stylesheet" href="./assets/styles/fight.css">
</head>

<body>
    <header>
        <a>Battle Lords</a>
    </header>

    <main>
        <section>
            <div>
                <!-- Hero Progress Bar with Health Text -->
                <div class="progress-container">
                    <!-- Ensure health is at least 1% for visibility -->
                    <div class="progress-bar hero-bar" style="width: <?= max($hero->getHealth(), 1); ?>%">
                        <?= htmlspecialchars($hero->getHealth() . "%"); ?>
                    </div>
                </div>
                <div>
                    <img src="./assets/images/heros_unique_id/<?= htmlspecialchars($hero->getImage()); ?>" alt="Hero">
                </div>
            </div>

            <?php if (!isset($_SESSION['gameOver'])): ?>
                <form method="POST">
                    <input type="submit" value="Attack" class="button">
                </form>
            <?php else: ?>
                <form action="../process/handlePlayAgain.php" method="POST">
                    <input type="submit" name="playAgain" value="Play Again" class="button">
                </form>
            <?php endif; ?>

            <div>
                <!-- Monster Progress Bar with Health Text -->
                <div class="progress-container">
                    <!-- Ensure health is at least 1% for visibility -->
                    <div class="progress-bar monster-bar" style="width: <?= max($monster->getHealth(), 1); ?>%">
                        <?= htmlspecialchars($monster->getHealth() . "%"); ?>
                    </div>
                </div>
                <img src="./assets/images/monster/<?= htmlspecialchars($monster->getImage()); ?>" alt="Monster">
            </div>
        </section>
    </main>
</body>

</html>