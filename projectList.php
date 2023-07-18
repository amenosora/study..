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
                <h2>จัดการข้อมูลโครงการ</h2>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <form name="form1" action="projectList.php" method="get" class="form-inline">
                                <label class="text-heading">ค้นหาข้อมูล</label>
                                <input type="text" class="form-control" name="search_project" >
                                <button type="submit" class="btn btn-info"> ค้นหา</button>
                            </form>  
                            <button type="button" class="btn btn-success" onclick="location.href='projectCreate.php'" style="float:right">เพิ่มข้อมูล</button>
                        </div>
                        
                        <div class="body">
                            <?php include("connect.php");
                            $where=" AND p.personal_id='".$_SESSION['login']['personal_id']."'";
                                if(isset($_GET['search_project'])){
                                    $where.=" and (project_id='".$_GET['search_project']."' or project_name like '%".$_GET['search_project']."%')";
                                }
                               $sqlSelect="SELECT * FROM project pr,personal p WHERE pr.personal_id=p.personal_id".$where;
                                $result= mysqli_query($conn,$sqlSelect);
                                $numrow=mysqli_num_rows($result);
                            ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-vertical-middle nomargin">
                                    <thead>
                                        <tr style="width:5%;">
                                            <th class="text-center">ลำดับ</th>
                                            <th>รหัสโครงการ</th>
                                            <th>เจ้าของโครงการ</th>
                                            <th>ชื่อโครงการ</th>
                                            <th>เริ่มต้นโครงการ</th>
                                            <th>สิ้นสุดโครงการ</th>
                                            <th>สถานะ</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $statuslist= array('-1' =>"ยกเลิกโครงการ" ,'0' =>"ยังไม่ดำเนินโครงการ" ,'1' =>"อยู่ระหว่างดำเนินการ" ,'2' =>"เสร็จสิ้นโครงการ");
                                        if($numrow>0){
                                            $i=1;
                                            while($row=mysqli_fetch_assoc($result)){ ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo ($i++); ?>
                                                    </td>
                                                    <td><?php echo $row['project_id']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['project_name']; ?></td>
                                                    <td><?php echo $row['startDate']; ?></td>
                                                    <td><?php echo $row['endDate']; ?></td>
                                                    <td><?php echo $statuslist[$row['status']]; ?></td><td class="text-center">
                                                        <a href="<?php echo 'projectEdit.php?project_id='.$row['project_id']; ?>" class="btn btn-warning "> แก้ไข </a>
                                                        <a href="<?php echo 'jobList.php?project_id='.$row['project_id']; ?>" class="btn btn-info">ดูงาน </a>
                                                    </td>
                                                </tr>
                                        <?php } 
                                        }else { ?>
                                           <tr><td colspan='7' align='center'>ไม่พบข้อมูล</td></tr>
                                           
                                 <?php }?>
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

</body>

</html>
