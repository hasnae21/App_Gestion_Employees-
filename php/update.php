<?php 
require('connect.php');

$id = $_GET['id'];
$selSql = "SELECT * FROM `employes` WHERE id=$id";
$res = mysqli_query($connect, $selSql);
$row = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    $matricule = ($_POST['matricule']);
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prenom']);
    $date_naissance = ($_POST['date_naissance']);
    $departement = ($_POST['departement']);
    $salaire = ($_POST['salaire']);
    $fonction = ($_POST['fonction']);
    $photo = ($_POST['photo']);

    echo   $matricule;
    echo  $nom;
    echo  $prenom;
    echo  $date_naissance;
    echo  $departement;
    echo  $salaire;
    echo  $fonction;

    $UpdateSql = "UPDATE employes SET matricule='$matricule',nom='$nom', prenom='$prenom', date_naissance='$date_naissance',departement='$departement', salaire='$salaire', fonction='$fonction' WHERE id=$id ";
    echo  $UpdateSql;
    $res= mysqli_query($connect, $UpdateSql);
    if ($res) {
        header("Location: /App_Gestion_Employees-/view.php");
    } else {
        $erreur = "la mise à jour a échoué.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <title>Edit</title>
</head>
<body>

    <div class="container">
                
                <form action="" method="POST" class="form-horizontal col-md-6 pt-4" autocomplete="off">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Matricule:</label>
                    <div class="col-sm-10">
                        <input type="number" name="matricule" placeholder="matricule" class="form-control" value="<?php echo $row['matricule'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nom:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $row['nom'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Prénom:</label>
                    <div class="col-sm-10">
                        <input type="text" name="prenom" placeholder="Prenom" class="form-control" value="<?php echo $row['prenom'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Date de naissance:</label>
                    <div class="col-sm-10">
                        <input type="date" name="date_naissance" class="form-control" value="<?php echo $row['date_naissance'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Département:</label>
                    <div class="col-sm-10">
                        <input type="text" name="departement" placeholder="département" class="form-control" value="<?php echo $row['departement'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Salaire:</label>
                    <div class="col-sm-10">
                        <input type="number" name="salaire" class="form-control" value="<?php echo $row['salaire'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Fonction:</label>
                    <div class="col-sm-10">
                        <input type="text" name="fonction" placeholder="fonction" class="form-control" value="<?php echo $row['fonction'] ?>"required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Photo:</label>
                    <div class="col-sm-10">
                        <input type="file" name="photo" class="form-control" value="<?php echo $row['photo']; ?>" required>
                    </div>
                </div> 
                <!-- fin inputs -->
                <div class=" pt-4">
                    <input type="submit" value="submit" class="btn btn-info m-3">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>