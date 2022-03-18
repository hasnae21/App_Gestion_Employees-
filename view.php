<?php
require('php/connect.php');
if (isset($_POST['Search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $getcolomn = $_POST['filrerColome'];

    $query = "SELECT * FROM `employes` WHERE  $getcolomn  LIKE '%" . $valueToSearch . "%' ";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `employes`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "employes");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
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
                <?php while ($row = mysqli_fetch_array($search_result)) : ?>
                    <tr>
                        <td><img src="./images/<?php echo $row['photo']; ?>" alt="img" width="100px"> </td>
                        <td><?php echo $row['matricule']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><?php echo $row['date_naissance']; ?></td>
                        <td><?php echo $row['departement']; ?></td>
                        <td><?php echo $row['salaire']; ?></td>
                        <td><?php echo $row['fonction']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <a role="button"><i class="fa fa-edit fa-2x" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="php/update.php?id=<?php echo $row["id"]; ?>" method="POST" autocomplete="off">
                                            <div class="modal-body">
                                                <label class="col-sm-2 control-label">Matricule:</label>
                                                <input type="number" name="matricule" placeholder="matricule" class="form-control" value="<?php echo $row['matricule'] ?>" required>
                                                <label class="col-sm-2 control-label">Nom:</label>
                                                <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $row['nom'] ?>" required>
                                                <label class="col-sm-2 control-label">Prénom:</label>
                                                <input type="text" name="prenom" placeholder="Prenom" class="form-control" value="<?php echo $row['prenom'] ?>" required>
                                                <label class="col-sm-2 control-label">Date de naissance:</label>
                                                <input type="date" name="date_naissance" class="form-control" value="<?php echo $row['date_naissance'] ?>" required>
                                                <label class="col-sm-2 control-label">Département:</label>
                                                <input type="text" name="departement" placeholder="département" class="form-control" value="<?php echo $row['departement'] ?>" required>
                                                <label class="col-sm-2 control-label">Salaire:</label>
                                                <input type="number" name="salaire" class="form-control" value="<?php echo $row['salaire'] ?>" required>
                                                <label class="col-sm-2 control-label">Fonction:</label>
                                                <input type="text" name="fonction" placeholder="fonction" class="form-control" value="<?php echo $row['fonction'] ?>" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <a href="php/update.php?id=<?php echo $row["id"]; ?>">
                                                    <input type="submit" value="Confirmer" class="btn btn-secondary" data-bs-dismiss="modal">
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Button trigger modal -->
                            <a role="button"><i class="fa fa-trash fa-2x" data-bs-toggle="modal" data-bs-target="#exampleModal1"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <P> Voulez-vous vraiment supprimer cet employé de la liste ?!! </P>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Annuler</button>
                                            <a href="php/delete.php?matricule=<?php echo $row["matricule"]; ?>" role="button"> <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Confirmer</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="d-grid gap-1 pt-4">
            <a href="/App_Gestion_Employees-/index.php">
                <button type="button" class="btn btn-info">
                    Ajouter un nouveau Employé</button>
            </a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>