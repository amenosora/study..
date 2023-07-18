<?php
include("connect.php");
$department_id = isset($_GET['id']) ? $_GET['id'] : null;
if ($department_id){
    $deleteSql = "DELETE FROM department WHERE department_id='".$department_id."'";
    $excute = mysqli_query($conn, $deleteSql);
    header("Location:departmentList.php");
}else{
    echo '<script>
    alert("ไม่พบข้อมูล กรุณาตรวจสอบ!!!");
    window.location.href = "departmentList.php";
    </script>';
}

?>