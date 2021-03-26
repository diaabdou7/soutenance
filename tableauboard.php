<?php require_once('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <p><h1><b>Liste des voitures</b></h1>

    <?php 
       $requete ="SELECT * FROM automobile";
       $resultat =mysqli_query($conn,$requete);

       $nbre = mysqli_num_rows($resultat);

       echo "<p>Total de<b> ".$nbre. " </b>voitures </p>";
     
     ?>
     </p>

     <p>
     	<a href="ajouter.php"><img src="icons/ajouter.jpg" width="50px" height="50px" alt="patienter"><span class="ajouter">AJOUTER</span></a>
     </p>
     <table width="100%" border="1">
     	<tr>
     		
            <th>MARQUE</th>
            <th>proprietaire</th>
            <th>image</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>

        <?php 
             
               
              while($ligne =mysqli_fetch_assoc($resultat)){

              


         ?>
             <tr>
             	<td><?php echo $ligne['marque']; ?></td>
             	<td><?php echo $ligne['proprietaire']; ?></td>
             	<td><img src="<?php echo $ligne['image'];?>" class="photo_car"></td>
             	<td><a href="modifier.php?mod=<?php echo $ligne['id']; ?>" ><img src="icons/modifier.png" width="50px" height="50px"></a></td>
             	<td><a href="Supprimer.php?id=<?php echo $ligne['id']; ?>"><img src="icons/Supprimer.png" width="50px" height="50px"></a></td>

             </tr>

         <?php 
              }
          ?>

        

    </table>
</body>
</html>