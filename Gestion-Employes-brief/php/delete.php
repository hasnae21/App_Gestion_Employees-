<?php 
require('connect.php');
$matricule = $_GET['matricule'];
$DelSql = " DELETE FROM `employes` WHERE matricule=$matricule";
$res = mysqli_query($connect, $DelSql);
header('Location: ../view.php');     