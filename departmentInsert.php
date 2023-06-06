<?php
include("connect.php");
$department_name = $_POST['department_name'];

$insertSql = "INSERT INTO department (department_name) VALUES ('".$department_name."')";
$excute = mysqli_query($conn,$insertSql);
if($excute){
    $last_id = $conn->insert_id;
    header("Location:departmentList.php");
}else{
    echo '<script>
    alert("เพิ่มข้อมูล department ไม่สำเร็จ กรุณาตรวจสอบ!!!");
    window.history.back();
    </script>';
}
?>