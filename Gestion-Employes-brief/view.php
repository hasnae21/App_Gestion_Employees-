<?php

require_once('connect.php');
$sql = "SELECT * FROM `employes` ";
$res = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Liste des Employes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="row pt-4">

            <a href="index.php">
                <button class="btn btn-primary" type="">
                    Ajouter un Etudiant
                </button>
            </a>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Département</th>
                    <th>Salaire</th>
                    <th>Fonction</th>
                    <th>Photo</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($r = mysqli_fetch_assoc($res)) {
                ?>

                    <tr>
                        <th scope="row"><?php echo $r['id']; ?></th>
                        <td><?php echo $r['matricule']; ?></td>
                        <td><?php echo $r['nom']; ?></td>
                        <td><?php echo $r['prénom']; ?></td>
                        <td><?php echo $r['date_naissance']; ?></td>
                        <td><?php echo $r['département']; ?></td>
                        <td><?php echo $r['salaire']; ?></td>
                        <td><?php echo $r['fonction']; ?></td>
                        <td><?php echo $r['photo']; ?></td>

                        <td>
                            <a href="update.php?id=<?php echo $r['id']; ?>" class="m-2">
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
                                            <a href="delete.php?id=<?php echo $r['id']; ?>">
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