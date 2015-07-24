

    <div class="nine columns">
		<div class="row">
			<div class="six columns">
				<div class="box_c">
					<div class="box_c_heading cf box_actions">
						<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
						<p>Notice Area</p>
					</div>
					<div class="box_c_content">
						<p class="inner_heading sepH_c">Latest info</p>
						<ul class="overview_list">
							<li>
								<a href="#">									<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
									<span class="ov_nb">Dance Competition</span>
									<span class="ov_text">Our school is organizing a dance competition on 10th April.</span>
								</a>
							</li>
							<li>
								<a href="#">									<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="height:70px; background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
									<span class="ov_nb">Annual Magazine</span>									<span class="ov_text">Our school is publishing annual magazine next month. Interested students can submit magazine related articles. </span>
								</a>
							</li>							<li>								<a href="#">									<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />									<span class="ov_nb">School Annual Function</span>									<span class="ov_text">Our school annual function is held on 19<sup>th</sup> April 2014. </span>								</a>							</li>							<li>								<a href="#">									<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />									<span class="ov_nb">Writing Competition </span>									<span class="ov_text">Our school writing comptition is held on 15<sup>th</sup> April 2014. </span>								</a>							</li>
						</ul>
					</div>				</div>
		</div>
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>						Time Table					    <select name="class_section_id" id="class_section_id" style="display: -moz-stack">							<option value="-1">Select Class Section</option>							<?php foreach($classSecton as $classSectonData) {?>							<option value="<?php echo $classSectonData->class_section_id ?>"><?php echo $classSectonData->class_name.' - '.$classSectonData->section_name; ?></option>							<?php } ?>						</select>					</p>				</div>
				<div class="box_c_content">
					<p class="inner_heading sepH_c">Latest info</p>
					<ul class="overview_listTime_table">
					<li>						<a href="#" style="text-decoration:none">							<span class="green">07:30 AM</span><span style="margin-left:50px">1th Period</span><span style="margin-left:50px">Hindi</span><span style="float:right; width:auto; font-weight:500; font-size:14px">Ranjan Singh</span>						</a>					</li>					<li>						<a href="#" style="text-decoration:none">							<span class="green">08:30 AM</span><span style="margin-left:50px">2nd Period</span><span style="margin-left:50px">English</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Amar Tiwari</span>						</a>					</li>					<li>						<a href="#" style="text-decoration:none">							<span class="green">08:30 AM</span><span style="margin-left:50px">3rd Period</span><span style="margin-left:50px">Math</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Rahul Pandey</span>						</a>					</li>					<li>						<a href="#" style="text-decoration:none">							<span class="green">10:30 AM</span><span style="margin-left:50px">4th Period</span><span style="margin-left:50px">Science</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Ritesh Mishra</span>						</a>					</li>					<li>						<a href="#" style="text-decoration:none">							<span class="green">11:30 AM</span><span style="margin-left:50px">5th Period</span><span style="margin-left:50px">History</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">R. Thomus</span>                                     						</a>					</li>					<li>						<a href="#" style="text-decoration:none">							<span class="green">12:30 PM</span><span style="margin-left:50px"> Interval </span>						</a>					</li>
				</ul>
			</div>
		</div>	</div></div>

      <div class="row">
        <div class="six columns">
          <div class="box_c">
            <div class="box_c_heading cf blue">
              <div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Charts</p>
            </div>
            <div class="box_c_content">
              <div class="inner_block">
                <div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
                  <div class="items">
                    <div class="left">
                       <div id="pl_plot6" style="height:300px;margin:0 auto" class="chart_flw" title="Combined chart"></div>
                    </div>
                    <div class="left">
                      <div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="four columns"> <a class="gh_button pill small image_from_chart" style="display:none;margin-top:10px" href="#">Create image from chart</a> </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
		 <div class="six columns">
          <div class="box_c">
            <div class="box_c_heading cf blue">
              <div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Charts</p>
            </div>
            <div class="box_c_content">
              <div class="inner_block">
                <div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
                  <div class="items">
                    <div class="left">
                      <div id="ds_plot1" title="Unique visitors" style="height:280px;margin:0 auto" class="chart_flw"></div>
                    </div>
                    <div class="left">
                      <div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="four columns"> <a class="gh_button pill small image_from_chart" style="display:none;margin-top:10px" href="#">Create image from chart</a> </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf blue">
              <div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Charts</p>
            </div>
            <div class="box_c_content">
              <div class="inner_block">
                <div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
                  <div class="items">
                    <div class="left">
                      <div id="ds_plot1" title="Unique visitors" style="height:280px;margin:0 auto" class="chart_flw"></div>
                    </div>
                    <div class="left">
                      <div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="four columns"> <a class="gh_button pill small image_from_chart" style="display:none;margin-top:10px" href="#">Create image from chart</a> </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf blue">
              <div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Charts</p>
            </div>
            <div class="box_c_content">
              <div class="inner_block">
                <div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
                  <div class="items">
                    <div class="left">
                      <div id="ds_plot1" title="Unique visitors" style="height:280px;margin:0 auto" class="chart_flw"></div>
                    </div>
                    <div class="left">
                      <div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="four columns"> <a class="gh_button pill small image_from_chart" style="display:none;margin-top:10px" href="#">Create image from chart</a> </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 





