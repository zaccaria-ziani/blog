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
<?php
    include 'header.php';
    $conn = mysqli_connect("localhost","root","","blog");
    $request = "SELECT COUNT(id) FROM articles";
    $sql = mysqli_query($conn,$request);
    $row = mysqli_fetch_all($sql);
    var_dump($row);
    echo $row[0][0];
    $nbpages = $row[0][0]/5;
    $nbpages = ceil ($nbpages ) ;
    echo $nbpages;
    $ii=0;
    $limit = 5 ;
    $offset=0;
    $i =0;
    $j =0;
    $requestcat =' SELECT * FROM categories ';
    $sqlcat = mysqli_query($conn,$requestcat);
    var_dump($sqlcat);
    $vroum = mysqli_fetch_all($sqlcat);
    var_dump($vroum);
    $nbcat = count ($vroum);
    echo 'a';
    echo '<div class="selectioncategorie">';
    while ($j<$nbcat)
    {
        echo "<a class='titrecat' href='article.php?categorie=".$vroum[$j][0]."'>";
        echo "<h2>".$vroum[$j][1]."</h2></a>";
        $j=$j+1;
    }
    echo '</div>';

    //nb de pages d'articles a afficher
    $quelcategorie = $_GET['categorie'];
    var_dump($quelcategorie);
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
    if ($quelcategorie==1)
    {
        $request3 = 'SELECT * FROM articles WHERE id_categorie = 1 LIMIT '.$limit.' OFFSET '.$offset.'';
        //var_dump($request3);
        $sql3 = mysqli_query($conn,$request3);
        //var_dump($sql3);
        $articles = mysqli_fetch_all($sql3);
        //var_dump($articles);
        $a1 = count($articles);
        var_dump($a1);
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
    if ($quelcategorie==2)
    {
        $request4 = 'SELECT * FROM articles WHERE id_categorie = 2 LIMIT '.$limit.' OFFSET '.$offset.' ';
        //var_dump($request4);
        $sql4 = mysqli_query($conn,$request4);
        //var_dump($sql2);
        $articles = mysqli_fetch_all($sql4);
        //var_dump($articles);
        $a2 = count($articles);
        var_dump($articles);
        while ($i<$a2)
        {
            //var_dump($articles);
            echo '<div class="articlebox'.$i.'">';
            
            echo $articles[$i][1];
            echo '</br><a href="articles.php?id="'.$articles[$i][0].'" >voir TA MÄRE </a>';
            echo '</div>';
            $i=$i+1;
        }
    }
    
    if ($quelcategorie==3)
    {
        $request2 = 'SELECT * FROM articles WHERE id_categorie = 3 LIMIT '.$limit.' OFFSET '.$offset.'';
        //var_dump($request2);
        $sql2 = mysqli_query($conn,$request2);
        //var_dump($sql2);
        $articles = mysqli_fetch_all($sql2);
        //var_dump($articles);
        $aaa = count($articles);
        var_dump($aaa);
        while ($i<$aaa)

        {
            //var_dump($articles);
            echo '<div class="articlebox'.$i.'">';
            
            echo $articles[$i][1];
            echo '<a href="articles.php?id="'.$articles[$i][0].'" >voir TA MÄRE </a>';
            echo '</div>';
            $i=$i+1;
            var_dump($i);
        }
    }
    
    if ($quelcategorie==4)
    {
        $request2 = 'SELECT * FROM articles WHERE id_categorie = 4 LIMIT '.$limit.' OFFSET '.$offset.' ';
        //var_dump($request2);
        $sql2 = mysqli_query($conn,$request2);
        //var_dump($sql2);
        $articles = mysqli_fetch_all($sql2);
        //var_dump($articles);
        
        $aa = count($articles);
        //var_dump($aa);
        while ($i<$aa)
        {
            //var_dump($articles);
            echo '<div class="articlebox'.$i.'">';
            
            echo $articles[$i][1];
            echo '<a href="articles.php?id="'.$articles[$i][0].'" >voir TA MÄRE </a>';
            echo '</div>';
            $i=$i+1;
            var_dump($i);
        }
    }
    else
    {
        $request2 = 'SELECT * FROM articles LIMIT '.$limit.' OFFSET '.$offset.'';
        //var_dump($request2);
        $sql2 = mysqli_query($conn,$request2);
        //var_dump($sql2);
        $articles = mysqli_fetch_all($sql2);
        //var_dump($articles);
        $aa = count($articles);
        while ($i<$aa)
        {
            //var_dump($articles);
            echo '<div class="articlebox'.$i.'">';
            
            echo $articles[$i][1];
            echo '<a href="articles.php?id="'.$articles[$i][0].'" >voir TA MÄRE </a>';
            echo '</div>';
            $i=$i+1;
        }
    }
include 'footer.php';

?>
</div>