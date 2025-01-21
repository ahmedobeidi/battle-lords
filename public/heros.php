<?php 
    
    require_once '../utils/autoloader.php';

    $heroManager = new HeroManager();
    $heros =  $heroManager->findAll();

    if (isset($_SESSION['result'])) session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heros</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/showHeros.css">
    <link rel="stylesheet" href="./assets/styles/button.css">
</head>
<body>

    <header>
        <a href="./heros.php">Battle Lords</a>
    </header>

    <main>
        <section class="hero-create-button">
            <a href="./createHero.php" class="button">Create Hero</a>
            <?php if ($heros): ?>
                <h1 class="heading">Choose Your Hero</h1>
            <?php endif ?>
        </section>
            
        <?php if (!$heros):  ?>
            <section class="not-found">
                <h2>No Heros Found</h2> 
            </section>
        <?php else : ?>
            <section class="hero-grid">
            <?php foreach ($heros as $hero): ?>
                <form action="../process/handleChosenHero.php" method="POST" class="hero-card" onclick="this.submit()">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($hero->getName()); ?>">
                    <img src="./assets/images/heros_unique_id/<?= $hero->getImage(); ?>" class="hero-image">
                </form>
            <?php endforeach; ?>
            </section>
        <?php endif ?>   
    </main>

</body>
</html>

 <!-- <div onclick="this.parentNode.submit()">
                        <h2 class="hero-name"><?= htmlspecialchars($hero->getName()); ?></h2>
                    </div> -->
