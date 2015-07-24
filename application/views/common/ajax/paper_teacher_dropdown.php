<select id="teacher_id" name="teacher_id" class="small">
<option value="0">Select Teacher </option> 
<?php foreach($teacher as $key=>$value){
?>
<option  value="<?php echo $key; ?>"><?php echo $value; ?> </option>
<?php } ?>
</select>

