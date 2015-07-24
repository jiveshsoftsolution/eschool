<script>
//
//function get_paper_teacher()
//	{	
//		var paper_id = $("#paper_id").val();
//                var period_id = $("#period_id").val();
//                var week_day = $("#week_day").val();
//                var session_id = $("#session_id").val();
//                var season_id = $("#season_id").val();
//                var class_section_id = $("#class_section_id").val();
//                
//		var dataString = "season_id=" + season_id + "&session_id=" + session_id + "&paper_id="+ paper_id + "&period_id=" + period_id + "&week_day="+ week_day + "&class_section_id="+ class_section_id;
//                
//                alert(dataString);
//		var urldata = '<?php echo base_url()?>';
//		$.ajax({
//				url:urldata+'index.php/timetble/timetable/retrive_paper_teacher_list/',
//				data:dataString,
//				type:'POST',
//				success:function(response){
//						var obj = JSON.parse(response);
//						$("#teacher_id option").remove();
//						$('#teacher_id').append($('<option>', {
//												value: -1,
//												text: "Select Teacher"
//								}));
//
//						for(var i=0;i<obj.length;i++)
//						{
//							$('#teacher_id').append($('<option>', {
//												value: obj[i].teacher_id,
//												text: obj[i].first_name
//								}));
//						}
//				}
//					
//		});
//	}
//

</script>

<div class="nine columns">
    <div class="row">
        <div class="eleven columns">
          <div class="box_c">
            <div class="twelve columns">
                <div class="box_c">
					<div class="box_c_heading cf box_actions">
						<p>Allot Teacher Paper</p>
					</div>
					<div class="box_c_content">
						<form method="post" action="<?php echo base_url()?>index.php/timetable/timetable/allotteacherpaper/<?php echo $period_id; ?>/<?php echo $week_day; ?>/<?php echo $class_section_id; ?>/<?php echo $session_id; ?>/<?php echo $season_id; ?>" class="nice" id="frm_aloot_teacher_paper">
						<div class="formRow">
							<div class="row">
								

<input type="hidden" id="period_id"  name="period_id" value="<?php echo $period_id; ?>"></input>
								<input type="hidden" id="week_day" name="week_day" value="<?php echo $week_day; ?>"></input>
								<input type="hidden" id="class_section_id" name="class_section_id" value="<?php echo $class_section_id; ?>"></input>
                                                                <input type="hidden" id="session_id" name="session_id" value="<?php echo $session_id; ?>"></input>
								<input type="hidden" id="season_id" name="season_id" value="<?php echo $season_id; ?>"></input>
								<div class="three columns">
									<select id="paper_id" name="paper_id" class="small" >
										<option  value="0">Select paper </option>
										<?php  foreach($paper as $pRow) { ?>
										<option <?php if($pRow->paper_id == $paper_id) echo"selected='selected'"?>  value="<?php echo $pRow->paper_id; ?>"><?php echo $pRow->paper_name ;?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="eight columns" id="techer_list_div_id">
									<select id="teacher_id" name="teacher_id" class="small">
									<option  value="0">Select paper first </option>
									
								</select>
								</div>
							</div>
						</div>
						<div class="formRow">
							<input type="submit" class="button small" value="Submit"></input>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>