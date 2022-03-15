<?php
require('./php/connect.php');
$sql = "SELECT * FROM employes";
$res = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <title>Liste des Employés</title>
</head>

<body>

    <?php include './php/navbar.php'; ?>

    <div class="container">

        <table class="table  mt-3">
            <thead>
                <tr>

                    <th>Photo</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Département</th>
                    <th>Salaire</th>
                    <th>Fonction</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php
                while ($r = mysqli_fetch_assoc($res)) {
                ?>

                    <tr>
                        <td><img src="./images/<?php echo $r['photo']; ?>" alt="img" width="100px"> </td>

                        <td><?php echo $r['matricule']; ?></td>
                        <td><?php echo $r['nom']; ?></td>
                        <td><?php echo $r['prenom']; ?></td>
                        <td><?php echo $r['date_naissance']; ?></td>
                        <td><?php echo $r['departement']; ?></td>
                        <td><?php echo $r['salaire']; ?></td>
                        <td><?php echo $r['fonction']; ?></td>

                        <td>
                            <a href="./php/update.php" class="m-2">
                                <i class="fa fa-edit fa-2x"></i>
                            </a>
                            <i class="fa fa-trash fa-2x red-icon" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $r['id']; ?>">

                            </i>

                            <div class="modal fade" id="exampleModal<?php echo $r['id']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p> Vous etes sur de vouloir supprimer cette ligne ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="./php/delete.php">
                                                <button class="btn btn-danger" type="button">Confirmer</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>