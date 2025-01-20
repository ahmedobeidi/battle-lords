<?php 
    
    require_once '../utils/autoloader.php';

    $heroManager = new HeroManager();
    $heros =  $heroManager->findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/showHeros.css">
    <link rel="stylesheet" href="./assets/styles/button.css">
</head>
<body>

    <header>
        <a href="./home.php">Battle Lords</a>
    </header>

    <main>
        <section class="hero-create-button">
            <a href="./createHero.php" class="button">Create Hero</a>
        </section>
            
        <?php if (!$heros):  ?>
            <section class="not-found">
                <h2>No Heros Found</h2> 
            </section>
        <?php else : ?>
            <section class="hero-grid">
                <?php foreach ($heros as $hero): ?>
                    <div class="hero-card">
                        <img src="./assets/images/heros/<?= $hero->getImage(); ?>" alt="Hero 1" class="hero-image">
                        <h2 class="hero-name"><?= $hero->getName(); ?></h2>
                        <!-- <p class="hero-description">A fierce competitor known for their strength and agility.</p> -->
                    </div>
                <?php endforeach ?>
            </section>
        <?php endif ?>   
    </main>

</body>
</html>


