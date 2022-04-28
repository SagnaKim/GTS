<?php
include "header.php";
?>
    <div class="background background-accueil">
<?php
if(isset($_SESSION['username']))
{
    var_dump($_SESSION['username']);
    unset($_SESSION['username'], $_SESSION['userid'], $_SESSION['isAdmin']);
    header("Location: index.php");
}else
    $ousername = '';
if(isset($_POST['username'], $_POST['password']))
{
    $sql = GetUser($_POST['username'], $bdd);
    $password = "";
    $id = '';
    $isAdmin = '';
    while($req = $sql->fetch())
    {
        $password = $req['password_user'];
        $id = $req['id_user'];
        $isAdmin = $req['isAdmin'];
    }
    if($password == $_POST['password'] && $password != "")
    {
        $form = false;

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['userid'] = $id;
        $_SESSION['isAdmin'] = $isAdmin;
        header("Location: index.php");
    }else{
        $form = true;
        $message = "Le mot de passe ou nom d'utilisateur a était mal saisie";
    }
}else{
    $form = true;
}
if($form)
{

}
if(isset($message))
{
    echo '<div class="message_Error input_center justify">'.$message.'</div>';
}
?>

<form method="post" action="connexion.php">
    <p class="justify"><label class="justify" name="LabelNomUtilisateur">Nom d'utilisateur :</label></p>
    <input type="text" name="username" id="username" class="form-control input_center" placeholder="Utilisateur">
    <br>
    <p class="justify"><label name="LabelMotDePasse">Mot de passe:</label></p>
    <input type="password" name="password" id="password" class="form-control input_center" placeholder="Mot de passe">
    <br>
    <input type="submit" name="submit" class="btn center bouton_positif" value="Connexion">
</form>
