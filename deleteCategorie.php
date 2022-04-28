<?php
include "header.php";
if(isset($_POST['id']))
{
    $sql = DeleteCategorie($_POST['id'], $bdd);
    //$sql = InsertCategorie($_POST['categorie'], $bdd);
    if($sql)
    {
        echo '<p>Categorie supprimé</p>';
        header("Location: index.php");
    }else{
        echo "<p class='justify centre_page'>Categorie ne peut pas être supprimé car il y a encore des éléments à l'intérieur</p>";
    }
}
?>
<h2>Page de suppression de sous categorie</h2>