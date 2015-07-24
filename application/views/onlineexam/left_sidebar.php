<script type="text/javascript">
	var ques_no = 1;
	var timer = '00:00:00';
	timer = '<?php echo $time; ?>'
	$(document).ready(function() {
		jQuery('#counter').countdown({
			image: '<?php echo base_url()?>assets/assets/lib/reverseTimer/img/digits.png',
			startTime: timer
		});
	});
	
//	$(document).ready(function() {
//		$("#ques_"+ques_no).css('background','lightblue');
//		$("#ques_"+ques_no).css('color','#fff');
//	});
	
	function move_ques(ques_no)
	{
		$("#"+ques_no).css('background','lightblue');
		$("#"+ques_no).css('color','#fff');
	}
	
	function logout_onlineexam()
	{	
		var urldata = '<?php echo base_url();?>index.php/onlineexam/online_exam/logout_onlineexam';
		$.ajax({
				url:urldata,
				type:'POST',
				success:function(response){
						$(".online_exam_container_bg").html(response);
				}						
		});
	}
</script>
<!-- Start Left Slide Bar-->
<div class="five columns" style="width:31.2%;" id="questioner_id">
	<div class="box_c" style="margin-bottom:35px">
		<div class="box_c_heading cf box_actions green" >
			<p>Questions with status</p>
		</div>
		<div class="box_c_content" style="line-height:30px">
			<div id="counter"></div>
			<div class="desc">
				<div>Hours</div>
				<div>Minutes</div>
				<div style="margin-right:5px;">Seconds</div>
			</div>
			<hr style="margin-top:5px;margin-left:0px;margin-right:0px;margin-bottom:0px"/>
			<div class="online_exam_quest_status">
				<ul>
				<?php 
				//NV for Not Visited -> GRAY
				//NA for Not answered  ->RED
				//A for answered -> Green
				//MAR for Mark as Review -> Blue
				//NAMAR for Not Answered Mark as Review -> Light Blue	
				foreach($allQuestionWithStatus  as $questionRow)
				{ ?>
					<li style="<?php if($questionRow['ans_status'] == "NA" ){ echo "background-color:#E04207; color:#fff;"; }else if($questionRow['ans_status'] == "NV" ){echo "background-color:#E4E4E4;color:#FFFFFF;"; } else if($questionRow['ans_status'] == "A" ){echo "background-color:#68B61D;color:#FFFFFF"; } else if($questionRow['ans_status'] == "MAR" ){echo "background-color:#A377CA;color:#fff;"; } else if($questionRow['ans_status'] == "NAMAR" ){echo "background-color:#986EC5;color:#fff;"; } ?>" class="ques_list_li" id="ques_<?php echo $questionRow['que_no'];?>"><a href="#" onclick="javascript:save_and_next(<?php echo $questionRow['que_no'];?>,'btonclk')"><span style=" color: white"><?php echo $questionRow['que_no'];?></a></span></li>
				<?php
				}
				?>
				</ul>
			</div>
			<hr style="margin:0px"/>
			<form action="#" method="post" style="margin-bottom:5px">
				<div class="formRow" style="padding:5px 5px">
					<input type="button" class="button small" value="Submit" onclick="logout_onlineexam()">
				</div>
			</form>
		</div>
	</div>									
</div>   
<!-- END LEFT SLIDE BAR-->
	
	
