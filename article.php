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
<?php
    $conn = mysqli_connect("localhost","root","","blog");
    $request = "SELECT COUNT(id) FROM articles";
    $sql = mysqli_query($conn,$request);
    $row = mysqli_fetch_all($sql);
    // var_dump($row);
    // echo $row[0][0];
    $nbpages = $row[0][0]/5;
    $nbpages = ceil ($nbpages ) ;
    // echo $nbpages;
    $ii=0;
    $limit = 5 ;
    $offset=0;
    $i =0;
    $j =0;
    $requestcat =' SELECT * FROM categories ';
    $sqlcat = mysqli_query($conn,$requestcat);
    // var_dump($sqlcat);
    $vroum = mysqli_fetch_all($sqlcat);
    // var_dump($vroum);
    $nbcat = count ($vroum);
    
    echo '<div class="selectioncategorie">';
    while ($j<$nbcat)
    {
        echo "<a class='titrecat' href='article.php?categorie=".$vroum[$j][0]."'>";
        echo "<h2>".$vroum[$j][1]."</h2></a>";
        $j=$j+1;
    }
    echo '</div>';

    //nb de pages d'articles a afficher
    
    while ($ii<$nbpages)
    {
        echo '<a href="article.php?start='.$ii.'"> '.$ii.'</a>';
        $ii = $ii+1;
    }
    if(isset($_GET['start']))
    {
        echo $_GET['start'];
        $numeropage = $_GET['start'];
        if ($numeropage>=1)
        $offset = $offset+5*$numeropage;  
    }
    //affichage des articles
    ?>
    <div class="articlebox">
    <?php
	
	if(isset($_GET["categorie"]))
	{
		$request = "SELECT * FROM articles WHERE id_categorie = ".$_GET["categorie"]." LIMIT ".$limit." OFFSET ".$offset;
		$articles = mysqli_fetch_all(mysqli_query($conn, $request));
		
		$a1 = count($articles);
        // var_dump($a1);
        while ($i<$a1)
        {
            //var_dump($articles);
            echo '<div class="articlebox'.$i.'">';
            
            echo $articles[$i][1];
            echo '</br><a href="articles.php?id="'.$articles[$i][0].'" >voir TA MÄRE </a>';
            echo '</div>';
            $i=$i+1;
        }
	}
	else
	{
		$request = "SELECT * FROM articles LIMIT ".$limit." OFFSET ".$offset;
		$articles = mysqli_fetch_all(mysqli_query($conn, $request));
		
		$a1 = count($articles);
        // var_dump($a1);
        while ($i<$a1)
        {
            //var_dump($articles);
            echo '<div class="articlebox'.$i.'">';
            
            echo $articles[$i][1];
            echo '</br><a href="articles.php?id="'.$articles[$i][0].'" >voir TA MÄRE </a>';
            echo '</div>';
            $i=$i+1;
        }
	}

?>
<footer>
<?php	include 'footer.php'; ?>
</footer>
</div>