<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
$n_id=$_SESSION['id'];
$attr=$_POST['update'];
$val=$_POST['val'];

if (isset($_FILES['pdf_file']['name']))
{
  $file_name = $_FILES['pdf_file']['name'];
  $file_tmp = $_FILES['pdf_file']['tmp_name'];

  move_uploaded_file($file_tmp,"HOI/rfc/".$file_name);

  $insertquery =
  "INSERT INTO `rfc` ( `value`, `p_id`, `attr`, `file`, `status`, `pos`) VALUES ('$val', '$n_id', '$attr', '$file_name', 'pending','student')";
  $iquery = mysqli_query($con, $insertquery) or die(mysqli_error($con));
}else{
    echo "Not Submitted";
}
header("location:stud_rfc.php");
?>