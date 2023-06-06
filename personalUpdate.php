<?php
include("connect.php");
$department_id = $_POST['department_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$name= $_POST['name'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$tel = $_POST['tel'];
$userType = $_POST['userType'];

$personal_id = isset($_GET['personal_id']) ? $_GET ['personal_id'] : null;
if($personal_id){
    $updateSql = "UPDATE personal SET department_id='".$department_id."', username='".$username."',password='".$password."', name='".$name."', lastname='".$lastname."', gender='".$gender."', email='".$email."', phone='".$phone."', tel='".$tel."', userType='".$userType."' WHERE personal_id='".$personal_id."'";
    $excute = mysqli_query($conn, $updateSql);
    if ($excute){
        echo '<script>
        alert("ปรับปรุงข้อมูลพนักงาน สำเร็จ");
        window.location.href = "personalList.php";</script>';
    }else{
        echo '<script>
        alert("ปรับปรุงข้อมูลพนักงาน สำเร็จ");
        window.history.back();</script>';
       }
}else{
    echo '<script>
    alert("ไม่พบข้อมูล สำเร็จ");
    window.history.back();</script>';
}
?>