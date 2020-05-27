<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "library";
$conn = new mysqli($servername,$username,$password,$dbname);

$id_spis=$_POST['id_spis'];
$id_autor=$_POST['id_autor'];
$id_tytul=$_POST['id_tytul'];

$sql1 = "DELETE from spis where id_spis='$id_spis'";
$sql2 = "DELETE from autorzy where id_autor='$id_autor'";
$sql3 = "DELETE from tytuly where id_tytul='$id_tytul'";
$result=$conn->query($sql1);
$result=$conn->query($sql2);
$result=$conn->query($sql3);
header('location:http://127.0.0.1/php/library-bartek-saracen/index.php');
mysqli_close($conn);
?>