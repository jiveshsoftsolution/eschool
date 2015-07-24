<label for="season_id">Season</label>
						
							

<select id="season_id" name="season_id" class="small">
<option value="0">Select Season </option> 
<?php 

if(!isset($season['status'])){
foreach($season as $key=>$value){
?>
<option  value="<?php echo $key; ?>"><?php echo $value; ?> </option>
<?php }
}

?>
</select>
<span id="sp_season_id" class="error">Select Season.</span>

