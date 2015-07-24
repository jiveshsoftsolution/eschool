<script type="text/javascript">
   $(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Mark Sheet</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/exam/exam/insert_exam_marks" id="frm_add_exam_marks"class="nice" method="post" onsubmit="return validate_add_exam_marks();">
			   <h3>Mark Sheet</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						    <label for="session_id">Session</label>
							<select name="session_id" id="session_id" class="small">
								<option value="-1">Select Session</option>
								<?php foreach($session as $sessionData) {?>
								<option value="<?php echo $sessionData->session_id?>" <?php if(isset($session_id) && $sessionData->session_id==$session_id ) echo "selected='selected'";?>><?php echo $sessionData->session_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_session_id" class="error">Select Session Name.</span>
						</div>
						<div class="three columns">
						    <label for="class_section_id">Class Section</label>
							<select name="class_section_id" id="class_section_id" class="small">
								<option value="-1">Select Class Section</option>
								<?php foreach($class_section as $class_sectionData) {?>
								<option value="<?php echo $class_sectionData->class_section_id?>" <?php if(isset($class_section_id) && $class_sectionData->class_section_id==$class_section_id ) echo "selected='selected'";?>><?php echo $class_sectionData->class_name.' - '.$class_sectionData->section_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_class_section_id" class="error">Select Class Section.</span>
						</div>
						<div class="seven columns">
						    <label for="exam_id">Exam Type</label>
							<select name="exam_id" id="exam_id" class="small">
								<option value="-1">Select Exam Type</option>
								<?php foreach($exam as $examData) {?>
								<option value="<?php echo $examData->exam_id?>" <?php if(isset($exam_id)) echo "selected";?>><?php echo $examData->exam_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_exam_id" class="error">Select Exam.</span>
						</div>
					</div>
                </div>
				<div class="formRow cf">
					  <input type="submit" value="Submit" class="button small">
				</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	

	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="twelve columns">
                <div class="box_c">
					<div class="box_c_heading cf box_actions">
						<p>Student List</p>
					</div>
					<div class="box_c_content">
					<?php if((isset($studentlist['result']) && ($studentlist['result'])==0)) { ?>
					<div class="alert-box info">
							Record not found!
							<a href="javascript:void(0)" class="close">×</a>
					</div> 
					<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Roll no.</th>
									<th>Student Name</th>
									<th>Father Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($studentlist as $studentlistData) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $studentlistData->roll_number;?></td>
									<td><?php echo $studentlistData->first_name.' '.$studentlistData->middle_name.' '.$studentlistData->last_name?></td>
									<td><?php echo $studentlistData->father_first_name.' '.$studentlistData->father_middle_name.' '.$studentlistData->father_last_name?></td>
									<td class="content_actions"> 
										<a target="_parent" href="<?php echo base_url();?>index.php/exam/exam/add_student_marks/<?php echo $session_id;?>/<?php echo $class_section_id;?>/<?php echo $exam_id;?>/<?php echo $studentlistData->student_id;?>" class="fancybox gh_button small" id="fd1">Add Marksheet</a>
										<a target="_blank" href="<?php echo base_url();?>assets/marksheets/marksheet.pdf" class="gh_button small">View Marksheet</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					<?php } ?>
					</div>					
				</div>
            </div>
        </div>
      </div>
    </div>
</div>

