<?php 

 session_start();
 
 include("connection.php");

 if(isset($_GET['marques'])){
 	$marques =(String)trim($_GET['marques']);

    $requete ="SELECT * from automobile WHERE marque like '%$marques%' limit 3";
 	
 	 $resultat =mysqli_query($conn, $requete);
              

               while($ligne =mysqli_fetch_assoc($resultat)){
                    
                ?>
                <div style="border-bottom: 2px solid #ccc; ">
                
                     <?php echo $ligne['marque']; ?></br>
                   
                </div>


                <?php
                    }
                  }
                 ?>
