<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>BLOUG</title>
	  <link rel="stylesheet" href="bootsamp.css">
	  <link rel="stylesheet" href="stylesheet.css">
	  <script src="script.js"></script>
	</head>

	<body>

		<header> 
			<?php include 'header.php'; ?>
		</header>


		<main class="articlebox ">

		<?php
			$articles = $stmt->query("SELECT *, utilisateurs.login ,articles.id as article_id FROM articles
									  INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id
									  WHERE date < NOW() 
									  ORDER BY date 
									  LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
			foreach($articles as $article)
			{ ?>
				
				<div class="articlebox-content flexc just-center center">
					<span class="flexr just-center">
						<h3><?= $article["titre"] ?></h3>
						<i class="center"> Le <?= $article["date"] ?></i>
					</span>
					<p class="center">Par <?= $article["login"] ?> </p>
					
					<p>
						<?= $article["article"] ?>
					</p>
					
					<a href="article.php?id=<?= $article["article_id"] ?>" class="center">Voir l'article</a>
				</div>
				
	<?php   }
		?>
			
			<div id="categorie-index" class="flexc just-center text-center center">
				<?php
					$cats = $stmt->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
					foreach($cats as $categorie)
					{ ?>
						<a href="articles.php?categorie=<?= $categorie["id"] ?>" class="a-null"><?= $categorie["nom"] ?></a>
			<?php	}
				?>
			</div>
		</main>


		<footer>
		<?php  include 'footer.php'; ?>
		</footer>

	</body>
</html>