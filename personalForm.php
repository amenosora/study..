<div class="row">
	<label class="col-form-label col-md-3 text-right" for="department_id">แผนก  <span class="text-danger">*</span></label>

	<div class="col-md-6">
	<select class="form-control" name="department_id" id="department_id" required="required" >

<?php  
		$sqlSelect1="SELECT * FROM department"; 
		$result1= mysqli_query($conn,$sqlSelect1);
		while($row=mysqli_fetch_assoc($result1)){
			$selected = $department_id==$row['department_id'] ? 'selected="selected"' : '';
			echo '<option value='.$row['department_id'].' '.$selected.'>'.$row['department_name'].'</option>';
		}
?>
</select></div>
	
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="username">ชื่อผู้ใช้  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="password">รหัสผ่าน  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="name">ชื่อ  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="lastname">นามสกุล  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="gender">เพศ<span class="text-danger">*</span></label>
	<div class="col-md-6">
		<select class="form-control" name="gender" id="gender" required="required" >
		<?php  
			$sexlist= array('1' =>"ชาย" ,'2' =>"หญิง" );
			foreach($sexlist as $key => $value){
				$selected = $gender==$key ? 'selected="selected"' : '';
				echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
			}
	?>
		</select>
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="email">อีเมล </label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="phone">เบอร์มือถือ  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="tel">เบอร์ภายใน </label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="tel" name="tel" value="<?php echo $tel; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="userType">สิทธิ์การใช้ระบบ <span class="text-danger">*</span></label>
	<div class="col-md-6 demo-radio-button">
		<input type="radio" name="userType" id="userTypeadmin" value="1" <?php echo $userType=='1'? "checked":""; ?>>
		<label for="userTypeadmin">
			: Admin (หัวหน้า) 
		</label>

		<input type="radio" name="userType" id="userTypeuser" value="2" <?php echo $userType=='2'? "checked":""; ?>>
		<label for="userTypeuser">
			: User (พนักงาน)
		</label>
	</div>
</div>

