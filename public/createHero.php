 <?php

require_once '../utils/autoloader.php';

session_start();

// if (!isset($_SESSION['hero'])) {
//     $_SESSION['hero'] = new Hero();
// }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hero</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/createHero.css">
    <link rel="stylesheet" href="./assets/styles/button.css">
</head>
<body>

    <header>
        <a href="./heros.php">Battle Lords</a>
    </header>

    <main>
        <form enctype="multipart/form-data" action="../process/handleCreateHero.php" method="post" class="form">
            <input type="text" name="name" placeholder="Hero Name" required class="input">
            <input type="file" name="image" accept="image/*" required>
            <input type="submit" value="Create" class="button">
        </form>
    </main>

</body>
</html>