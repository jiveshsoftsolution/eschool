	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Class</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/class-section/class_section/insert_class" id="frm_add_class"class="nice" method="post" onsubmit="return validate_add_class();">
			   <h3>Add Class</h3>             
                <div class="formRow">
					<div class="row">
						<div class="four columns">
						    <label for="class_name">Class Name</label>
							<input type="text" id="class_name" name="class_name" class="input-text small" placeholder="Class Name" />
							<span id="sp_class_name" class="error">Enter Class Name.</span>
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
						<p>Class List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($ems_class['result'])&& ($ems_class['result'])==0) { ?>
						<div class="alert-box info">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Class Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($ems_class as $ems_class_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $ems_class_data->class_name;?></td>
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
