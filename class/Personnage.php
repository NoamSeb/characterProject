<?php
class Personnage{
    private $id;
    private $pv;
    private $atk;
    private $name;
    private $ext_genre;

    public function setId(int $id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setPv(int $pv){
        if($pv>200){$pv=200;}
        $this->pv=$pv;
    }

    public function getPv(){
        return $this->pv;
    }
    public function setAtk(int $atk){
        if($atk>40){$atk=30;}
        $this->atk=$atk;
    }

    public function getAtk(){
        return $this->atk;
    }
    public function setName(string $name){
        $this->name=$name;
    }

    public function getName(){
        return $this->name;
    }
    public function setGenre(string $genre){
        $this->genre=$genre;
    }

    public function getGenre(){
        return $this->genre;
    }

    public function hydrate(array $donnee)
    {
        foreach ($donnee as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
                //$this->$key = $ value;
            }
        }
    }

    public function __construct($donnee){
        $this -> hydrate($donnee);
    }
    
    public function crier(){
        return "Vous ne passerez pas !";
    }
    public function regenerer($x=NULL){
        if(is_null($x)){
            $this->pv=100;
        }else{
            $this->pv+=$x;
        }
    }
    public function is_alive(){
    return $this->pv>0;
    }

    public function attack(Personnage $perso){
        $perso->setPv($perso->pv - $this->atk);
    }
}

?>