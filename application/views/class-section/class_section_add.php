	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Map Class Section</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/class-section/class_section/insert_class_section" id="frm_add_class_section"class="nice" method="post" onsubmit="return validate_add_class_section();">
			   <h3>Map Class Section </h3>             
                <div class="formRow">
					<div class="row">
						<div class="row">
							<div class="three columns">
								<label for="class_id">Select Class</label>
								<select name="class_id" id="class_id" class="small">
									<option value="-1">Select Class</option>
									<?php foreach($ems_class as $classData) {?>
									<option value="<?php echo $classData->class_id?>"><?php echo $classData->class_name;?></option>
									<?php  } ?>
								</select>
								<span id="sp_class_id" class="error">Select Class.</span>
							</div>
							<div class="three columns">
							  <label for="section_id">Select Section</label>
							  <select name="section_id" id="section_id" class="small">
								<option value="-1">Select Section</option>
								<?php foreach($ems_section as $ems_section_Data) {?>
								<option value="<?php echo $ems_section_Data->section_id?>"><?php echo $ems_section_Data->section_name;?></option>
								<?php  } ?>
							  </select>
							  <span id="sp_section_id" class="error">Select Section.</span>
							</div>
							<div class="four columns">
								<label for="sequence">Sequence No.</label>
								<input type="text" id="sequence" name="sequence" class="input-text big" placeholder="Sequence" />
								<span id="sp_sequence" class="error">Enter Sequence.</span>
							</div>
							<div class="two columns" style="margin-top:28px">
								<input type="submit" class="button small" value="Submit">
							</div>
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
						<p>Class Section List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($ems_class_section['result'])&& ($ems_class_section['result'])==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Class Name</th>
									<th>Section Name</th>
									<th>Sequence</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($ems_class_section as $ems_class_section_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $ems_class_section_data->class_name;?></td>
									<td><?php echo $ems_class_section_data->section_name;?></td>
									<td><?php echo $ems_class_section_data->sequence;?></td>
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
