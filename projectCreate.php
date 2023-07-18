<?php session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>
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
         }elseif ($_SESSION["usertype"]==2) {
            include("usermenu.php");
         } 
        ?>

    <?php include("script.php"); 
        include("connect.php");
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>โครงการ</h2>
            </div>
            <div class="row clearfix">
                <!-- Task Info --> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            เพิ่มข้อมูลโครงการ
                        </div>
                        
                        <div class="body"> 
                            <div class="row">
                                <form name="projectAdd" class="col-12" action="projectInsert.php" method="POST" enctype="multipart/form-data">
                                    <?php 
                                        $username=null;
                                        $project_name=null;
                                    	$personal_id=null;
                                        $detail=null;
                                        $startDate=null;
                                        $status=0;
                                    include_once("projectForm.php"); ?>
                                    <div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-10 text-center">
                                            <button type="submit" class="btn btn-success"> บันทึก</button>
                                            <button type="reset" class="btn btn-secondary"> ล้างข้อมูล</button>
                                        </div>
                                    </div>
                                </form>
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