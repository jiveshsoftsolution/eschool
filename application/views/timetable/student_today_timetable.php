

     
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
                           Teacher       
                          </th>
                          <th style="width:20%">
                           paper
                          </th>
                          <th style="width:20%">
                          Time
                          </th>
                          
                          
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
                                         
	                    $count = 1;
	                    foreach($period as $periodKey=>$value) 
                            {
                               
                                ?>
                        <tr>
                            <td>
                                <?php echo $periodKey; ?>
                            </td>
                          
                          
                             
                            <td>
                                <?php  
                               if(isset($value[0]))
                                echo $value[0]['teacherName'];
                                ?>
                            </td>
                              <td>
                                <?php  
                                  if(isset($value[0]))
                                echo $value[0]['paperName'];
                                ?>
                            </td>
                              <td>
                                <?php  
                                  if(isset($value[0]))
                                echo $value[0]['start_time'] . '-'.$value[0]['end_time'];
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
			 
		