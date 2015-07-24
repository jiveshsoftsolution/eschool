<div class="nine columns">
	<div class="row">	
		<div class="twelve columns">
			<div class="box_c">
				<div class="box_c_heading cf red">
					<div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
					<p>Online Exam</p>
				</div>
				<div class="box_c_content">
					<form action="<?php echo base_url()?>index.php/onlineexam/online_exam/add_online_exam_question_ans" id="frm_add_question"class="nice" method="post" onsubmit="return validate_add_question();">
						<h3>Online Exam</h3>             
						<div class="formRow">
							<div class="row">
								<div class="six columns">
									<label for="question">Add Question</label>
									<textarea id="question" name="question" class="input-text large"></textarea>
									<span id="sp_question" class="error">Enter Question.</span>
								</div>
								<div class="three columns">
									<label for="que_no">Question No.</label>
									<input type="text" id="que_no" name="que_no" class="input-text small" placeholder="No of questions" />
									<span id="sp_que_no" class="error">Enter Question No.</span>
								</div>
								<div class="three columns">
									<label for="que_marks">Question Marks.</label>
									<input type="text" id="que_marks" name="que_marks" class="input-text small" placeholder="No of questions" />
									<span id="sp_que_marks" class="error">Enter Question Marks.</span>
								</div>
							</div>				 
						</div>
						<div class="formRow">
							<div class="row">
								<div class="six columns">
									<label for="answer_a">Option A</label>
									<input type="text" id="answer_a" name="answer_a" class="input-text large" placeholder="Option A" />
									<span id="sp_answer_a" class="error">Enter Option A.</span>
								</div>
									<div class="six columns">
									<label for="answer_b">Option B</label>
									<input type="text" id="answer_b" name="answer_b" class="input-text large" placeholder="Option B" />
									<span id="sp_answer_b" class="error">Enter Option B.</span>
								</div>	
							</div>
							<div class="row">
								<div class="six columns">
									<label for="answer_c">Option C</label>
									<input type="text" id="answer_c" name="answer_c" class="input-text large" placeholder="Option C" />
									<span id="sp_answer_c" class="error">Enter Option C.</span>
								</div>
								<div class="six columns">
									<label for="answer_d">Option D</label>
									<input type="text" id="answer_d" name="answer_d" class="input-text large" placeholder="Option D" />
									<span id="sp_answer_d" class="error">Enter Option D.</span>
								</div>
							</div>
						</div>
						<div class="formRow">
							<div class="row">
								<div class="three columns">
									<label for="correct_ans">True Answer</label>
									<select name="correct_ans" id="correct_ans" class="small">
										<option value="-1">Select True Answer</option>
										<option value="A">Answer A</option>
										<option value="B">Answer B</option>
										<option value="C">Answer C</option>
										<option value="D">Answer D</option>
										<option value="E">None of These</option>
									</select>
									<span id="sp_correct_ans" class="error">Select Answer.</span>
									<input type="hidden" name="online_exam_id" value="<?php echo $online_exam_id; ?>"/>
								</div>
							</div>				 
						</div>
						<div class="formRow cf">
							<input type="submit" class="button small" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

