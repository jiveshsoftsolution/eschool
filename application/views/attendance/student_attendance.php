<div class="nine columns">
  <div class="row">
	<div class="twelve columns">
	  <div class="box_c">
		<div class="box_c_heading cf red">
		  <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
		  <p>Student Attendace</p>
		</div>
		<div class="box_c_content">
		  <form action="<?php echo base_url()?>index.php/student/student_attendance/get_attendance" id="frm_student_attendance_view" class="nice" method="post" onsubmit="return validate_add_exam_marks();">
		   <h3>Student Attendace</h3>             
			<div class="formRow">
				<div class="row">
					<div class="three columns">
						<label for="session_id">Class Section</label>
						<select id="session_id" name="session_id" class="small">
						<option  value="0">Select Session </option>
						<?php foreach($session as $sRow) {?>						
						<option <?php if($sRow->session_id == $session_id) echo"selected='selected'"?> value="<?php echo $sRow->session_id; ?>"> <?php echo $sRow->session_name; ?> </option>
						<?php } ?>
					  </select>
						<span id="sp_session_id" class="error">Select Class Section.</span>
					</div>
					<div class="three columns">
						<label for="class_section_id">Class Section</label>
						 <select id="class_section_id" name="class_section_id" class="small">
						<option  value="0">Select Class Section </option>
						<?php foreach($classSecton as $csRow) {?>
						<option <?php if($csRow->class_section_id == $class_section_id) echo"selected='selected'"?>   value="<?php echo $csRow->class_section_id; ?>"><?php echo $csRow->class_name .'-'. $csRow->section_name ?> </option>
						<?php } ?>
					  </select>
						<span id="sp_class_section_id" class="error">Select Class Section.</span>
					</div>
					<div class="seven columns" style="margin-top:30px">
						<input type="submit" value="Submit" class="button small">
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
						<p>Student List</p>
					</div>
					<div class="box_c_content">
					<?php if(isset($studentListForSendSms['status']) || count($studentListForSendSms)==0) 
						{ 
						?>
						<div class="alert-box info">
								Record not found!
								<a href="javascript:void(0)" class="close">×</a>
						</div> 
						<?php } else { ?>
						<form action="<?php echo base_url()?>index.php/student/student_attendance/add_attendance_information" method="post">
							<table class="display " id="content_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Roll Number</th>
										<th>Student Name</th>
										<th>Father Name</th>
										<th>Present</th>
										<th>Absent</th>
										<th>Leave</th>
									</tr>
								</thead>
								<tbody>
								<?php
                                                               
                                                                $count = 1;  for($i=0; $i < count($studentListForSendSms) ; $i++) {?>
									<tr>
										<td class="essential"><?php echo $count++;?></td>
										<td><?php echo $studentListForSendSms[$i]->roll_number;?></td>
										<td>
											<?php echo $studentListForSendSms[$i]->first_name;  
											   if($studentListForSendSms[$i]->middle_name)
												echo " ".$studentListForSendSms[$i]->middle_name; 
													if($studentListForSendSms[$i]->last_name)
												echo " ".$studentListForSendSms[$i]->last_name; 
											?>
										</td>
										<td>
											<?php 
												echo $studentListForSendSms[$i]->father_first_name;  
												if($studentListForSendSms[$i]->father_middle_name)
												echo " ".$studentListForSendSms[$i]->father_middle_name; 
												if($studentListForSendSms[$i]->father_last_name)
												echo " ".$studentListForSendSms[$i]->father_last_name; 
											?>
										</td>
										<td>
											<?php
//                                                                                         echo '<pre>';
//                                                               print_r($StudentAttendance);
//                                                               die;
												$attendance_status = "";
												if(isset($StudentAttendance[$studentListForSendSms[$i]->student_teacher_class_id]))
												{
													$attendance_status = $StudentAttendance[$studentListForSendSms[$i]->student_teacher_class_id];
                                                                                                       
                                                                                                        $attendance_status = explode('_',$attendance_status);
												}
												 if(isset($attendance_status[0])){
                                                                                                         
												if($attendance_status[0] == "P"){
									
											?>
                                                                                   
                                                                                    
											<input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  checked="checked" value="P"  <?php if($attendance_status[1] == 1) {echo "disabled";} ?>>
											<label class="label-present" for="present_<?php echo $studentListForSendSms[$i]->student_id?>">Present</label>
											<?php }
                                                                                        else { ?>
												
												<input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  value="P">
												<label class="label-present" for="present_<?php echo $studentListForSendSms[$i]->student_id?>">Present</label>
											<?php }
                                                                                        
                                                                                        } else { ?>
												
												<input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  value="P">
												<label class="label-present" for="present_<?php echo $studentListForSendSms[$i]->student_id?>">Present</label>
											<?php } ?>
										</td>
										<td>
										   <?php
                                                                                   if(isset($attendance_status[0])){
											if($attendance_status[0] == "A"){
												
												?>
											  <input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  checked="checked" value="A"  <?php if($attendance_status[1] == 1) {echo "disabled";} ?>>
											  <label class="label-absent" for="absent_<?php echo $studentListForSendSms[$i]->student_id?>">Absent</label>
											  <?php
											}
                                                                                        else{
												
												?>
											   <input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  value="A">
												<label class="label-absent" for="absent_<?php echo $studentListForSendSms[$i]->student_id?>">Absent</label>
											  <?php
											}
												
											
                                                                                        
                                                                                        }else{
												
												?>
											   <input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  value="A">
												<label class="label-absent" for="absent_<?php echo $studentListForSendSms[$i]->student_id?>">Absent</label>
											  <?php
											}
												
											?>
										</td>
										<td>
											<?php
                                                                                         if(isset($attendance_status[0])){
											if($attendance_status[0] == "L"){											
												?>
												<input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  checked="checked" value="L"  <?php if($attendance_status[0] == 1) {echo "disabled";} ?>>
											  <label class="label-leave" for="leave_<?php echo $studentListForSendSms[$i]->student_id?>">Leave</label>
											  <?php
											}
                                                                                        else{											
												?>
											   <input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  value="L">
											  <label class="label-leave" for="leave_<?php echo $studentListForSendSms[$i]->student_id?>">Leave</label>
											  <?php
											}
                                                                                        
                                                                                        }else{											
												?>
											   <input type="radio" name="attendance[<?php echo $studentListForSendSms[$i]->student_teacher_class_id; ?>]"  value="L">
											  <label class="label-leave" for="leave_<?php echo $studentListForSendSms[$i]->student_id?>">Leave</label>
											  <?php
											}
												
											?>
										</td>
									</tr>
							<?php } ?>
								</tbody>
							</table>
							<?php if($apprrove ==1) 
								{
									echo $approvemsg;
								}
                                                                ?>
								
								<div class="formRow cf">			
									<div  class="two columns">
										<input type="submit" class="button small" value="Submit">
									</div>
								</div>
								
						</form>
						<?php } ?>
					</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
