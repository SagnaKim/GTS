<?php
include "header.php";
if(isset($_POST['idCategorie']))
{
    $sql = DeleteCategorie($_POST['idCategorie'], $bdd);
    //$sql = InsertCategorie($_POST['categorie'], $bdd);
    if($sql)
    {
        echo '<p>Sous categorie supprimé</p>';
        header("Location: index.php");
    }else{
        echo "<p class='justify centre_page'>Sous categorie ne peut pas être supprimé car il y a encore des éléments à l'intérieur</p>";
    }
}
?>