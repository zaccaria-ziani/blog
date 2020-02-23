<?php

	$stmt = new PDO("mysql:host=localhost;dbname=blog","root","");
	$user = $stmt->query("SELECT * , utilisateurs.id as id, nom as droit FROM utilisateurs
					INNER JOIN droits ON utilisateurs.id_droits = droits.id
					LIMIT 20")->fetchAll(PDO::FETCH_ASSOC);
					
	if(isset($_GET["usr"]))
	{
		$infos=$stmt->query("SELECT * FROM utilisateurs WHERE id =".$_GET["usr"])->fetch(PDO::FETCH_ASSOC);
		if(isset($_POST[$infos["id"]]))
		{
			if($_POST["usr-login"] != $infos["login"])
			{
				$query = $stmt->query("UPDATE utilisateurs SET login = '".$_POST["usr-login"]."' WHERE id =".$_GET["usr"]);
			}
			if ($_POST["admin-usr-droit"] == "disabled")
			{
				$_POST["admin-usr-droit"] = $infos["id_droits"];
			}
			if($_POST["admin-usr-droit"] != $infos["id_droits"])
			{
				$stmt->query("UPDATE utilisateurs SET id_droits = '".$_POST["admin-usr-droit"]."' WHERE id =".$_GET["usr"]);							
			}
			header("location:admin.php");
		}		
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
			
				<form action="" methos="post" id="article-form" class="flexc just-start admin-form">
					<h1>Création/Modification article</h1>

					<div class="flexr just-between">
						
						<div class="flexc just-start">
						
							<div class="flexr just-between input-zone">
								<label for="categorie">Catégorie: </label>
								<select name="article-crea-categorie">
									<option value="0" disabled selected>Sélectionnez une catégorie</option>
									<option value="1">FPS</option>
									<option value="2">RPG</option>
									<option value="3">MMORPG</option>
									<option value="4">Platformer</option>
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
						<input type="submit" value="Preview" name="article-crea-submit" id="article-crea-submit"/>
						<input type="reset" value="Effacer" id="article-crea-effacer"/>
					</div>
				</form>
			
			</article>
			
			<article class="flexc just-start" >
				<h1 id="admin-utilisateurs-title" class="center">Utilisateurs</h1>
				<div id="admin-user-zone">
				<?php foreach($user as $infos) {
						if(isset($_GET["usr"]) && $_GET["usr"] == $infos["id"]) {?>
						
							<form method="post" class="usr-id-edit flexr just-between center">
								<div class="flexr just-start">
									<img src="<?= $infos["avatar"]?>" class="admin-usr-image center"/>
									
									<div class="flexc just-between usr-name-log-edit">
									
										<input type="text" name="usr-login" class="admin-usr-name" value="<?= $infos["login"]?>"/>
										
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
			</article>
		</main>		
		
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>

</html>