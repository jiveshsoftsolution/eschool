	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Season</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/period/period/edit_period" id="frm_add_season"class="nice" method="post" >
			   <h3>Update Period</h3>
                         
                <div class="formRow">
					<div class="row">
						<div class="three columns">
                                                    <?php echo $periodTime[0]->session_id; ?>
							<label for="session_id">Session</label>
							<select name="session_id" id="session_id" class="small">
							<option value="-1">Select Session</option>
							<?php foreach($session as $sRow) {?>
							<option <?php if($sRow->session_id == $periodTime[0]->session_id) echo"selected='selected'"?> value="<?php echo $sRow->session_id; ?>"> <?php echo $sRow->session_name; ?> </option>
							<?php  } ?>
							</select>
							<span id="sp_session_id" class="error">Select Session.</span>
						</div>
						<div class="three columns" id="seasonDiv">
							<label for="season_id">Season</label>
							
<select id="season_id" name="season_id" class="small">
<option value="0">Select Season </option> 
<?php 

if(!isset($season['status'])){
foreach($season as $key=>$value){
?>
<option  <?php if($key == $periodTime[0]->season_id) echo"selected='selected'"?>  value="<?php echo $key; ?>"><?php echo $value; ?> </option>
<?php }
}

?>
</select>
							<span id="sp_season_id" class="error">Select Season.</span>
						</div>
                                            <div class="three columns">
							<label for="period_num">period Number</label>
							<input value="<?php echo $periodTime[0]->period_num; ?>" type="text" id="period_num" name="period_num" class="input-text small" placeholder="period_num"/>
                                                        <input type="hidden" value="<?php echo $periodTime[0]->period_id; ?>" type="text" id="period_id" name="period_id" />
							<span id="sp_period_num" class="error">Enter period number.</span>
						</div>
					</div>
                    <div class="row">
						<div class="three columns">
							<label for="description">Description</label>
							<input  value="<?php echo $periodTime[0]->description; ?>" type="text" id="description" name="description" class="input-text small" placeholder="description"/>
							<span id="sp_description" class="error">Enter description.</span>
						</div>
						<div class="three columns" >
							<label for="start_time">start_time</label>
							<input   value="<?php echo $periodTime[0]->start_time; ?>"  type="text" id="start_time" name="start_time" class="input-text small" placeholder="start time"/>
							<span id="sp_start_time" class="error">Enter start time.</span>
						</div>
                                            <div class="three columns">
							<label for="end_time">end_time</label>
							<input   value="<?php echo $periodTime[0]->end_time; ?>"  type="text" id="end_time" name="end_time" class="input-text small" placeholder="end time"/>
							<span id="sp_end_time" class="error">Enter end time.</span>
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
 

