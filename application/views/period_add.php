	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Period</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/subject/subject/insert_period" id="frm_add_period"class="nice" method="post" onsubmit="return validate_add_period();">
			   <h3>Add Period</h3>             
                <div class="formRow">
					<div class="row">
						<div class="four columns">
							<label for="period_num">Period No.</label>
							<input type="text" id="period_num" name="period_num" class="input-text big" placeholder="Period No." />
							<span id="sp_period_num" class="error">Enter Period No.</span>
						</div>
						<div class="three columns">
						  <label for="session_id">Select Session</label>
						  <select name="session_id" id="session_id" class="small">
							<option value="-1">Select Session</option>
							<?php foreach($session as $sessionData) {?>
							<option value="<?php echo $sessionData->session_id?>"><?php echo $sessionData->session_name?></option>
							<?php  } ?>
							</select>
							<span id="sp_session_id" class="error">Select Session.</span>
						</div>
						<div class="five columns">
						  <label for="season_id">Select Season</label>
						  <select name="season_id" id="season_id" class="small">
							<option value="-1">Select Season</option>
							<?php foreach($season as $seasonData) {?>
							<option value="<?php echo $seasonData->season_id?>"><?php echo $seasonData->season_name;?></option>
							<?php  } ?>
						  </select>
						  <span id="sp_season_id" class="error">Select Season.</span>
						</div>
					</div>											
				</div>
				<div class="formRow">
					<div class="row">
						<div class="four columns">
							<label for="start_time">Start Time</label>
							<input type="text" id="start_time" name="start_time" class="input-text big" placeholder="Start Time" />
							<span id="sp_start_time" class="error">Enter Start Time.</span>
						</div>
						<div class="three columns">
						    <label for="end_time">End Time</label>
							<input type="text" id="end_time" name="end_time" class="input-text big" placeholder="End Time" />
							<span id="sp_end_time" class="error">Enter End Time.</span>
						</div>
						<div class="five columns">
							<label for="description">Description</label>
							<input type="text" id="description" name="description" class="input-text big" placeholder="Description" />
							<span id="sp_description" class="error">Enter Description.</span>
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
						<p>Period List</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($ems_period_time['result'])&& $ems_period_time['result']==0) || count($ems_period_time)==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Period No.</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Session</th>
									<th>Season</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($ems_period_time as $ems_period_time_data) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $ems_period_time_data->period_num;?></td>
									<td><?php echo date("H:i A",strtotime($ems_period_time_data->start_time));?></td>
									<td><?php echo date("H:i A",strtotime($ems_period_time_data->end_time));?></td>
									<td><?php echo $ems_period_time_data->session_name;?></td>
									<td><?php echo $ems_period_time_data->season_name;?></td>
									<td><?php echo $ems_period_time_data->description;?></td>
									<td class="content_actions">
										<a href="#" class="sepV_a" title="Edit">
										<img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
										<a title="Delete" href="#"><img alt="" src="img/ico/trashcan_gray.png"></a>
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
