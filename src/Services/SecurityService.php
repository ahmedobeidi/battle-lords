<?php

class SecurityService {
    // array $createHeroDatas
    public static function validateCreateHeroName(array $hero): ?string
    {

        if (
            !isset(
                $hero['name'],
            )
        ) {
            $_SESSION['error'] = "Not Set";
            header('location: ../public/createHero.php?error=NotSet');
            exit;
        }
        
        if (
            empty($hero['name'])
        ) {
            $_SESSION['error'] = "All fields are required";
            header("location: ../public/createHero.php?error=empty");
            exit;
        }
        
        $heroName = htmlspecialchars(trim($hero['name']));
        
        if (strlen($heroName) < 3) {
            $_SESSION['error'] = "Name length is too short";
            header("location: ../public/createHero.php?error=short");
            exit;
        }

        return $heroName;
        
    }

    public static function validateCreateHeroImage(array $hero): ?string {
        if (
            !isset(
                $hero['image'],
            )
        ) {
            $_SESSION['error'] = "Not Set";
            header('location: ../public/createHero.php?error=NotSet');
            exit;
        }
        
        if (
            empty($hero['image']['name'])
        ) {
            $_SESSION['error'] = "All fields are required";
            header("location: ../public/createHero.php?error=empty");
            exit;
        }

        $uploadDir = '../public/assets/images/heros_unique_id/';
        $uploded = false;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize <= 5 * 1024 * 1024) { // 5MB limit
                    $newFileName = uniqid('', true) . '.' . $fileExt;
                    $fileDestination = $uploadDir . $newFileName;
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $uploded = true;
                    }
                }
            }
        } 

        if(!$uploded) {
            header("Location: ../public/createHero.php?m=Image not uploaded!");
            exit();
        }

        return $newFileName;

    }
}
