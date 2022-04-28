<?php
include "header.php";
?>
    <div class="background background-categorie">
<?php
    $sousCategories = GetSubCategories($_GET['id'], $bdd);
    echo '<div class="Grid Page_Categorie">';
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
    {
        echo '<a class="btn btn-danger block" href="ajoutSousCategorie.php?categorie='.$_GET['id'].'" id="add">
                <p class="justify center_text_grid"> Ajout                         
                    <svg width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="-1 -8 17 24">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                    </svg>
                </p>
            </a>';
        while ($sousCategorie = $sousCategories->fetch())
        {
            echo '<a class="btn btn-danger block" href="sousCategorieDetail.php?id='.$sousCategorie['id_category'].'&idCategory='.$_GET['id'].'">
                    <p class="justify center_text_grid">'.$sousCategorie['name_category'].'</p>
                        <form class="bottom_grid" method="post" action="deleteSousCategorie.php" onsubmit="return confirm(`Voulez vous vraiment supprimer cette categorie ?`);">
                            <input type="hidden" name="idCategorie" value="'.$sousCategorie['id_category'].'">
                            <button class="btn btn-danger" type="submit" name="suppCategorie">
                                <svg style="margin-top:3px;" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                    
                </a>';
        }
        $sousCategories->closeCursor();
    }else{
        while ($sousCategorie = $sousCategories->fetch())
        {
            echo '<a class="btn btn-danger block" href="sousCategorieDetail.php?id='.$sousCategorie['id_category'].'">'.$sousCategorie['name_category'].'
                </a>';
        }
        $sousCategories->closeCursor();
    }
    echo '</div>';