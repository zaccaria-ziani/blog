<?php

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

    $request2 = 'SELECT * FROM articles LIMIT '.$limit.' OFFSET '.$offset.'';
    var_dump($request2);
    $sql2 = mysqli_query($conn,$request2);
    var_dump($sql2);
    $articles = mysqli_fetch_all($sql2);
    var_dump($articles);

    while ($i<5)
    {
        var_dump($articles);
        echo '<div class="articlebox">';
        
        echo $articles[$i][1];
        echo '<a href="articles.php?id="'.$articles[$i][0].'" >voir TA MÄRE </a>';
        echo '</div>';
        $i=$i+1;
    }
    

?>
<form>
    <SELECT name="categorie" size="1">
    <option>cate1</option>
    <option>cate2</option>
    <option>cate3</option>
    <option>cate4</option>
</form>