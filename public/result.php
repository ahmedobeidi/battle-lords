<?php 
    session_start();
    $results = $_SESSION['results'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/result.css">
    <link rel="stylesheet" href="./assets/styles/button.css">
</head>
<body>

    <header>
        <a>Battle Lords</a>
    </header>

    <main>
        <section class="hero-image">
            <img src="" alt="">
        </section>
        <section class="hero-result">
            <?php foreach($results as $result): ?>
                <p><?= $result ?></p>
            <?php endforeach ?>
            <?php session_unset(); ?>
        </section>
        <section class="replay">
            <a href="./showHeros.php" class="button">Replay</a>
        </section>
    </main>

</body>
</html>