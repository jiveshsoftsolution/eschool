	<label for="class_section_id" >Select Class Section</label>
	<select name="class_section_id" id="class_section_id" class="small" >
		<option value="-1">Select Class Section</option>
		<option value="0">All</option>
		<?php foreach($class_section as $class_sectionData) {?>
		<option value="<?php echo $class_sectionData->class_section_id?>"><?php echo $class_sectionData->class_name.' - '.$class_sectionData->section_name;?></option>
		<?php  } ?>
	</select>
	<span id="sp_class_section_id" class="error">Select Class Section.</span>