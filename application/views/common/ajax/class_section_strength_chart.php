<?php
                      // code for Class strength//
					  if(isset($classStrength))
					  {
                $classCategory = "";
                 $classData = "";
                
                $count = 0;
                foreach($classStrength as $key=>$value){
                    if($count == 0){
                         $classCategory = $classCategory . "'$key'";
                         $classData = $classData . $value;
                    }else
                    {
                         $classCategory = $classCategory . ", '$key'";
                         $classData = $classData . ",". $value;
                    }
                   
                   $count = $count + 1;
                }
                }
				else
				{
				// code for class section strength
				$count = 0;
				$classSectionCategory ="";
				$classSectionData = "";
                foreach($classSectionStrength as $key=>$value){
                    if($count == 0){
                         $classSectionCategory = $classSectionCategory . "'$key'";
                         $classSectionData = $classSectionData . $value;
                    }else
                    {
                         $classSectionCategory = $classSectionCategory . ", '$key'";
                         $classSectionData = $classSectionData . ",". $value;
                    }
                   
                   $count = $count + 1;
                }
				}
                ?>
				
				
				<script type="text/javascript">
$(function () {
        $('#class_section_strength').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [ <?php if(isset($classStrength))echo $classCategory; else if($classSectionCategory) echo $classSectionCategory; ?> ]
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
                    '<td style="padding:0"><b>{point.y:f} </b></td></tr>',
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
                data: [<?php if(isset($classData)) echo $classData; else if(isset($classSectionData)) echo $classSectionData; ?>]
    
            
            }]
        });
    });
	</script>