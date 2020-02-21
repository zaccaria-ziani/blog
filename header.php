<?php
    session_start();
    if(isset($_GET["deco"]))
    {
        session_destroy();
        header("location:index.php");
    }

    if(isset($_SESSION["id"]))
    {
        $stmt = new PDO ("mysql:host=localhost;dbname=blog","root","");
        $droit = $stmt->query("SELECT nom FROM droits  WHERE droits.id = ".$_SESSION["id"])->fetch()[0];
    }
    else{
        $droit = "";
    }
?>


<nav class="flexr just-between">
    <a href="index.php" class="a-null text-black">Accueil</a>
    <a href="articles.php" class="a-null text-black">Articles</a>
    <?php
    if(isset($_SESSION["id"]))
    { ?>
        <a href="index.php?deco=true">Déconnexion</a>
        <a href="profil.php">Profil</a>
<?php }
    if($droit == "moderateur" || $droit == "administrateur")
    { ?>
        <a href="creer-article" class="a-null text-black">Creation Articles</a>
<?php   
        if($droit == "administrateur")
        { ?>
            <a href="admin.php" class="a-null text-black">Admin</a>
<?php   }
    }
?>


</nav>