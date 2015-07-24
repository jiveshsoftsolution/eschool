<div class="nine columns">
	<div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Online Exam</p>
            </div>
				<div class="box_c_content">
				  <form action="<?php echo base_url()?>index.php/onlineexam/online_exam/get_question_answer_list" id="frm_add_class_section"class="nice" method="post" onsubmit="return validate_add_class_section();">
				   <h3>Online Exam</h3>             
					<div class="formRow">
						<div class="row">
							<div class="three columns">
								<label for="class_section_id">Select Class Section</label>
								<select name="class_section_id" id="class_section_id" >
									<option value="-1">Select Class Section</option>
									<?php foreach($classSection as $classSectonData) {?>
									<option value="<?php echo $classSectonData->class_section_id ?>" <?php if(isset($class_section_id) && $class_section_id==$classSectonData->class_section_id) echo "selected='selected'"?>><?php echo $classSectonData->class_name.' - '.$classSectonData->section_name; ?></option>
									<?php } ?>
								</select>
								<span id="sp_class_section_id" class="error">Select Class Section</span>
							</div>
							<div class="three columns">
								<label for="subject_id">Select Subject</label>
								<select name="subject_id" id="subject_id" class="small">
									<option value="-1">Select Subject</option>
									<?php foreach($subject as $subjectData) {?>
									<option value="<?php echo $subjectData->subject_id ?>" <?php if(isset($subject_id) && $subject_id==$subjectData->subject_id) echo "selected='selected'" ?>><?php echo $subjectData->subject_name; ?></option>
								<?php } ?>
								</select>
								<span id="sp_subject_id" class="error">Select Subject.</span>
							</div>
							<div class="three columns">
								<label for="paper_id">Select Paper</label>
								<select name="paper_id" id="paper_id" class="small">
									<option value="-1">Select Paper</option>
									<?php foreach($paper as $paperData) {?>
									<option value="<?php echo $paperData->paper_id ?>" <?php if(isset($paper_id) && $paper_id==$paperData->paper_id) echo "selected='selected'"?>><?php echo $paperData->paper_name; ?></option>
									<?php } ?>
								</select>
								<span id="sp_paper_id" class="error">Select Paper.</span>
							</div>
							<div class="four columns">
								<label for="exam_period_id">Exam </label>
								<select name="exam_period_id" id="exam_period_id" class="small">
									<option value="-1">Select Exam </option>
									<?php foreach($examperiod as $examData) {?>
									<option value="<?php echo $examData->exam_period_id ?>" <?php if(isset($exam_period_id) && $exam_period_id==$examData->exam_period_id) echo "selected='selected'"?>><?php echo $examData->exam_name; ?></option>
									<?php } ?>
								</select>
								<span id="sp_exam_period_id" class="error">Select Exam .</span>
							</div>
						</div>				 
					</div>		
					<div class="formRow cf">
					  <input type="submit" class="button small" value="Submit">
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
						<p>Question Answer List</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($question_answer_list['result'])&& ($question_answer_list['result'])==0) || count($question_answer_list)==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display" id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Question</th>
									<th>Option A</th>
									<th>Option B</th>
									<th>Option C</th>
									<th>Option D</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($question_answer_list as $question_answerData) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $question_answerData->question?></td>
									<td <?php if($question_answerData->correct_ans=='A') echo "style='background-color:#05DA15;color:#FFF;font-weight:600;'";?>><?php echo $question_answerData->answer_a;?></td>
									<td <?php if($question_answerData->correct_ans=='B') echo "style='background-color:#05DA15;color:#FFF;font-weight:600;'";?>><?php echo $question_answerData->answer_b;?></td>
									<td <?php if($question_answerData->correct_ans=='C') echo "style='background-color:#05DA15;color:#FFF;font-weight:600;'";?>><?php echo $question_answerData->answer_c;?></td>
									<td <?php if($question_answerData->correct_ans=='D') echo "style='background-color:#05DA15;color:#FFF;font-weight:600;'";?>><?php echo $question_answerData->answer_d;?></td>
									<td class="content_actions">
									<a href="<?php echo base_url()?>index.php/onlineexam/online_exam/question_answer_edit/<?php echo $question_answerData->que_no?>" class="sepV_a" title="Edit"><img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
									<a href="#" title="Delete"><img src="<?php echo base_url()?>assets/assets/img/ico/trashcan_gray.png" alt="" /></a></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
						<?php }?>
					</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
