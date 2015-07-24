    <?php if(isset($msg) ){
	   echo $msg;
	}
	else
	{  //echo '<pre>'; print_r($online_question);
	?>
		<form action="#" id="frm_add_student_ans" class="nice" method="post" >
			<div class="formRow" id="div_question">
				<?php  echo $online_question[0]->que_no.". ".$online_question[0]->question; ?> </br>
			</div>
			<div class="formRow" id="div_option" style="min-height:345px">
				<ul style="margin-left:25px">
					<li>A . <input type="radio" name="answer" value="A" <?php if(isset($existing_answer['student_ans']) & $existing_answer['student_ans']== "A"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_a); ?></li>
					<li>B . <input type="radio" name="answer" value="B" <?php if(isset($existing_answer['student_ans']) & $existing_answer['student_ans']== "B"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_b); ?></li>
					<li>C . <input type="radio" name="answer" value="C" <?php if(isset($existing_answer['student_ans']) & $existing_answer['student_ans']== "C"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_c); ?></li>
					<li>D . <input type="radio" name="answer" value="D" <?php if(isset($existing_answer['student_ans']) & $existing_answer['student_ans'] == "D"){echo 'checked="checked"';} ?>/><?php echo trim($online_question[0]->answer_d); ?></li>
				</ul>
				<input type="hidden" id="que_no" name="que_no" value="<?php echo $online_question[0]->que_no; ?>"/>
				<input type="hidden" id="que_marks_id" name="que_marks_id" value="<?php echo $online_question[0]->que_marks_id; ?>"/></br>
			</div>
			<div class="formRow">
				   <div class="row">
				   <div class="three columns">
						<label  style="font-size:14px !important;"><input type="checkbox" id="mark_review" <?php if($existing_answer['ans_status']== "NAMAR" || $existing_answer['ans_status']== "MAR"){echo 'checked="checked"';} ?> name="mark_review">Mark As Review</label>
					</div>
					<!--<div class="two columns" id="div_priv">
						<a href="#" onclick="return prev(<?php //echo $online_question[0]->que_no -1; ?>);">Previous</a>
					</div>-->
					<div class="two columns" id="div_next">
						<a href="#" onclick="return save_and_next(<?php echo $online_question[0]->que_no+1; ?>,'savnext');move_ques('ques_<?php echo $online_question[0]->que_no+1; ?>')">Save & Next</a>
					</div>
				</div>
			</div>
		</form>	  
	<?php }  ?>