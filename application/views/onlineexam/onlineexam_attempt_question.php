<script>
	function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };
	$(document).ready(function(){
		$(document).on("keydown", disableF5);
	});
	//NV for Not Visited -> GRAY
		//NA for Not answered  ->RED
		//A for answered -> Green
		//MAR for Mark as Review -> Blue
		//NAMAR for Not Answered Mark as Review -> Light Blue	
	function save_and_next(next,clickType)
	{	
	    var answer = false;
		//btonclk
		ans_status = 'NA';
		if(clickType == "savnext"){
		if($('input:radio[name=answer]:checked').val())
	    answer = $('input:radio[name=answer]:checked').val();
		else
		answer = "";          
		   
		}else{
			answer = "";
		}
		if(answer!="")
		{		
			if($('input:checkbox[name=mark_review]:checked').val())
			ans_status = 'MAR';
			else			
			ans_status = 'A';
		}
		else
		{
			if($('input:checkbox[name=mark_review]:checked').val())
			ans_status = 'NAMAR';
			else			
			ans_status = 'NA';
		}
		var que_no 			=   next; //$('#que_no').val();
		var que_marks_id 	= $('#que_marks_id').val();
		var dataString 		= "answer="+ answer+"&que_no="+next+"&que_marks_id="+que_marks_id+"&ans_status="+ans_status;
		var urldata 		= '<?php echo base_url()?>';
		$.ajax({
				url:urldata+"index.php/onlineexam/online_exam/attempt_question/"+next,
				data:dataString,
				type:'POST',
				dataType: "html",
		            success: function(data) {                        
						    //data is the html of the page where the request is made.
                            $('#question_answer').html(data);
							var ques_no = parseInt(next);
							$("#ques_"+ques_no).css('background','#5DB01A');
							$("#ques_"+ques_no).css('color','#fff');
                        }
		});				
	}
	function prev(prev)
	{	
		var urldata 		= '<?php echo base_url()?>';
		$.ajax({
				url:urldata+'index.php/onlineexam/online_exam/attempt_question/'+prev,
				type:'GET',
				dataType: "html",
				  success: function(data) {
						    //data is the html of the page where the request is made.
                            $('#question_answer').html(data);
                        }				
		});
	}
</script>
<div class="eight columns" style="left: -25px;margin-right:10px">
	<div class="row">
		<div class="twelve columns" style="width:106%;">
			<div class="box_c">
				<div class="box_c_heading cf green">
					<div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
					<p>Online Exam</p>
				</div> 
				<div class="box_c_content" id="question_answer" style="height:430px" > 
					<form action="#" id="frm_add_student_ans" class="nice" method="post" >
						<div class="formRow" id="div_question"> 
							<?php echo "1"." . " ;  echo $online_question[0]->question; ?> </br>
						</div>
						<div class="formRow" id="div_option" style="min-height:345px">
							<ul style="margin-left:25px">
								<li>A . <input type="radio" name="answer" value="A" <?php if(isset($existing_answer['student_ans'])) if( $existing_answer['student_ans'] == "A"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_a); ?></li>
								<li>B . <input type="radio" name="answer" value="B" <?php if(isset($existing_answer['student_ans'])) if( $existing_answer['student_ans'] == "B"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_b); ?></li>
								<li>C . <input type="radio" name="answer" value="C" <?php if(isset($existing_answer['student_ans'])) if( $existing_answer['student_ans'] == "C"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_c); ?></li>
								<li>D . <input type="radio" name="answer" value="D" <?php if(isset($existing_answer['student_ans'])) if( $existing_answer['student_ans'] == "D"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_d); ?></li>
							</ul>
							<input type="hidden" id="que_no" name="que_no" value="<?php echo $online_question[0]->que_no; ?>"/>
							<input type="hidden" id="que_marks_id" name="que_marks_id" value="<?php echo $online_question[0]->que_marks_id; ?>"/></br>
						</div>
						<div class="formRow">
							<div class="row">
								<div class="three columns">
									<label style="font-size:14px !important;"><input type="checkbox" id="mark_review" <?php  if(isset($existing_answer['ans_status'])) if( $existing_answer['ans_status']== "NAMAR" || $existing_answer['ans_status']== "MAR"){echo 'checked="checked"';} ?> name="mark_review">Mark As Review</label>
								</div>
								<div class="two columns" id="div_next">
									<a href="#" onclick="return save_and_next(2,'savnext');">Save & Next</a>
								</div>
							</div>
						</div>
					</form>
				</div>				
			</div>
		</div>
	</div>
</div>
