<?php

require_once '../utils/autoloader.php';

session_start();

// Need to check auth to enter this page //


if (!isset($_SESSION['hero']) || !isset($_SESSION['monster'])) {
    header('Location: ./heros.php');
    exit;
}

if (!isset($_SESSION['turn'])) {
    $_SESSION['turn'] = 'hero'; // Start with the hero's turn
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
                <p id="heroLabel"><?=  htmlspecialchars($hero->getHealth() . "%"); ?></p>
                <img src="./assets/images/heros_unique_id/<?= htmlspecialchars($hero->getImage()); ?>" alt="Hero">
            </div>

            <form method="POST">
                <input type="submit" value="Attack" class="button">
            </form>

            <div class="button" id="button">Attack</div>

            <div>
                <p id="monsterLabel"><?=  htmlspecialchars($monster->getHealth() . "%"); ?></p>
                <img src="./assets/images/monster/<?= htmlspecialchars($monster->getImage()); ?>" alt="Monster">
            </div>
        </section>
    </main>

<script>
    let currentTurn = "hero"; // Initialize the turn to start with the hero
    const attackButton = document.getElementById("button");
    const monsterLabel = document.getElementById("monsterLabel");
    const heroLabel = document.getElementById("heroLabel");

    attackButton.addEventListener("click", handleAttack);

    function handleAttack() {
        if (currentTurn === "hero") {
            // Hero attacks the monster
            <?php $hero->attack($monster); ?>
            monsterLabel.innerHTML = <?php echo json_encode($monster->getHealth() . '%'); ?>;

            // Switch turn to monster
            currentTurn = "monster";
        } else {
            // Monster attacks the hero
            <?php $monster->attack($hero); ?>
            heroLabel.innerHTML = <?php echo json_encode($hero->getHealth() . '%'); ?>;

            // Switch turn back to hero
            currentTurn = "hero";
        }

            console.log("Current Turn: " + currentTurn);
            location.reload(); // Refresh the page to reflect updated health
        }
</script>
</body>
</html>