<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="container">
		<form method="POST" id="formumaire" class="formulaire">
			  <h1>Connexion</h1>

			<label><b>Nom d'utilisateur:</b></label>
			<input type="text" name="txtlogin" placeholder="Entrer le nom d'utillisateur" required class="zonetext"><br><br>


			<label><b>Mot de Pass:</b></label>
			<input type="password" name="txtpw" placeholder="Entrer le mot de pass" required class="zonetext"><br><br><br>

           <input type="submit" name="btlogin" VALUE="LOGIN" id="submit" class="submit">
		</form>

		<?php 

           if(isset($_POST['btlogin'])){


                $requete ="SELECT * FROM utilisateurs WHERE login='".$_POST['txtlogin']."' AND password='".$_POST['txtpw']."' ";


                

                if($resultat = mysqli_query($conn,$requete)){

                	$ligne =mysqli_fetch_assoc($resultat);
                	if($ligne !=0){

                		session_start();
                		$_SESSION['monlogin']=$_POST['txtlogin'];

                		header("location:acceuil.php");

                	}
                	else{
                		echo "<font color='#F0001D'>LOGIN ou MOT DE PASS incorrect </font>"; 
                	}
                }


           }



		 ?>
	</div>

</body>
</html>