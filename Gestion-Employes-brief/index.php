<?php
require('./php/connect.php');
if (isset($_POST) & !empty($_POST)) {

    $matricule = ($_POST['matricule']);
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prénom']);
    $date_naissance = ($_POST['date_naissance']);
    $departement = ($_POST['département']);
    $salaire = ($_POST['salaire']);
    $fonction = ($_POST['fonction']);
    $photo = ($_POST['photo']);

    $CreateSql = "INSERT INTO `employes` (`matricule`, `nom`, `prenom`, `date_naissance`, `departement`, `salaire`, `fonction`, `photo`)  VALUES
    ('$matricule', '$nom', '$prenom', '$date_naissance', '$departement', '$salaire', '$fonction', '$photo')";

    $res = mysqli_query($connect, $CreateSql) or die(mysqli_error($con));
    if ($res) {
        $message = "insertion reussi avec succès";
    } else {
        $erreur = "erreur d'insertion a la base";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <title>Gestion des Employés</title>
</head>
<body>

    <?php include './php/navbar.php'; ?>

    <div class="container">
        <div class="row pt-4">

            <?php if (isset($message)) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message; ?>
                </div> <?php } ?>
            <?php if (isset($erreur)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erreur; ?>
                </div> <?php } ?>

            <form action="" method="POST" class="form-horizontal col-md-6 pt-4" autocomplete="off">
                <h4 class="text-primary text-uppercase fs-3">Employé caractéristiques:</h4>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Matricule:</label>
                    <div class="col-sm-10">
                        <input type="number" name="matricule" placeholder="matricule" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nom:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" placeholder="Nom" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Prénom:</label>
                    <div class="col-sm-10">
                        <input type="text" name="prénom" placeholder="Prenom" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Date de naissance:</label>
                    <div class="col-sm-10">
                        <input type="date" name="date_naissance" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Département:</label>
                    <div class="col-sm-10">
                        <input type="text" name="département" placeholder="département" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Salaire:</label>
                    <div class="col-sm-10">
                        <input type="number" name="salaire" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Fonction:</label>
                    <div class="col-sm-10">
                        <input type="text" name="fonction" placeholder="fonction" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Photo:</label>
                    <div class="col-sm-10">
                        <input type="file" name="photo" class="form-control" required>
                    </div>
                </div>
                <!-- fin inputs -->

                <div class="d-grid gap-1 pt-4">
                    <input type="submit" value="submit" 
                     class="btn btn-primary active ">
                    <a href="view.php">
                        <input class="btn active btn-info" type="button" value="voir la liste" >
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>