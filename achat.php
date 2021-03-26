<?php 

 include 'connection.php';

 session_start();
 $id = $_GET['id'];


 $dup = mysqli_query($conn,"SELECT * FROM automobile where id = '$id'");
      $row = mysqli_fetch_assoc($dup);
      $id = $row["id"];
      $_SESSION["id"]= $row["id"];
      $_SESSION["image"]= $row["image"];
      $_SESSION["marque"] =$row['marque'];
      $_SESSION["couleur"] =$row['couleur'];
      $_SESSION["description"] =$row['description'];
      $_SESSION["annee"] =$row['annee'];
      $_SESSION["kilometrage"] =$row['kilometrage'];
      $_SESSION["type_carburant"] =$row['type_carburant'];
      $_SESSION["trasmission"] =$row['transmission'];
      $_SESSION["climatisation"] =$row['climatisation'];
      $_SESSION["description"] =$row['description'];
      
      $_SESSION["prix"] =$row['prix'];
      $_SESSION['phone']= $row['phone'];

 



 ?>
 
                               
 <!DOCTYPE html>
 <html>
 <head>
 	<title>achat</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="">
<style type="text/css">
	.cool{color: red; font-weight: blod }
</style>
 </head>
 <body>
 	<div class="arranger">
 	   <div class="container">
       	  <div class="row">
		       	  	
		       	  		<div>
		       	  			<input type="hidden" name="" value=<?php echo $_SESSION["id"]; ?> >
		       	  			<p></p>
		       	  		</div><br>
		       	  		<div class="col-md-4"></div>
		       	  		<div class="col-md-2">
		       	  			<figure class="figure">
		       	  	          <img src="<?php echo $_SESSION["image"];?>" class="figure-img img-fluid rounded"  alt=""/>
		       	            </figure>
		       	  		</div>
		       	  		<div class="col-md-4">
		       	  			<table class="table table-bordered table-striped ">
			       	  			  <thead>
			       	  			  	<th>Information générale sur la voiture:</th>
			       	  			  </thead>
			       	  			  <tbody>
			       	  			  	<tr>
			       	  			  	  <td>
			       	  			  	  	<p class="text-danger">
			       	  			  	  	<span class="fw-bolder" class="text-danger">Marque: </span></p><?php echo $_SESSION["marque"]; ?>
			       	                   </td>
			       	  			  	</tr>
			       	  			  	<tr>
			       	  			  	  <td>
			       	  			  	  	<p class="text-danger">
			       	  			  	  	<span class="fw-bolder" class="text-danger">Couleur: </span></p><?php echo $_SESSION["couleur"]; ?>
			       	                   </td>
			       	  			  	</tr>
			       	  			  	<tr>
			       	  			  	  <td>
			       	  			  	  	<p class="text-danger">
			       	  			  	  	<span class="fw-bolder" class="text-danger">Kilometrage: </span></p><?php echo $_SESSION["kilometrage"]; ?>
			       	                   </td>
			       	  			  	</tr>
			       	  			  	<tr>
			       	  			  	  <td>
			       	  			  	  	<p class="text-danger">
			       	  			  	  	<span class="fw-bolder" class="text-danger">Annee: </span></p><?php echo $_SESSION["annee"]; ?>
			       	                   </td>
			       	  			  	</tr>
			       	  			  	<tr>
			       	  			  		<td>
			       	  			  			<p class="text-danger"><span class="fw-bolder" class="text-danger" >Description: </span></p><?php echo $_SESSION["description"]; ?>
			       	                         
			       	                    </td>

			       	  			  	</tr>

			       	  			  	<tr>
			       	  			  	  <td>
			       	  			  	  	<p class="text-danger">
			       	  			  	  	<span class="fw-bolder" class="text-danger">Type Carburant: </span></p><?php echo $_SESSION["type_carburant"]; ?>
			       	                   </td>
			       	  			  	</tr>
			       	  			  	<tr>
			       	  			  		<td>
			       	  			  			 <p class="text-danger"><span class="fw-bolder" >Prix: </span></p><?php echo $_SESSION["prix"]; ?>
			       	  			  		</td>
			       	  			  	</tr>
			       	  			  	<tr>
			       	  			  		<td>
			       	  			  			 <p class="text-danger"><span class="fw-bolder" >Appelez pour conclure la vente:</span></p><?php echo $_SESSION['phone']; ?>
			       	             
			       	  			  		</td>
			       	  			  	</tr>
			       	  			  	<tr>
			       	  			  		<td>
                                           <div class="d-grid gap-2 col-6 mx-auto">
 
 												<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Contacter Vendeur</button>
											</div>

			       	  			  			
			       	  			  		</td>
			       	  			  	</tr>
			       	  			  </tbody>
			       	  			 <form action="" method="post">
			       	  			 	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
											        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div class="modal-body">
											        
											          <div class="mb-3">
											            <label for="recipient-name" class="col-form-label">Nom:</label>
											            <input type="text" name="nom_modal" class="form-control" id="recipient-name">
											          </div>
											          <div class="mb-3">
											            <label for="recipient-name" class="col-form-label" >Compte Email ou Numero:</label>
											            <input type="text" class="form-control" id="recipient-name" name ="num_modal">
											          </div>
											          <div class="mb-3">
											            <label for="message-text" class="col-form-label">Message:</label>
											            <textarea class="form-control" id="message-text" name="msg_modal" placeholder="Je suis interessé par votre voiture et...."></textarea>
											          </div>
											        
											      </div>
											      <div class="modal-footer">
											        <div class="d-grid gap-2 col-6 mx-auto">
											        	<input type="submit" name="envoi_modal" value="Ajouter" id="submit">
											        	
											        </div>
											      </div>
											    </div>
											  </div>
											</div>
			       	  			  

			       	  			 	
			       	  			 </form>
			       	  			  
			       	             
			       	         	  
			       	             
			       	         	 
			       	            
			       	             
			       	         	 
			       	        </table>
			       	      
		       	  		</div>
		       	  		<div class="col-md-2"></div>
		       	  		
		       	        


		       	    
       	  	</div>
       	  	
       </div>	
 	</div>
 	<?php 

 if(isset($_POST['envoi_modal'])){
    $nom_modal =$_POST["nom_modal"];
    $num_modal =$_POST["num_modal"];
	$msg_modal =$_POST["msg_modal"];

	$requette="INSERT INTO clients (name,numero,message) VALUES('".$nom_modal."','".$num_modal."','".$msg_modal."') ";

    $resultat = mysqli_query($conn,$requette);
	    if($resultat){
			echo "Insertion de donnee validee";
		     }else{
			    echo "echec d'insertion de donnee";
			        }

			}
   


 ?>
      
 </body>
 </html>

