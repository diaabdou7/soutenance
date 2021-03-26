<?php require_once('connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <div id="container">
    	<form class="formDelete" class="formulaire">
          	<a href="acceuil.php" class="submit">Tableau de bord</a>    	
       </form>
    </div>

    <?php 
      
      if(isset($_GET['id'])){

      	$id =$_GET['id'];

      	$reqDelete ="DELETE FROM automobile WHERE id='$id'";

      	$resultat =mysqli_query($conn, $reqDelete);
          if($resultat){

		      	echo "<label style='text-align: center; color:#960406; '>La suppression s'est effectuer avec success</label>";
		      }
		   else{
		      	echo "La suppression n'a pas ete effectuer";
      }
      

      }


      



     ?>
</body>
</html>