	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Search Student</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/student/student/student_list" class="nice" method="post" onsubmit="return validate_student_registration();">
			   <h3>List By</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="class_section_id">Select Class Section</label>
						  <select name="class_section_id" id="class_section_id" class="small">
							<option value="-1">Select Class Section</option>
							<?php foreach($classSecton as $classSectonData) {?>
							<option value="<?php echo $classSectonData->class_section_id?>" <?php if($selected_classsecton==$classSectonData->class_section_id) echo "selected='selected'";?>><?php echo $classSectonData->class_name.' - '.$classSectonData->section_name?></option>
							<?php  } ?>
						</select>
						<span id="sp_class_section_id" class="error">Select Class Section.</span>
						</div>
						<div class="eight columns">
						  <label for="session_id">Select Session</label>
						  <select name="session_id" id="session_id" class="small">
							<option value="-1">Select Session</option>
							<?php foreach($session as $sessionData) {?>
							<option value="<?php echo $sessionData->session_id?>" <?php if($selected_session==$sessionData->session_id) echo "selected='selected'";?>><?php echo $sessionData->session_name;?></option>
							<?php  } ?>
						  </select>
						  <span id="sp_session_id" class="error">Select Session.</span>
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
						<p>Students List</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($studentlist['result'])&& ($studentlist['result'])==0) || count($studentlist)==0) { ?>
						<div class="alert-box info">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Student Name</th>
									<th>Father Name</th>
									<th>Mother Name</th>
									<th>DOB</th>
									<th>Student Photo</th>
									<th>Father Photo</th>
									<th>Mother Photo</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($studentlist as $student_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $student_data->first_name.' '.$student_data->middle_name.' '.$student_data->last_name;?></td>
									<td><?php echo $student_data->father_first_name.' '.$student_data->father_middle_name.' '.$student_data->father_last_name;?></td>
									<td><?php echo $student_data->mother_first_name.' '.$student_data->mother_middle_name.' '.$student_data->mother_last_name;?></td>
									<td><?php echo date('d-m-Y',strtotime($student_data->dob));?></td>
									<td align="center"><img src="<?php if(count($student_data->photo_url)==0 || empty($student_data->photo_url)) echo base_url().'assets/assets/img/no_image.gif'; else echo base_url().'assets/students_images/'.$student_data->photo_url;?>" class="pic"></td>
									<td align="center"><img src="<?php if(count($student_data->father_photo_url)==0 || empty($student_data->father_photo_url)) echo base_url().'assets/assets/img/no_image.gif'; else echo base_url().'assets/parents_images/'.$student_data->father_photo_url;?>" class="pic"></td>
									<td align="center"><img src="<?php if(count($student_data->mother_photo_url)==0 || empty($student_data->mother_photo_url)) echo base_url().'assets/assets/img/no_image.gif'; else echo base_url().'assets/parents_images/'.$student_data->mother_photo_url;?>" class="pic"></td>
									<td class="content_actions">
									<a href="<?php echo base_url()?>index.php/student/student/student_edit/<?php echo $student_data->student_id?>" class="sepV_a" title="Edit"><img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
									<a href="#" title="Delete"><img src="<?php echo base_url()?>assets/assets/img/ico/trashcan_gray.png" alt="" /></a></td>
								</tr>
							<?php } ?>
							<?php } ?>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
