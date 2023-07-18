<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Project Based Management | Dynamic Web Programming</title>

    <?php include("link.php") ?>

    <script>
        function comfirmedit(){
            var x=confirm("ยืนยันแก้ไขข้อมูล");
        }
        function comfirmdelete(){
            var x=confirm("ต้องการลบข้อมูลนี้ใช่หรือไม่");
        }
    </script>
</head>

<body class="theme-black">

    <?php include("pageloader.php"); ?>
    
    <?php include("topbar.php"); ?>
   
    <?php 
        if($_SESSION["usertype"]==1){
            include("adminmenu.php");
         }else if ($_SESSION["usertype"]==2) {
            include("usermenu.php");
         } 
        ?>

    <?php include("script.php"); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>จัดการข้อมูลแผนก</h2>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <form name="form1" action="personalList.php" method="get" class="form-inline">
                                <label class="text-heading">ค้นหาข้อมูลบุคลากร</label>
                                <input type="text" class="form-control" name="search_personal" >
                                <button type="submit" class="btn btn-info"> ค้นหา</button>
                            </form>  
                            <button type="button" class="btn btn-success" onclick="location.href='personalCreate.php'" style="float:right">เพิ่มข้อมูล</button>
                        </div>
                        
                        <div class="body">
                            <?php include("connect.php");
                            $where="";
                                if(isset($_GET['search_personal'])){
                                    $where=" and (personal_id='".$_GET['search_personal']."' or name like '%".$_GET['search_personal']."%')";
                                }
                                $sqlSelect="SELECT * FROM personal p,department d WHERE p.department_id=d.department_id".$where;
                                $result= mysqli_query($conn,$sqlSelect);
                                $numrow=mysqli_num_rows($result);
                                echo         
                                    '<table class="table table-hover dashboard-task-infos" >
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสพนักงาน</th>
                                            <th>ชื่อแผนก</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>ระดับสิทธิ์</th>
                                            <th>จัดการ</th>
                                        </tr>';
                                if($numrow>0){
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>".$i++."</td>";
                                        echo "<td>".$row["personal_id"]."</td>";

                                     
                                        echo "<td>".$row["department_name"]."</td>";

                                        echo "<td>".$row["name"]."</td>";
                                        echo "<td>".$row["lastname"]."</td>";
                                        if($row["usertype"]==1){
                                            echo "<td>Admin(หัวหน้า)</td>";
                                        }else {
                                            echo "<td>User</td>";
                                        }
                                        echo "<td>".'<a href=personalEdit.php?personal_id='.$row["personal_id"].' class="btn btn-warning">แก้ไข</a>';
                                        echo ' <a href=personalDelete.php?personal_id='.$row["personal_id"].'  class="btn btn-danger" onclick="comfirmdelete();">ลบ</a>'."</td>";
                                        echo "</tr>";
                                    }
                                }else{
                                   echo "<tr><td colspan='7' align='center'>ไม่พบข้อมูล</td></tr>";
                                }	
                                    echo "</table>"; 
                              ?> 	

                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

</body>

</html>
