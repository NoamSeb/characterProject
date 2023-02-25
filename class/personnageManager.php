<?php
class PersonnageManager
{
    private $db;
    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }
    public function getList()
    {
        $query = $this->db->query('SELECT * FROM personnages ORDER BY genre');
        while ($donnee = $query->fetch(PDO::FETCH_ASSOC)) {
            $personnages[] = new Personnage($donnee);
        }
        return $personnages;
    }
    public function getOneById(int $id)
    {
        $query = $this->db->query('SELECT * FROM personnages WHERE  id ='.$id);
        $singlePerso = new Personnage ($query->fetch(PDO::FETCH_ASSOC));
        return $singlePerso;
    }
    public function addCharacter(Personnage $perso)
    {
        $stmt = $this->db->prepare('INSERT INTO personnages (name, atk, pv, genre) VALUES (?, ?, ?, ?)');
$stmt->execute([$perso->getName(), $perso->getAtk(), $perso->getPv(), $perso->getGenre()]);

    }
    public function updateCharacter(Personnage $perso)
    {
        $stmt = $this->db->prepare('UPDATE personnages SET name = ?, atk = ?, pv = ?, genre = ? WHERE id = ?');
        $stmt->execute([$perso->getName(), $perso->getAtk(), $perso->getPv(), $perso->getId(), $perso->getGenre()]);
    }

    public function deleteCharacter(int $id)
    {
        $stmt = $this->db->prepare('DELETE FROM personnages WHERE id = ?');
        $stmt->execute([$id]);
    }
}