<?php

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');


// Vérification si le formulaire a été soumis
if (isset($_POST['btn-submit'])) {
  // Récupération des données du formulaire
  $email = $_POST['email'];
  $mot_de_passe = $_POST['mot_de_passe'];
  // Vérification de l'existence de l'administrateur
  $req = $bdd->prepare('SELECT * FROM administrateurs WHERE adresse_e_mail = ?');
  $req->execute(array($email));
  $administrateur = $req->fetch();

  if ($administrateur) {
    // Vérification du mot de passe
    if (password_verify($mot_de_passe, $administrateur['mot_de_passe'])) {
      // Connexion de l'administrateur
      session_start();
      $_SESSION['administrateur'] = $administrateur;

      // Redirection vers la page d'accueil
      header('Location: admin/dashboard.php');

    }
  }
}
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GestPre login</title>
  <link rel="stylesheet" href="./admin/css/simplebar.css">
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./admin/css/app-light.css">
</head>

<body class="light">
  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST">
        <h1 class="h6 mb-3 ">Connexion</h1>
        <div class="form-group">
          <label for="inputEmail" class="sr-only">Email</label>
          <input type="email" id="inputEmail" name="email"  class="form-control form-control-lg" placeholder="Identifiant" required="" autofocus="">
        </div>
        <div class="form-group">
          <label for="inputPassword" class="sr-only">Mot de passe</label>
          <input type="password" id="inputPassword" name="mot_de_passe" class="form-control form-control-lg" placeholder="Mot de passe" required="">
        </div>
        <div class="checkbox mb-3">
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-submit">Se connecter</button>
      </form>
    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
</body>

</html>