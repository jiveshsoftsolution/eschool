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
							<?php  if($exam_data['online_exam_id']>=1) { ?>
							<strong>Instruction:</strong>
							<ul style="line-height:30px;margin-left:60px;">
							<li>Subject : <strong><?php echo $exam_data['paper_name'];?></strong></li>
							<li>Time allotted : <strong><?php echo $exam_data['exam_duration'];?> Hours </strong>.</li>
							<li>Total number of questions : <?php echo $exam_data['total_ques'];?></li>						
							<li>No negative marking is available here.</li>
							<li>Click Here &nbsp;&nbsp;<strong><a href="<?php echo base_url();?>index.php/onlineexam/online_exam/attempt_question" >Start</a></strong></li>
							</ul>	
							<?php } else { ?>
							<div class="alert-box warning">
							Today is no Examination !
							<a href="javascript:void(0)" class="close">×</a>
							</div> 
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
