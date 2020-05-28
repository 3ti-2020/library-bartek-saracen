<?php
require('connect.php');
$sql="INSERT INTO `spis`(`id_spis`, `id_autor`, `id_tytul`) VALUES (NULL,'".$_POST['idautor']."','".$_POST['idtytul']."')";
mysqli_query($conn,$sql);
mysqli_close($conn);
header('location:http://127.0.0.1/php/library-bartek-saracen/index.php');
?>