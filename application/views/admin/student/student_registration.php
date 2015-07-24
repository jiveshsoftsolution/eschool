	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Student Registration Form</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/admin/student/add_student_information" class="nice" method="post">
			   <h3>Personal Information</h3>
				<div class="formRow">
                  <div class="row">
					<div class="three columns">
						<label for="salutation">Salutaion</label>
						<select class="small" name="salutation" id="salutation">
							<option value="1">Mr.</option>
							<option value="2">Miss.</option>
						</select>
					</div>
                    <div class="three columns">
					  <label for="first_name">First Name</label>
					  <input type="text" id="first_name" name="first_name" class="input-text small" title="Only letters, min. 3 char"/>
                    </div>
                    <div class="three columns">
					  <label for="middle_name">Middle Name</label>
					  <input type="text" id="middle_name" name="middle_name" class="input-text small" title="Only letters, min. 3 char"/>
                    </div>
                    <div class="three columns">
					  <label for="last_name">Last Name</label>
					  <input type="text" id="last_name" name="last_name" class="input-text small" title="Only letters, min. 3 char"/>
                    </div>
                  </div>
                </div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="gender">Gender</label>
						  <select name="gender" id="gender">
							<option value="-1">Select Gender</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
						  </select>
						</div>
						<div  class="nine columns">
							<label for="dob">Date of Birth</label>
							<input type="text" id="dob" name="dob" class="input-text large" />
						</div>
					</div>
                </div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="class_section_id">Select Class Section</label>
						  <select name="class_section_id" id="class_section_id">
							<option value="-1">Select Class Section</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
						  </select>
						</div>
						<div class="three columns">
						  <label for="session_id">Select Session</label>
						  <select name="session_id" id="session_id">
							<option value="-1">Select Session</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
						  </select>
						</div>
						<div  class="six columns">
							<label for="dob">Email</label>
							<input type="text" id="email" name="email" class="input-text large" />
						</div>
					</div>
                </div>
				<div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="address1">Address Line 1</label>
						  <input type="text" id="address1" name="address1" class="input-text small" title="Only letters, min. 3 char"/>
						</div>
						<div class="three columns">
							<label for="address2">Address Line 2</label>
							<input type="text" id="address2" name="address2" class="input-text small" title="Only letters, min. 3 char"/>
						</div>
						<div class="six columns">
							<label for="address3">Address Line 3</label>
							<input type="text" id="address3" name="address3" class="input-text large" title="Only letters, min. 3 char"/>
						</div>
					</div>
				</div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="country_id">Country</label>
						  <select name="country_id" id="country_id">
							<option value=""> --- Please Select --- </option>
							<option value="1">Afghanistan</option>
							<option value="2">Albania</option>
							<option value="3">Algeria</option>
							<option value="4">American</option>
							<option value="5">Andorra</option>
							<option value="6">Angola</option>
						  </select>
						</div>
						<div class="three columns">
							<label for="state_id">State</label>
							<select class="small" name="state_id" id="state_id">
								<option value="1">Mr.</option>
								<option value="2">Miss.</option>
							</select>
						</div>
						<div class="three columns">
							<label for="city_id">City</label>
							<select class="small" name="city_id" id="city_id">
								<option value="1">Mr.</option>
								<option value="2">Miss.</option>
							</select>
						</div>
						<div class="three columns">
							<label for="parent_mobile">Contact No.</label>
							<input type="text" id="parent_mobile" name="parent_mobile" class="input-text small" title="Only letters, min. 3 char"/>
						</div>
					</div>
				</div>
                <div class="formRow">
					<div class="row">
						<div  class="three columns">
							<label for="pincode">Pincode</label>
							<input type="text" id="pincode" name="pincode" class="input-text large" />
						</div>
						<div  class="six columns">
							<label for="student_photo_url">Student Picture</label>
							<input type="file" id="student_photo_url" name="student_photo_url" class="input-text large" />
						</div>
					</div>
                </div>
				<h3>Parent Information</h3>
				<div class="formRow">
                  <div class="row">
					<div class="three columns">
						<label for="father_salutation">Salutaiton</label>
						<select class="small" name="father_salutation" id="father_salutation">
							<option value="1">Mr.</option>
							<option value="2">Miss.</option>
						</select>
					</div>
                    <div class="three columns">
					  <label for="father_first_name">Father First Name</label>
					  <input type="text" id="father_first_name" name="father_first_name" class="input-text small" title="Only letters, min. 3 char"/>
                    </div>
                    <div class="three columns">
					  <label for="father_middle_name">Father Middle Name</label>
					  <input type="text" id="father_middle_name" name="father_middle_name" class="input-text small" title="Only letters, min. 3 char"/>
                    </div>
                    <div class="three columns">
					  <label for="father_last_name">Father Last Name</label>
					  <input type="text" id="father_last_name" name="father_last_name" class="input-text small" title="Only letters, min. 3 char"/>
                    </div>
                  </div>
				  <div class="row">
					<div class="three columns">
						<label for="mother_salutation">Salutation</label>
						<select class="small" name="mother_salutation" id="mother_salutation">
							<option value="1">Mr.</option>
							<option value="2">Miss.</option>
						</select>
					</div>
					<div class="three columns">
					  <label for="mother_first_name">Mother First Name</label>
					  <input type="text" id="mother_first_name" name="mother_first_name" class="input-text small" title="Only letters, min. 3 char"/>
					</div>
					<div class="three columns">
					  <label for="mother_middle_name">Mother Middle Name</label>
					  <input type="text" id="mother_middle_name" name="mother_middle_name" class="input-text small" title="Only letters, min. 3 char"/>
					</div>
					<div class="three columns">
					  <label for="mother_last_name">Mother Last Name</label>
					  <input type="text" id="mother_last_name" name="mother_last_name" class="input-text small" title="Only letters, min. 3 char"/>
					</div>
				  </div>
				</div>
				<div class="formRow">
					<div class="row">
						<div  class="three columns">
							<label for="father_photo_url">Father Picture</label>
							<input type="file" id="father_photo_url" name="father_photo_url" class="input-text large" />
						</div>
						<div  class="six columns">
							<label for="mother_photo_url">Mother Picture</label>
							<input type="file" id="mother_photo_url" name="mother_photo_url" class="input-text large" />
						</div>
					</div>
                </div>
				<div class="formRow cf">
                  <input type="submit" class="button small nice blue radius" value="Submit">
                  <a href="javascript:void(0)" class="clear_form">Clear form</a> 
				 </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 