<?php
include "header.php";
if (isset($_POST['article']))
{
  $sqlInsert = InsertArticle($_POST['article'], $bdd);
  if($sqlInsert)
    {
        $sqlSelectIdArticle = 'SELECT * FROM article';
        $articles = $bdd->query($sqlSelectIdArticle);
        $sql = $articles->fetchAll();
        $articles->closeCursor();
        $sqlInsertCategoryArticle = InsertCategoryArticle($_POST['idCategory'] ,$sql[count($sql)-1]['id_article'], $bdd);
        if ($sqlInsertCategoryArticle)
        {
            header("Location: index.php");
        }else{
            echo $bdd->error;
        }
        
    }else{
        echo $bdd->error;
    }
}
?>
<form method="post" action="ajoutArticle.php" onsubmit="return confirm(`Voulez vous vraiment ajouter cet article ?`);">
    <p class="justify centre_page">Ajout d'un nouvelle article</p>
    <br>
    <p class="justify"><label class="justify" name="LabelNomArticle">Nom Article :</label></p>
    <?php
    if (isset($_GET['id']))
    {
        echo '<input type="hidden" name="idCategory" value="'.$_GET['id'].'">';   
    }
    ?>
    <input type="text" name="article" id="article" class="form-control input_center" placeholder="Article">
    <br>
    <input type="submit" name="submit" class="btn center bouton_positif">
</form>