<!DOCTYPE html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>BLOG</title>
	  <link rel="stylesheet" href="bootsamp.css">
	  <link rel="stylesheet" href="stylesheet.css">
	</head>

	<body>

		<header> 
			<?php include 'header.php'; ?>
		</header>
		
		<main class="flexc just-center">

			<?php

				if (isset($_SESSION['id']))
				{
					$user = $stmt->query("SELECT * FROM utilisateurs WHERE id =".$_SESSION["id"])->fetch(PDO::FETCH_ASSOC);
					echo "	<form action='' method='post' class='center flexc just-between' enctype='multipart/form-data'>
								<img src='".$user["avatar"]."' id='profil-img'>
								<span class='flexr just-between profil-input-zone'>
									<label for='avatar'>Image</label>
									<input type='file' name='avatar'/>
								</span>
								
								<span class='flexr just-between profil-input-zone'>
									<label for='login'>Nom</label>
									<input type='text' name='login' value='".$user["login"]."'/>
								</span>
								
								<span class='flexr just-between profil-input-zone'>
									<label for='password'>Nouveau mdp</label>
									<input type='password' name='password'/>
								</span>
								
								<span class='flexr just-between profil-input-zone'>
									<label for='vpassword'>Verif Mdp</label>
									<input type='password' name='vpassword'/>
								</span>
								
								<span class='flexr just-between'>
									<input type='submit' name='submit-btn' value='Modifier'/>
									<input type='reset' value='Effacer' name='reset-btn'/>
								</span>
							</form>";
							
							
					if(isset($_POST["submit-btn"]))
					{
						if(isset($_POST["login"]) && $_POST["login"] != $user["login"])
						{
							if(empty($stmt->query("SELECT login FROM utilisateurs WHERE login = '".$_POST["login"]."'")->fetch()))
							{ 
								$stmt->query("UPDATE utilisateurs SET login='".$_POST["login"]."' WHERE id =".$_SESSION["id"]);
							}
						}
						
						if($_POST["password"] == $_POST["vpassword"] && $_POST["password"] != "")
						{
							$stmt->query("UDPATE utilisateurs SET password = '".password_hash($_POST["password"], PASSWORD_BCRYPT)."' WHERE id=".$_SESSION["id"]);								
						}
						
						if(isset($_FILES["avatar"]))
						{
							if("Images/avatars/".basename($_FILES["avatar"]["name"]) != $user["avatar"])
							{
								$image = $_FILES["avatar"];
								$name = $_SESSION["id"];
								$type = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
								$path = "Images/avatars/".basename($image["name"]);
								$newName = "Images/avatars/".$name.".".$type;
								
								// var_dump($path, $newName);die;
								if(file_exists($newName))
								{
									unlink($newName);
									$newName = "Images/avatars/".$name.".".$type;
								}
								
								move_uploaded_file($image["tmp_name"], $newName);					
							}
						}
						header("location:profil.php");
					}
					
				}
				else 
				{
					header("location:index.php");
				}
			?>

		</main>

		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>