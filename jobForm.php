<div class="row">
	<label class="col-form-label col-md-3 text-right" for="project_id">โครงการ  <span class="text-danger">*</span></label>
	<div class="col-md-6">
        <?php echo $project['project_name']; ?>
		<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="jobName">ชื่องาน  <span class="text-danger">*</span></label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="jobName" name="jobName" value="<?php echo $jobName; ?>" required="required" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="jobDetail">รายละเอียดงาน </label>
	<div class="col-md-6">
        <textarea class="form-control" id="jobDetail" name="jobDetail" rows="3"><?php echo $jobDetail; ?></textarea>
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="moneyPlan">งบประมาณที่วางแผน (บาท) </label>
	<div class="col-md-6">
		<input type="number" step="any" class="form-control" id="moneyPlan" name="moneyPlan" value="<?php echo $moneyPlan; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="moneyUse">งบประมาณที่ใช้จริง (บาท) </label>
	<div class="col-md-6">
		<input type="number" step="any" class="form-control" id="moneyUse" name="moneyUse" value="<?php echo $moneyUse; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="status">สถานะ</label>
	<div class="col-md-6">
        <?php  $statusList = array("0"=>"รอดำเนินการ", "1"=> "อยู่ระหว่างดำเนินการ", "2"=>"แล้วเสร็จ"); ?>
        <select class="form-control" name="status" id="status">
            <?php
                foreach($statusList AS $key=>$value){
                    $selected = $status==$key ? 'selected="selected"' : '';
                    echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                }
            ?>
        </select>
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="score">คะแนนงาน (เต็ม 5) </label>
	<div class="col-md-6">
		<input type="number" class="form-control" id="score" name="score" value="<?php echo $score; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="progress">ความคืบหน้า (%) </label>
	<div class="col-md-6">
		<input type="number" class="form-control" id="progress" name="progress" value="<?php echo $progress; ?>" >
	</div>
</div>

<div class="row">
	<label class="col-form-label col-md-3 text-right" for="personal_id">ผู้รับผิดชอบ </label>
	<div class="col-md-6">
        <select class="form-control" id="personal_id" name="personal_id">
            <option value="">-- เลือกผู้รับผิดชอบ --</option>
            <?php
                $sqlSelect="SELECT department_id, department_name FROM department";
                $result= mysqli_query($conn,$sqlSelect);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<optgroup label="'.$row['department_name'].'">';
                   
                    $sqlPersonal = "SELECT personal_id, name, lastname FROM personal WHERE department_id='".$row['department_id']."' AND userType=2";
                    $resultPersonal= mysqli_query($conn,$sqlPersonal);
                    while($row2=mysqli_fetch_assoc($resultPersonal)){
                        $selected = $personal_id==$row2['personal_id'] ? 'selected="selected"' : '';

                        echo '<option value="'.$row2['personal_id'].'" '.$selected.'>'.$row2['name'].' '.$row2['lastname'].'</option>';
                    }
                    echo '</optgroup>';
                }
            ?>
        </select>
		
	</div>
</div>

<hr>
