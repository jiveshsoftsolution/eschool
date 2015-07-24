		
		
    
                <script type="text/javascript">
			$("#paper_id").change(function(){ 
                            var paper_id = $("#paper_id").val();
                            var period_id = $("#period_id").val();
                            var week_day = $("#week_day").val();
                            var session_id = $("#session_id").val();
                            var season_id = $("#season_id").val();
                            var class_section_id = $("#class_section_id").val();

                            //var dataString = "season_id=" + season_id + "&session_id=" + session_id + "&paper_id="+ paper_id + "&period_id=" + period_id + "&week_day="+ week_day + "&class_section_id="+ class_section_id;
                            var dataString = season_id + "/" + session_id + "/"+ paper_id + "/" + period_id + "/"+ week_day + "/"+ class_section_id;
                            //alert(dataString);
				var request = $.ajax({
				url: "<?php echo base_url(); ?>index.php/timetable/timetable/retrive_paper_teacher_list/"+dataString,
				/* data: "cat_id="+this.value,*/
				type: "post",
				dataType: "html",
				success: function(data) {		                           

				//data is the html of the page where the request is made.
				$('#techer_list_div_id').html(data);
				}
				});
			}); 
		</script>
	

