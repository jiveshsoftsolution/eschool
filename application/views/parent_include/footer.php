</div>

</div>

<footer class="container" id="footer">

  <div class="row">

    <div class="twelve columns"> <span>Copyright &copy; 2014 ABC Public School Allahabad</span> </div>

  </div>

</footer>



        <script src="<?php echo base_url();?>assets/assets/js/jquery.min.js"></script>

		
       <script src="<?php echo base_url() ?>assets/assets/lib/jQueryUI/jquery-ui-1.8.18.custom.min.js"></script> 

		<script src="<?php echo base_url() ?>assets/assets/js/s_scripts.js"></script> 

		<script src="<?php echo base_url() ?>assets/assets/js/jquery.ui.extend.js"></script> 

		<script src="<?php echo base_url() ?>assets/assets/js/jquery.jqplot.min.js"></script>

        <script src="<?php echo base_url() ?>assets/assets/js/jqplot.plugins.js"></script>

		<script src="<?php echo base_url() ?>assets/assets/js/pertho.js"></script> 
        <script src="<?php echo base_url() ?>assets/assets/js/validation.js"></script> 
		 <script src="<?php echo base_url();?>assets/chartjs/highcharts.js"></script>
       <script src="<?php echo base_url();?>assets/chartjs/modules/exporting.js"></script>
       
<script>

			$(document).ready(function() {

				//* common functions
                prth_common.init();
				prth_dialogs.init();
               
				prth_charts.today_st_attendance();

				
             	//prth_charts.pl_plot3();
			
				
				if(!jQuery.browser.mobile) {

					// create image from visible chart

					prth_charts.makeImage();

				};

				//* vertical navigation

				if(!jQuery.browser.mobile) {

					//* main navigatin

					prth_main_nav.v_nav();

				}

			});

		</script>
</body>

</html>


	
