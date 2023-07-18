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

$job_id = isset($_GET['job_id']) ? $_GET['job_id'] : null;
if ($job_id){
    $updateSql = "UPDATE job SET project_id='".$project_id."', jobName='".$jobName."', jobDetail='".$jobDetail."', moneyPlan='".$moneyPlan."', moneyUse='".$moneyUse."', status='".$status."', score='".$score."', progress='".$progress."', personal_id='".$personal_id."' WHERE job_id='".$job_id."'";
    $excute = mysqli_query($conn, $updateSql);
    if ($excute){
        echo '<script>
        alert("ปรับปรุงข้อมูลงาน สำเร็จ");
        window.location.href = "jobList.php?project_id='.$project_id.'";
        </script>';
    }else{
    echo '<script>
        alert("ปรับปรุงข้อมูลงาน สำเร็จ");
        window.history.back();
        </script>';
    }
}else{
    echo '<script>
    alert("ไม่พบข้อมูล สำเร็จ");
    window.history.back();
    </script>';
}
?>