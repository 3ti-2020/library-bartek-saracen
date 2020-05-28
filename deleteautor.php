<?php
require('connect.php');
$sql="DELETE FROM `autorzy` WHERE id_autor='".$_POST['idautor']."'";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>