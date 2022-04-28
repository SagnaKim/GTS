<?php
include "header.php";
if(isset($_POST['idSection']))
{
    $sql = DeleteSection($_POST['idSection'], $bdd);
    if($sql)
    {
        echo '<p>Section supprimé</p>';
        header("Location: index.php");
    }else{
        echo '<p>Section ne peut être supprimé</p>';
    }
}
?>
<h2>Page de suppression de Section</h2>