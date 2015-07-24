	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Exam Period</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/exam/exam/insert_exam_period" id="frm_add_exam_period"class="nice" method="post" onsubmit="return validate_add_exam_period();">
			   <h3>Add Exam Period</h3>             
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
							<span id="sp_session_id" class="error">Select Session.</span>
						</div>
						<div class="three columns">
						    <label for="exam_id">Exam Type</label>
							<select name="exam_id" id="exam_id" class="small">
								<option value="-1">Select Exam Type</option>
								<?php foreach($exam as $examData) {?>
								<option value="<?php echo $examData->exam_id?>"><?php echo $examData->exam_name;?></option>
								<?php  } ?>
							</select>
							<span id="sp_exam_id" class="error">Select Exam.</span>
						</div>
						<div class="three columns">
						    <label for="start_date">Start Date</label>
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
					  <input type="submit" value="Submit" class="button small">
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
						<p>Exam Period List</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($all_exam_period['result'])&& ($all_exam_period['result'])==0) || count($all_exam_period)==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else { ?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Exam Type</th>
									<th>Session Name</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($all_exam_period as $all_exam_periodData) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $all_exam_periodData->exam_name;?></td>
									<td><?php echo $all_exam_periodData->session_name;?></td>
									<td><?php echo date('d/m/Y',strtotime($all_exam_periodData->start_date));?></td>
									<td><?php echo date('d/m/Y',strtotime($all_exam_periodData->end_date));?></td>
									<td class="content_actions">
										<a  href="<?php echo base_url();?>index.php/exam/exam/add_exam/<?php echo $all_exam_periodData->exam_period_id;?>/edit" class="sepV_a" title="Edit">
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
