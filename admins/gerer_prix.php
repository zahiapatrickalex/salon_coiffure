<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">

        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link href="../css/templatemo-barber-shop.css" rel="stylesheet">

</head>

<body>
<h1 style="color:greenyellow;text-decoration:none;font-family: Arial, Helvetica, sans-serif;font-size:40px;">GERER LES TYPES DE CHAMBRES </h1><br><br>

<center>

<main>
	<h1 style="font-family: Arial, Helvetica, sans-serif;font-size:40px;">Ajouter un prix </h1>
	<form method="POST" style="border: 1px solid rgb(202, 59, 7);">
		<?php
	 if (isset($_POST['btn'])) {

		$nomcf=$_POST['nomcf'];
		$prixcf=$_POST['prixcf'];
		
		if ($nomcf and $prixcf) {					   
				try { 
					// Connexion à la base de données
				    $db = new PDO("mysql:host=localhost;dbname=barbershop","root",""); 
				    $db-> setAttribute(PDO::ATTR_CASE, PDO:: CASE_LOWER); 
					$db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);   

					// Insertion d’un enregistrement 
					$insert= $db -> prepare("INSERT INTO prix (libprix,prix) VALUES ('$nomcf',$prixcf)"); 
					$insert -> execute();
					echo "<br><br>";
					


					} catch (PDOException $e) { 
										die( "Erreur ! : " . $e->getMessage() ); 
										echo($e);
				} 
		}else{
				       echo "<h3>veuillez remplie tous les champs</h3>";} 
				        
	}

 ?>     <label for="nom"style="font-family: Arial, Helvetica, sans-serif;font-size:20px;" >Entrez le nom de la coiffure</label>
		<input type="text" id="nom" name="nomcf"><br><br>
		<label for="prixcf" style="font-family: Arial, Helvetica, sans-serif;font-size:20px;">Entrez le prix de la coiffure</label>
		<input type="text" id="prixcf" name="prixcf"><br><br>
		<button name="btn"  style="top:20px;left: 20px;background:#fff;text-decoration: 0;padding: 10px 25px;border-radius: 6px; border:1px solid #f48840;color:#f48840;margin-top:40px;margin-bottom:-40px;">Ajouter</button>
		


	</form>
</main>
	
	

	<br><br>
	<main>
		<h1 style="font-family: Arial, Helvetica, sans-serif;font-size:40px;">Liste des prix </h1>
		<section class="price-list-section section-padding" id="section_4">
                        <div class="container">
                            <div class="row">
							<?php 
                                        //inclure la page connexion
                                        include_once"con_bdd.php";
                                        //afficher la liste des photos qui sont dans la base de donnees

                                        $req= mysqli_query($con ,"SELECT* FROM prix");

                                        //verifier que la liste n'est pas vide

                                        if (mysqli_num_rows($req)<1) {
                                            ?>
                                            <p class="vide_message">la liste des prix est vide</p>
                                            <?php 
                                        }
                                        //afficher la liste des photos
                                        while ($row = mysqli_fetch_assoc($req)) {
                                     ?>
							   
                                <div class="col-lg-8 col-12">
                                    <div class="price-list-thumb-wrap">

                                        <div class="price-list-thumb">
                                            <h6 class="d-flex">
											<?=$row['libprix']?>
											<span class="price-list-thumb-divider"></span>

                                                <strong><?=$row['prix']?> FCFA</strong>
                                            </h6>
											<strong class="services-thumb-price">supprimer</strong>
                                        </div>
                                    </div>
                                </div>
								<?php 
                                          }
                                         ?>
        

                            </div>
                        </div>
                    </section>		

		
	</main>
	</center>

	

</body>
</html>