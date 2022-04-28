<?php

//Connexion Test
/*try{
    $bdd = new PDO('mysql:host=localhost;dbname=stage_gts;charset=utf8', 'root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}*/
try{
    $bdd = new PDO('mysql:host=localhost;dbname=smatte_test;charset=utf8', 'smatte','1bc2adcdc0');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}
?>
