<script type="text/javascript" src="<?php echo base_url() ?>assets/chartjs/jquery.min.js"></script>
<script type="text/javascript">
/*  Student Attendance for Leave, Absent , Present*/
$(function () {
        $('#teacherAttendance').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Attendance Chart'
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
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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



<script type="text/javascript">
/*  Teacher Performence*/
$(function () {
        $('#teacherPerformance').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Teacher Performance'
            },
           
            xAxis: {
                categories: [
                     '0-32%',
                    '33-50%',
                    '51-60%',
                    '61-75%',
                    '76% - Above',
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
                headerFormat: '<span style="font-size:12px">Percent: {point.key}</span><table>',
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
                name: 'Student',
                data: [50, 120, 200, 50, 10 ,0]
			
            },
			
			]
			
        });
    });
	  /* END*/ 
</script>

<script type="text/javascript">
 /* Student Performance*/ 
 
$(function () {
    $('#studentPerformance').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Student Performance'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Percent',
            data: [
                ['First',   40.0],
                ['Second',       30.8],
                ['Third',    19.2],
                ['Fail',     10]
                 ]
        }]
    });
});
    
 /* END*/ 
		</script>
 




    <div class="nine columns">
		


 <div class="row">
     <div class="six columns">

          <div class="box_c">

            <div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>

             <p>Monthly Attendance </p>

            </div>

            <div class="box_c_content">

              <div class="inner_block">

                <div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">

                  <div class="items" style="width: 100%">

                    <div class="left" style="width: 100%">

                       <div id="teacherAttendance" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>

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
 <div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>

            <p> Performence Subject
			   		
						<select name="subjectID" id="subject_id" style="display:inline-table">
							<option value="1">Hindi</option>
							<option value="2">Scince</option> 
						</select>
			  </p>

            </div>

            <div class="box_c_content">

              <div class="inner_block">

                <div class="h_scrollable sepH_a sw_resizedEL" style="height:290px">

                  <div class="items">

                    <div class="left">

                      <div id="teacherPerformance_subject" title="Unique visitors" style="height:290px;margin:0 auto" class="chart_flw"></div>

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
<div class="six columns">

          <div class="box_c">

            <div class="box_c_heading cf">

              <div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>


            <p>Student Performence
			    <select name="class_section_id" id="class section_id_SP" style="display:inline-table">
							
							<?php foreach($classSection as $classSectonData) {?>
							<option value="<?php echo $classSectonData->class_section_id ?>"><?php echo $classSectonData->class_name.' - '.$classSectonData->section_name; ?></option>
							<?php } ?>
						</select>
						
						Exam
						<select name="examID" id="exam_id" style="display:inline-table">
							<option value="1">Half Yearly</option>
							<option value="2">Anuval</option> 
						</select>
			  
			  </p>

            </div>

            <div class="box_c_content">

              <div class="inner_block">

                <div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">

                  <div class="items" style="width: 100%">

                    <div class="left" style="width: 100%">

                       <div id="studentPerformance" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>

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

            <div class="box_c_heading cf">

              <div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>


             <p>Teacher Performence
			   
						Paper
						<select name="paperID" id="paper_id" style="display:inline-table">
							<option value="1">Hindi First</option>
							<option value="2">Science</option> 
						</select>
			  </p>

            </div>

            <div class="box_c_content">

              <div class="inner_block">

                <div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">

                  <div class="items" style="width: 100%">

                    <div class="left" style="width: 100%">

                       <div id="teacherPerformance" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>

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
            <div class="twelve columns">
                <div class="box_c">
					<div class="box_c_heading cf box_actions">
						<p>Time Table</p>
					</div>
					<div class="box_c_content">
						<?php if((isset($period['result'])&& ($period['result'])==0 ) ||  count($period)==0) { ?>
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
									<td><?php 
											$periodDetail = explode('-', $periodKey);
											 echo "Period:".$periodDetail[0]. '<br>';
											if(isset($periodDetail[2])){echo 'Time: '. $periodDetail[2].'-';}
											if(isset($periodDetail[3])){echo $periodDetail[3];}

									?></td>
									<td>
										<?php if(isset($value['monday'])){ ?>
										
											<?php echo $value['monday']['paper_name'];echo "<br>";echo $value['monday']['class_section_name'];?>
										
										
										<?php } ?>
										
									</td>
									<td>
										<?php if(isset($value['tuesday'])){?>
										
											<?php echo $value['tuesday']['paper_name'];echo "<br>";echo $value['tuesday']['class_section_name'];?>
										
										<?php } ?>
									</td>
									<td> 
										<?php if(isset($value['wednesday'])){?>
										
											<?php echo $value['wednesday']['paper_name'];echo "<br>";echo $value['wednesday']['class_section_name'];?>
										
										<?php } ?>
									</td>
									<td>
										<?php if(isset($value['thursday'])){?>
										
											<?php echo $value['thursday']['paper_name'];echo "<br>";echo $value['thursday']['class_section_name'];?>
										
										<?php } ?>
									</td>
									<td>
										<?php if(isset($value['friday'])){?>
										
											<?php echo $value['friday']['paper_name'];echo "<br>";echo $value['friday']['class_section_name'];?>
										
										<?php } ?>
									</td>
									<td>
										<?php if(isset($value['saturday'])){?>
										
											<?php echo $value['saturday']['paper_name']; echo "<br>";echo $value['saturday']['class_section_name'];?>
										
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

 











