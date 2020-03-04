<?php

	session_start();
	if (isset($_SESSION['id']))
    {
        $conn = mysqli_connect("localhost","root","","blog");
        $request = 'SELECT * FROM utilisateurs WHERE id = "'.$_SESSION["id"].'"';
        $sql = mysqli_query($conn,$request);
        $row = mysqli_fetch_assoc($sql);

        echo "votre login";
        echo '"'.$row["login"].'"</br>';
        echo "votre password";
        echo '"'.$row["password"].'"</br>';
        echo "votre email";
        echo '"'.$row["email"].'"</br>';  
        echo "votre photo de profil </br>";
        include 'fonctionavatar.php'; 

		?>
			
			<form  action="profil.php" method="post">
				<label> Login :  </label>
				<input type="text" name="login" value ="<?php echo $row['login']; ?>" />
		
				<label> Password :  </label></br>
				<input type="password" name="mdp" value = " <?php echo $row['password']; ?> "/>

				<label> Email :  </label>
				<input type="text" name="email" value = " <?php echo $row['email']; ?> "/>
				
				<input type="submit" name="envoie" value="Modifier" />
			</form>

	<?php
        
		if (isset($_POST['modifier']))
        {
            $mdp = password_hash($_POST['mdp'],PASSWORD_BCRYPT,array('cost'=> 12));
            //cryptage mdp//
            $update = "UPDATE utilisateurs SET login ='".$_POST['login']."',email ='".$_POST['email']."',password = '$mdp' WHERE id = '".$row['id']."'";
            $query2 = mysqli_query($connexion,$update); 
        
        }

    }
	else 
    {

        echo "Vous n'etes pas connecté veuillez vous connecté pour accédé a votre profil";
        echo '</br><a href="connexion.php">connexion</a>';

    }
?>