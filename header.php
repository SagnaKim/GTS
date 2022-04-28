<?php
include 'connexionBDD.php';
include 'API.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stage - GTS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <header>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">GTS</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
                <?php
                    $categories = GetCategories($bdd);
                    while ($categorie = $categories->fetch())
                    {
                        echo '<li><a href="categorieDetail.php?id='.$categorie['id_category'].'&nom='.$categorie['name_category'].'"> '.$categorie['name_category'].' </a></li>';
                    }
                    $categories->closeCursor();
                    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
                    {
                      echo '
                      <li>
                        <a href="ajoutCategorie.php" id="add"> Ajout    
                          <svg width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="-1 -8 17 24">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                          </svg>
                        </a>
                      </li>';
                    }
                ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php
            if(isset($_SESSION['username']))
            {
              ?>
                <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
              <?php
            }else{
              ?>
                <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              <?php
            }
          ?>
            
          </ul>
        </div>
      </div>
    </nav>
  </header>

