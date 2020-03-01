<nav class="flexr just-between">

	<div class="flexc ">
		<h1 class="center">Profil</h1>
		<a href="index.php" class="a-null text-black center">Accueil</a>
		<a href="profil.php" class="a-null text-black center">Profil</a>
		<a href="index.php?deco=true" class="a-null text-black center">Deconnecter</a>
	</div>

	<div class="flexc ">
		<h1 class="center">Article</h1>

		<a href="articles.php?categorie=1" class="a-null text-black center">Plateformer</a> 
		<a href="articles.php?categorie=2" class="a-null text-black center">FPS</a> 
		<a href="articles.php?categorie=3" class="a-null text-black center">RPG</a> 
		<a href="articles.php?categorie=4" class="a-null text-black center">Meuporg</a>
	</div>
	
	<?php if($droit == "moderateur"){ ?>
		<div class="flexc ">
			<h1 class="center">Creation article</h1>
			<a href="creation-article.php" class="a-null text-black center">Creation article</a>
		</div>
	<?php }
		if($droit == "administrateur") { ?>
			<div class="flexc">
				<h1 class="center">Admin zone</h1>
				<a href="admin.php" class="a-null text-black center">Admin</a>
				<a href="creation-article.php" class="a-null text-black center">Creation article</a>
			</div>
	<?php } ?>

</nav>