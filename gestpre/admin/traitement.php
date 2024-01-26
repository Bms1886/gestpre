<?php
session_start();
// Récupération de la liste des etudiants
$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');
$req1 = $bdd->query('SELECT * FROM etudiants');
$etudiants = $req1->fetchAll();
$sn = 0;
if (isset($_SESSION['matiere']) && isset($_SESSION["date"]) && isset($_SESSION["heure_debut"]) && isset($_SESSION["heure_fin"])) {
    $matiere = $_SESSION['matiere'];
    $date = $_SESSION["date"];
    $heure_debut = $_SESSION["heure_debut"];
    $heure_fin = $_SESSION["heure_fin"];
    if (isset($_POST['save'])) {
           $selectedIds=isset($_POST['presence'])?$_POST['presence']:[];
           foreach($selectedIds as $etudiantId){
                $smt_etudiant= $bdd->prepare('SELECT id,nom,prenom from etudiants where id=?');
                $smt_etudiant->execute([$etudiantId]);
                $etudiant=$smt_etudiant->fetch();
                if($etudiant){
                    $req3 = $bdd->prepare('INSERT INTO presences(nom_matiere,datepre,heure_debut,heure_fin,id_etudiant,nom_etudiant,prenom_etudiant)VALUES(?,?,?,?,?,?,?)');
                    $req3->bindParam(1, $matiere);
                    $req3->bindParam(2, $date);
                    $req3->bindParam(3, $heure_debut);
                    $req3->bindParam(4, $heure_fin);
                    $req3->bindParam(5, $etudiant['id']);
                    $req3->bindParam(6, $etudiant['nom']);
                    $req3->bindParam(7, $etudiant['prenom']);
                    $req3->execute();
                }
              
            }
            echo '<div class="alert alert-success alert-dismissible d-flex align-items-center justify-content-center" role="alert">
            Enregistrement éffectué
          </div>';
        }
    }
else {
    header("Location:prise_presence_v2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GESPRE PRISE DE PRESENCE P2</title>
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
                    <h4><strong class="text-primary">Cocher les étudiants présents</strong></label></h4>
                    <div class="card shadow mt-2">
                        <!-- table -->
                        <table class="table table-bordered">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>email</th>
                                    <th>Matricule</th>
                                    <th>Filiere</th>
                                    <th>Niveau</th>
                                    <th>Présent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="" method="post">
                                    <?php foreach ($etudiants as $id_etudiant => $etudiant) {
                                    ?>
                                        <tr>
                                            <td> <input type="hidden" name="id" value="<?= $etudiant["id"] ?>"><?= $etudiant["id"] ?></td>
                                            <td> <input type="hidden" name="nomet" value="<?= $etudiant['nom'] ?>"><?= $etudiant['nom'] ?></td>
                                            <td><input type="hidden" name="prenomet" value="<?= $etudiant['prenom'] ?>"><?= $etudiant['prenom'] ?></td>
                                            <td><?= $etudiant['adresse_e_mail'] ?></td>
                                            <td><?= $etudiant['matricule'] ?></td>
                                            <td><?= $etudiant['filiere'] ?></td>
                                            <td><?= $etudiant['niveau'] ?></td>
                                            <td><input type="checkbox" name="presence[]" value="<?= $etudiant["id"] ?>" 
                                            class="btn btn-success text-white"> </td>
                                        </tr>
                                    <?php  } ?>
                            </tbody>
                        </table>
                        <div class="col ml-auto pb-2">
                            <button type="submit" class="btn btn-primary float-right ml-3" name="save">Envoyer</button>
                        </div>
                        </form>
                    </div>
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