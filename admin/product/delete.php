<?php

$Id = $_GET['ID'];
include 'Config.php';
mysqli_query($con, "DELETE FROM `tblproduct` WHERE Id = $Id");
header("location:index.php");
?>