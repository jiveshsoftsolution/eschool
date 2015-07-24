<script type="text/javascript">
	function update_notice_status(obj)
	{
		var checkbox_id = $(obj).attr('id');
		var res = checkbox_id.split("_");
		var notice_id = res[1];
		var notice_status  = document.getElementById(checkbox_id).checked;
		var dataString = "notice_id="+ notice_id+"&notice_status="+notice_status;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
			url:urldata+'index.php/notice/notice/update_notice_status/',
			data:dataString,
			type:'POST',
			success:function(response){
				
			}
		});
	}
</script>

<div class="nine columns">
    <div class="row">
        <div class="twelve columns">
			<div class="box_c">
				<div class="box_c_heading cf red">
				  <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
				  <p>Add Notice</p>
				</div>
				<div class="box_c_content">
					<form action="<?php echo base_url()?>index.php/notice/notice/insert_notice" id="frm_add_notice"class="nice" method="post" onsubmit="return validate_add_notice();">
					   <h3>Add Notice</h3>   
						<div class="formRow">
							<div class="row">
								<div class="three columns">
									<label for="notice_for">Notice For.</label>
									<select name="notice_for" id="notice_for_id" class="small"  >
										<option value="-1">Select Notice For</option>
										<option value="1">All</option>
										<option value="2">Student</option>
										<option value="3">Admin</option>
										<option value="4">Teacher</option>
									</select>
									<span id="sp_notice_for" class="error">Enter Notice For.</span>
								</div>					
								<div class="three columns">						  
								   <div id="class_section"></div>
								</div>
								<div class="six columns" style="margin-top:30px">
								  <input type="checkbox" id="post_to_web" name="post_to_web">
								  <label for="post_to_web">New</label>
								</div>
							</div>											
						</div>          
						<div class="formRow">
							<div class="row">
								<div class="six columns">
									<label for="notice">Notice Heading.</label>
									<textarea id="notice_headding" name="notice_subject" class="input-text large"  placeholder="Notice Heading"></textarea>
									<span id="sp_notice_headding" class="error">Enter Notice Heading.</span>
								</div>
								<div class="six columns">
									<label for="notice">Notice.</label>
									<textarea id="notice" name="notice" class="input-text large" placeholder="Notice"></textarea>
									<span id="sp_notice" class="error">Enter Notice.</span>
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
							<p>Notice List</p>
						</div>
						<div class="box_c_content">
							<?php if((isset($notice['result'])&& $notice['result']==0) || count($notice)==0) { ?>
							<div class="alert-box warning">
									Record not found!
									<a href="javascript:void(0)" class="close">×</a>
							</div> 
							<?php } else {?>
							<table class="display " id="content_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Notice</th>
										<th>Notice For</th>
										<th>Class Section</th>
										<!--<th>Class</th>-->
										<th>New</th>
										<th>Created Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php $i = 1; foreach($notice as $notice_data) { ?>
									<tr>
										<td class="essential"><?php echo $i++;?></td>
										<td><?php echo $notice_data->notice;?></td>
										<td>									
											<?php if($notice_data->notice_for == "1") echo "Notice for All";?>
											<?php if($notice_data->notice_for == "2") echo "Notice for Student";?>
											<?php if($notice_data->notice_for == "3") echo "Notice for Admin";?>
											<?php if($notice_data->notice_for == "4") echo "Notice for Teacher";?>
										</td>
										<td><?php echo $notice_data->class_name.' - '.$notice_data->section_name;?></td>
										<td><input type="checkbox" id="chk_<?php echo $notice_data->notice_id?>" name="chk_<?php echo $notice_data->notice_id?>" <?php if($notice_data->post_to_web) echo "checked";?> onchange="update_notice_status(this)"></td>
										<td><?php echo date('d-m-Y',strtotime($notice_data->created_date));?></td>
										<td class="content_actions">
											<a href="#" class="sepV_a" title="Edit">
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
</div>
