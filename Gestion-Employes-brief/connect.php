<?php

$conn = mysqli_connect("localhost", "root", '',"sql");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
echo "Connected successfully";

//$con = mysqli_connect('localhost', 'root', '');
//if (!$con) { die("database connection failed" . mysqli_error($con)); }
//$select_db = mysqli_select_db($con, 'sql'); if (!$select_db) { die("database selected failed" . mysqli_error($con)); }