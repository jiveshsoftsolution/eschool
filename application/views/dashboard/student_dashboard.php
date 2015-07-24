	<script type="text/javascript" src="<?php echo base_url() ?>assets/chartjs/jquery.min.js"></script>
	<script type="text/javascript">
	/*  my Exam peformance*/
	$(function () {
			$('#studentExam').highcharts({
				chart: {
					type: 'column'
				},
				title: {
					text: 'My Exam Performance'
				},
			   
				xAxis: {
					categories: [
						 'Hindi',
						'English',
						'Math',
						'Science',
						'History',
						'Geogyaraphy',
						'Art',
						''
					]
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Students'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">Subject: {point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: [{
					name: 'Santosh',
					data: [40, 60, 75, 45, 80, 55, 60,0]
					
		
				
				},
				   
				{
				
				 name: 'My Class mate',
				  data: [65, 0, 0, 55, 0, 75, 70,0]
				
				}
				
				
				
				]
				
			});
		});
		  /* END*/ 
	</script>
	<script type="text/javascript">
	/*  Student Attendance for Leave, Absent , Present*/
	$(function () {
			$('#mothelyAttendance').highcharts({
				chart: {
					type: 'column'
				},
				title: {
					text: 'Monthly Attendance'
				},
			   
				xAxis: {
					categories: [
						'Jan',
						'Feb',
						'Mar',
						'Apr',
						'May',
						'Jun',
						'Jul',
						'Aug',
						'Sep',
						'Oct',
						'Nov',
						'Dec',
						''
					]
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Students'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: [{
					name: 'Present',
					data: [22, 23, 24, 21, 22, 24, 23, 23, 24, 24, 23, 22,23]
				},				   
				{				
					name: 'Absent',
					data: [3, 4, 4, 2, 3, 3, 4, 2, 3, 2, 2, 3,4]				
				},
				{				
					name: 'Leave',
					data: [2, 1, 1, 1, 3, 3, 2, 2, 3, 2, 2, 3,1]				
				}
				]				
			});
		});
		
	  /* END*/ 
	  
			</script>
	<style type="text/css">
		.box_c_content
		{
			min-height:365px;
		}
	</style>
	<div class="nine columns">
		<div class="row">
			<div class="six columns">
				<div class="box_c">
					<div class="box_c_heading cf green">
						<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
						<p>Marks Exam	
							<select name="examID" id="exam_id" style="display:inline-table">
								<option value="1">Half Yearly</option>
								<option value="2">Anuval</option> 
							</select>
							Subject
							<select name="subjectID" id="subject_id" style="display:inline-table">
								<option value="1">All Subject</option>
								<option value="2">Hindi</option> 
							</select>
						</p>
					</div>
					<div class="box_c_content">
						<div class="inner_block">
							<div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">
								<div class="items" style="width: 100%">
									<div class="left" style="width: 100%">
										<div id="studentExam" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>
									</div>
									<div class="left">
										<div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="six columns">
				<div class="box_c">
					<div class="box_c_heading cf green">
						<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
							<p>Attendance Record</p>
					</div>
					<div class="box_c_content">
						<div class="inner_block">
							<div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">
								<div class="items" style="width: 100%">
									<div class="left" style="width: 100%">
										<div id="mothelyAttendance" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>
									</div>
									<div class="left">
										<div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="twelve columns">
				<div class="box_c">
					<div class="box_c_heading cf box_actions">
						<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
						<p>Notice Area</p>
					</div>
					<div class="box_c_content" style=" overflow:scroll; height:350px; ">
						<p class="inner_heading sepH_c">Latest info</p>
						<ul class="overview_list">
						<?php if(!isset($ems_admin_notice['result'])){ foreach($student_notice as $studentNoticeData) {?>
							<li>
								<a href="#">
									<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
									<span class="ov_nb"><?php if(isset($studentNoticeData->notice_subject)){echo $studentNoticeData->notice_subject; }?></span>
									<span class="ov_text"><?php if(isset($studentNoticeData->notice)){echo $studentNoticeData->notice;} ?></span>
								</a>
							</li>
							<?php  } }else { echo '<h2 align ="center">Notice Not Found </h2>';}?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="twelve columns">
				<div class="box_c">
					<div class="twelve columns">
						<div class="box_c">
							<div class="box_c_heading cf box_actions">
								<p>Time Table</p>
							</div>
							<div class="box_c_content">
								<?php  if((isset($period['result'])&& ($period['result'])==0 ) ||  count($period)==0) { ?>
									<div class="alert-box warning">
										Record not found!
										<a href="javascript:void(0)" class="close">×</a>
									</div> 
								<?php } else {?>
									<table class="display" id="content_table">
										<thead>
											<tr>
												<th>Period</th>
												<th>Monday</th>
												<th>Tuesday</th>
												<th>Wednesday</th>
												<th>Thursday</th>
												<th>Friday</th>
												<th>Saturday</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach($period as $periodKey=>$value)  { ?>
												<tr>
													<td>
														<?php 
															$periodDetail = explode('-', $periodKey);
															echo "Period:".$periodDetail[0]. '<br>';
															if(isset($periodDetail[2])){echo 'Time: '. $periodDetail[2].'-';}
															if(isset($periodDetail[3])){echo $periodDetail[3];}			
														?>
													</td>
													<td>
														<?php if(isset($value['monday'])){ ?>
														<?php echo $value['monday']['paper_name'];echo "<br>";echo $value['monday']['teacher_name'];?>
														<?php } ?>
													</td>
													<td>
														<?php if(isset($value['tuesday'])){?>
														<?php echo $value['tuesday']['paper_name'];echo "<br>";echo $value['tuesday']['teacher_name'];?>
														<?php } ?>
													</td>
													<td> 
														<?php if(isset($value['wednesday'])){?>
														<?php echo $value['wednesday']['paper_name'];echo "<br>";echo $value['wednesday']['teacher_name'];?>
														<?php } ?>
													</td>
													<td>
														<?php if(isset($value['thursday'])){?>
														<?php echo $value['thursday']['paper_name'];echo "<br>";echo $value['thursday']['teacher_name'];?>
														<?php } ?>
													</td>
													<td>
														<?php if(isset($value['friday'])){?>
														<?php echo $value['friday']['paper_name'];echo "<br>";echo $value['friday']['teacher_name'];?>
														<?php } ?>
													</td>
													<td>
														<?php if(isset($value['saturday'])){?>
														<?php echo $value['saturday']['paper_name']; echo "<br>";echo $value['saturday']['teacher_name'];?>
														<?php } ?>
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