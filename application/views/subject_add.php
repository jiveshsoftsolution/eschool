	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Subject</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/subject/subject/insert_subject" id="frm_add_subject"class="nice" method="post" onsubmit="return validate_add_subject();">
			   <h3>Add Subject</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
							<label for="subject_name">Subject Name</label>
							<input type="text" id="subject_name" name="subject_name" class="input-text small" placeholder="Subject Name" />
							<span id="sp_subject_name" class="error">Enter Subject Name.</span>
						</div>
					</div>
				</div>
				<div class="formRow">
					<div class="row">
						<div class="three columns">
							<label for="description">Description</label>
							<textarea id="description" name="description" style="height:60px;width:300px;" class="input-text small" placeholder="Description"></textarea>
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
						<p>Subject List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($ems_subject['result'])&& ($ems_subject['result'])==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Subject Name</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($ems_subject as $ems_subject_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $ems_subject_data->subject_name;?></td>
									<td><?php echo $ems_subject_data->description;?></td>
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
