<div class="nine columns">
  <div class="row">
	<div class="twelve columns">
	  <div class="box_c">
		<div class="box_c_heading cf red">
		  <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
		  <p>Student Access Right</p>
		</div>
		<div class="box_c_content">
		  <form action="<?php echo base_url()?>index.php/menu/menu/student_list" id="frm_student_attendance_view" class="nice" method="post" onsubmit="return validate_add_exam_marks();">
		   <h3>Student Access Right</h3>             
			<div class="formRow">
				<div class="row">
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
					<div class="nine columns">
						<label for="session_id">Select Session</label>
						<select id="session_id" name="session_id" class="small">
						<option  value="0">Select Session </option>
						<?php foreach($session as $sRow) {?>						
						<option <?php if($sRow->session_id == $session_id) echo"selected='selected'"?> value="<?php echo $sRow->session_id; ?>"> <?php echo $sRow->session_name; ?> </option>
						<?php } ?>
					  </select>
						<span id="sp_session_id" class="error">Select Session.</span>
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
					<?php if(isset($studentListForSendSms['status']) || count($studentListForSendSms)==0) 
						{ 
						?>
						<div class="alert-box warning">
								Record not found!
								<a href="javascript:void(0)" class="close">×</a>
						</div> 
						<?php }
						else
						{ ?>
					<form action="<?php echo base_url()?>index.php/student/student_attendance/add_attendance_information" method="post">
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Roll Number</th>
									<th>Student Name</th>
									<th>Father Name</th>
									<th>Access Right</th>
								</tr>
							</thead>
							<tbody>
							<?php $count = 1;  for($i=0; $i < count($studentListForSendSms) ; $i++) {?>
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
                                                                      <td class="content_actions">
                                                                            
                                                                            <a href="<?php echo base_url();?>index.php/menu/menu/student_access/<?php echo $session_id;?>/<?php echo $studentListForSendSms[$i]->student_id;?>" >Access Right</a>
                                                                        </td>
									
								</tr>
						<?php } ?>
							</tbody>
						</table>
						
					</form>
					<?php } ?>
					</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
//   $(document).ready(function() {
//		$(".fancybox").fancybox();
//	});
//
//	$(".fancybox").fancybox({
//        'width': 350,
//        'height': 250,
//        'transitionIn': 'elastic',
//        'transitionOut': 'elastic',
//        'type': 'iframe'
    });
</script>
