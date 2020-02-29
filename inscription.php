<?php
	$stmt = new PDO("mysql:host=localhost;dbname=blog","root","");
	
	
	if(isset($_SESSION["id"]))
	{
		header("index.php");
	}
	
	if(isset($_POST["submit-btn"]))
	{	
		if($_POST["password"] == $_POST["password-verify"])
		{
			if(empty($stmt->query("SELECT * FROM utilisateurs WHERE login = '".$_POST["login"]."'")->fetch()))
			{
				$type = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
				if($type == "jpg" || $type == "gif" || $type == "png" || $type == "bmp" || $type == "jpeg")
				{
					$size = $_FILES["avatar"]["size"];
					if ($size < 50000)
					{
						$new_name = ($stmt->query("SELECT id FROM utilisateurs ORDER BY id DESC")->fetch()[0]+1).".".$type;
						foreach(scandir("Images/avatars/") as $file)
						{
							if($new_name[0] == $file[0])
							{
								$path = "Images/avatars/".$file; 
								unset($path);
								break;
							}
						}
						
						move_uploaded_file($_FILES["avatar"]["tmp_name"],"Images/avatars/".$new_name);
					}
				}
				
				$stmt->query("INSERT INTO `utilisateurs`(`id`, `login`, `password`, `email`, `id_droits`, `avatar`)
				VALUES (NULL, '".$_POST["login"]."', '".password_hash($_POST["password"], PASSWORD_BCRYPT)."', '".$_POST["mail"]."', 1 ,'Images/avatars/".$new_name."')");
				header("location:connexion.php");
			}			
		}
	}

?>


<html>

	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
		<link rel="stylesheet" type="text/css" href="bootsamp.css"/>
	</head>

	<body>
		<header>
			<?php include("header.php"); ?>
		</header>
			
		<main class="flexc">
			<div class="flexc just-center center" id="conn-div">
				<h1 class="center"><u>Inscription</u></h1>
				<form action="" method="post" enctype="multipart/form-data">
					
					<div class="flexr just-between input-zone">
						<label for="avatar">Image de profil </label>
						<input type="file" name="avatar"/>
					</div>
					
					<div class="flexr just-between input-zone">
						<label for="login">Login</label>
						<input type="text" name="login" placeholder="Alan Smithee"/>
					</div>
					
					<div class="flexr just-between input-zone">
						<label for="mail">Email</label>
						<input type="mail" name="mail" placeholder="Alan-Smithee@media.com"/>
					</div>
					
					<div class="flexr just-between input-zone">
						<label for="password">Password</label>
						<input type="password" name="password"/>
					</div>
					
					<div class="flexr just-between input-zone">
						<label for="password-verify">Vérification password</label>
						<input type="password" name="password-verify"/>
					</div>
					
					<div class="flexr just-center input-zone">
						<input type="submit" name="submit-btn" value="S'inscrire" class="center" id="conn-div-submit"/>
					</div>
				</form>
			</div>
		</main>		
		
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>

</html>