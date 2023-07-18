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
        if($_SESSION["userType"]==1){
            include("adminmenu.php");
         }elseif ($_SESSION["usertype"]==2) {
            include("usermenu.php");
         } 
        ?>

    <?php include("script.php"); ?>

	<?php include("connect.php");
                                
        $sqlQuery = "SELECT * FROM personal WHERE personal_id='".$_GET['personal_id']."'";
        $query = mysqli_query($conn, $sqlQuery);
		$row=mysqli_fetch_assoc($query);
        
        $personal_id=$row['personal_id'];
		$department_id=$row['department_id'];
        $username=$row['username'];
        $password=$row['password'];
        $name=$row['name'];
        $lastname=$row['lastname'];
        $gender=$row['gender'];
        $email=$row['email'];
        $phone=$row['phone'];
        $tel=$row['tel'];
        $userType=$row['usertype'];							
	?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>บุคลากร</h2>
            </div>
            <div class="row clearfix">
                <!-- Task Info --> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            แก้ไขข้อมูลบุคลากร
                        </div>
                        <div class="body"> 
                            <div class="row">
                            <form name="personalUpdate" class="col-12" action="personalUpdate.php?personal_id=<?php echo  $personal_id; ?>" method="POST" enctype="multipart/form-data">
                                <?php include_once("personalForm.php"); ?>
                                <div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-10 text-center">
                                        <button type="submit" class="btn btn-warning"> แก้ไข</button>
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
