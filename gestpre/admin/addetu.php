<?php

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');

// Vérification si le formulaire a été soumis
if (isset($_POST['btn-submit'])) {

  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $matricule = $_POST['matricule'];
  $filiere = $_POST['filiere'];
  $niveau = $_POST['niveau'];

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

  if (empty($matricule)) {
    echo 'Le matricule est obligatoire.';
    exit();
  }

  if (empty($filiere)) {
    echo 'La filière est obligatoire.';
    exit();
  }

  if (empty($niveau)) {
    echo 'Le niveau est obligatoire.';
    exit();
  }

  // Enregistrement de l'étudiant dans la base de données
  $req = $bdd->prepare('INSERT INTO etudiants (nom, prenom, adresse_e_mail, matricule, filiere, niveau)
VALUES (?, ?, ?, ?, ?, ?)');
  $req->execute(array($nom, $prenom, $email, $matricule, $filiere, $niveau));

  // Affichage d'un message de confirmation
  echo '<div class="alert alert-success alert-dismissible d-flex align-items-center justify-content-center" role="alert">
  Etudiant ajouté
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
  <title>GESTPRE AJOUT ETUDIANT</title>
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
          <h4><strong class="text-primary">Informations concernant l'étudiant</strong></label></h4>
          <form action="" class="form mr-auto col-12 card shadow mb-2" method="POST">

            <label for=" " class="mt-2"><strong>Nom</strong></label>
            <input type="text" class="form-control mb-2" name="nom">
            <label for=" " class=""><strong>Prénom</strong></label>
            <input type="text" class="form-control mb-6" name="prenom">
            <label for=" " class=""><strong>Email</strong></label>
            <input type="email" class="form-control mb-4" name="email">
            <label for=" " class=""><strong>Matricule</strong></label>
            <input type="text" class="form-control mb-4" name="matricule">
            <label for=" " class=""><strong>Filière</strong></label>
            <input type="text" class="form-control mb-4" name="filiere">
            <label for=" " class=""><strong>Niveau</strong></label>
            <input type="text" class="form-control mb-4" name="niveau">
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