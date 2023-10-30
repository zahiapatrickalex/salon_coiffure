<!DOCTYPE html>
<html>
<head>
    <title>listes des chambres</title>
   

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">

        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link href="../css/templatemo-barber-shop.css" rel="stylesheet">

        

</head>
<body>
<a href="gerer_coiffure.php" class="link" style="top:20px;left: 20px;background:#fff;text-decoration: 0;padding: 10px 25px;border-radius: 6px; border:1px solid #f48840;color:#f48840;margin-top:40px;margin-bottom:-40px;">AJOUTER UN SERCICE</a>
<section class="services-section section-padding" id="section_3">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 col-12">
                                    <h2 class="mb-5">Services</h2>
                                </div>
                                <?php 
                                        //inclure la page connexion
                                        include_once"con_bdd.php";
                                        //afficher la liste des photos qui sont dans la base de donnees

                                        $req= mysqli_query($con ,"SELECT* FROM coiffure");

                                        //verifier que la liste n'est pas vide

                                        if (mysqli_num_rows($req)<1) {
                                            ?>
                                            <p class="vide_message">la liste des coiffure est vide</p>
                                            <?php 
                                        }
                                        //afficher la liste des photos
                                        while ($row = mysqli_fetch_assoc($req)) {
                                     ?>
                                

                                <div class="col-lg-6 col-12 mb-4">
                                    <div class="services-thumb">
                                   
                                        <img src="images_bdd/<?=$row['img']?>" class="services-image img-fluid" alt="">

                                        <div class="services-info d-flex align-items-end">
                                            <h4 class="mb-0"><?=$row['nomcoiffure']?></h4>

                                            <strong class="services-thumb-price"><?=$row['prixcoiffure']?></strong>
                            
                                        </div>
                                        
                                    </div><br>
                                    <button  class="form-control" ><a  href="delete.php?id=<?=$row['idcoiffure']?>">supprimer</a></button>
                                </div>
                                <?php 
                                          }
                                         ?>

                               

                            </div>
                        </div>
                    </section>
   
   

</body>
</html>