<?php
include "header.php";
$article = GetSection($_GET['id'], $bdd);
echo '<a href="ajoutModifArticle.php?id='.$_GET['id'].'">Ajouter une nouvelle section</a>';
while ($elem = $article->fetch())
{
    echo $elem['title_section'];
    echo '<form method="post" action="ajoutModifArticle.php">
                <input type="hidden" name="idSection" value="'.$elem['id_section'].'">
                <input type="hidden" name="titleSection" value="'.$elem['title_section'].'">
                <input type="hidden" name="idParentArticle" value="'.$elem['parentArticle_section'].'">
                <input type="hidden" name="orderSection" value="'.$elem['order_section'].'">
                <input class="btn btn-danger" type="submit" value="Modifier">
            </form>';
    echo '<form method="post" action="deleteSection.php" onsubmit="return confirm(`Voulez vous vraiment supprimer cette section ?`);">
                <input type="hidden" name="idSection" value="'.$elem['id_section'].'">
                <input class="btn btn-danger" type="submit" value="Supprimer">
            </form>';
    echo '<p class="article">'.$elem['body_section'].'</p>';
}
