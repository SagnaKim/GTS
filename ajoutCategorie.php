<?php
include "header.php";
?>
<div class="background background-categorie">
<?php
if(isset($_POST['categorie']))
{
    $sql = InsertCategory(0, $_POST['categorie'], "null", $bdd);
    if($sql)
    {
        echo '<p>Categorie ajouté</p>';
        header("Location: index.php");
    }else{
        echo '<p>Categorie ne peut être ajouté</p>';
    }
}
?>
<form method="post" action="ajoutCategorie.php" onsubmit="return confirm(`Voulez vous vraiment ajouter cette catégorie ?`);">
    <p class="justify centre_page">Ajout d'une nouvelle catégorie</p>
    <br>
    <p class="justify"><label class="justify" name="LabelNomCategorie">Nom Sous Catégorie :</label></p>
    <input type="text" name="categorie" id="categorie" class="form-control input_center" placeholder="Categorie">
    <?php
    if(isset($_GET['id']))
    {
    ?>
    <input type="hidden" name="idCategorie" value="<?php echo $_GET['id']; ?>">
    <?php
    }
    ?>
    <br>
    <input type="submit" name="submit" class="btn center bouton_positif">
</form>
