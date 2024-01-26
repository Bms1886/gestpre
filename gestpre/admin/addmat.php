<?php

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');

// Vérification si le formulaire a été soumis
if (isset($_POST['btn-submit'])) {

  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $code_matiere = $_POST['code_matiere'];
  $enseigant = $_POST['enseigant'];
  // Vérification de la validité des données
  if (empty($nom)) {
    echo 'Le nom est obligatoire.';
    exit();
  }

  if (empty($code_matiere)) {
    echo 'Le code de la matiere';
    exit();
  }

  if (empty($enseigant)) {
    echo 'Le nom de l\'enseignant est obligatoire';
    exit();
  }
 // Enregistrement de l'étudiant dans la base de données
  $req = $bdd->prepare('INSERT INTO matieres (nom, code_matiere, enseignant)
VALUES (?, ?, ?)');
  $req->execute(array($nom, $code_matiere,$enseigant));

  // Affichage d'un message de confirmation
  echo '<div class="alert alert-success alert-dismissible d-flex align-items-center justify-content-center" role="alert">
                  <p>Matière ajoutée</p>
                </div>';
}

?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GESTPRE AJOUT MATIERE</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/simplebar.css">
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/feather.css">
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
</head>


<body class="vertical  light  ">
  <div class="wrapper">
     <?php 
       include_once('asside.php')
       ?>
    <main role="main" class="main-content">
    <div class="container-fluid ">
                <div class="col-md-12 my-4">
                <h4><strong class="text-primary">Informations concernant la matiere</strong></label></h4>
                    <form action="" class="form mr-auto col-12 card shadow mb-2" method="POST">
                    
                        <label for=" " class="mt-2"><strong>Nom</strong></label>
                        <input type="text" class="form-control mb-2" name="nom">
                        <label for=" " class=""><strong>Code Matiere</strong></label>
                        <input type="text" class="form-control mb-6" name="code_matiere">
                        <label for=" " class=""><strong>Enseignant</strong></label>
                        <input type="text" class="form-control mb-4" name="enseigant">
                        <input type="submit" class="form-control btn btn-success mb-4" value="Enregister" name="btn-submit">
                    </form>
                </div>
            </div>
            <!-- .row -->
    </div>
    <!-- .container-fluid -->
    </main> <!-- main -->
  </div> <!-- .wrapper -->
  <?php
    include_once('footerscript.php')
    ?>
</body>

</html>