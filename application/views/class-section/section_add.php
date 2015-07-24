	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Section</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/class-section/class_section/insert_section" id="frm_add_section"class="nice" method="post" onsubmit="return validate_add_section();">
			   <h3>Add Section</h3>             
                <div class="formRow">
					<div class="row">
						<div class="four columns">
						    <label for="class_name">Section Name</label>
							<input type="text" id="section_name" name="section_name" class="input-text small" placeholder="Section Name" />
							<span id="sp_section_name" class="error">Enter Section Name.</span>
						</div>
						<div class="eight columns" style="margin-top:28px">
						    <input type="submit" class="button small" value="Submit">
						</div>
					</div>
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
						<p>Section List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($ems_section['result'])&& ($ems_section['result'])==0) { ?>
						<div class="alert-box info">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Section Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($ems_section as $ems_section_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $ems_section_data->section_name;?></td>
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
