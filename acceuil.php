<?php require_once('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div id="global">
     	<div id="profil">
     		<?php 

              session_start();
              echo "Bonjour et soyer le bienvuenu ".$_SESSION['monlogin'];

              $req="SELECT * FROM utilisateurs WHERE login='".$_SESSION['monlogin']."'";

              $resultat =mysqli_query($conn, $req);
              $ligne =mysqli_fetch_assoc($resultat);


     		 ?>

     		 <img src="<?php  echo $ligne['my_photo']; ?>" class="my_photo" ><br>
     		 <a href="deconnecter.php">Deconnection</a>
     	</div>
     	<div id="tableau_de_bord">

     	<?php 
              include ("tableauboard.php");
     	 ?>
     	</div>
     </div>
</body>
</html>

