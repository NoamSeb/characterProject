<?php 
$user="root";
$pass="root";
$db = new PDO('mysql:host=localhost;dbname=poo_sgbd;port:3306', $user, $pass); 

function changerClasse($classe){
    require 'class/'.$classe.'.php';
}
spl_autoload_register('changerClasse');

$manager = new PersonnageManager($db);
?>