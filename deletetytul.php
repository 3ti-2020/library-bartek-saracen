<?php
require('connect.php');
$sql="DELETE FROM `tytuly` WHERE id_tytul='".$_POST['idtytul']."'";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>