<?php 
require("conn.php");
require("check.php");
$email=mysqli_real_escape_string($con,$_POST['userName']);
$pass=mysqli_real_escape_string($con,$_POST['password']);
if(is_numeric($email)){
    $sql="SELECT * FROM student where id='$email' and pass='$pass'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($res)==0){
        header("location:index.php?err=1");
    }else{
        session_start();
        $row=mysqli_fetch_array($res);
        $_SESSION['id']=$row['id'];
        $_SESSION['status']='student';
        header("location:stud_index.php");
    }
}else{
    $sql="SELECT * FROM teacher where email='$email' and pass='$pass'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($res)==0){
        header("location:index.php?err=1");
    }else{
        session_start();
        $row=mysqli_fetch_array($res);
        $_SESSION['id']=$row['User_ID'];
        $_SESSION['status']='teacher';
        header("location:./admin/index.html");
    }
}
?>