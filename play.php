<?php
require_once('start.php');

$personnages = $manager->getList();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arena</title>
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
    <h1 class="title">Play</h1>
    <img src="./medias/fight.webp" alt="" class="screenImage">
    <form action="" method="POST">
        <select name="perso1" id="perso1" required>
            <option value="">First character</option>
            <?php foreach ($personnages as $r) { ?>
                <option value="<?= $r->getId() ?>"><?= $r->getName() ?></option>
            <?php } ?>
        </select>
        <select name="perso2" id="perso2" required>
            <option value="">Second character</option>
            <?php foreach ($personnages as $r) { ?>
                <option value="<?= $r->getId() ?>"><?= $r->getName() ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Fight">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $perso1_id = $_POST['perso1'];
        $perso2_id = $_POST['perso2'];

        $perso1 = $manager->getOneById($perso1_id);
        $perso2 = $manager->getOneById($perso2_id);

        if ($perso1_id == $perso2_id) {
            echo "Vous ne pouvez pas vous attaquer vous-même";
        } elseif ($perso1->getGenre() == $perso2->getGenre()) {
            echo "Un infecté ne peut pas en attaquer un autre";
        } else {
            $perso1->attack($perso2);
            $manager->updateCharacter($perso1);
            $manager->updateCharacter($perso2);
            echo $perso1->getName() . " attaque " . $perso2->getName() . " et lui inflige " . $perso1->getAtk() . " points de dégâts ! Il reste " . $perso2->getPv() . " points de vie à " . $perso2->getName() . ".";
        }
    }
    ?>

</body>

</html>