<script type="text/javascript">
	checked = false;
	function checkedAll()
	{
		if (checked == false){checked = true}else{checked = false}
		for (var i = 0; i < document.getElementById('frm_student_sms').elements.length; i++) 
		{
			document.getElementById('frm_student_sms').elements[i].checked = checked;
		}
	}
</script>
<div class="container container_bg">
  <div class="row">
	<div class="twelve columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>General SMS</p>
            </div>
            <div class="box_c_content">
				<div class="box_c">
					<div class="box_c_heading cf">
						<ul class="tabs cf left">
							<li><a href="#">Student</a></li>
							<li><a href="#">Teacher</a></li>
						</ul>
					</div>
					<div class="box_c_content">
						<article class="tab_pane">
							<form action="<?php echo base_url()?>index.php/sms/sms/student_sms" id="frm_student_sms"class="nice" method="post" onsubmit="return validate_add_class_section();">
							   <h3>General SMS </h3>             
								<div class="formRow">
									<div class="row">
										<div class="three columns">
										  <label for="class_section_id">Select Class Section</label>
											<select name="class_section_id" id="class_section_id" class="small">
												<option value="-1">Select Class Section</option>
												<?php foreach($class_section as $class_sectionData) {?>
												<option value="<?php echo $class_sectionData->class_section_id?>"><?php echo $class_sectionData->class_name.' '.$class_sectionData->section_name?></option>
												<?php  } ?>
											</select>
											<span id="sp_class_section_id" class="error">Select Class.</span>
										</div>
									</div>
								</div>
								<table class="attendance" onmouseover="this.bgColor='#FFF'">
									<tr>
										<td style="vertical-align:top;width:55%;padding-left:10px;padding-right:10px">
											<table class="display " id="content_table">
												<thead>
													<tr>
														<th><input type="checkbox" onclick="checkedAll()"></th>
														<th>Student Name</th>
														<th>Father Name</th>
														<th>Mobile No.</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach($studentlist as $studentlistData) { ?>
													<tr>
														<td class="essential"><input type="checkbox" id="chk_<?php echo $studentlistData->student_id;?>" name="sms_student_list[]"></td>
														<td>
															<?php echo $studentlistData->first_name;  
																  if($studentlistData->middle_name)
																  echo " ".$studentlistData->middle_name; 
																  if($studentlistData->last_name)
																  echo " ".$studentlistData->last_name; 
															?>
														</td>
														<td>
															<?php echo $studentlistData->father_first_name;  
																  if($studentlistData->father_middle_name)
																  echo " ".$studentlistData->father_middle_name; 
																  if($studentlistData->father_last_name)
																  echo " ".$studentlistData->father_last_name; 
															?>
														</td>
														<td>
															<?php echo $studentlistData->parent_mobile; ?>
														</td>
													</tr>
												<?php } ?>
												</tbody>
											</table>
										</td>
										<td style="vertical-align:top;width:20%">
											<div class="formRow">
												<div class="row">
													<div class="five columns">
													  <label for="regards_id">Select Regards</label>
														<select name="regards_id" id="regards_id" class="small">
															<option value="-1">Select Regards</option>
															<option value="1">Thanks</option>
															<option value="2">Regards</option>
														</select>
														<span id="sp_regards_id" class="error">Select Class.</span>
													</div>
													<div class="five columns">
													  <label for="sender_id">Select Sender</label>
														<select name="sender_id" id="sender_id" class="small">
															<option value="-1">Select Sender</option>
															<option value="1">Principal</option>
															<option value="2">Teacher</option>
															<option value="2">Admin</option>
														</select>
														<span id="sp_sender_id" class="error">Select Class.</span>
													</div>
												</div>
											</div>
											<div class="formRow">
												<textarea class="input-text large" style="height:180px;width:400px" placeholder="Message"></textarea>
											</div>
											<div class="six columns" style="margin-top:15px">
												<input type="submit" class="button small" value="Submit">
											</div>
										</td>
										<td  style="vertical-align:top;width:30%">
											<div class="formRow" style="text-align:justify; line-spacing:20px">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
											</div>
											<div class="formRow" style="text-align:justify; line-spacing:20px">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
											</div>
										</td>
									</tr>
								</table>
							</form>
						</article>
						<article class="tab_pane">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
						</article>
					</div>
                </div>
            </div>
		</div>
	  </div>
  </div>
  </div>
