<?php
include("connect.php");
$project_id = $_POST['project_id'];
$jobName = $_POST['jobName'];
$jobDetail = $_POST['jobDetail'];
$moneyPlan = $_POST['moneyPlan'];
$moneyUse = $_POST['moneyUse'];
$status = $_POST['status'];
$score = $_POST['score'];
$progress = $_POST['progress'];
$personal_id = $_POST['personal_id'];

$insertSql = "INSERT INTO job (project_id, jobName, jobDetail, moneyPlan, moneyUse, status, score, progress, personal_id) VALUES ('".$project_id."', '".$jobName."', '".$jobDetail."', '".$moneyPlan."', '".$moneyUse."', '".$status."' '".$score."', '".$progress."', '".$personal_id."')";
$excute = mysqli_query($conn, $insertSql);
if ($excute){
    $last_id = $conn->insert_id;
    header("locastion: jobList.php?project_id=".$project_id);
}else{
    echo '<script>
    alert("เพิ่มข้อมูลงาน ไม่สำเร็จ กรุณาตรวจสอบ!!!");
    window.history.back();
    </script>';
}
?>