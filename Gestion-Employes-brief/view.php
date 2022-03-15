<?php
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
<link href="https://cdn.jsdelivr.ne]t/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <title>Liste des Employés</title>
</head>

<body>

    <?php include './php/navbar.php'; ?>
    <div class="container">
        <div class="container-fluid">
            <br> <br>
            <form class="d-flex" form action="./view.php" method="post">
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="filrerColome">
                        <option selected disabled>Open this select menu</option>
                        <option value="Matricule">Matricule</option>
                        <option value=" Nom ">Nom</option>
                        <option value="Prénom  ">Prénom</option>
                        <option value=" Date de naissance ">Date de naissance</option>
                        <option value=" Salaire ">Salaire</option>
                        <option value="Département ">Département</option>
                        <option value=" Fonction ">Fonction</option>
                    </select>
                    <input class="form-control me-2" type="text" placeholder="Rechercher un employé" name="valueToSearch">
                    <input class="btn btn-info" type="submit" value="Search" name="Search">
                </div>
            </form>
        </div>

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
                            <a href="./php/update.php" class="m-2">
                                <i class="fa fa-edit fa-2x"></i>
                            </a>
                            <i class="fa fa-trash fa-2x red-icon" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $r['id']; ?>">
                            </i>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="d-grid gap-1 pt-4">
            <a href="/App_Gestion_Employees-/Gestion-Employes-brief/index.php">
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