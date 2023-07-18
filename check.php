<?php
session_start();

include("connect.php");
$sql="SELECT * FROM personal
WHERE username='".$_POST['username']."'AND password='".$_POST['password']."'";
echo $sql;
$result=mysqli_query($conn,$sql);
$numrow=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
if($numrow==0){
    echo 'เข้าระบบไม่ได้';
    header("Location:login.php");
}else{
    if($row['usertype']==1){
        echo 'เข้าระบบสำเร็จ';
        header("Location:index.php");
    }elseif($row['usertype']==2){
        echo 'เข้าระบบสำเร็จ';
        header("Location:userjobList.php");
    }
}
$_SESSION['login']=$row;
$_SESSION['name']=$row['name'];
$_SESSION['usertype']=$row['usertype'];
?>