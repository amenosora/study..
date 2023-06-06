<?php
include("connect.php");
$department_name = $_POST['department_name'];

$department_id = isset($_POST['departmet_id'])?$_POST['department_id']: null;
if ($departmet_id){
    echo $updateSql = "UPDATE department SET department_name='".$department_name."' WHERE department_id='".$department_id."'";
    $excute = mysqli_query($conn,$updateSql);
    header("Location:departmentList.php");
}else{
    echo '<script>
    alert("Location:departmentList.php);
    </script>';
}
?>