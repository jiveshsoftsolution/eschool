<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="twelve columns">
                <div class="box_c">
					<div class="box_c_heading cf box_actions">
						<p>Student Marks</p>
					</div>
					<div class="box_c_content">
						<form action="<?php echo base_url()?>index.php/exam/exam/submit_student_marks" id="frm_add_exam"class="nice" method="post" onsubmit="return validate_add_exam();">
							<h3>Add Exam</h3>             
							<div class="formRow">
								<?php foreach($paper_data as $paperData) { ?>
								<div class="row">
									<div class="four columns">
										<label for="txt_<?php echo $paperData->paper_id;?>"><?php echo $paperData->paper_name;?></label>
										<input type="text" name="txt_<?php echo $paperData->paper_id;?>"  id="txt_<?php echo $paperData->paper_id;?>" class="input-text small" />
									</div>
								</div>	
								<?php } ?>
								<input type="hidden" name="hd_student_id" class="input-text small" value="<?php echo $student_id;?>" />
								<input type="hidden" name="hd_session_id" class="input-text small" value="<?php echo $session_id;?>" />
								<input type="hidden" name="hd_class_section_id" class="input-text small" value="<?php echo $class_section_id;?>" />
								<input type="hidden" name="hd_exam_period_id" class="input-text small" value="<?php echo $exam_period_id;?>" />
							</div>
							<div class="formRow">
								<div class="four columns">
									<input type="submit" class="button small" value="Submit">
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
	