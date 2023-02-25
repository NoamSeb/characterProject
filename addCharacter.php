<?php
require_once('start.php');

$personnage = $manager->getList();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $perso = new Personnage([
        'name' => $_POST['name'],
        'atk' => $_POST['atk'],
        'pv' => $_POST['pv'],
        "genre" => $_POST['genre']
    ]);
    $manager->addCharacter($perso);
    header('Location: character.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="nav">
            <a href="index.html"><img src="./medias/luciole.png" alt="Home"></a>
            <ul>
                <a href="character.php" class="navLink">
                    <li>Character</li>
                </a>
                <a href="play.php" class="navLink">
                    <li>Play</li>
                </a>
            </ul>
        </div>
    </nav>
    <h1 class="title">Add</h1>
    <img src="./medias/infectedEvolve.webp" alt="" class="screenImage">
    <main>
        <div class="formulaire">
            <form action="" method="POST">
                <span>
                    <label for="name">Name : </label>
                    <input type="text" name="name" id="name" placeholder="Name" required>
                </span>
                <span>
                    <label for="name">Attack points : </label>
                    <input type="atk" name="atk" id="atk" placeholder="attack points" required>
                </span>
                <span>
                    <label for="pv">Life points : </label>
                    <input type="int" name="pv" id="pv" placeholder="life points" required>
                </span>
                <span>
                    <label for="genre">Genre : </label>
                    <select name="genre" id="genre" required>
                        <option value="">Select a genre</option>
                        <option value="survivor">Survivor</option>
                        <option value="infected">Infected</option>
                    </select>
                </span>
                <input type="submit" value="Valider" class="valider">
            </form>
            <img src="./medias/street2.webp" alt="">
        </div>
    </main>
    <div class="footer"></div>
</body>

</html>