<?php
require("./../conn.php");
session_start();
$n_id=$_SESSION['id'];
$cp=$_POST['curr'];
$np=$_POST['new'];
$res=mysqli_query($con,"SELECT * from teacher where id='$n_id' and pass='$cp'") or die(mysqli_error($con));
if(mysqli_num_rows($res)==0){
    echo 0;
}else{
    $res=mysqli_query($con,"UPDATE `teacher` SET `pass` = '$np' WHERE `teacher`.`id` = '$n_id'") or die(mysqli_error($con));
    echo 1;
}
?>