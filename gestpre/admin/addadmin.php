<?php

$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');

if (isset($_POST['btn-submit-admin'])) {

  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $mot_de_passe = $_POST['mot_de_passe'];

  // Vérification de la validité des données
  if (empty($nom)) {
    echo 'Le nom est obligatoire.';
    exit();
  }

  if (empty($prenom)) {
    echo 'Le prénom est obligatoire.';
    exit();
  }

  if (empty($email)) {
    echo 'L\'adresse e-mail est obligatoire.';
    exit();
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'L\'adresse e-mail n\'est pas valide.';
    exit();
  }

  if (empty($mot_de_passe)) {
    echo 'Le mot de passe est obligatoire.';
    exit();
  }

  $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

  // Enregistrement de l'administrateur dans la base de données
  $req = $bdd->prepare('INSERT INTO administrateurs (nom, prenom, adresse_e_mail, mot_de_passe)
VALUES (?, ?, ?, ?)');
  $req->execute(array($nom, $prenom, $email, $mot_de_passe_hache));

  // Affichage d'un message de confirmation
  echo '<div class="alert alert-success alert-dismissible d-flex align-items-center justify-content-center" role="alert">
                  <p>L\'administrateur a été ajouté</p>
                </div>';
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GESTPRE AJOUT ADMIN</title>
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
          <h4><strong class="text-primary">Informations concernant l'administrateur</strong></label></h4>
          <form action="" class="form mr-auto col-12 card shadow mb-2" name="" method="POST">

            <label for=" " class="mt-2"><strong>Le nom</strong></label>
            <input type="text" class="form-control mb-2" name="nom">
            <label for=" " class=""><strong>Prénom</strong></label>
            <input type="text" class="form-control mb-6" name="prenom">
            <label for=" " class=""><strong>email</strong></label>
            <input type="email" class="form-control mb-4" name="email">
            <label for=" " class=""><strong>Mot de passe</strong></label>
            <input type="password" class="form-control mb-4" name="mot_de_passe">
            <input type="submit" class="form-control btn btn-success mb-4" name="btn-submit-admin" value="Enregister">
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

</html>