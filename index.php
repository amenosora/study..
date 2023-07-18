<?php session_start(); 
    include("connect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Project Based Management | Dynamic Web Programming</title>

    <?php include("link.php") ?>
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
                <h2>โครงการทั้งหมด</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <?php 
                             $sqlSelect="SELECT * FROM project pr,personal p WHERE pr.personal_id=p.personal_id AND p.personal_id='".$_SESSION['login']['personal_id']."'";
                             $result= mysqli_query($conn,$sqlSelect);
                             $numrow=mysqli_num_rows($result);
                        ?>
                        <div class="content">
                            <div class="text">จำนวนโครงการ</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $numrow; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <?php 
                            $sqlSelect="SELECT COUNT(j.personal_id) AS num FROM job j, project pr WHERE j.project_id=pr.project_id AND pr.personal_id='".$_SESSION['login']['personal_id']."' GROUP BY j.personal_id";
                             $result= mysqli_query($conn,$sqlSelect);
                             $numrow=mysqli_num_rows($result);
                        ?>
                        <div class="content">
                            <div class="text">จำนวนพนักงาน</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $numrow; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
          
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>สรุปความก้าวหน้าโครงการ</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                             <?php include("connect.php");        
                               $sqlSelect="SELECT pr.*, SUM(j.moneyPlan) AS mPlan, SUM(j.moneyUse) AS mUse, COUNT(j.job_id) AS numJob, SUM(progress)/100 AS sumPro FROM project pr LEFT JOIN job j ON pr.project_id=j.project_id WHERE pr.personal_id='".$_SESSION['login']['personal_id']."' GROUP BY pr.project_id";
                                $result= mysqli_query($conn,$sqlSelect);
                                $numrow=mysqli_num_rows($result);
                            ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-vertical-middle nomargin">
                                    <thead>
                                        <tr style="width:5%;">
                                            <th class="text-center">ลำดับ</th>
                                            <th>ชื่อโครงการ</th>
                                            <th>สิ้นสุดโครงการ</th>
                                            <th>ใช้จริง/วางแผน</th>
                                            <th>สถานะ</th>
                                            <th style="width: 8%;">ความคืบหน้า (%)</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $statuslist= array('-1' =>"ยกเลิกโครงการ" ,'0' =>"ยังไม่ดำเนินโครงการ" ,'1' =>"อยู่ระหว่างดำเนินการ" ,'2' =>"อยู่ระหว่างดำเนินการ");
                                        if($numrow>0){
                                            $i=1;
                                            while($row=mysqli_fetch_assoc($result)){ ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo ($i++); ?>
                                                    </td>
                                                    <td><?php echo $row['project_name']; ?></td>
                                                    <td><?php echo $row['endDate']; ?></td>
<td><?php echo number_format($row['mUse'])."/".number_format($row['mPlan']); ?> บาท</td>
                                                    <td><?php echo $statuslist[$row['status']]; ?></td>
<td>
    <div class="progress" style="width: 130px">
        <?php $per = $row['sumPro']/$row['numJob']*100; ?>
        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $per; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per; ?>%"><?php echo number_format($per); ?>%</div>
    </div>
</td>
                                                    <td class="text-center">
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
