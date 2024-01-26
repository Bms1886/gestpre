<?php

$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');
$req = $bdd->query('SELECT * FROM etudiants ORDER BY id DESC LIMIT 10');
$etudiants = $req->fetchAll();

$req2 = $bdd->query('SELECT * FROM matieres ORDER BY id DESC LIMIT 10');
$matieres = $req2->fetchAll();

$sql=$bdd->query('SELECT * FROM matieres');
$matieres= $sql->fetchAll();
$resultats=count($matieres);

$sql2=$bdd->query('SELECT * FROM etudiants');
$etudiantss= $sql2->fetchAll();
$resultatset=count($etudiantss);

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GESTPRE DASHBOARD</title>
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
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center mb-2">
              <div class="col">
                <h2 class="h5 page-title">Bienvenue!</h2>
              </div>
            </div>
            <!-- widgets -->
            <div class="row my-4">
              <div class="col-md-4 mb-4">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-16 fe-users text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-muted mb-0">Nombre d'étudiants</p>
                        <span class="h3 mb-0"><?=$resultatset?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- etudiants nbr -->
              <div class="col-md-4 mb-4 ml-auto">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-success">
                          <i class="fe fe-16 fe-book-open text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-muted mb-0">Nombre de matieres</p>
                        <span class="h3 mb-0"><?=$resultats?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /. col -->
             
            </div> <!-- end section -->

            <div class="row">
              <div class="col-md-6 card shadow card-body">
                <table class="table table-hover table-sm">
                  <div class="card-header">
                    <strong class="card-title">Liste des étudiants</strong>
                    <a class="float-right small text-muted" href="list_etd.php#">Voir tout</a>
                  </div>
                  <thead class="bg-primary">
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Filière</th>
                      <th>Niveau</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  foreach ($etudiants as $etudiant){ ?>
                                <tr> 
                                    <td><?=$etudiant['nom']?></td>
                                    <td><?=$etudiant['prenom']?></td>
                                    <td><?=$etudiant['filiere']?></td>
                                    <td><?=$etudiant['niveau']?></td>
                                </tr>
                                <?php  } ?>
                  </tbody>
                </table>
              </div> <!-- .col -->
              <div class="col-md-6 ml-auto card shadow card-body">
                <table class="table table-hover table-sm">
                  <div class="card-header">
                    <strong class="card-title">Liste des matieres</strong>
                    <a class="float-right small text-muted" href="liste_mat.php#">Voir tout</a>
                  </div>
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Code Matière</th>
                      <th>Enseignant</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($matieres as $matiere) { ?>
                    <tr>
                        <td><?= $matiere['nom'] ?></td>
                        <td><?= $matiere['code_matiere'] ?></td>
                        <td><?= $matiere['enseignant'] ?></td>
                    </tr>
                <?php  } ?>
                  </tbody>
                </table>
              </div> <!-- .col -->
            </div> <!-- .row -->
          </div> <!-- /.col -->
        </div> <!-- .row -->
      </div>
 <!-- .container-fluid -->
    </main> <!-- main -->
  </div> <!-- .wrapper -->
  <?php
    include_once('footerscript.php')
    ?>
</body>

</html>