<script type="text/javascript" src="<?php echo base_url() ?>assets/chartjs/jquery.min.js"></script>
<script type="text/javascript">
	/*  my Exam peformance*/
	$(function () {
		$('#studentExam').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'Exam Performance'
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
				data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4,0]
			},
				{
					name: 'Absent',
					data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4 ,0]
				},
				{
					name: 'Leave',
					data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4,0]
				}
			]
		});
	});
	/* END*/ 
</script>

<div class="nine columns">

	<div class="row">
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf green">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
					<p>
							Exam Marks
							<select name="examID" id="exam_id" style="display:inline-table">
								<option value="1">Half Yearly</option>
								<option value="2">Annual</option> 
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
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
							<div class="items">
								<div class="left">
									<div id="studentExam" style="height:290px;margin:0 auto" class="chart_flw" title="Combined chart"></div>
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
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
							<div class="items">
								<div class="left">
									<div id="mothelyAttendance" style="height:290px;margin:0 auto" class="chart_flw" title="Pie chart"></div>
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

	<!--<div class="row">
		<div class="twelve columns">
			<div class="box_c">
				<div class="box_c_heading cf green">
					<div class="box_c_ico"><img src="<?php //echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
					<p>Charts</p>
				</div>
				<div class="box_c_content">
					<div class="inner_block">
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
							<div class="items">
								<div class="left" >
									<div id="fees_chart" title="Unique visitors" style="height:280px;margin:0 auto;" class="chart_flw"></div>
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
	
	-->
	<div class="row">
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions green">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>Notice Area</p>
				</div>
				<div class="box_c_content">
					<p class="inner_heading sepH_c">Latest info</p>
					<ul class="overview_list">
						<li>
							<a href="#">
								<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
								<span class="ov_nb">Dance Competition</span>
								<span class="ov_text">Our school is organizing a dance competition on 10th April.</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
								<span class="ov_nb">Dance Competition</span>
								<span class="ov_text">Our school is organizing a dance competition on 10th April.</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
								<span class="ov_nb">Dance Competition</span>
								<span class="ov_text">Our school is organizing a dance competition on 10th April.</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
								<span class="ov_nb">Dance Competition</span>
								<span class="ov_text">Our school is organizing a dance competition on 10th April.</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions green">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>Time Table</p>
				</div>
				<div class="box_c_content">
					<p class="inner_heading sepH_c">Latest info</p>
					<ul class="overview_listTime_table">
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">07:30 AM</span><span style="margin-left:50px">1th Period</span><span style="margin-left:50px">Hindi</span><span style="float:right; width:auto; font-weight:500; font-size:14px">Ranjan Singh</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">08:30 AM</span><span style="margin-left:50px">2nd Period</span><span style="margin-left:50px">English</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Amar Tiwari</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">08:30 AM</span><span style="margin-left:50px">3rd Period</span><span style="margin-left:50px">Math</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Rahul Pandey</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">10:30 AM</span><span style="margin-left:50px">4th Period</span><span style="margin-left:50px">Science</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Ritesh Mishra</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">11:30 AM</span><span style="margin-left:50px">5th Period</span><span style="margin-left:50px">History</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">R. Thomus</span>                                     
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">12:30 PM</span><span style="margin-left:50px"> Interval </span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>