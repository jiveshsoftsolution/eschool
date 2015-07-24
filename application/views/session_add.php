	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Session</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/session/session/insert_session" id="frm_add_session"class="nice" method="post" onsubmit="return validate_add_session();">
			   <h3>Add Session</h3>             
                <div class="formRow">
					<div class="row">
						<div class="four columns">
						    <label for="session_name">Session Name</label>
							<input type="text" id="session_name" name="session_name" class="input-text small" placeholder="Session Name" />
							<span id="sp_session_name" class="error">Enter Session Name.</span>
						</div>
						<div class="four columns">
						    <label for="start_date">From Date</label>
							<input type="text" id="start_date" name="start_date" class="input-text small" placeholder="Start Date" />
							<span id="sp_start_date" class="error">Enter Start Date.</span>
						</div>
						<div class="four columns">
						    <label for="end_date">End Date</label>
							<input type="text" id="end_date" name="end_date" class="input-text small" placeholder="End Date" />
							<span id="sp_end_date" class="error">Enter End Date.</span>
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
						<p>Session List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($session['result'])&& ($session['result'])==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Session Name</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($session as $session_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $session_data->session_name;?></td>
									<td><?php echo date('d/m/Y',strtotime($session_data->start_date));?></td>
									<td><?php echo date('d/m/Y',strtotime($session_data->end_date));?></td>
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
