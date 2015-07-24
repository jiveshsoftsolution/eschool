	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf red">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Add Class</p>
            </div>
            <div class="box_c_content">
              <form action="<?php echo base_url()?>index.php/class-section/class_section/insert_class" id="frm_add_class"class="nice" method="post" onsubmit="return validate_add_class();">
			   <h3>Add Class</h3>             
                <div class="formRow">
					<div class="row">
						<div class="four columns">
						    <label for="class_name">Class Name</label>
							<input type="text" id="class_name" name="class_name" class="input-text small" placeholder="Class Name" />
							<span id="sp_class_name" class="error">Enter Class Name.</span>
						</div>
						<div class="eight columns" style="margin-top:28px">
						    <input type="submit" class="button small" value="Submit">
						</div>
					</div>
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
						<p>Class List</p>
					</div>
					<div class="box_c_content">
						
						<div class="alert-box info">
                                Record not found!
                                <a href="javascript:void(0)" class="close">×</a>
                        </div> 
						
					</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
