<?php

$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');
$req = $bdd->query('SELECT * FROM etudiants');
$etudiants = $req->fetchAll();

if (isset($_GET["action"]) && $_GET["action"] == "sup") {
  $bdd->query("delete from etudiants where id=" . $_GET["id"]);
  echo '<div class="alert alert-success alert-danger d-flex align-items-center justify-content-center" role="alert">
                  <h5>Etudiant supprimé</h5>
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
  <title>GESPRE LIST ETUDIANT</title>
  <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
</head>

<body class="vertical  light  ">
  <div class="wrapper">
    <?php
    include_once('asside.php')
    ?>
    <main role="main" class="main-content">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-md-12 card shadow card-body">
            <table class="table table-bordered">
              <thead class="bg-primary">
                <tr role="row">
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>email</th>
                  <th>Matricule</th>
                  <th>Filiere</th>
                  <th>Niveau</th>
                  <th>Modification</th>
                  <th>Suppression</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($etudiants as $etudiant) { ?>
                  <tr>
                    <td><?= $etudiant['nom'] ?></td>
                    <td><?= $etudiant['prenom'] ?></td>
                    <td><?= $etudiant['adresse_e_mail'] ?></td>
                    <td><?= $etudiant['matricule'] ?></td>
                    <td><?= $etudiant['filiere'] ?></td>
                    <td><?= $etudiant['niveau'] ?></td>
                    <td>
                      <form action=" " method="get">
                        <input type="hidden" name="id" value="<?= $etudiant['id'] ?> ">
                        <button type="submit" name="submodif" class="btn btn-primary">Modifier</button>
                      </form>
                    </td>
                    <td>
                      <a href="?action=sup&id=<?= $etudiant["id"] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                    </td>
                  </tr>
                <?php  } ?>
              </tbody>
            </table>

            <?php
            if (isset($_GET["submodif"])) {
              $queryy = $bdd->query("select* from etudiants where id=" . $_GET["id"]);
              $resulta = $queryy->fetch(PDO::FETCH_ASSOC);
              if ($resulta) {

            ?>
                <div class="container-fluid ">
                  <div class="col-md-12 my-4">
                    <h4><strong class="text-primary">Informations concernant l'étudiant</strong></label></h4>
                    <form action="" class="form mr-auto col-12 card shadow mb-2" method="post">
                    <label for=" " class=""><strong>Matricule</strong></label>
                      <input type="text" class="form-control mb-2" name="matup" value="<?= $resulta['matricule'] ?>">
                      <label for=" " class=""><strong>Nom</strong></label>
                      <input type="text" class="form-control mb-2" name="namup" value="<?= $resulta['nom'] ?>">
                      <label for=" " class=""><strong>Prénom</strong></label>
                      <input type="text" class="form-control mb-2" name="prenomup" value="<?= $resulta['prenom'] ?>">
                      <label for=" " class=""><strong>Email</strong></label>
                      <input type="email" class="form-control mb-2" name="emailup" value="<?= $resulta['adresse_e_mail'] ?>">
                      <label for=" " class=""><strong>Filiere</strong></label>
                      <input type="text" class="form-control mb-2" name="filup" value="<?= $resulta['filiere'] ?>">
                      <label for=" " class=""><strong>Niveau</strong></label>
                      <input type="text" class="form-control mb-2" name="niveauup" value="<?= $resulta['niveau'] ?>">
                      <input type="submit" class="btn btn-primary  mb-3" value="Modifier" name="btn-submitm">
                      
                  </div>
                  </form>
              <?php
                if (isset($_POST['btn-submitm'])) {
                  $matup = $_POST['matup'];
                  $namup = $_POST['namup'];
                  $prenomup = $_POST['prenomup'];
                  $emailup = $_POST['emailup'];
                  $filup = $_POST['filup'];
                  $niveauup = $_POST['niveauup'];
                  $smt = $bdd->prepare('UPDATE etudiants SET matricule= ?,nom=?,prenom=?,adresse_e_mail=?,filiere=?,niveau=? where id=?');
                  $smt->execute([$matup, $namup,$prenomup,$emailup, $filup,$niveauup,$resulta['id']]);
                  echo '<div class="alert alert-success alert-dismissible d-flex align-items-center justify-content-center" role="alert">
                  <p>Modification éffectuée</p>
                </div>';
                }
              }
            } ?>
                </div>

          </div> <!-- .col -->
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