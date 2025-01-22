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
    <title>Heros</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/showHeros.css">
</head>
<body>

    <header>
        <a href="./showHeros.php">Battle Lords</a>
    </header>

    <main>
        <div class="heading">
            <h1>Choose Your Hero</h1>
        </div> 
        <section class="hero-grid">
            <?php foreach ($heros as $hero): ?>
                <form action="../process/handleChosenHero.php" method="POST" class="hero-card" onclick="this.submit()">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($hero->getName()); ?>">
                    <img src="./assets/images/heros/<?= $hero->getImage(); ?>" class="hero-image">
                </form>
            <?php endforeach; ?>
        </section>
    </main>

</body>
</html>
