<?php
session_start();
// Récupération de la liste des etudiants
$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');
$req1 = $bdd->query('SELECT * FROM etudiants');
$etudiants = $req1->fetchAll();

// Récupération de la liste des matières
$req2 = $bdd->query('SELECT nom FROM matieres');
$matieres = $req2->fetchAll();

if (
    $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['matiere']) && !empty($_POST['date'])
    && !empty($_POST['heure_debut']) && !empty($_POST['heure_fin'])
) {
    $matiere = $_POST['matiere'];
    $date = $_POST['date'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];

    $_SESSION["matiere"] = $matiere;
    $_SESSION["date"] = $date;
    $_SESSION["heure_debut"] = $heure_debut;
    $_SESSION["heure_fin"] = $heure_fin;
    header("Location:traitement.php");
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
  <title>GESPRE PRISE DE PRESENCE</title>
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
                    <h4><strong class="text-primary">Informations concernant le cours</strong></label></h4>
                    <form action="" class="form mr-auto col-12 card shadow mb-2" method="post">
                        <label for=" " class="mt-4"><strong>Selectionner la matiere</strong></label>
                        <select class="custom-select mb-2" id="inputGroupSelect03" aria-label="Example select with button addon" name="matiere">
                            <option selected>Matieres</option>
                            <?php foreach ($matieres as $matiere) { ?>
                                <option value="<?= $matiere['nom'] ?>"><?= $matiere['nom'] ?></option>
                            <?php  } ?>
                        </select>
                        <label for=" " class=""><strong>Entrez la date</strong></label>
                        <input type="date" class="form-control mb-2" name="date">
                        <label for=" " class=""><strong>Entrez l'heure de début</strong></label>
                        <input type="time" class="form-control mb-6" name="heure_debut">
                        <label for=" " class=""><strong>Entrez l'heure fin</strong></label>
                        <input type="time" class="form-control mb-4" name="heure_fin">
                        <input type="submit" class="btn btn-primary float-right ml-3 mb-3" value="Enregister" name="btn-submit">
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