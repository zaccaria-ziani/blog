<?php

	$stmt = new PDO("mysql:host=localhost;dbname=blog","root","");
	
	
	if(isset($_SESSION["id"]))
	{
		header("index.php");
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
				<h1 class="center"><u>Connexion</u></h1>
				<form action="" method="post">
					
					<div class="flexr just-between input-zone">
						<label for="login">Login</label>
						<input type="text" name="login" placeholder="Alan Smithee"/>
					</div>
					
					<div class="flexr just-between input-zone">
						<label for="password">Password</label>
						<input type="password" name="password"/>
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


<?php

	if(isset($_POST["submit-btn"]))
	{	
		$usr = $stmt->query("SELECT * FROM utilisateurs WHERE login = '".$_POST["login"]."'")->fetch(PDO::FETCH_ASSOC);
		if(password_verify($_POST["password"], $usr["password"]))
		{	
			$_SESSION["id"] = $usr["id"];
			header("location:index.php");
		}
	}



?>