<?php
require("./../conn.php");
session_start();
if(!isset($_SESSION['id']) and $_SESSION['status']!="teacher"){
    header("location:./../index.php");
}
$id=$_POST['id'];
$res=mysqli_query($con,"UPDATE `exam` SET `status` = 'finished' WHERE `exam`.`id` = '$id'") or die(mysqli_error($con));

?>