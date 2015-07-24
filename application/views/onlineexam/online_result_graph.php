<script type="text/javascript" src="<?php echo base_url() ?>assets/chartjs/jquery.min.js"></script>



<script type="text/javascript">
/*  Teacher Performence*/
$(function () {
        $('#online_exam_question_answer').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Online Exam Attempt Question'
            },
           
            xAxis: {
                categories: [
                     'Total Question',
                    'Attempt Question',
                    'Correct Answer',
                    'Wrong Answer',
					'Non Attempt Question'
                    
					
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Students'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
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
                name: 'Total',
                data: [50, 40, 30, 10 , 10]
			
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
            text: 'Online Exam Result'
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
                ['Hindi',   40.0],
                ['English',       30.8],
                ['Math',    19.2],
                ['science',     40],
				 ['Grammer',     50],
				  ['Art',     60]
                 
				 ]
        }]
    });
});
    
 /* END*/ 
		</script>
 




    <div class="nine columns">
		



      <div class="row">
	  <div class="twelve columns">

          <div class="box_c">

            <div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>

              <p>Paper <select name="paper_id" id="paper_id" style="display: inline-table">
									<option value="-1">Select Paper</option>                                    <?php foreach($paper as $paperData) {?>
									<option value="<?php echo $paperData->paper_id ?>"><?php echo $paperData->paper_name; ?></option>
									<?php } ?>
								</select>
			  </p>
            </div>

            <div class="box_c_content">

              <div class="inner_block">

                <div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">

                  <div class="items" style="width: 100%">

                    <div class="left" style="width: 100%">

                       <div id="online_exam_question_answer" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>

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

             <p>
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



      </div>
	  
	  
	  

    </div>

 











