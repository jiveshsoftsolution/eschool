	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Fee Type</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/fee/fee/insert_fee_type" id="frm_add_fee_type"class="nice" method="post" onsubmit="return validate_fee_type();">
			   <h3>Add Fee Type</h3>             
                <div class="formRow">
					<div class="row">
						<div class="four columns">
						    <label for="fee_type_name">Fee Type Name</label>
							<input type="text" id="fee_type_name" name="fee_type_name" class="input-text small" placeholder="Fee Type Name"  />
							<span id="sp_fee_type_name" class="error">Enter Fee Type Name.</span>
						</div>
						<div style="margin-top:30px" class="three columns">
						  <input type="checkbox" name="refundable" id="refundable">
						  <label for="refundable">Refundable</label>
						</div>
						<div style="margin-top:30px" class="five columns">
						  <input type="checkbox" name="is_active" id="is_active">
						  <label for="is_active">Is Active</label>
						</div>
					</div>
                </div>
				<div class="formRow">
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
						<p>Fee Type List</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($fee_type['result'])&& ($fee_type['result'])==0) || count($fee_type)==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Fee Type Name</th>
									<th>Refundable</th>
									<th>Active</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($fee_type as $fee_typeData) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $fee_typeData->fee_type_name;?></td>
									<td><?php if($fee_typeData->refundable) echo 'True'; else echo 'False';?></td>
									<td><?php if($fee_typeData->is_active) echo 'True'; else echo 'False';?></td>
									<td class="content_actions">
										<a  href="<?php echo base_url();?>index.php/fee/fee/+/<?php echo $fee_typeData->fee_type_id;?>/edit" class="sepV_a" title="Edit">
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
