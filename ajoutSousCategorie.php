<?php
include "header.php";
?>
<div class="background background-categorie">
<?php
if(isset($_POST['sousCategorie']))
{
    $sql = InsertCategory($_POST['idCategorie'], $_POST['sousCategorie'], "null", $bdd);
    if($sql)
    {
        echo '<p>Sous Categorie ajouté</p>';
        header("Location: index.php");
    }else{
        echo '<p>Sous Categorie ne peut être ajouté</p>';
    }
}
?>
<form method="post" action="ajoutSousCategorie.php" onsubmit="return confirm(`Voulez vous vraiment ajouter cette sous catégorie à ma catégorie <?php echo $_GET['categorie']; ?> ?`);">
    <p class="justify centre_page">Ajout d'une sous Catégorie pour la catégorie <?php echo $_GET['categorie']; ?></p>
    <br>
    <p class="justify"><label class="justify" name="LabelNomCategorie">Nom Sous Catégorie :</label></p>
    <input type="text" name="sousCategorie" id="sousCategorie" class="form-control input_center" placeholder="Categorie">
    <?php
    if(isset($_GET['categorie']))
    {
    ?>
    <input type="hidden" name="idCategorie" id="idCategorie" value="<?php echo $_GET['categorie']; ?>">
    <?php
    }
    ?>
    <br>
    <input type="submit" name="submit" class="btn center bouton_positif">
</form>
