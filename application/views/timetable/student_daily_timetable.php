

     
			  <div id="content" class="span10">
			<!-- content starts -->
			 <?php echo form_open('timetable/createdailytimetable'); ?>

			
			<!--/row-->


			<div>
				
			
			</div><!--/row-->
			
			
					<!-- content ends -->
			</div><!--/#content.span10-->
		
            <!-- Start Table -->
            <!-- Start Table -->
            <div  class="span10">
                
				<div class="box span12">
                                   
               
                                 
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
                             
                              <?php
                               echo $value['monday']['teacherName'];
                               echo "<br>";
                               echo $value['monday']['paperName'];
                               ?>
                             
                               <?php
                           }
                           ?>
                             
                           
                              
                          </td>
                           <td>
                                <?php 
                           if(isset($value['tuesday'])){
                              ?>
                              
                              <?php
                               echo $value['tuesday']['teacherName'];
                               echo "<br>";
                               echo $value['tuesday']['paperName'];
                                ?>
                              
                              
                               <?php
                           }
                           ?>
                             
                          </td>
                           <td>
                                <?php 
                           if(isset($value['wednesday'])){
                              ?>
                               
                              <?php
                               echo $value['wednesday']['teacherName'];
                               echo "<br>";
                               echo $value['wednesday']['paperName'];
                                ?>
                              
                               <?php
                           }
                              ?>
                           
                              
                          </td>
                           <td>
                                <?php 
                           if(isset($value['thursday'])){
                              ?>
                              
                              <?php
                               echo $value['thursday']['teacherName'];
                               echo "<br>";
                               echo $value['thursday']['paperName'];
                                ?>
                              
                               <?php
                           }
                              ?>
                           
                          </td>
                           <td>
                                <?php 
                           if(isset($value['friday'])){
                              ?>
                            
                              <?php
                               echo $value['friday']['teacherName'];
                               echo "<br>";
                               echo $value['friday']['paperName'];
                                ?>
                               </a>
                               
                               <?php
                           }
                              ?>
                          
                              
                          </td>
                          <td>
                               <?php 
                           if(isset($value['saturday'])){
                              ?>
                              
                              <?php
                               echo $value['saturday']['teacherName'];
                               echo "<br>";
                               echo $value['saturday']['paperName'];
                                ?>
                             
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
			 
		