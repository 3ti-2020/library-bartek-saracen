<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "library";
$conn = new mysqli($servername,$username,$password,$dbname);
$sql = "DELETE from spis where id_spis='".$_POST['id_spis']."'";
$result=$conn->query($sql);
header('location:http://127.0.0.1/php/library-bartek-saracen/index.php');
mysqli_close($conn);
?>