	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Exam</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/exam/exam/insert_exam" id="frm_add_exam"class="nice" method="post" onsubmit="return validate_add_exam();">
			   <h3>Add Exam</h3>             
                <div class="formRow">
					<div class="row">
						<div class="four columns">
						    <label for="exam_name">Exam Name</label>
							<input type="text" id="exam_name" name="exam_name" class="input-text small" placeholder="Exam Name" value="<?php if(isset($examData->exam_name)) echo $examData->exam_name;?>" />
							<span id="sp_exam_name" class="error">Enter Exam Name.</span>
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
						<p>Exam List</p>
					</div>
					<div class="box_c_content">
						<?php if(isset($all_exam['result'])&& ($all_exam['result'])==0) { ?>
						<div class="alert-box warning">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						<?php } else {?>
						<table class="display " id="content_table">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Exam Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; foreach($all_exam as $all_examData) { ?>
								<tr>
									<td class="essential"><?php echo $i++;?></td>
									<td><?php echo $all_examData->exam_name;?></td>
									<td class="content_actions">
										<a  href="<?php echo base_url();?>index.php/exam/exam/add_exam/<?php echo $all_examData->exam_id;?>/edit" class="sepV_a" title="Edit">
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
