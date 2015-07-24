	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add optional paper</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/paper/paper/insert_optional_paper" id="frm_add_fee_setting" class="nice" method="post" onsubmit="return validate_fee_setting();">
			   <h3>Add optional paper</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						    <label for="session_id">Session</label>
							<select name="session_id" id="session_id" class="small">
								<option value="-1">Select Session</option>
								<?php foreach($session as $sessionData) {?>
								<option value="<?php echo $sessionData->session_id?>"><?php echo $sessionData->session_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_session_id" class="error">Select Session.</span>
						</div>
						<div class="three columns">
						    <label for="class_section_id">Class Section</label>
							<select name="class_section_id" id="class_section_id" class="small">
								<option value="-1">Select Class Section</option>
								<?php foreach($class_section as $class_SectionData) {?>
								<option value="<?php echo $class_SectionData->class_section_id?>"><?php echo $class_SectionData->class_name.' - '.$class_SectionData->section_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_fee_type_name" class="error">Select Fee Type.</span>
						</div>
						<div class="three columns">
						    <label for="student_id">Student Name</label>
							<select name="student_id" id="student_id" class="small">
								<option value="-1">Select Student</option>
								<?php foreach($student as $studentData) {?>
								<option value="<?php echo $studentData->student_id?>"><?php echo $studentData->first_name.' '.$studentData->middle_name.''.$studentData->middle_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_fee_type_name" class="error">Select paper</span>
						</div>
						
					</div>
                </div>
				<div class="formRow">
					<div class="row"> 
						<label for="paper"><strong>Paper</strong></label><br>
						<?php foreach($paper as $paperData) { 
						 if($paperData->paper_id!=12)
						 {
						?>
						<div class="three columns">
						  <input type="checkbox" name="paper[]" id="paper_<?php echo $paperData->paper_id?>" value="<?php echo $paperData->paper_id?>">
						  <label for="paper_<?php echo $paperData->paper_id?>"><?php echo $paperData->paper_name?></label><br>
						</div>
						<?php } else {?>
						<div class="three columns" style="left:-71px">
						  <input type="checkbox" name="paper[]" id="month_<?php echo $monthData->paper_id?>" value="<?php echo $paperData->paper_id?>">
						  <label for="month_<?php echo $paperData->paper_id?>"><?php echo $paperData->paper_name?></label><br>
						</div>
						<?php } } ?>						
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
 
<!--	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="twelve columns">
                <div class="box_c">
					<div class="box_c_heading cf box_actions">
						<p>Optional paper List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($fee_setting['result'])&& ($fee_setting['result'])==0) { ?>
						<div class="alert-box info">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Fee Type</th>
									<th>Amount</th>
									<th>Class Section</th>
									<th>Session</th>
									<th>Month</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($optional_paper_data as $fee_settingData) {?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $fee_settingData['class_name'];?></td>
									<td><?php echo $fee_settingData['paper_name'];?></td>
									<td><?php foreach($fee_settingData['class_section'] as $fee_class_section) { foreach($fee_class_section  as $class_section_name){ echo $class_section_name['class_section_name'].', ';} }?></td>
									<td><?php echo $fee_settingData['session_name'];?></td>
									<td><?php echo implode(',',$fee_settingData['month_name'])?></td>
									<td class="content_actions">
										<a  href="<?php echo base_url();?>index.php/fee/fee/<?php echo $fee_settingData['amount_id'];?>/edit" class="sepV_a" title="Edit">
										<img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
										<a title="Delete" href="#"><img alt="" src="<?php echo base_url()?>assets/assets/img/ico/trashcan_gray.png"></a>
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
</div>-->
