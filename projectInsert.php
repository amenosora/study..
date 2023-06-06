<?php
session_start();
include("connect.php");
$personal_id = $_SESSION['login']['personal_id'];
$project_name =$_POST['project_name'];
$detail = $_POST['detail'];
$startDate = $_POST['startDate'];
$endData = $_POST['endDate'];
$status = $_POST['status'];

$insertSql = "INSERT INTO project (personal_id, project_name, detail, startDate, endDate, status) VALUES ('".$personal_id."', '".$project_name."', '".$detail."', '".$startDate."', '".$endDate."', '".$status."')";
$excute = mysqli_query($conn, $insertSql);
if($excute){
    $last_id = $conn->insert_id;
    header("Location:jobList.php?project_id=".$last_id);
}else{
    echo '<script>
    alert("เพิ่มข้อมูลโครงการ ไม่สำเร็จ กรุณาตรวจสอบ!!!");
    window.history.back();
    </script>';
}
?>