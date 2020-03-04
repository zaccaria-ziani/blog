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
	
	<main class="flex just-center">
	<?php
		$conn = mysqli_connect("localhost","root","","blog");
		$request = "SELECT COUNT(id) FROM articles";
		$sql = mysqli_query($conn,$request);
		$row = mysqli_fetch_all($sql);
		
		$nbpages = $row[0][0]/5;
		$nbpages = round($nbpages ) ;
		
		$ii=0;
		$limit = 5;
		$offset=0;
		$i =0;
		$j =0;
		$requestcat =' SELECT * FROM categories ';
		$sqlcat = mysqli_query($conn,$requestcat);
		
		$vroum = mysqli_fetch_all($sqlcat);
		
		$nbcat = count ($vroum);
		
		echo '<div class="flexr just-between center">';
		while ($j<$nbcat)
		{
			echo "<a class='titrecat' href='articles.php?categorie=".$vroum[$j][0]."'>";
			echo "<h2>".$vroum[$j][1]."</h2></a>";
			$j=$j+1;
		}
		echo '</div>';

		//nb de pages d'articles a afficher
		
		echo '<div class="flexr just-center center" id="pagination">';
		while ($ii<$nbpages)
		{
			if($ii == $_GET["start"])
			{
				echo "<p>".$ii."</p>";
			}
			else
			{
				echo '<a href="articles.php?start='.$ii.'"> '.$ii.'</a>';				
			}
			$ii = $ii+1;
		}
		if(isset($_GET['start']))
		{
			$numeropage = $_GET['start'];
			if ($numeropage>=1)
			$offset = $offset+5*$numeropage;  
		}
		$ii = 0;
		echo '</div>';
		//affichage des articles
		
		echo '<div class="articlebox" id="article-main">';
		
		if(isset($_GET["categorie"]))
		{
			$request = "SELECT *, utilisateurs.login FROM articles INNER JOIN utilisateurs ON articles.id_utilisateurs = utilisateurs.id WHERE id_categorie = ".$_GET["categorie"]." AND date < NOW()  ORDER BY date DESC LIMIT ".$limit." OFFSET ".$offset;
			$articles = mysqli_fetch_all(mysqli_query($conn, $request));
			$a1 = count($articles);
			
			while ($i<$a1)
			{
				
				echo '<div class="articlebox-content"> <span class="flexr just-center">';
				echo '<h3>'.$articles[$i][5].'</h3><i class="center">- Le '.$articles[$i][4].'</i></span>';
				echo '<p class="center"><u>Par '.$articles[$i][12].'</u></p>';
				echo '<p>'.$articles[$i][1].'</p>';
				echo '<a href="article.php?id="'.$articles[$i][0].'" >Voir l\'article</a>';
				echo '</div>';
				$i=$i+1;
			}
		}
		else
		{
			$request = "SELECT *, utilisateurs.login FROM articles INNER JOIN utilisateurs ON articles.id_utilisateurs = utilisateurs.id WHERE date < NOW() ORDER BY date DESC LIMIT ".$limit." OFFSET ".$offset;
			$articles = mysqli_fetch_all(mysqli_query($conn, $request));
			
			$a1 = count($articles);
			
			while ($i<$a1)
			{
				
				echo '<div class="articlebox-content"><span class="flexr just-center">';
				echo '<h3>'.$articles[$i][5].'</h3><i class="center">- Le '.$articles[$i][4].'</i></span>';
				echo '<p class="center"><u>Par '.$articles[$i][12].'</u></p>';
				
				echo "<p>".$articles[$i][1]."</p>";
				echo '<a href="article.php?id="'.$articles[$i][0].'" >Voir l\'article</a>';
				echo '</div>';
				$i=$i+1;
			}
		}
		echo "</div>";
		
		echo '<div class="flexr just-center center" id="pagination">';
		while ($ii<$nbpages)
		{
			if($ii == $_GET["start"])
			{
				echo "<p>".$ii."</p>";
			}
			else
			{
				echo '<a href="articles.php?start='.$ii.'"> '.$ii.'</a>';				
			}
			$ii = $ii+1;
		}
		if(isset($_GET['start']))
		{
			$numeropage = $_GET['start'];
			if ($numeropage>=1)
			$offset = $offset+5*$numeropage;  
		}
		echo '</div>';
	?>
	</main>
	
	<footer>
	<?php	include 'footer.php'; ?>
	</footer>