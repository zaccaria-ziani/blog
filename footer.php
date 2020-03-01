<nav class="flexr just-between">

	<div class="flexc ">
		<h1 class="center">Profil</h1>
		<a href="index.php" class="a-null text-black center">Accueil</a>
		<a href="profil.php" class="a-null text-black center">Profil</a>
		<a href="index.php?deco=true" class="a-null text-black center">Deconnecter</a>
	</div>

	<div class="flexc" id="crea-article">
		<h1 class="center">Article</h1>
		<div class="flexc">

			
	<?php foreach ($stmt->query("SELECT * FROM categories")->fetchAll() as $categorie) { ?>
			<a href="articles.php?categorie= <?= $categorie[0] ?>" class="a-null text-black center"><?= $categorie[1] ?> </a>
			<?php } ?>
		</div>
	</div>
	
	<?php if($droit == "moderateur"){ ?>
			<h1 class="center">Creation article</h1>
			<div class="flexc ">
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