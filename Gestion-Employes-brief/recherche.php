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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style1.css">
    <title>Rechercher un Employé</title>
</head>

<body>

    <?php include './php/navbar.php'; ?>
    <div class="container">
        <div class="container-fluid">
            <br> <br>
            <form class="d-flex" form action="./view.php" method="post">
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="filrerColome">
                        <option selected disabled>Selectioner un filter</option>
                        <option value="Matricule">Matricule</option>
                        <option value=" Nom ">Nom</option>
                        <option value="Prenom  ">Prénom</option>
                        <option value=" Date de naissance ">Date de naissance</option>
                        <option value=" Salaire ">Salaire</option>
                        <option value="Departement ">Département</option>
                        <option value=" Fonction ">Fonction</option>
                    </select>
                    <input class="form-control me-2" type="text" placeholder="Rechercher par filter" name="valueToSearch">
                    <input class="btn btn-info" type="submit" value="Search" name="Search">
                </div>
            </form>
        </div>

        <!-- filter -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>