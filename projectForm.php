
<div class="row">
	<label class="col-form-label col-md-3 text-right" for="project_name">ชื่อโครงการ  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo $project_name; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="detail">รายละเอียดงาน  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="detail" name="detail" value="<?php echo $detail ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="startDate">เริ่มต้นโครงการ </label>
	<div class="col-md-6">
		<input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $startDate; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="endDate">สิ้นสุดโครงการ </label>
	<div class="col-md-6">
		<input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $endDate; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="status">สถานะ </label>
    
	<div class="col-md-6">
        <select class="form-control" name="status" id="status" required="required" >
        <?php  
                $statuslist= array('-1' =>"ยกเลิกโครงการ" ,'0' =>"ยังไม่ดำเนินโครงการ" ,'1' =>"อยู่ระหว่างดำเนินการ" ,'2' =>"เสร็จสิ้นโครงการ");
                foreach($statuslist as $key => $value){
                    $selected = $status==$key ? 'selected="selected"' : '';
                    echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                }
        ?>
        </select>
	</div>
</div>

<hr>
