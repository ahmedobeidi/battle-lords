<?php 

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../public/fight.php?error=Auth");
    exit;
}

session_start();
session_unset(); // This will remove all session variables
header('Location: ../public/showHeros.php');
exit;