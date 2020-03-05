
<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>BLOUG</title>
	  <link rel="stylesheet" href="bootsamp.css">
	  <link rel="stylesheet" href="stylesheet.css">
	</head>

	<body>

		<header> 
			<?php include 'header.php'; ?>
		</header>


		<main class="articlebox flexc just-center">

			<?php
			
				if(isset($_POST["submit-btn"]))
				{
					if(!empty($_POST["commentaire"]))
					{
						$date = date("Y-m-d H:i:s", strtotime("+1 hour"));
						$stmt->query("INSERT INTO `commentaires`(`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) 
									  VALUES (NULL, '".addslashes($_POST["commentaire"])."', ".$_GET["id"].", ".$_SESSION["id"].", '".$date."')");
						header("Refresh:0");
					}
				}
				
				if(isset($_GET["id"]))
				{
					$article = $stmt->query("SELECT *, articles.id as article_id, utilisateurs.login FROM articles
								  INNER JOIN utilisateurs ON articles.id_utilisateurs = utilisateurs.id 
								  WHERE articles.id=".$_GET["id"])->fetch(PDO::FETCH_ASSOC);
				}
				else
				{
					header("location:articles.php");
				}
			?>
			
			<div class="articlebox-content flexc just-center center">
				<span class="flexc just-center spanbox">
					<h3 class="center"><?= $article["titre"] ?></h3>
					<i class="center"> Le <?= $article["date"] ?> </i>
					<p class="center"> Par <?= $article["login"] ?></p>
				</span>
				<p><?= $article["article"] ?> </p>				
			</div>
			
			<?php
			
				if(isset($_SESSION["id"]))
				{ ?>
					<form action="" method="post" id="article-com-form" class="flexc just-between">
						<textarea name="commentaire" cols="70" rows="10"/></textarea>
						<input type="submit" value="Envoyer" name="submit-btn">
					</form>
					
					<div class="flexc just-center center">
		<?php   }
				
				
				$commentaires = $stmt->query("SELECT *, utilisateurs.login FROM commentaires 
											  INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id
											  WHERE id_article=".$_GET["id"])->fetchAll(PDO::FETCH_ASSOC);
				foreach($commentaires as $com)
				{?>
					
					<div class="comm-content flexc">
						<span class="flexr just-between">
							<h3 class="center"><?= $com["login"] ?></h3>
							<i class="center"><?= $com["date"] ?></i>
						</span>
						
						<p><?= $com["commentaire"] ?></p>
					</div>
					
		<?php	}
			?>
			
				</div>
			
		</main>


		<footer>
		<?php  include 'footer.php'; ?>
		</footer>

	</body>
</html>