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
         }elseif ($_SESSION["usertype"]==2) {
            include("usermenu.php");
         } 
        ?>

    <?php include("script.php"); 
        include("connect.php");
        $sqlQuery = "SELECT * FROM project WHERE project_id='".$_GET['project_id']."' ";
        $query = mysqli_query($conn, $sqlQuery);
        $project=mysqli_fetch_assoc($query);
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <h2>รายงานความก้าวหน้างานที่รับผิดชอบ <?php echo $project['project_name']; ?></h2>
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                        </div>
                    <?php
                        $statusList = array("0"=>"รอดำเนินการ", "1"=> "อยู่ระหว่างดำเนินการ", "2"=>"แล้วเสร็จ");

                        $where ="";
                        if (isset($_GET['search_job'])){
                            $where = " AND (j.jobName LIKE '%".$_GET['search_job']."%' OR j.job_id='".$_GET['search_job']."')";
                        }

                        $sqlQuery = "SELECT * FROM job j, personal p, project pr WHERE j.personal_id=p.personal_id AND j.project_id=pr.project_id AND  p.personal_id='".$_SESSION['login']['personal_id']."'";
                        $query = mysqli_query($conn, $sqlQuery);
                    ?>
                        <div class="body">
                            <table class="table table-hover table-vertical-middle nomargin">
                                <thead>
                                    <tr style="width:5%;">
                                        <th class="text-center">ลำดับ</th>
                                        <th>ชื่องาน</th>
                                        <th>โครงการ</th>
                                        <th>งบประมาณที่วางแผน</th>
                                        <th>งบประมาณที่ใช้จริง</th>
                                        <th>สถานะ</th>
                                        <th>คะแนนงาน(เต็ม 5)</th>
                                        <th>ความคืบหน้า(%)</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                    while($row=mysqli_fetch_assoc($query)){ ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo ($i++); ?>
                                            </td>
                                            <td><?php echo $row['jobName']; ?></td>
                                            <td><?php echo $row['project_name']; ?></td>
                                            <td><?php echo number_format($row['moneyPlan']); ?></td>
                                            <td><?php echo number_format($row['moneyUse']); ?></td>
                                            <td><?php echo $statusList[$row['status']]; ?></td>
                                            <td><?php echo $row['score']; ?></td>
                                            <td><?php echo $row['progress']; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo 'userjobEdit.php?job_id='.$row['job_id']; ?>" class="btn btn-warning">แก้ไข </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

</body>

</html>