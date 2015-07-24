
<script type="text/javascript">
/*  Student Attendance for Leave, Absent , Present*/
$(function () {
        $('#attendanceClassSection').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Today Attendance Of Student'
            },
           
            xAxis: {
                categories: [ <?php if(isset($className))echo $className; ?> ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Students'
                }
            },
             tooltip: {
                headerFormat: '<span style="color:{series.color};font-size:10px">Class Section:{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} </b></td></tr>',
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
                data: [<?php if(isset($absentStudent))echo $absentStudent;  ?>]
				
    
            
            },
			   
			{
			
			 name: 'Absent',
              data: [<?php if(isset($presentStudent))echo $presentStudent;  ?>]
			
			},
			{
			
			 name: 'Leave',
                data: [<?php if(isset($leaveStudent)) echo $leaveStudent;  ?>]
			
			}
			
			
			
			]
			
        });
    });
	
	  /* END*/ 
</script>
	