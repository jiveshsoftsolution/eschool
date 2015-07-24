<style type="text/css">
.template-msg
{
	border-bottom: 1px solid #EDEDED;
    padding: 9px 18px;
}
</style>
<script>
	$(document).ready(function(){
		$(".template-msg").click(function() {
		  $('#txt_message').val($.trim($(".template-msg").html()));
		});
	});
	function get_studnet_list()
	{	
		var class_section_id = $("#class_section_id").val();
		var dataString = "class_section_id="+ class_section_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
			url:urldata+'index.php/sms/sms/retrive_student_list/',
			data:dataString,
			type:'POST',
			success:function(response){
				$("#student_list").html(response);
			}					
		});
	}
	
	checked = false;
	function checkedAllStudent()
	{
		if (checked == false){checked = true}else{checked = false}
		for (var i = 0; i < document.getElementById('frm_student_sms').elements.length; i++) 
		{
			document.getElementById('frm_student_sms').elements[i].checked = checked;
		}
	}
        function checkedAllTeacher()
	{
		if (checked == false){checked = true}else{checked = false}
		for (var i = 0; i < document.getElementById('frm_teacher_sms').elements.length; i++) 
		{
			document.getElementById('frm_teacher_sms').elements[i].checked = checked;
		}
	}
        
	
	function get_teacher_list()
	{	
		var urldata = '<?php echo base_url()?>';
		$.ajax({
			url:urldata+'index.php/sms/sms/retrive_teacher_list/',
			type:'POST',
			success:function(response){
				$("#teacher_list").html(response);
			}					
		});
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
							<li><a href="#" onclick="javascript:get_teacher_list()">Teacher</a></li>
						</ul>
					</div>
					<div class="box_c_content">
						<article class="tab_pane">
							<form action="<?php echo base_url()?>index.php/sms/sms/student_send_sms" id="frm_student_sms"class="nice" method="post">
							   <h3>General SMS </h3>             
								<div class="formRow">
									<div class="row">
										<div class="three columns">
										  <label for="class_section_id">Select Class Section</label>
											<select name="class_section_id" id="class_section_id" class="small" onchange="get_studnet_list()">
												<option value="-1">Select Class Section</option>
												<?php foreach($class_section as $class_sectionData) {?>
												<option value="<?php echo $class_sectionData->class_section_id?>"><?php echo $class_sectionData->class_name.' - '.$class_sectionData->section_name?></option>
												<?php  } ?>
											</select>
											<span id="sp_class_section_id" class="error">Select Class Section.</span>
										</div>
									</div>
								</div>
								<table class="attendance" onmouseover="this.bgColor='#FFF'">
									<tr>
										<td style="vertical-align:top;width:55%;padding-left:10px;padding-right:10px" id="student_list">
										</td>
										<td style="vertical-align:top;width:20%">
											<div class="formRow">
												<div class="row">
													<div class="five columns">
													  <label for="regards_id">Select Regards</label>
														<select name="regards_id" id="regards_id" class="small">
															<option value="-1">Select Regards</option>
															<option value="Thanks">Thanks</option>
															<option value="Regards">Regards</option>
														</select>
														<span id="sp_regards_id" class="error">Select Class.</span>
													</div>
													<div class="five columns">
													  <label for="sender_id">Select Sender</label>
														<select name="sender_id" id="sender_id" class="small">
															<option value="-1">Select Sender</option>
															<option value="Principal">Principal</option>
															<option value="Teacher">Teacher</option>
															<option value="Admin">Admin</option>
														</select>
														<span id="sp_sender_id" class="error">Select Class.</span>
													</div>
												</div>
											</div>
											<div class="formRow">
												<textarea id="txt_message" name="txt_message" class="input-text large"  style="font-size:13px;text-align:justify;height:180px;width:400px" placeholder="Message"></textarea>
											</div>
											<div class="six columns" style="margin-top:15px">
												<input type="submit" class="button small" value="Submit">
											</div>
										</td>
										<td  style="vertical-align:top;width:30%" id="template_list">
											<div class="box_c_heading cf box_actions">
												<p>Template Message`s</p>
											</div>
											<?php if(isset($sms_template['status'])){ 
                                                                                            echo "No Template Found";
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                          $i=1;  foreach($sms_template as $sms_templtedata) { ?>
												<div class="template-msg" style="text-align:justify; line-spacing:20px" id="div_<?php echo $i++;?>">
												<?php echo $sms_templtedata->template_content; 	  ?>	
												</div>
											<?php }   
                                                                                        }
                                                                                        ?>
										</td>
									</tr>
								</table>
							</form>
						</article>
						<article class="tab_pane">
							<form action="<?php echo base_url()?>index.php/sms/sms/teacher_send_sms" id="frm_teacher_sms"class="nice" method="post">
							   <h3>General SMS </h3>             
								<table class="attendance" onmouseover="this.bgColor='#FFF'">
									<tr>
										<td style="vertical-align:top;width:55%;padding-left:10px;padding-right:10px" id="teacher_list">
										</td>
										<td style="vertical-align:top;width:20%">
											<div class="formRow">
												<div class="row">
													<div class="five columns">
													  <label for="regards_id">Select Regards</label>
														<select name="regards_id" id="regards_id" class="small">
															<option value="-1">Select Regards</option>
															<option value="Thanks">Thanks</option>
															<option value="Regards">Regards</option>
														</select>
														<span id="sp_regards_id" class="error">Select Class.</span>
													</div>
													<div class="five columns">
													  <label for="sender_id">Select Sender</label>
														<select name="sender_id" id="sender_id" class="small">
															<option value="-1">Select Sender</option>
															<option value="Principal">Principal</option>
															<option value="Teacher">Teacher</option>
															<option value="Admin">Admin</option>
														</select>
														<span id="sp_sender_id" class="error">Select Class.</span>
													</div>
												</div>
											</div>
											<div class="formRow">
												<textarea id="txt_message" name="txt_message" class="input-text large"  style="font-size:13px;text-align:justify;height:180px;width:400px" placeholder="Message"></textarea>
											</div>
											<div class="six columns" style="margin-top:15px">
												<input type="submit" class="button small" value="Submit">
											</div>
										</td>
										<td  style="vertical-align:top;width:30%" id="template_list">
											<div class="box_c_heading cf box_actions">
												<p>Template Message`s</p>
											</div>
											<?php if(isset($sms_template['status'])){ 
                                                                                            echo "No Template Found";
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                          $i=1;  foreach($sms_template as $sms_templtedata) { ?>
												<div class="template-msg" style="text-align:justify; line-spacing:20px" id="div_<?php echo $i++;?>">
												<?php echo $sms_templtedata->template_content; 	  ?>	
												</div>
											<?php }   
                                                                                        }
                                                                                        ?>
										</td>
									</tr>
								</table>
							</form>
						</article>
					</div>
                </div>
            </div>
		</div>
	  </div>
  </div>
 </div>
