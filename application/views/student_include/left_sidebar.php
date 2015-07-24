 <div class="container container_bg">
	<div class="row">
	<!-- Start Left Slide Bar-->
	<div class="three columns">
		<div class="box_c">
			<div class="box_c_heading cf box_actions green" >
				<p>Profile</p>
			</div>
			<div class="box_c_content" style="line-height:30px">
				<ul class="sepH_b filter_content" >
					<li>
						<div class="user_avatar" style="vertical-align:top"> 
							<img src="<?php echo base_url()?>assets/students_images/resize_image/11.jpg" alt="" style="height:115px;border: 4px solid #00A8E1;" /> 
							<div style="margin-left: 135px; margin-top: -80px;"><strong style="font-weight:600"><?php echo $studentName; ?></strong></div>
							<div style="margin-left: 135px;margin-bottom:10px"><label><strong style="font-weight:600">Class-Section :</strong></label> <?php echo $classSection; ?></div>
						</div>
					</li>
					<li><label><strong style="font-weight:600">Father Name :</strong></label> <?php echo $fatherName; ?></li>
					<li><label><strong style="font-weight:600">Email :</strong></label> <?php echo $email; ?></li>
<!--					<li><label><strong style="font-weight:600">Roll No :</strong></label> 12345</li>-->
				</ul>
			</div>
		</div>					
		<div>
			<div class="box_c">
				<div class="box_c_heading cf box_actions green" >
					<p>Attendance</p>
				</div>
				<div class="box_c_content">
					<p class="inner_heading sepH_c">Current Month's</p>
						<ul class="overview_list">
							<div id="today_st_attendance" style="height:200px;margin:0 auto" class="chart_flw" title="Pie chart"></div>
								<li>
									<a href="#">
										<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/dollar.png)" alt="" />
										<span class="ov_nb">200 Present</span>
										<span class="ov_nb">200 leave</span>
										<span class="ov_nb">200 Absent</span>
									</a>
								</li>
						</ul>
				</div>
			</div>
		</div>					
	</div>				
             
	<!-- END LEFT SLIDE BAR-->

	

	