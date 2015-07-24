<div class="nine columns">
    <div class="row">
		<div class="twelve columns">
			<div class="box_c">
				<div class="twelve columns">
					<div class="box_c">
						<div class="box_c_heading cf box_actions">
							<p>Student Access Right</p>
						</div>
						<div class="box_c_content">
							<?php if(isset($studentListForSendSms['status'])) { ?>
								<div class="alert-box warning">
									Record not found!
									<a href="javascript:void(0)" class="close">×</a>
								</div> 
							<?php } else { ?>
							<form action="<?php echo base_url()?>index.php/student/student_attendance/add_attendance_information" method="post">
								<input type="hidden" name="student_Id" id="student_Id" value="<?php echo $student_Id; ?>"/>
								<table class="access_right">
									<thead>
										<tr>
											<th>Main Menu</th>
											<th>Sub Menu Access</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									foreach($studentMenu as $menu=>$subMenu){
									?>
									<tr>
										<td><?php
										
										echo $menu; ?></td>
										<td>
										<?php
										foreach($subMenu as $subMenuAttribute){
										?>
										<table style="margin-top:5px">
											<tr>
												<td style="width:4%"><input type="checkbox" onchange="update_student_access(this)" value="<?php echo $subMenuAttribute['sub_menu_id']; ?>" id="<?php echo $subMenuAttribute['sub_menu_id'].'_'.$menu.'_submenu' ?>" name="<?php echo $subMenuAttribute['sub_menu_id'].'_'.$menu.'_submenu' ?>"  <?php if($subMenuAttribute['userAccess'] == "yes") { echo 'checked="checked"'; }?> ></input></td>
												<td><?php echo $subMenuAttribute['sub_menu_name']; ?></td>
											</tr>
										</table>
										<?php } ?>
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
	function update_student_access(obj)
	{
		var sub_menu_id = $(obj).attr('value');
		var student_Id =  document.getElementById('student_Id').value;
		var dataString = "student_Id="+ student_Id+'&sub_menu_id='+sub_menu_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
		url:urldata+'index.php/menu/menu/addEdit_student_access/',
		data:dataString,
		type:'POST',
		success:function(response)	{
				}
		});
	}
</script>
