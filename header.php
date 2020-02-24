<?php
    session_start();
	
    if(isset($_GET["deco"]))
    {
        session_destroy();
        header("location:index.php");
    }

	$_SESSION["id"] = 2;

    if(isset($_SESSION["id"]))
    {
        $stmt = new PDO ("mysql:host=localhost;dbname=blog","root","");
        $droit = $stmt->query("SELECT nom FROM droits  WHERE droits.id = ".$_SESSION["id"])->fetch()[0];
    }
    else{
        $droit = "";
    }
?>


<nav class="flexr just-between ">
    <a href="index.php" class="a-null ">Accueil</a>
    
    <?php
    if(isset($_SESSION["id"]))
    { ?>
        <a href="index.php?deco=true" class="a-null">Déconnexion</a>
        <a href="profil.php" class="a-null">Profil</a>
<?php }
    else
    { ?>
        <a href="connexion.php" class="a-null">Connexion</a>
        <a href="inscription.php" class="a-null">Inscription</a>
        <?php }

    if($droit == "moderateur")
    { ?>
        <a href="creer-article" class="a-null">Creation Articles</a>
        
<?php    }
        if($droit == "administrateur")
        { ?>
            <a href="admin.php" class="a-null text-black">Admin</a>
<?php   }
    ?>

	<div id="header-article" class="flexc just-center">
		<a href="articles.php" class="a-null">Articles &darr;</a>

		<div id="article-list" class="flexc just-start">
			<a href="articles.php?categorie=1" class="a-null ">FPS</a>
			<a href="articles.php?categorie=2" class="a-null ">RPG</a>
			<a href="articles.php?categorie=3" class="a-null ">Meuporg</a>
			<a href="articles.php?categorie=4" class="a-null ">Plateformers</a>
		</div>

	</div>

    


    <a href="profil.php" id="header-profil-image"><img src="Images/avatars/<?php //$avatar?>"/></a>
</nav>