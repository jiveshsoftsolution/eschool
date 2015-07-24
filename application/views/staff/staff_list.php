	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Search Staff</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/staff/staff/staff_list" class="nice" method="post">
			   <h3>List By</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="school_user_type_id">User Type</label>
						  <select name="school_user_type_id" id="school_user_type_id" class="small">
							<option value="-1">Select User Type</option>
							<?php foreach($user_type as $userTypeData) {?>
							<option value="<?php echo $userTypeData->school_user_type_id?>" <?php if($school_user_type_id==$userTypeData->school_user_type_id) echo "selected='selected'"?>><?php echo $userTypeData->user_type?></option>
							<?php  } ?>
						</select>
						<span id="sp_school_user_type_id" class="error">Select User Type.</span>
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
						<p>Staff List</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($stafflist['result'])&& ($stafflist['result'])==0) || count($stafflist)==0) { ?>
						<div class="alert-box info">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Staff Name</th>									
									<th>DOB</th>
									<th>Phone No.</th>
									<th>Mobile No.</th>									
									<th>Expertise</th>
									<th>Photo</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($stafflist as $staff_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $staff_data->first_name.' '.$staff_data->middle_name.' '.$staff_data->last_name;?></td>
									<td><?php echo date('d-m-Y',strtotime($staff_data->dob));?></td>
									<td><?php echo $staff_data->phone?></td>									
									<td><?php echo $staff_data->mobile;?></td>
									<td align="center">Add Expertise</td>
									<td align="center"><img src="<?php if(count($staff_data->photo_url)==0 || empty($staff_data->photo_url)) echo base_url().'assets/assets/img/no_image.gif'; else echo base_url().'assets/teachers_images/'.$staff_data->photo_url;?>" class="pic"></td>									
									<td class="content_actions">
										<a href="<?php echo base_url()?>index.php/staff/staff/staff_edit/<?php echo $staff_data->staff_id?>" class="sepV_a" title="Edit"><img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
									</td>
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
