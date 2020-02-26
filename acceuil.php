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
<?php
//header
include 'header.php';
?>
</header>
<?php
//integration des 3 derniers articles redigés

$request1 = 'SELECT * FROM articles WHERE id = 1';
$request2 = 'SELECT * FROM articles WHERE id = 2';
$request3 = 'SELECT * FROM articles WHERE id = 5';
$vroum =    'SELECT * FROM articles ORDER BY date LIMIT 3';
$conn = mysqli_connect("localhost","root","","blog");
$sql = mysqli_query($conn,$request1);
$sql2 = mysqli_query($conn,$request2);
$sql3 = mysqli_query($conn,$vroum);
$i=0;

echo "<div class='boxarticleacceuil'>";
//affichage article 1
$articles = mysqli_fetch_all($sql3);

while ($i<3){
  
echo "<div class='article".$i."'>";
echo "<h2>titre :";

echo $articles[$i][1];
echo "</h2></br>";
echo "<a href='articles.php?id=".$i."'>lire l'article</a></div>";
$i =$i+1;
}


?>
<footer>
<?php
//footer
include 'footer.php';
?>
</footer>
</body>
</html>