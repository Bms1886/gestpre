<?php

$bdd = new PDO('mysql:host=localhost;dbname=gestion_presences', 'root', '');
$req = $bdd->query('SELECT * FROM matieres');
$matieres = $req->fetchAll();

if (isset($_GET["action"]) && $_GET["action"] == "sup") {
    $bdd->query("delete from matieres where id=" . $_GET["id"]);
    
    echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center justify-content-center" role="alert">
                <p>La matière a été supprimée/p>
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
    <title>GESPRE LIST MATIERES</title>
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
                <div class="row">
                    <div class="col-md-12 card shadow card-body">
                        <table class="table table-hover table-sm">
                            <div class="card-header">
                                <strong class="card-title">Liste des matieres</strong>
                            </div>
                            <thead class="bg-primary text-bold">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Code</th>
                                    <th>Enseignant</th>
                                    <th>Modification</th>
                                    <th>Suppression</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($matieres as $matiere) { ?>
                                    <tr>
                                        <td><?= $matiere['id'] ?></td>
                                        <td><?= $matiere['nom'] ?></td>
                                        <td><?= $matiere['code_matiere'] ?></td>
                                        <td><?= $matiere['enseignant'] ?></td>
                                        <td>
                                            <form action=" " method="get">
                                                <input type="hidden" name="id" value="<?= $matiere['id'] ?> ">
                                                <button type="submit" name="submodif" class="btn btn-primary">Modifier</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="?action=sup&id=<?= $matiere["id"] ?>" class="btn btn-danger">Supprimer</a>
                                        </td>
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>


                        <?php
                        if (isset($_GET["submodif"])) {
                            $queryy = $bdd->query("select* from matieres where id=" . $_GET["id"]);
                            $resulta = $queryy->fetch(PDO::FETCH_ASSOC);
                            if ($resulta) {

                        ?>
                                <div class="container-fluid ">
                                    <div class="col-md-12 my-4">
                                        <h4><strong class="text-primary">Informations concernant la matiere</strong></label></h4>
                                        <form action="" class="form mr-auto col-12 card shadow mb-2" method="post">
                                            <label for=" " class=""><strong>Nom</strong></label>
                                            <input type="text" class="form-control mb-2" name="namup" value="<?= $resulta['nom'] ?>">
                                            <label for=" " class=""><strong>Code matiere</strong></label>
                                            <input type="text" class="form-control mb-2" name="codup" value="<?= $resulta['code_matiere'] ?>">
                                            <label for=" " class=""><strong>Enseignant</strong></label>
                                            <input type="text" class="form-control mb-2" name="enseigantup" value="<?= $resulta['enseignant'] ?>">
                                            <input type="submit" class="btn btn-success  mb-3 text-white" value="Valider" name="btn-submitm">
                                    </div>
                                    </form>
                            <?php
                                if (isset($_POST['btn-submitm'])) {
                                    $namup = $_POST['namup'];
                                    $codup = $_POST['codup'];
                                    $enseigantup = $_POST['enseigantup'];
                                    var_dump([$namup, $codup, $enseigantup, $resulta['id']]);
                                    $smt = $bdd->prepare('UPDATE matieres SET nom=?,code_matiere=?,enseignant=? where id=?');
                                    $smt->execute([$namup, $codup, $enseigantup, $resulta['id']]);
                                    echo '<div class="alert alert-success alert-dismissible d-flex align-items-center justify-content-center" role="alert">
                                            <p>Modification éffectuée</p>
                                            </div>';
                                }
                            }
                        } ?>
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