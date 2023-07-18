<?php
session_start();
include("connect.php");
$personal_id = $_SESSION['login']['personal_id'];
$detail = $_POST['detail'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$status = $_POST['status'];
$project_id = isset($_POST['project_id']) ? $_POST['project_id'] : null;
if($project_id){
    $updateSql = "UPDATE project SET personal_id='".$personal_id."', detail='".$detail."',startDate='".$startDate."', endDate='".$endDate."', status='".$status."' WHERE project_id='".$project_id."'";
    $excute = mysqli_query($conn, $updateSql);
    if ($excute){
        echo '<script>
        alert("ปรับปรุงข้อมูลพนักงาน สำเร็จ");
        window.location.href = "projectList.php";</script>';
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