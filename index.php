<!DOCTYPE html>
<html>
<head>
	<title>Site de Vente de voiture</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">AutoShap</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#" >A propos de nous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="ajouter.php" >Devenez vendeur</a>
        </li>
      </ul>
      <form class="">
           <div class=" d-md-flex justify-content-md-end">
              <a class="nav-link " href="login.php" ><button class="btn btn-primary me-md-2" type="button">Se Connecter</button></a>
              
              <a class="nav-link " href="#" ><button class="btn btn-primary" type="button">S'incrire</button></a>
               
            </div>
      </form>
    </div>
  </div>
</nav>
     <div id="entete">
     	<video autoplay="autoplay" class="video_entete">
     		<source src="" type="video/mp4">
     	</video>
     	<p class="nomsite">Location de Voiture</p>
     	<div id="formauto">
     		<form action="" method="post" id="formulaire">
                 <input class="form-control" id="motcle" name="motcle" type="text" placeholder=" Recherche par marque" aria-label="default input example">
                 <div style="margin-top: 20px">
                 	<div id="result_search"></div>
                 </div>
               
     			
     			<input type="submit" name="btnsubmit" placeholder="Recherche" class="btnfind">
     		</form>
     	</div>
     </div>
     
     <div id="articles">
          <?php 

             include("connection.php");

             if(isset($_POST['btnsubmit'])){

               $motcle =$_POST['motcle'];
                
               $requete ="SELECT * from automobile WHERE marque like '%$motcle%'";
               } 
               else{
                    $requete ="SELECT * FROM automobile";
               }

               $resultat =mysqli_query($conn, $requete);
               $nbre = mysqli_num_rows($resultat);
                echo "<p><b>" . $nbre ."</b>Resultats de votre Recherche...</p>";

               while($ligne =mysqli_fetch_assoc($resultat)){
                    
                ?>
	                <a href="achat.php?id=<?php echo $ligne['id']; ?>">
	                	<div id="auto">
	                     <img src="<?php echo $ligne["image"] ;?>"></br>
	                     <?php echo $ligne['description']; ?></br>
	                     <?php echo $ligne['prix']; ?></br>
	                     <?php echo $ligne['phone']; ?></br>
	                    </div>
	                </a>


                <?php
                    }
                
                 ?>
               


           
     </div>

</body>
</html>