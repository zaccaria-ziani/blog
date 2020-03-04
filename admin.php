<?php

	$stmt = new PDO("mysql:host=localhost;dbname=blog","root","");
	$user = $stmt->query("SELECT * , utilisateurs.id as id, nom as droit FROM utilisateurs
					INNER JOIN droits ON utilisateurs.id_droits = droits.id
					LIMIT 20")->fetchAll(PDO::FETCH_ASSOC);
					
	if(isset($_GET["delete"]))
	{
		$stmt->query("DELETE FROM `utilisateurs` WHERE `utilisateurs`.`id` = ".$_GET["delete"]);
		header("location:admin.php");
	}
	
	if(isset($_GET["usr"]))
	{
		$infos=$stmt->query("SELECT * FROM utilisateurs WHERE id =".$_GET["usr"])->fetch(PDO::FETCH_ASSOC);
		if(isset($_POST[$infos["id"]]))
		{
			if($_POST["usr-login"] != $infos["login"])
			{
				if(empty($stmt->query("SELECT * FROM utilisateurs WHERE login = '".$_POST["usr-login"]."'")->fetch()))
				{
					$query = $stmt->query("UPDATE utilisateurs SET login = '".$_POST["usr-login"]."' WHERE id =".$_GET["usr"]);					
				}
				else
				{
					header("location:admin.php?error=ldp");
				}
			}
			if ($_POST["admin-usr-droit"] == "disabled")
			{
				$_POST["admin-usr-droit"] = $infos["id_droits"];
			}
			if($_POST["admin-usr-droit"] != $infos["id_droits"])
			{
				$stmt->query("UPDATE utilisateurs SET id_droits = '".$_POST["admin-usr-droit"]."' WHERE id =".$_GET["usr"]);							
			}
			if($_POST["usr-mail"] != $infos["email"])
			{
				$stmt->query("UPDATE utilisateurs SET email= '".$_POST["usr-mail"]."' WHERE id =".$_GET["usr"]);							
			}
			header("location:admin.php");
		}		
	}	
	
	if(isset($_GET["article-delete"]))
	{
		$stmt->query("DELETE FROM articles WHERE articles.id = ".$_GET["article-delete"]);
		header("location:admin.php");
	}
	
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
		<link rel="stylesheet" type="text/css" href="bootsamp.css"/>
		<title>Blog</title>
	</head>

	<body>
		<header>
			<?php include("header.php"); ?>
		</header>
			
		<main class="flexr just-evenly center">
			
			<article>
			<?php
				if (isset($_POST["categorie-delete"]))
				{
					$stmt->query("DELETE FROM categories WHERE id =".$_POST["categorie"]);
					header("location:admin.php");
				}
				if(isset($_POST["categorie-change"]))
				{
					$redirect = "location:admin.php?categorie-change=".$_POST["categorie"];
					header($redirect);
				}
				if(isset($_POST["save-change"]))
				{
					$newName = $_POST["change-categorie"];
					$oldName = $stmt->query("SELECT nom FROM categories WHERE id =".$_GET["categorie-change"])->fetch()[0];
					if($newName != $oldName)
					{
						$stmt->query('UPDATE categories SET nom = "'.$newName.'" WHERE id = '.$_GET["categorie-change"]);
						// $stmt->query('INSERT INTO categories(id,nom) VALUES(NULL, "'.$newName.'" )');
						header("location:admin.php");
					}
					else
					{
						// Put error here
					}
				}
				
				if(isset($_POST["categorie-ajouter"]))
				{
					$newName = $_POST["add-categorie"];
					$oldName = $stmt->query("SELECT * FROM categories WHERE nom = '".$_POST["add-categorie"]."'")->fetchAll();
					if(empty($oldName))
					{
						$stmt->query('INSERT INTO categories(id,nom) VALUES(NULL, "'.$newName.'" )');
						header("location:admin.php");
					}
					else
					{
						// Put error here
					}
				}
				
				
				if(isset($_POST["article-crea-submit"]))
				{
					$titre = $_POST["titre"];
					$date = $_POST["article-crea-date-parution"];
					$categorie = $_POST["article-crea-categorie"];
					
					
					if($date == "aujourdhui")
					{
						$date = date("Y-m-d H:i:s", strtotime("+1 hour"));
					}
					else
					{
						$date = $_POST["article-crea-date-choisir-parution"];
					}
					
					$text = htmlspecialchars($_POST["article-crea-text"]);
					
					$usr = $_SESSION["id"];
					
					if(isset($_GET["article-edit"]))
					{
						$stmt->query("UPDATE articles SET article = '".$text."', id_utilisateurs = $usr ,id_categorie = $categorie, date = '$date', titre= '$titre' WHERE id = '".$_GET['article-edit']."'");
					}
					else
					{
						$stmt->query('INSERT INTO `articles`(`id`, `article`, `id_utilisateurs`, `id_categorie`, `date`, `titre`) 
									VALUES (NULL, "'.$text.'", "'.$usr.'", "'.$categorie.'", "'.$date.'", "'.$titre.'")');
					}
					header("location:admin.php");
				}
				
				if(isset($_GET["article-edit"]))
				{
					$article = $stmt->query("SELECT * , DATE_FORMAT(date,'%Y-%m-%dT%H:%i') 
					as date_publication FROM articles WHERE id =".$_GET["article-edit"])->fetch(PDO::FETCH_ASSOC); 
					?>
							
					<form action="" method="POST" id="article-form" class="flexc just-start admin-form">
						<h1>Création/Modification article</h1>

						<div class="flexr just-between">
							
							<div class="flexc just-start">
							
								<div class="flexr just-between input-zone">
									<label for="categorie">Catégorie: </label>
									<select name="article-crea-categorie">
										<option value="disabled" disabled>Sélectionnez une catégorie</option>
										
										<?php foreach($stmt->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC) as $categorie=>$infos) { 
											
											if($infos["id"] == $article["id_categorie"]) { ?>
												<option value="<?= $infos["id"] ?>" selected><?= $infos["nom"] ?></option>
										<?php }
											else { ?>
												<option value="<?= $infos["id"] ?>"><?= $infos["nom"] ?></option>
										<?php } }?>
									
									</select>
								</div>
								
							
								<div class="flexr just-between input-zone">
									<label for="titre">Titre: </label>
									<input type="text" name="titre" placeholder="Titre Article" value="<?= $article["titre"] ?>"/>
								</div>	
							
							</div>
							
							<div class="flexc just-start input-zone" id="article-crea-date">
								<label for="article-crea-date">Date parution: </label>
								<span class="flexr just-start">
									<div class="flexc just-center">
										<label for="article-crea-date-aujourdhui">Aujourd'hui</label>
										<input type="radio" name="article-crea-date-parution" class="center" value="aujourdhui" id="article-crea-date-aujourdhui" required/>
									</div>

									<div class="flexc just-center">
										<label for="article-crea-date-choisir">Choisir</label>
										<input type="radio" name="article-crea-date-parution" class="center" id="article-crea-date-choisir" checked/>
										<input type="datetime-local" value="<?= $article["date_publication"] ?>" name="article-crea-date-choisir-parution" id="article-crea-date-choisir-parution"/></input>
									</div>
								</span>
							</div>
						
						</div>

						<div class="flexc just-start input-zone">
							<label for="article-crea-text">Description: </label>
							<textarea name="article-crea-text" rows="13" id="article-crea-text-area" required><?= $article["article"] ?></textarea>
						</div>
						
						<div class="flexr just-between input-zone center" id="article-crea-sub">
							<input type="submit" value="Modifier" name="article-crea-submit" id="article-crea-submit"/>
							<a href="admin.php" id="article-crea-effacer"> <input type="Button" value="Retour" /></a>
						</div>
					</form>
					
					
			<?php 
				}
			else{ 	?>
				<form action="" method="post" id="article-form" class="flexc just-start admin-form">
					<h1>Création/Modification article</h1>

					<div class="flexr just-between">
						
						<div class="flexc just-start">
						
							<div class="flexr just-between input-zone">
								<label for="categorie">Catégorie: </label>
								<select name="article-crea-categorie">
									<option value="disabled" disabled selected>Sélectionnez une catégorie</option>
									<?php foreach($stmt->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC) as $categorie=>$infos) { ?>
										<option value="<?= $infos["id"] ?>"><?= $infos["nom"] ?></option>
									<?php } ?>
								</select>
							</div>
							
						
							<div class="flexr just-between input-zone">
								<label for="titre">Titre: </label>
								<input type="text" name="titre" placeholder="Titre Article"/>
							</div>	
						
						</div>
						
						<div class="flexc just-start input-zone" id="article-crea-date">
							<label for="article-crea-date">Date parution: </label>
							<span class="flexr just-start">
								<div class="flexc just-center">
									<label for="article-crea-date-aujourdhui">Aujourd'hui</label>
									<input type="radio" name="article-crea-date-parution" class="center" value="aujourdhui" id="article-crea-date-aujourdhui"checked/>
								</div>

								<div class="flexc just-center">
									<label for="article-crea-date-choisir">Choisir</label>
									<input type="radio" name="article-crea-date-parution" class="center" id="article-crea-date-choisir"/>
									<input type="datetime-local" name="article-crea-date-choisir-parution" id="article-crea-date-choisir-parution"/></input>
								</div>
							</span>
						</div>
					
					</div>

					<div class="flexc just-start input-zone">
						<label for="article-crea-text">Description: </label>
						<textarea name="article-crea-text" rows="13" id="article-crea-text-area"></textarea>
					</div>
					
					<div class="flexr just-between input-zone center" id="article-crea-sub">
						<input type="submit" value="Sauvegarder" name="article-crea-submit" id="article-crea-submit"/>
						<input type="Reset" value="Effacer" id="article-crea-effacer"/>
					</div>
				</form>
			<?php } ?>
			
				<form action="" method="post" class="flexc just-center categorie-form" >
					<h1>Catégorie maker</h1>
					<div class="flexr just-between input-zone">
						<label for="newCategorie" class="center">Nouvelle categorie</label>
					<?php if(isset($_GET["categorie-change"]))
						{ ?>
							<input name="change-categorie" type="text" value = "<?= $stmt->query("SELECT nom FROM `categories` WHERE id =".$_GET["categorie-change"])->fetch()[0] ?>"/>
							<input type="submit" name="save-change" value="Modifier" class="categorie-btn"/>
							
					<?php } 
						else
						{ ?>
							<input name="add-categorie" type="text"/>
							<input type="submit" name="categorie-ajouter" class="categorie-btn" value="Ajouter"/>
							
					<?php } ?>
					</div>
				</form>
				
				<form action="" method="post" class="flexc just-center categorie-form">
					<div class="flexr just-between">
						<label for="categorie" class="center">Categorie:</label>
						
						<select name="categorie">
							<option selected disabled>Choisir categorie</option>
							<?php foreach(($stmt->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC)) as $categorie)
									{ 
										if(isset($_GET["categorie-change"]))
										{ ?>
											<option class="text-black" value="<?= $categorie["id"] ?>" <?php echo $select = ($_GET["categorie-change"] == $categorie["id"]) ? "selected" : ""; ?>>
												<?= $categorie["nom"] ?>
											</option>
								<?php 	}
										else
										{ ?>
											<option class="text-black" value="<?= $categorie["id"] ?>">
												<?= $categorie["nom"] ?>
											</option>
											
								<?php 	}
									} ?>
						</select>
						<input type="submit" name="categorie-change" class="categorie-btn" value="Changer"/>
						<button value="Supprimer" class="categorie-btn" name="categorie-delete"/>Supprimer</b>
					</div>
				</form>
			
			
			</article>
			
			<article class="flexr just-between" >
				<div>
					<h1 id="admin-utilisateurs-title" class="center">Utilisateurs</h1>
					<div id="admin-user-zone">
					
					<?php foreach($user as $infos) {
							if(isset($_GET["usr"]) && $_GET["usr"] == $infos["id"]) {?>
							
								<form method="post" class="usr-id-edit flexr just-between center">
									<div class="flexr just-start">
										<img src="<?= $infos["avatar"]?>" class="admin-usr-image center"/>
										
										<div class="flexc just-between usr-name-log-edit">
										
											<input type="text" name="usr-login"  value="<?= $infos["login"]?>"/>
											<input type="text" name="usr-mail" class="usr-edit-mail" value="<?= $infos["email"] ?>"/>
											<select name="admin-usr-droit" class="admin-usr-droit">
												<option value="disabled" selected>Droits</option>
												<?php foreach(($stmt->query("SELECT * FROM droits")->fetchAll(PDO::FETCH_ASSOC)) as $droits)
												{ ?>
													<option class="text-black" value="<?= $droits["id"] ?>"><?= $droits["nom"] ?></option>
										<?php	} ?>
											</select>
										</div>
									</div>
									
									<span class="flexr just-evenly admin-usr-edit-zone">
										
										<input type="submit" value="" name="<?= $infos["id"] ?>"/>

										<a href="admin.php?delete=<?= $infos["id"] ?>">
											<img src="Images/assets/delete.png" class="admin-usr-delete-img"/>
										</a>
									</span>
								</form>	
							
					<?php }
						else { ?>
						<span class="usr-id flexr just-between center">
							<div class="flexr just-start">
								<img src="<?= $infos["avatar"]?>" class="admin-usr-image center"/>
								<div class="flexc just-center">
									<p class="admin-usr-name"><?= $infos["login"] ?></p>
									<i class="admin-usr-droit"><?= $infos["droit"] ?></i>
								</div>
							</div>
							
							<span class="flexr just-evenly admin-usr-edit-zone">
								<a href="admin.php?usr=<?= $infos["id"] ?>">
									<img src="Images/assets/edit.png" class="admin-usr-edit-img"/>
								</a>

								<a href="admin.php?delete=<?= $infos["id"] ?>">
									<img src="Images/assets/delete.png" class="admin-usr-delete-img"/>
								</a>
							</span>
						</span>
					<?php }
					}?>
					</div>
				</div>
				<div class="flexc just-start">
					<h1 id="admin-utilisateurs-title" class="center">Articles</h1>
					<div id="admin-article-zone" class="wrap">
						<?php foreach($stmt->query("SELECT *, articles.id as article_id FROM articles INNER JOIN utilisateurs ON id_utilisateurs= utilisateurs.id ORDER BY date DESC")->fetchAll(PDO::FETCH_ASSOC) as $article) {  ?>
							<div class="flexr just-between admin-article-manage">
								<div class="flexc just-center">
									<span class="flexr just-start">
										<p class="article-title"><?= $article["titre"] ?></p>
										<p class="article-date">- <?= $article["date"] ?></p>
									</span>
									<span class="flexr just-between article-infos-zone">
										<u class="article-createur"><i><?= $article["login"] ?></i></u>
										<a href="article.php?id=<?= $article["article_id"] ?>" class="a-null text-black">Voir</a>
									</span>
								</div>
								
								<div class="flexr just-center admin-usr-edit-zone">
									<a href="admin.php?article-edit=<?= $article["article_id"] ?>">
										<img src="Images/assets/edit.png" class="admin-usr-edit-img"/>
									</a>
									
									<a href="admin.php?article-delete=<?= $article["article_id"] ?>">
										<img src="Images/assets/delete.png" class="admin-usr-delete-img"/>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</article>
		
		
		</main>		
		
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>

</html>