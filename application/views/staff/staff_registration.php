<script>
	function get_state()
	{	
		var country_id = $("#country_id").val();
		var dataString = "country_id="+ country_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
				url:urldata+'index.php/student/student/retrive_state_list/',
				data:dataString,
				type:'POST',
				success:function(response){
						var obj = JSON.parse(response);
						$("#state_id option").remove();
						$('#state_id').append($('<option>', {
												value: -1,
												text: "Select State"
								}));

						for(var i=0;i<obj.length;i++)
						{
							$('#state_id').append($('<option>', {
												value: obj[i].state_id,
												text: obj[i].state_name
								}));
						}
				}
					
		});
	}
	function get_city()
	{	
		var state_id = $("#state_id").val();
		var dataString = "state_id="+ state_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
				url:urldata+'index.php/student/student/retrive_city_list/',
				data:dataString,
				type:'POST',
				success:function(response){
						var obj = JSON.parse(response);
						$("#city_id option").remove();
						$('#city_id').append($('<option>', {
												value: -1,
												text: "Select City"
								}));
						for(var i=0;i<obj.length;i++)
						{
							$('#city_id').append($('<option>', {
												value: obj[i].city_id,
												text: obj[i].city_name
											}));
						}
				}
					
		});
	}
</script>

	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Staff Registration Form</p>
            </div>
            <div class="box_c_content">
			<?php if(isset($upload_error)) { ?>
				<div class="alert-box warning">
					<?php echo $upload_error;?>
					<a href="javascript:void(0)" class="close">×</a>
				</div> 
			<?php } ?>
			<?php if(isset($registration_message)) { ?>
				<div class="alert-box warning">
					<?php echo $registration_message;?>
					<a href="javascript:void(0)" class="close">×</a>
				</div> 
			<?php } ?>
              <form action="<?php echo base_url()?>index.php/staff/staff/add_staff_information" id="frm_staff_registration" enctype="multipart/form-data"  class="nice" method="post" onsubmit="return validate_staff_registration();">
			   <h3>Personal Information</h3>
				<div class="formRow">
                  <div class="row">
					<div class="three columns">
						<label for="salutation_id">Salutation</label>
						<select class="small" name="salutation_id" id="salutation_id">
							<option value="-1">Select Salutation</option>
							<?php foreach($salutation as $salutationData) {?>
							<option value="<?php echo $salutationData->salutation_id?>"><?php echo $salutationData->salutation;?></option>
							<?php }?>
						</select>
						<span id="sp_salutation_id" class="error">Select Salutation.</span>
					</div>
                    <div class="three columns">
					  <label for="first_name">First Name</label>
					  <input type="text" id="first_name" name="first_name" class="input-text small" placeholder="First Name"/>
					  <span id="sp_first_name" class="error">Enter First Name.</span>
                    </div>
                    <div class="three columns">
					  <label for="middle_name">Middle Name</label>
					  <input type="text" id="middle_name" name="middle_name" class="input-text small" placeholder="Middle Name"/>
                    </div>
                    <div class="four columns">
					  <label for="last_name">Last Name</label>
					  <input type="text" id="last_name" name="last_name" class="input-text small" placeholder="Last Name"/>
					  <span id="sp_last_name" class="error">Enter Last Name.</span>
                    </div>
                  </div>
                </div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="gender">Gender</label>
						  <select name="gender" id="gender" class="small">
							<option value="-1">Select Gender</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
						  </select>
						  <span id="sp_gender" class="error">Select Gender.</span>
						</div>
						<div  class="nine columns">
							<label for="dob"  style="padding:0">Date of Birth</label>
							<input type="text" id="datepicker-example1" name="dob" class="input-text large" placeholder="Date of Birth" />
							<span id="sp_dob" class="error">Enter Date of Birth.</span>
						</div>
					</div>
                </div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="school_user_type_id">User Type</label>
						  <select name="school_user_type_id" id="school_user_type_id" class="small">
							<option value="-1">User Type</option>
							<?php foreach($user_type as $userTypeData) {?>
							<option value="<?php echo $userTypeData->school_user_type_id?>"><?php echo $userTypeData->user_type;?></option>
							<?php  } ?>
						</select>
						<span id="sp_school_user_type_id" class="error">User Type.</span>
						</div>
						<div class="three columns">
						  <label for="phone">Phone No.</label>
							<input type="text" id="phone" name="phone" class="input-text small" placeholder="Phone No." />
							<span id="sp_phone" class="error">Enter Phone No.</span>
						</div>
						<div  class="seven columns">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" class="input-text large" placeholder="Email" />
							<span id="sp_email" class="error">Enter Email.</span>
						</div>
					</div>
                </div>
				<div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="address1">Address Line 1</label>
						  <input type="text" id="address1" name="address1" class="input-text small" placeholder="Address Line 1 "/>
						  <span id="sp_address1" class="error">Enter Address.</span>
						</div>
						<div class="three columns">
							<label for="address2">Address Line 2</label>
							<input type="text" id="address2" name="address2" class="input-text small" placeholder="Address Line 2 "/>
						</div>
						<div class="seven columns">
							<label for="address3">Address Line 3</label>
							<input type="text" id="address3" name="address3" class="input-text large" placeholder="Address Line 3"/>
						</div>
					</div>
				</div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="country_id">Country</label>
						  <select name="country_id" id="country_id" class="small" onchange="get_state();">
							<option value="-1"> Select Country </option>
							<?php foreach($country as $countryData) {?>
							<option value="<?php echo $countryData->country_id?>"><?php echo $countryData->country_name;?></option>
							<?php  } ?>
						  </select>
						  <span id="sp_country_id" class="error">Select Country.</span>
						</div>
						<div class="three columns">
							<label for="state_id">State</label>
							<select class="small" name="state_id" id="state_id" onchange="get_city();">
								<option value="-1">Select State</option>
							</select>
							<span id="sp_state_id" class="error">Select State.</span>
						</div>
						<div class="three columns">
							<label for="city_id">City</label>
							<select class="small" name="city_id" id="city_id">
								<option value="-1">Select City</option>
							</select>
							<span id="sp_city_id" class="error">Select City.</span>
						</div>
						<div class="four columns">
							<label for="mobile">Mobile No.</label>
							<input type="text" id="mobile" name="mobile" class="input-text small" placeholder="Mobile No"/>
							<span id="sp_mobile" class="error">Enter Mobile No.</span>
						</div>
					</div>
				</div>
                <div class="formRow">
					<div class="row">
						<div  class="three columns">
							<label for="pincode">Pincode</label>
							<input type="text" id="pincode" name="pincode" class="input-text large" placeholder="Pincode" />
							<span id="sp_pincode" class="error">Enter Pincode.</span>
						</div>
						<div  class="seven columns">
							<label for="photo_url">Photo</label>
							<input type="file" id="photo_url" name="photo_url" class="input-text large" />
							<span id="sp_photo_url" class="error">Upload Photo.</span>
						</div>
					</div>
                </div>
				<div class="formRow cf">
                  <input type="submit" class="button small" value="Submit">
                  <input type="button" class="button small" value="Reset">
				 </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 