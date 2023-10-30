<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet"> -->

    <title>Stand CSS Blog by TemplateMo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" type="text/css" href="style.css">

<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body>

    
    
  <?php 
    //inclure la page de connexion
    include_once"con_bdd.php";
    //verifier que les données sont envoyés
    if (isset($_POST['send'])){
          //verifier que l'image et le texte on été choisie

          if (!empty($_FILES['image']) 
            && isset($_POST['coiffure']) && $_POST['coiffure']!=""  
            && isset($_POST['prix']) && $_POST['prix']!="" ) {

                //on recupere d'abord le nom de l'image 
                $img_nom=$_FILES['image']['name'];

                //nous deffinisons un nom temporaire
                $tmp_nom=$_FILES['image']['tmp_name'];


                //on recupere d'abord l'heuure actuelle 

                $time= time();

                //on renomme l'image 
                $nouveau_nom_img=$time.$img_nom;

                //on place l'image dans dossier appeller "image_bdd"
                $deplacer_img= move_uploaded_file($tmp_nom,"images_bdd/".$nouveau_nom_img);
                if ($deplacer_img) {
                    //si l'image a ete dans le dossier
                    //inserons un texte et le nom de l'image dans la base de donnees
                    $coiffure = $_POST['coiffure'];
                    $prix = $_POST['prix'];
                    $req =  mysqli_query($con ,  "INSERT INTO coiffure VALUES(NULL ,'$coiffure','$prix','$nouveau_nom_img')"); 
                    //verifier que la requette fonctionne

                    if ($req) {
                      //si oui , faire une redirection sur la page liste.php

                      header("location:/barber_shop/index.php");

                    }else{
                      //si non 
                      $message="echec de l'ajout de l'image!";
                    }
                }else{
                  //si non 

                  $message= "veuillez choisie une image de taille inferieur a 1Mo!";
                }
          }else{
            //si les champs sont vide afficher un message
            $message="veuillez remplie tous les champs!";
          }
    }


 ?>

  <a href="listecoiffure.php" class="link">LISTES DES SERVICES</a>
  <p class="error">
    <?php
    //afficher une erreur si la variable message existe
    if (isset($message)) echo $message;
     ?>
  </p>
  <form method="POST" action="" enctype="multipart/form-data">

    <label for="coiffure">nom de la coiffure </label>
    <input type="text" id="coiffure" name="coiffure"><br><br>

    <label for="prix">prix</label>
    <input type="text" id="prix" name="prix"><br><br>
    
    <input type="file" name="image"><br><br>

    <input type="submit" value="PUBLIER" name="send">
    
    
  </form>
  
  </body>
</html>