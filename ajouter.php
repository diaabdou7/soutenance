<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class ="container">
		<form action ="" name="formAdd" method="post" class="formulaire" enctype="multipart/form-data">
			 <h2 align="center">Ajouter une nouvelle voiture.</h2>
			 <label><b>MARQUE</b></label>
			 <input type="text" name="marque" class="zonetext" placeholder="Entrer la marque" required>

              <label><b>SERIE</b></label>
			 <input type="text" name="serie" class="zonetext" placeholder="Entrer la serie de la voiture" required>

			 <label><b>DESCRIPTION:</b></label>
			 <input type="text" name="description" class="zonetext" placeholder="Decriver la voiture" required>
			 <label><b>ANNEE:</b></label>
			 <input type="text" name="annee" class="zonetext" placeholder="L'annee de sortir de la voiture" required>

			 <label><b>COULEUR</b></label>
			 <input type="text" name="couleur" class="zonetext" placeholder="Entrer la couleur" required>

              <label><b>KILOMETRAGE</b></label>
			 <input type="text" name="kilometrage" class="zonetext" placeholder="Entrer le kilométrage" required>

			 <label><b>TYPE CARBURANT</b></label>
			 <input type="text" name="type_carburant" class="zonetext" placeholder="essence ou diesel ou gas" required>

             <label><b>TRASMISSION</b></label>
			 <input type="text" name="transmission" class="zonetext" placeholder="manuel ou auto" required>
             
             <label><b>CLIMATISATION</b></label>
			 <input type="text" name="climatisation" class="zonetext" placeholder="OUI OU NON" required>

			 <label><b>VENDEUR</b></label>
			 <input type="text" name="proprietaire" class="zonetext" placeholder="le nom du Vendeur" required>

			 <label><b>PHONE</b></label>
			 <input type="text" name="phone" class="zonetext" placeholder="le prix de la voiture" required>

			 <label><b>PRIX</b></label>
			 <input type="text" name="prix" class="zonetext" placeholder="Entrer la prix" required>


			 <label><b>IMAGE</b></label>
			 <input type="file" name="txtphoto" class="zonetext" placeholder="Entrer l'image" required> 


			 <input type="submit" name="btadd" value="Ajouter" id="submit">

             <p><a href="acceuil.php" class="submit">ACCEUIL</a></p>
            
            <label style="text-align:center;color: #960406;"></label>

            <?php 
                   
                   if(isset($_POST['btadd'])&&isset($_FILES['txtphoto'])){

                   
                       $image =$_FILES['txtphoto']['tmp_name'];

                   	       $traget ="images/".$_FILES['txtphoto']['name']; 

                   	move_uploaded_file($image, $traget);
                             
                             

                   	$marque =$_POST['marque'];
                   	$serie =$_POST['serie'];
                   	$description =$_POST['description'];
                   	$annee =$_POST['annee'];
                   	$couleur =$_POST['couleur'];
                   	$kilometrage =$_POST['kilometrage'];
                   	$type_carburant =$_POST['type_carburant'];
                   	$transmission =$_POST['transmission'];
                   	$climatisation =$_POST['climatisation'];
                	$proprietaire=$_POST['proprietaire'];
                   	$phone =$_POST['phone'];
                   	$prix =$_POST['prix'];


                   	$reqAdd="INSERT INTO automobile (marque,serie, description,annee,couleur,kilometrage,type_carburant,transmission,climatisation,proprietaire,phone,prix,image) VALUES('".$marque."','".$serie."','".$description."','".$annee."','".$couleur."','".$kilometrage."','".$type_carburant."','".$transmission."','".$climatisation."','".$proprietaire."','".$phone."','".$prix."','".$traget."') ";

                   	  $resultat = mysqli_query($conn,$reqAdd);
                   	  if($resultat){
                   	  	echo "Insertion de donnee validee";
                   	  }else{
                   	  	echo "echec d'insertion de donnee";
                   	  }
                   }
             ?>
		</form>
	</div>

</body>
</html>