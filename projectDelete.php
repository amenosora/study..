<?php
include("connect.php");
$project_id = isset($_GET['project_id']) ? $_GET['project_id'] : null;
if ($project_id){
    $deleteSql = "DELETE FROM project WHERE project_id='".$project_id."'";
    $excute = mysqli_query($conn, $deleteSql);
    if ($excute){
        echo ' <script>
        alert("ลบข้อมูลโครงการ สำเร็จ");
        window.location.href = "projectList.php";
        </script>';
    }else{
        echo '<script>
        alert("ลบข้อมูลโครงการ ไม่สำเร็จ กรุณาตรวจสอบ!!!");
        window.history.back();
        </script>';
    }
    }else{
        echo '<script>
        alert("ไม่พบข้อมูล กรุณาตรวจสอบ!!!");
        window.history.back();
        </script>';
    }
?>