	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Season</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/period/period/list_period" id="frm_add_season"class="nice" method="post" >
			   <h3>Add Period</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
							<label for="session_id">Session</label>
							<select name="session_id" id="session_id" class="small">
							<option value="-1">Select Session</option>
							<?php foreach($session as $sRow) {?>
							<option <?php if($sRow->session_id == $session_id) echo"selected='selected'"?> value="<?php echo $sRow->session_id; ?>"> <?php echo $sRow->session_name; ?> </option>
							<?php  } ?>
							</select>
							<span id="sp_session_id" class="error">Select Session.</span>
						</div>
						<div class="three columns" id="seasonDiv">
							<label for="season_id">Season</label>
							<select name="season_id" id="season_id" class="small">
							<option value="-1">Select Season</option>
							
							</select>
							<span id="sp_season_id" class="error">Select Season.</span>
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
						<p>Season List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($period['result'])&& ($period['result'])==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Period No.</th>
									<th>Description</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Session</th>
                                                                        <th>Season</th>
                                                                        <th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($period as $periodRow) { ?>
								<tr>
									<td class="essential"><?php echo $periodRow['period_num'];?></td>
									<td><?php echo $periodRow['description'];?></td>
									
									<td><?php echo $periodRow['start_time'];?></td>
                                                                        <td><?php echo $periodRow['end_time'];?></td>
                                                                        <td><?php echo  $periodRow['session_name'];?></td>
                                                                        <td><?php echo $periodRow['season_name'];?></td>
									<td class="content_actions">
										<a href="<?php echo base_url()?>index.php/period/period/edit_period/<?php echo $periodRow['period_id']; ?>" class="sepV_a" title="Edit">
										<img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
										<a title="Delete" href="<?php echo base_url()?>index.php/period/period/deleteperiod/<?php echo $periodRow['period_id']; ?>"><img alt="" src="<?php echo base_url()?>assets/assets/img/ico/trashcan_gray.png"></a>
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
