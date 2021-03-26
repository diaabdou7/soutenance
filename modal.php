<?php 

 include 'connection.php';
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