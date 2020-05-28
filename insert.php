<?php
require('connect.php');
$sql1 = "INSERT INTO `autorzy`(`id_autor`, `Imie`, `Nazwisko`) VALUES (NULL,'".$_POST['imie']."','".$_POST['nazwisko']."')";
$sql2 = "INSERT INTO `tytuly`(`id_tytul`, `tytul`, `ISBN`) VALUES (NULL,'".$_POST['tytul']."','".$_POST['isbn']."')";
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);
mysqli_close($conn);
header('location:http://127.0.0.1/php/library-bartek-saracen/index.php');
?>