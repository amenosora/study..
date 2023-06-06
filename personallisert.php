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

$insertSql = "INSERT INTO personal (department_id, username, password, name, lastname, gender, email, phone, tel,userType, eventDate) VALUES ('".$department_id."', '".$username."', '".$password."', '".$name."', '".$lastname."','".$gender."', '".$email."', '".$phone."', '".$tel."','".$userType."', '".$eventDate."')";
$excute = mysqli_query($conn, $insertSql);
if($excute){
    $last_id = $conn->insert_id;
    header("location:personalList.php");
}else{
    echo '<script>
    alert("เพิ่มข้อมูลพนักงาน ไม่สำเร็จ กรุณาตรวจสอบ!!!");
    window.history.back();
    </script>';
}