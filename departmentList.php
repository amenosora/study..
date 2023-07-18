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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>ข้อมูลแผนก</h2>
                        </div>
                        <div class="body">
                            <?php include("connect.php");
                                $sqlSelect1="SELECT * FROM department";
                                $result= mysqli_query($conn,$sqlSelect1);
                                echo         
                                    '<table class="table table-hover dashboard-task-infos" >
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสแผนก</th>
                                            <th>ชื่อแผนก</th>
                                            <th>จัดการ</th>
                                        </tr>';
                                        $i=1;
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>".$i++."</td>";
                                        echo "<td>".$row["department_id"]."</td>";
                                        echo "<td>".$row["department_name"]."</td>";
                                        echo "<td>".'<a href=departmentList.php?id='.$row["department_id"].' class="btn btn-warning">แก้ไข</a>';
                                        echo ' <a href=departmentDelete.php?id='.$row["department_id"].'  class="btn btn-danger" onclick="comfirmdelete();">ลบ</a>'."</td>";
                                        echo "</tr>";
                                    }	
                                    echo "</table>"; 
                              ?> 	

                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">

                    <?php if(isset($_GET['id'])){ 
                        $sqlSelect2="select*from department where department_id=".$_GET['id'];
                        $result2= mysqli_query($conn,$sqlSelect2);
                        $row2=mysqli_fetch_assoc($result2)
                        ?>
                        <div class="header">
                            <h2>แก้ไขข้อมูลแผนก</h2>
                        </div>
                        <div class="body">
                            <form name="form1" action="departmentUpdate.php" method="post">
                                <label class="text-heading">รหัสแผนก</label>
                                <input type="text" class="form-control" name="department_id" value="<?php echo $row2['department_id']?>" readonly>
                                <label class="text-heading">ชื่อแผนก</label>
                                <input type="text" class="form-control" name="department_name" value="<?php echo $row2['department_name']?>"><br>
                                <button type="submit" class="btn btn-warning" onclick="comfirmedit();"> แก้ไขข้อมูล</button>
                            </form>  
                        </div>
                    <?php } else{  ?>
                        <div class="header">
                            <h2>เพิ่มข้อมูลแผนก</h2>
                        </div>
                        <div class="body">
                            <form name="form2" action="departmentInsert.php" method="post">
                                <label class="text-heading">ชื่อแผนก</label>
                                <input type="text" class="form-control" name="department_name"><br>
                                <button type="submit" class="btn btn-success"> เพิ่มข้อมูล</button>
                            </form>  
                        </div>


                    
                    <?php   }   ?>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

</body>

</html>
