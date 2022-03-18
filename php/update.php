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

    $UpdateSql = "UPDATE employes SET matricule='$matricule',nom='$nom', prenom='$prenom', date_naissance='$date_naissance',departement='$departement', salaire='$salaire', fonction='$fonction' WHERE id=$id ";

    $res= mysqli_query($connect, $UpdateSql);
    if ($res) {
        header("Location: /App_Gestion_Employees-/view.php");
    } else {
        $erreur = "la mise à jour a échoué.";
    }
}