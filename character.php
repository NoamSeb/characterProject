<?php
require_once('start.php');

$personnages = $manager->getList();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 1 || is_numeric($_GET['id'])) {
        $manager->deleteCharacter($_GET['id']);
        header('Location: character.php');
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character</title>
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
    <h1 class="title">Characters</h1>
    <img src="./medias/infectedEvolve.webp" alt="" class="screenImage">
    <main>
        <?php if ($personnages == null) {
            echo "No character registered";
        } else {
            foreach ($personnages as $r) { ?>
                <h2>
                    <?= $r->getName() ?>
                </h2>
                <div class="characters">
                    <div class="characterInfo">
                        <p>Attack points :
                            <?= $r->getAtk() ?>
                        </p>
                        <p>Life points :
                            <?= $r->getPv() ?>
                        </p>
                        <p>Genre :
                            <?= $r->getGenre() ?>
                        </p>
                    </div>
                    <div class="actionsCharacter">
                        <a href="updateCharacter.php?id=<?= $r->getId() ?>"><button>Update</button></a>
                        <a href="character.php?action=1&id=<?= $r->getId() ?>"><button>Delete</button></a>
                    </div>
                </div>
                <div class="line"></div>
            <?php }
        } ?>
        <a href="addCharacter.php"><button>Add a character</button></a>
    </main>
</body>

</html>