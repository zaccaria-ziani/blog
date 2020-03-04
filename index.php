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

<?php
//header
//integration des 3 derniers articles redigés derniers derniers derniers derniers derniers derniers 

$request1 = 'SELECT * FROM articles WHERE id = 1';
$request2 = 'SELECT * FROM articles WHERE id = 2';
$request3 = 'SELECT * FROM articles WHERE id = 5';

$conn = mysqli_connect("localhost","root","","blog");
$sql = mysqli_query($conn,$request1);
$sql2 = mysqli_query($conn,$request2);
$sql3 = mysqli_query($conn,$request3);

echo "<div class='boxarticleacceuil'>";
//affichage article 1
$articles = mysqli_fetch_all($sql);
//var_dump($articles);
echo "<div class='article1'>";
echo "<h2>titre :";
echo $articles[0][1];
echo "</h2></br>";
echo "<a href='articles.php?id=1'>lire l'article</a></div>";
//affichage article 2
$articles = mysqli_fetch_all($sql2);
//var_dump($articles);
echo "<div class='article2'>";
echo "<h2>titre :";
echo $articles[0][1];
echo "</h2></br>";
echo "<a href='articles.php?id=2'>lire l'article</a></div>";
//affichage article 3
$articles = mysqli_fetch_all($sql3);
//var_dump($articles);
echo "<div class='article3'>";
echo "<h2>titre :";
echo $articles[0][1];
echo "</h2></br>";
echo "<a href='articles.php?id=5'>lire l'article</a></div>";
echo "</div>";

//footer
?>
<footer>
<?php  include 'footer.php'; ?>
</footer>
</body>
</html>