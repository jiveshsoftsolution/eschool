	
<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Online Exam</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/paper/paper/insert_paper" id="frm_add_class_section"class="nice" method="post" onsubmit="return validate_add_class_section();">
			   <h3>Online Exam</h3>             
                <div class="formRow">
					<div class="row">
						
						 
							<div class="three columns">
							  <label for="subject_id">Select Subject</label>
							  <select name="subject_id" id="subject_id" class="small">
								<option value="-1">Select Subject</option>
								<?php foreach($subject as $subjectData) {?>
							<option value="<?php echo $subjectData->subject_id ?>"><?php echo $subjectData->subject_name; ?></option>
							<?php } ?>
						</select>
								<span id="sp_subject_id" class="error">Select Subject.</span>
							</div>
                                            
                                             <div class="three columns">
								<label for="paper_name">Paper name</label>
								<input type="text" id="paper_name" name="paper_name" class="input-text small" placeholder="Paper name" />
								<span id="sp_exam_duration" class="error">Enter paper name.</span>
							</div>
							<div class="two columns" style="margin-top:28px">
								<input type="submit" class="button small" value="Submit">
							</div>
						
								
						
					</div>				 
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
						<p>Paper list</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($ems_paper['result'])&& ($ems_paper['result'])==0) { ?>
						<div class="alert-box info">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
<!--									<th>Class Section</th>-->
									<th>Paper</th>
									<th>Subject</th><!--
                                                                        <th>Paper</th>
                                                                        <th>No of Question</th>
                                                                        <th>Duration</th>
                                                                        <th>Date Time</th>-->
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($paper as $ems_paper_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
<!--                                                                        <td><?php echo $online_exam_paper_data->class_name;?> - <?php echo $online_exam_paper_data->section_name;?></td>-->
                                                                        <td><?php echo $ems_paper_data->paper_name;?></td>
									<td><?php echo $ems_paper_data->subject_name;?></td><!--
                                                                        <td><?php echo $online_exam_paper_data->paper_name;?></td>
                                                                         <td><?php echo $online_exam_paper_data->no_of_question;?></td>
									<td><?php echo $online_exam_paper_data->exam_duration;?></td>
									<td><?php echo $online_exam_paper_data->exam_date;?></td>-->
									<td class="content_actions">
										<a href="#" class="sepV_a" title="Edit">
										<img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>|<a href="<?php echo base_url()?>index.php/onlineexam/online_exam/add_online_question/<?php echo $ems_paper_data->paper_id;?>"> Add Question</a>
									</td>
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
