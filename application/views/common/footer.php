			</div>
		</div>
		<footer class="container" id="footer">
			<div class="row">
				<div class="twelve columns"> <span>Copyright &copy; 2015 Udayat Solutions Pvt. Ltd.</span> </div>
			</div>
		</footer>
		<script src="<?php echo base_url();?>assets/assets/lib/reverseTimer/js/jquery.countdown.js"></script>
		<script src="<?php echo base_url() ?>assets/assets/lib/jQueryUI/jquery-ui-1.8.18.custom.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/assets/js/s_scripts.js"></script> 
		<script src="<?php echo base_url() ?>assets/assets/js/jquery.ui.extend.js"></script> 
		<script src="<?php echo base_url() ?>assets/assets/js/jquery.jqplot.min.js"></script>
		<script src="<?php echo base_url() ?>assets/assets/js/jqplot.plugins.js"></script>
		<script src="<?php echo base_url() ?>assets/assets/js/pertho.js"></script> 
		<script src="<?php echo base_url() ?>assets/assets/js/validation.js"></script> 
		<script src="<?php echo base_url();?>assets/chartjs/highcharts.js"></script>
		<script src="<?php echo base_url();?>assets/chartjs/modules/exporting.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				//* common functions
				prth_common.init();
				prth_dialogs.init();
				prth_charts.charts_resize();
				prth_charts.today_teacher_attendance();
				prth_charts.today_st_attendance();

				//prth_charts.pl_plot1();
				prth_charts.new_admission();
				//prth_charts.pl_plot3();
				prth_charts.fees_chart();

				prth_nested_accordion.init();
				if(!jQuery.browser.mobile) {
				// create image from visible chart
				prth_charts.makeImage();

				};
				//* vertical navigation

				if(!jQuery.browser.mobile) {
				//* main navigatin
				//	prth_main_nav.v_nav();

				}
			});

		</script>
		<script tyep="text/javascript">
			$("#class_id").change(function(){ 
				var request = $.ajax({
				url: "<?php echo base_url(); ?>index.php/dashboard/dashboard/class_strength/"+this.value,
				/* data: "cat_id="+this.value,*/
				type: "post",
				dataType: "html",
				success: function(data) {		                           

				//data is the html of the page where the request is made.
				$('#class_section_strength').html(data);
				}
				});
			}); 
		</script>	
		<script type="text/javascript">
			$("#attendance_class_id").change(function(){ 
				var request = $.ajax({
				url: "<?php echo base_url(); ?>index.php/dashboard/dashboard/today_attendance_class_strength/"+this.value,
				/* data: "cat_id="+this.value,*/
				type: "post",
				dataType: "html",
				success: function(data) {		                           

				//data is the html of the page where the request is made.
				$('#attendanceClassSection').html(data);
				}
				});
			}); 
		</script>
		<script type="text/javascript">
			$("#notice_for_id").change(function(){ 
				var request = $.ajax({
				url: "<?php echo base_url(); ?>index.php/notice/notice/notice_class_section/"+this.value,
				/* data: "cat_id="+this.value,*/
				type: "post",
				dataType: "html",
				success: function(data) {
				//data is the html of the page where the request is made.
				$('#class_section').html(data);
				}
				});
			}); 
		</script>
	</body>
</html>



