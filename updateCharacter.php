<?php
require_once('start.php');

$singlePerso = $manager->getOneById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $singlePerso = $manager->getOneById($_POST['id']);
    $singlePerso->setName($_POST['name']);
    $singlePerso->setAtk($_POST['atk']);
    $singlePerso->setPv($_POST['pv']);
    $singlePerso->setGenre($_POST['genre']);
    $manager->updateCharacter($singlePerso);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
    <h1 class="title">Update</h1>
    <img src="./medias/infectedEvolve.webp" alt="" class="screenImage">
    <main>
        <div class="formulaire">
            <form action="character.php" method="POST">
                <span>
                    <label for='id' hidden>id :</label>
                    <input type="text" id="id" name="id" value="<?= $singlePerso->getId() ?>" hidden>
                </span>
                <span>
                    <label for="name">Name : </label>
                    <input type="text" name="name" id="name" value="<?= $singlePerso->getName() ?>">
                </span>
                <span>
                    <label for=" name">Attack points : </label>
                    <input type="atk" name="atk" id="atk" value="<?= $singlePerso->getAtk() ?>">
                </span>
                <span>
                    <label for="pv">Life points : </label>
                    <input type="int" name="pv" id="pv" value="<?= $singlePerso->getPv() ?>">
                </span>
                <span>
                    <label for="genre">Genre : </label>
                    <select name="genre" id="genre" required>
                        <option value=""><?= $singlePerso->getGenre() ?></option>
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