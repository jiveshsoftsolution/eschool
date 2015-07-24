<script type="text/javascript" >
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
</script>

<div id="content" class="span10">
<!-- content starts -->
<?php echo form_open('timetable/timetable/createdailytimetable'); ?>
<div>


</div><!--/row-->


<!-- content ends -->
</div><!--/#content.span10-->

<!-- Start Table -->
<!-- Start Table -->
<div  class="span10">

<div class="box span12">

<select id="session_id" data-rel="chosen" name="session_id" class="span5" >
<option  value="0">Select Session </option>
<?php foreach($session as $sRow) {?>

<option <?php if($sRow->session_id == $session_id) echo"selected='selected'"?> value="<?php echo $sRow->session_id; ?>"> <?php echo $sRow->session_name; ?> </option>
<?php } ?>
</select>


<select id="season_id" data-rel="chosen" name="season_id" class="span5" >
<option  value="0">Select Season </option>
<?php foreach($season as $sRow) {?>

<option <?php if($sRow->season_id == $season_id) echo"selected='selected'"?>   value="<?php echo $sRow->season_id; ?>"> <?php echo $sRow->season_name; ?> </option>
<?php } ?>
</select>


<select id="class_section_id" data-rel="chosen" name="class_section_id" class="span5">
<option  value="0">Select Class Section </option>
<?php foreach($classSecton as $csRow) {?>
<option <?php if($csRow->class_section_id == $class_section_id) echo"selected='selected'"?>   value="<?php echo $csRow->class_section_id; ?>"><?php echo $csRow->class_name .'-'. $csRow->section_name ?> </option>
<?php } ?>
</select>
<input type="submit" value="Submit"></input>
<?php
echo form_close();
?>
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i>Class List </h2>

</div>
<div class="box-content">
<div class="form-horizontal">

<table class="table table-striped table-bordered no-margin">
<thead>

<tr>
<th style="width:20%">
Period       
</th>
<th style="width:20%">
Monday       
</th>
<th style="width:20%">
Tuesday
</th>
<th style="width:20%">
Wednesday
</th><th style="width:20%">
Thursday
</th><th style="width:20%">
Friday
</th>
<th style="width:20%">
Saturday
</th>


</tr>
</thead>
<tbody>
<?php 

$count = 1;
foreach($period as $periodKey=>$value) 
{
// print_r($periodRow);
?>
<tr>
<td>
<?php echo $periodKey; ?>
</td>
<td>
<?php 
if(isset($value['monday'])){

?>
<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey; ?>,'monday',<?php echo $value['monday']['teacher_id']?>,<?php echo $value['monday']['paper_id']?>)">
<?php
echo $value['monday']['teacherName'];
echo "<br>";
echo $value['monday']['paperName'];
?>
</a>
<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['monday']['daily_timetable_id']; ?>" >
Delete 
</a>
<?php
}else{
?>

<a href="#" onclick="javascript:openAllotTeacherPaper(<?php echo $periodKey; ?>,'monday')">
Create
</a>
<?php
}
?>

</td>
<td>
<?php 
if(isset($value['tuesday'])){
?>
<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey; ?>,'tuesday',<?php echo $value['tuesday']['teacher_id']?>,<?php echo $value['tuesday']['paper_id']?>)">
<?php
echo $value['tuesday']['teacherName'];
echo "<br>";
echo $value['tuesday']['paperName'];
?>
</a>
<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['tuesday']['daily_timetable_id']; ?>" >
Delete 
</a>
<?php
}else{
?>

<a href="#" onclick="javascript:openAllotTeacherPaper(<?php echo $periodKey; ?>,'tuesday')">4
Create
</a>
<?php
}
?>

</td>
<td>
<?php 
if(isset($value['wednesday'])){
?>
<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey; ?>,'wednesday',<?php echo $value['wednesday']['teacher_id']?>,<?php echo $value['wednesday']['paper_id']?>)">
<?php
echo $value['wednesday']['teacherName'];
echo "<br>";
echo $value['wednesday']['paperName'];
?>
</a>
<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['wednesday']['daily_timetable_id']; ?>" >
Delete 
</a>
<?php
}else{
?>

<a href="#" onclick="javascript:openAllotTeacherPaper(<?php echo $periodKey; ?>,'wednesday')">
Create
</a>
<?php
}
?>


</td>
<td>
<?php 
if(isset($value['thursday'])){
?>
<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey; ?>,'thursday',<?php echo $value['thursday']['teacher_id']?>,<?php echo $value['thursday']['paper_id']?>)">
<?php
echo $value['thursday']['teacherName'];
echo "<br>";
echo $value['thursday']['paperName'];
?>
</a>
<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['thursday']['daily_timetable_id']; ?>" >
Delete 
</a>
<?php
}else{
?>

<a href="#" onclick="javascript:openAllotTeacherPaper(<?php echo $periodKey; ?>,'thursday')">
Create
</a>
<?php
}
?>

</td>
<td>
<?php 
if(isset($value['friday'])){
?>
<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey; ?>,'friday',<?php echo $value['friday']['teacher_id']?>,<?php echo $value['friday']['paper_id']?>)">
<?php
echo $value['friday']['teacherName'];
echo "<br>";
echo $value['friday']['paperName'];
?>
</a>
<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['friday']['daily_timetable_id']; ?>" >
Delete 
</a>
<?php
}else{
?>

<a href="#" onclick="javascript:openAllotTeacherPaper(<?php echo $periodKey; ?>,'friday')">
Create
</a>
<?php
}
?>


</td>
<td>
<?php 
if(isset($value['saturday'])){
?>
<a href="#" onclick="javascript:openAllotedTeacherPaper(<?php echo $periodKey; ?>,'saturday',<?php echo $value['saturday']['teacher_id']?>,<?php echo $value['saturday']['paper_id']?>)">
<?php
echo $value['saturday']['teacherName'];
echo "<br>";
echo $value['saturday']['paperName'];
?>
</a>
<a href="<?php echo base_url(); ?>index.php/timetable/timetable/deleteDailytimetable/<?php echo $value['saturday']['daily_timetable_id']; ?>" >
Delete 
</a>
<?php
}else{
?>

<a href="#" onclick="javascript:openAllotTeacherPaper(<?php echo $periodKey; ?>,'saturday')">
Create
</a>
<?php
}
?>


</td>



</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>

</div>

<!-- End Table -->

		