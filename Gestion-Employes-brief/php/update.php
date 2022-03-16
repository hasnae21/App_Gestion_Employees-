<!-- <?php

        require_once('connect.php');

        $id = $_GET['id'];
        $selSql = "SELECT * FROM `employes` WHERE id=$id";
        $res = mysqli_query($connect, $selSql);
        $r = mysqli_fetch_assoc($res);

        if (isset($_POST) & !empty($_POST)) {
            $matricule = ($_POST['matricule']);
            $nom = ($_POST['nom']);
            $prenom = ($_POST['prénom']);
            $date_naissance = ($_POST['date_naissance']);
            $departement = ($_POST['département']);
            $salaire = ($_POST['salaire']);
            $fonction = ($_POST['fonction']);
            $photo = ($_POST['photo']);

            $UpdateSql = "UPDATE `employes` SET matricule=`$matricule`,nom =`$nom`, prenom=`$prenom`, date_naissance=`$date_naissance`,departement =`$departement`, salaire=`$salaire`, fonction=`$fonction`, photo=`$photo`  WHERE id=$id ";


            $res = mysqli_query($connect, $UpdateSql);
            if ($res) {
                header("Location: /App_Gestion_Employees-/Gestion-Employes-brief/view.php");
            } else {
                $erreur = "la mise à jour a échoué.";
            }
        }

        ?> -->


<!DOCTYPE html>
<html>

<head>
    <title>crud app php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <div class="container">
        <div class="row pt-4">
            <?php if (isset($erreur)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erreur; ?>
                </div> <?php } ?>

            <form action="" method="POST" class="form-horizontal col-md-6 pt-4">
                <h2>Crud App by sen dev tech</h2>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" placeholder="Nom" class="form-control" id="input1" value="<?php echo $r['first_name'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">prenom</label>
                    <div class="col-sm-10">
                        <input type="text" name="prenom" placeholder="prenom" class="form-control" id="input1" value="<?php echo $r['last_name'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" placeholder="e-mail" class="form-control" id="input1" value="<?php echo $r['email'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                        <label>
                            <input type="radio" name="gender" id="optionsRadios" value="h" <?php if ($r['gender'] == 'h') {
                                                                                                echo "checked";
                                                                                            } ?>>
                            H
                        </label>
                        <label>
                            <input type="radio" name="gender" id="optionsRadios" value="f" <?php if ($r['gender'] == 'f') {
                                                                                                echo "checked";
                                                                                            } ?>>
                            F
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Age</label>
                    <div class="col-sm-10">
                        <select name="age" class="form-control">
                            <option>Ton age</option>
                            <option value="20" <?php if ($r['age'] == '20') {
                                                    echo "selected";
                                                } ?>>20</option>

                            <option value="21" <?php if ($r['age'] == '21') {
                                                    echo "selected";
                                                } ?>>21</option>

                            <option value="22" <?php if ($r['age'] == '22') {
                                                    echo "selected";
                                                } ?>>22</option>

                            <option value="23" <?php if ($r['age'] == '23') {
                                                    echo "selected";
                                                } ?>>23</option>

                            <option value="24" <?php if ($r['age'] == '24') {
                                                    echo "selected";
                                                } ?>>24</option>

                        </select>
                    </div>
                </div>

                <div class="pt-4">
                    <input type="submit" value="submit" class="btn btn-primary m-3">

                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>