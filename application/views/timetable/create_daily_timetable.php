<!--<script type="text/javascript" >
	function openAllotTeacherPaper(period_id,dayName)
	{
		var class_section_id = document.getElementById("class_section_id").value;
		var session_id = document.getElementById("session_id").value;
		var season_id = document.getElementById("season_id").value;
		window.open("<?php echo base_url(); ?>index.php/timetable/timetable/allotteacherpaper/"+period_id+"/"+dayName+"/"+class_section_id+"/"+session_id+"/"+season_id+"/0/0", "allotTeacher", "")    
	}
	function openAllotedTeacherPaper(period_id,dayName,teacher_id,paper_id)
	{
		var class_section_id = document.getElementById("class_section_id").value;
		var session_id = document.getElementById("session_id").value;
		var season_id = document.getElementById("season_id").value;
		window.open("<?php echo base_url(); ?>index.php/timetable/timetable/allotteacherpaper/"+period_id+"/"+dayName+"/"+class_section_id+"/"+session_id+"/"+season_id+"/"+teacher_id+"/"+paper_id, "allotTeacher", "")    
	}
</script>-->
<script type="text/javascript">
 
        
   $(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Time Table</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/timetable/timetable/createdailytimetable" id="frm_create_time_table"class="nice" method="post" onsubmit="return validate_create_time_table();">
			   <h3>Time Table</h3>             
                <div class="formRow">
					<div class="row">
						<div class="three columns">
							<label for="session_id">Session</label>
							<select name="session_id" id="session_id" class="small">
							<option value="-1">Select Session</option>
							<?php foreach($session as $sRow) {?>
							<option <?php if($sRow->session_id == $session_id) echo"selected='selected'"?> value="<?php echo $sRow->session_id; ?>"> <?php echo $sRow->session_name; ?> </option>
							<?php  } ?>
							</select>
							<span id="sp_session_id" class="error">Select Session.</span>
						</div>
						<div class="three columns">
							<label for="season_id">Season</label>
							<select name="season_id" id="season_id" class="small">
							<option value="-1">Select Season</option>
							<?php foreach($season as $sRow) {?>
							<option <?php if($sRow->season_id == $season_id) echo"selected='selected'"?>   value="<?php echo $sRow->season_id; ?>"> <?php echo $sRow->season_name; ?> </option>
							<?php  } ?>
							</select>
							<span id="sp_season_id" class="error">Select Season.</span>
						</div>
						<div class="seven columns">
							<label for="class_section_id">Class Section</label>
							<select name="class_section_id" id="class_section_id" class="small">
							<option value="-1">Select Class Section</option>
							<?php foreach($classSecton as $csRow) {?>
							<option <?php if($csRow->class_section_id == $class_section_id) echo"selected='selected'"?>   value="<?php echo $csRow->class_section_id; ?>"><?php echo $csRow->class_name .'-'. $csRow->section_name ?> </option>
							<?php  } ?>
							</select>
							<span id="sp_class_section_id" class="error">Select Class Section.</span>
						</div>
					</div>
				</div>				 
				<div class="formRow">
					<input type="submit" class="button small" value="Submit">
				</div>
			</form>
		  </div>
		</div>
	  </div>
  </div>
  </div>
  
	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="twelve columns">
                <div class="box_c">
					<div class="box_c_heading cf box_actions">
						<p>Create Time Table</p>
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
										<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey; ?>,'monday',<?php echo $value['monday']['teacher_id']?>,<?php echo $value['monday']['paper_id']?>)">
											<?php echo $value['monday']['teacherName'];echo "<br>";echo $value['monday']['paperName'];?>
										</a>
										<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['monday']['daily_timetable_id']; ?>/<?php echo $season_id; ?>/<?php echo $session_id; ?>/<?php echo $class_section_id; ?>" >Delete </a>
										<?php } else{ 
										
										
										?>
										<a target="_parent" href="<?php echo base_url();?>index.php/timetable/timetable/allotteacherpaper/<?php echo $periodDetail[1]; ?>/monday/<?php echo $class_section_id; ?>/<?php echo $session_id; ?>/<?php echo $season_id; ?>/0/0" class="fancybox gh_button small">Create</a>
										<?php }?>
									</td>
									<td>
										<?php if(isset($value['tuesday'])){?>
										<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodDetail[1]; ?>,'tuesday',<?php echo $value['tuesday']['teacher_id']?>,<?php echo $value['tuesday']['paper_id']?>)">
											<?php echo $value['tuesday']['teacherName'];echo "<br>";echo $value['tuesday']['paperName'];?>
										</a>
										<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['tuesday']['daily_timetable_id']; ?>/<?php echo $season_id; ?>/<?php echo $session_id; ?>/<?php echo $class_section_id; ?>" >Delete </a>
										<?php }else{?>
										<a target="_parent" href="<?php echo base_url();?>index.php/timetable/timetable/allotteacherpaper/<?php echo $periodDetail[1]; ?>/tuesday/<?php echo $class_section_id; ?>/<?php echo $session_id; ?>/<?php echo $season_id; ?>/0/0" class="fancybox gh_button small">Create</a>
										<?php }?>
									</td>
									<td> 
										<?php if(isset($value['wednesday'])){?>
										<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey[1]; ?>,'wednesday',<?php echo $value['wednesday']['teacher_id']?>,<?php echo $value['wednesday']['paper_id']?>)">
											<?php echo $value['wednesday']['teacherName'];echo "<br>";echo $value['wednesday']['paperName'];?>
										</a>
										<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['wednesday']['daily_timetable_id']; ?>/<?php echo $season_id; ?>/<?php echo $session_id; ?>/<?php echo $class_section_id; ?>" >Delete </a>
										<?php }else{?>
										<a target="_parent" href="<?php echo base_url();?>index.php/timetable/timetable/allotteacherpaper/<?php echo $periodDetail[1]; ?>/wednesday/<?php echo $class_section_id; ?>/<?php echo $session_id; ?>/<?php echo $season_id; ?>/0/0" class="fancybox gh_button small">Create</a>
										<?php } ?>
									</td>
									<td>
										<?php if(isset($value['thursday'])){?>
										<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey[1]; ?>,'thursday',<?php echo $value['thursday']['teacher_id']?>,<?php echo $value['thursday']['paper_id']?>)">
											<?php echo $value['thursday']['teacherName'];echo "<br>";echo $value['thursday']['paperName'];?>
										</a>
										<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['thursday']['daily_timetable_id']; ?>/<?php echo $season_id; ?>/<?php echo $session_id; ?>/<?php echo $class_section_id; ?>" >Delete </a>
										<?php }else{ ?>
										<a target="_parent" href="<?php echo base_url();?>index.php/timetable/timetable/allotteacherpaper/<?php echo $periodDetail[1]; ?>/thursday/<?php echo $class_section_id; ?>/<?php echo $session_id; ?>/<?php echo $season_id; ?>/0/0" class="fancybox gh_button small">Create</a>
										<?php }?>
									</td>
									<td>
										<?php if(isset($value['friday'])){?>
										<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey[1]; ?>,'friday',<?php echo $value['friday']['teacher_id']?>,<?php echo $value['friday']['paper_id']?>)">
											<?php echo $value['friday']['teacherName'];echo "<br>";echo $value['friday']['paperName'];?>
										</a>
										<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['friday']['daily_timetable_id']; ?>/<?php echo $season_id; ?>/<?php echo $session_id; ?>/<?php echo $class_section_id; ?>" >Delete </a>
										<?php }else{?>
										<a target="_parent" href="<?php echo base_url();?>index.php/timetable/timetable/allotteacherpaper/<?php echo $periodDetail[1]; ?>/friday/<?php echo $class_section_id; ?>/<?php echo $session_id; ?>/<?php echo $season_id; ?>/0/0" class="fancybox gh_button small">Create</a>
										<?php }?>
									</td>
									<td>
										<?php if(isset($value['saturday'])){?>
										<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey[1]; ?>,'saturday',<?php echo $value['saturday']['teacher_id']?>,<?php echo $value['saturday']['paper_id']?>)">
											<?php echo $value['saturday']['teacherName']; echo "<br>";echo $value['saturday']['paperName'];?>
										</a>
										<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['saturday']['daily_timetable_id']; ?>/<?php echo $season_id; ?>/<?php echo $session_id; ?>/<?php echo $class_section_id; ?>" >Delete </a>
										<?php
                                                                                
                                                                                }else{?>
                                                                                
                                                                               
                                                                                <a target="_parent" href="<?php echo base_url();?>index.php/timetable/timetable/allotteacherpaper/<?php echo $periodKey[1]; ?>/saturday/<?php echo $class_section_id; ?>/<?php echo $session_id; ?>/<?php echo $season_id; ?>/0/0" class="fancybox gh_button small">Create</a>

										<?php }?>
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
