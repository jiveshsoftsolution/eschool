	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add paper details</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/paper/paper/insert_paper_details" id="frm_add_fee_setting" class="nice" method="post" onsubmit="return validate_fee_setting();">
			   <h3>Add paper details</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						    <label for="session_id">Academic year</label>
							<select name="session_id" id="session_id" class="small">
								<option value="-1">Select Academic year</option>
								<?php foreach($session as $sessionData) {?>
								<option value="<?php echo $sessionData->session_id?>"><?php echo $sessionData->session_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_fee_type_name" class="error">Select Fee Type.</span>
						</div>
                                            
                                            
                                            <div class="three columns" >
				
						    <label for="class_section_id">Standered</label>
							<select name="class_section_id" id="class_section_id" class="small">
								<option value="-1">Select Standered</option>
								<?php foreach($class_section as $class_sectionData) {?>
								<option value="<?php echo $class_sectionData->class_section_id?>" <?php if(isset($class_section_id) && $class_sectionData->class_section_id==$class_section_id ) echo "selected='selected'";?>><?php echo $class_sectionData->class_name.' - '.$class_sectionData->section_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_class_section_id" class="error">Select Class Section.</span>
						
                </div>
                                               <div style="margin-top:30px" class="three columns">
						  <input type="checkbox" name="is_optional" id="is_optional">
						  <label for="is_optional">Is Optional</label>
						</div>
						
						
					</div>
                </div>
				
				<div class="formRow">
				<label for="paper">Paper</label>
					<table class="display" id="content_table">
						<tbody>
							<tr>
								<?php $count = 1; foreach($paper as $paper_data) { 
									if($count%6!=0)  { 
									?>
										<td style="border:none; background:none">
										  <input type="checkbox" id="paper_<?php echo $paper_data->paper_id?>" name="paper[]" value="<?php echo $paper_data->paper_id?>">
										  <label for="paper<?php echo $paper_data->paper_id?>"><?php echo $paper_data->paper_name?></label>
										</td>
									<?php } else { echo '</tr><tr>';?>
										<td  style="border:none; background:none">
										   <input type="checkbox" id="paper_<?php echo $paper_data->paper_id?>" name="paper[]" value="<?php echo $paper_data->paper_id?>">
										  <label for="paper<?php echo $paper_data->paper_id?>"><?php echo $paper_data->paper_name?></label>
										</td>									
									<?php } ?>
								<?php  $count++;}?>
							</tr>
							</tbody>
					</table>
                                
                             
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
						<p>Fee Settings List</p>
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
							<?php $i = 1; foreach($fee_setting as $fee_settingData) {?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $fee_settingData['fee_type_name'];?></td>
									<td><?php echo $fee_settingData['amount'];?></td>
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
