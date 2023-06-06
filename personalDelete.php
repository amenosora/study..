<?php
include("connect.php");
$personal_id = isset($_GET['personal_id']) ? $_GET['personal_id'] : null;
if ($personal_id){
    $deleteSdql = "DELETE FROM ersonal WHERE personal_id='".$personal_id."'";
    $excute = mysqli_query($conn, $deleteSdql);
    header("Location:personalList.php");
}else{
    echo '<script>
    alert("ไม่พบข้อมูล กรุณาตรวจสอบ!!!");
    window.location.href = "personalList.php";
    </script>';
}

?>