<?php 
require_once ('connect.php');
  $id = $_GET['id'];
  $DelSql = "DELETE FROM `employes` WHERE id=$id";
  $res = mysqli_query($connect, $DelSql);
  if ($res) {
    header("Location: /kako/Gestion-Employes-brief/view.php");
  }else{
    echo "Failed to delete";
  }
