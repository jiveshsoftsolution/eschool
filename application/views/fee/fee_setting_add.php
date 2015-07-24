	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Fee Setting</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/fee/fee/insert_fee_setting" id="frm_add_fee_setting" class="nice" method="post" onsubmit="return validate_fee_setting();">
			   <h3>Add Fee Setting</h3>             
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
							<span id="sp_session_id" class="error">Select Fee Type.</span>
						</div>
						<div class="three columns">
						    <label for="fee_type_id">Fee Type</label>
							<select name="fee_type_id" id="fee_type_id" class="small">
								<option value="-1">Select Fee Type</option>
								<?php foreach($fee_type as $fee_typeData) {?>
								<option value="<?php echo $fee_typeData->fee_type_id?>"><?php echo $fee_typeData->fee_type_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_fee_type_id" class="error">Select Fee Type.</span>
						</div>
						<div class="seven columns">
						  <label for="amount">Amount</label>
						  <input type="text" name="amount" id="amount" class="input-text big" placeholder="Amount">	
						  <span id="sp_amount" class="error">Enter Amount.</span>						  
						</div>
					</div>
                </div>
				<div class="formRow">
				<label for="class-section"><strong>Class Section</strong></label>
					<table class="display" id="content_table">
						<tbody>
							<tr>
								<?php $count = 1; foreach($class_section as $class_SectionData) { 
									if($count%6!=0)  { 
									?>
										<td style="border:none; background:none">
										  <input type="checkbox" id="clas_section_<?php echo $class_SectionData->class_section_id?>" name="class_section[]" value="<?php echo $class_SectionData->class_section_id?>">
										  <label for="clas_section_<?php echo $class_SectionData->class_section_id?>"><?php echo $class_SectionData->class_name.' - '.$class_SectionData->section_name?></label>
										</td>
									<?php } else { echo '</tr><tr>';?>
										<td  style="border:none; background:none">
										  <input type="checkbox" id="clas_section_<?php echo $class_SectionData->class_section_id?>" name="class_section[]" value="<?php echo $class_SectionData->class_section_id?>">
										  <label for="clas_section_<?php echo $class_SectionData->class_section_id?>"><?php echo $class_SectionData->class_name.' - '.$class_SectionData->section_name?></label>
										</td>									
									<?php } ?>
								<?php  $count++;}?>
							</tr>
							</tbody>
					</table>
                </div>
				<div class="formRow">
					<div class="row"> 
						<label for="month"><strong>Month</strong></label><br>
						<?php foreach($month as $monthData) { 
						 if($monthData->month_id!=12)
						 {
						?>
						<div class="three columns">
						  <input type="checkbox" name="month[]" id="month_<?php echo $monthData->month_id?>" value="<?php echo $monthData->month_id?>">
						  <label for="month_<?php echo $monthData->month_id?>"><?php echo $monthData->month?></label><br>
						</div>
						<?php } else {?>
						<div class="three columns" style="left:-82px">
						  <input type="checkbox" name="month[]" id="month_<?php echo $monthData->month_id?>" value="<?php echo $monthData->month_id?>">
						  <label for="month_<?php echo $monthData->month_id?>"><?php echo $monthData->month?></label><br>
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
 
	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="twelve columns">
                <div class="box_c">
					<div class="box_c_heading cf box_actions">
						<p>Fee Settings List</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($fee_setting['result'])&& ($fee_setting['result'])==0) ||count($fee_setting)==0) { ?>
						<div class="alert-box warning">
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
</div>
