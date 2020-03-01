<?php
    session_start();
	$stmt = new PDO ("mysql:host=localhost;dbname=blog","root","");
	
    if(isset($_GET["deco"]))
    {
        session_destroy();
        header("location:index.php");
    }

    if(isset($_SESSION["id"]))
    {
		$droit = $stmt->query("SELECT droits.nom FROM utilisateurs
		INNER JOIN droits ON utilisateurs.id_droits = droits.id
		WHERE utilisateurs.id = ".$_SESSION["id"])->fetch()[0];
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
        
<?php }

	if($droit == "administrateur")
	{ ?>
		<a href="admin.php" class="a-null text-black">Admin</a>
<?php   }
    ?>

	<div id="header-article" class="flexc just-center">

		<a href="articles.php" class="a-null">Articles &darr;</a>
		<div id="article-list" class="flexc just-start">
			<?php foreach ($stmt->query("SELECT * FROM categories")->fetchAll() as $categorie) { ?>
			<a href="articles.php?categorie= <?= $categorie[0] ?>" class="a-null "><?= $categorie[1] ?> </a>
			<?php } ?>
		</div>
	</div>

    


    <a href="profil.php" id="header-profil-image"><img src="Images/assets/logo.png"/></a>
</nav>