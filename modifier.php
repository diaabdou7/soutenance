<?php require_once('connection.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
  <div class="container">
  	 <form action="" method="post" name="formUpdate" class="formulaire" enctype="multipart/form-data">
  	 	<h2 align="center">Mettre a jour les information de la voiture</h2>
  	 	  <label><b>L'id de la marque de voiture: </b></label>
  	 	  <input type="text" name="id" class="zonetext" value="<?php echo $_GET['mod']; ?>" readonly >

  	 	  <label><basefont>Marque:</basefont></label>
  	 	  <input type="text" name="marque" class="zonetext" placeholder="entrer la marque de la voiture..." required >


  	 	  <label><basefont>Description:</basefont></label>
  	 	  <input type="text" name="description" class="zonetext" placeholder="entrer la nouvelle description..." required >



  	 	  <label><basefont>Couleur:</basefont></label>
  	 	  <input type="text" name="couleur" class="zonetext" placeholder="entrer la nouvelle couleur de la voiture..." required >




  	 	  <label><basefont>Prix:</basefont></label>
  	 	  <input type="text" name="prix" class="zonetext" placeholder="entrer le nouveau prix de la voiture..." required >



  	 	  <label><basefont>Photo:</basefont></label>
  	 	  <input type="file" name="photo" class="zonetext" placeholder="entrer la nouvelle image de la voiture..."  >


  	 	  <input type="submit" name="btmode" class="submit" value="Mettre a jour ">

  	 	  <p><a href="acceuil.php" class="submit">Tablau de Bord</a></p>
  	 	  <label style="text-align: center; color: #360001;">
  	 	  	<?php 

              if(isset($_POST['btmode'])){

                       $marque =$_POST['marque'];
                       $description =$_POST['description'];
                       $couleur =$_POST['couleur'];
                       $prix =$_POST['prix'];

                       $modifier =$_GET['mod'];

                       $image=$_FILES['photo']['tmp_name'];
                       $targer="images/".$_FILES['photo']['name'];

                       move_uploaded_file($image, $targer);


                       $reqUpdate ="UPDATE automobile SET marque='".$marque."', description='".$description."', couleur='".$couleur."',prix='".$prix."',image='".$targer."' WHERE id='".$modifier."'   ";


                       $resultat =mysqli_query($conn,$reqUpdate);

                       if($resultat){
                       	echo " Mise a jour des données effectuer avec success";
                       }else{
                       	  echo "Mise a jour echec";
                       }

              }


  	 	  	 ?>
  	 	  </label>
  	 </form>
  </div>


</body>
</ht