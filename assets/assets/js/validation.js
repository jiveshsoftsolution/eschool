$(document).ready(function(){

	$( "#frm_student_registration input[type='text']" ).keypress(function() {
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");	
	});	
	
	$( "#frm_student_registration select").change(function() {
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");		
	});	
	
	$( "#frm_add_class input[type='text']" ).keypress(function() {
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});	
		
	$( "#frm_add_section input[type='text']" ).keypress(function() {
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");	
	});	
	
	$( "#frm_add_class_section select").change(function() {	
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});	
	
	$( "#frm_add_class_section input[type='text']" ).keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_subject input[type='text']" ).keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	})
	
	$( "#frm_add_period select").change(function() {	
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});	
	
	$( "#frm_add_period input[type='text']" ).keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_notice input[type='text']" ).keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_notice textarea").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	})
	
	$( "#frm_add_notice select").change(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_session input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_season input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_exam input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_fee_type input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	$( "#frm_add_exam_period select").change(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_exam_period input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_create_time_table select").change(function() {	
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});	
	
	$( "#frm_add_fee_setting input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_fee_setting select").change(function() {	
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});
	
	$( "#frm_add_online_exam input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_online_exam select").change(function() {	
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});
	
	$( "#frm_add_question input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_question textarea").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
	
	$( "#frm_add_question select").change(function() {	
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});

	$( "#frm_staff_registration select").change(function() {	
		$(this).css("border-color","#BBBBBB");
		var control_id = $(this).attr('id');
		$("#sp_"+control_id).css("display","none");	
	});
	
	$( "#frm_staff_registration input[type='text']").keypress(function() {	
		$(this).css("border-color","#BBBBBB");	
		var control_id = $(this).attr('id');	
		$("#sp_"+control_id).css("display","none");
	});
});


function validate_student_registration(){	
	var flag = true;
	if($("#salutation_id").val()==-1)
	{	
		flag = false;	
		$("#sp_salutation_id").css('display','block');	
		$("#salutation_id").css('border-color','#FF0000');
	}	
	else
	{	
		$("#sp_salutation_id").css('display','none');	
		$("#salutation_id").css('border-color','#BBBBBB');
	}	
	if($("#first_name").val()=="")	
	{		
		flag = false;
		$("#sp_first_name").css('display','block');	
		$("#first_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_first_name").css('display','none');	
		$("#first_name").css('border-color','#BBBBBB');
	}	
	if($("#last_name").val()=="")	
	{		
		flag = false;
		$("#sp_last_name").css('display','block');	
		$("#last_name").css('border-color','#FF0000');
	}	
	else	
	{	
		$("#sp_last_name").css('display','none');
		$("#last_name").css('border-color','#BBBBBB');	
	}
	if($("#gender").val()==-1)	
	{	
		flag = false;	
		$("#sp_gender").css('display','block');	
		$("#gender").css('border-color','#FF0000');	
	}	
	else
	{	
		$("#sp_gender").css('display','none');	
		$("#gender").css('border-color','#BBBBBB');
	}	
	/*if($("#dob").val()=="")	
	{		
		flag = false;	
		$("#sp_dob").css('display','block');
		$("#dob").css('border-color','#FF0000');
	}
	else	
	{	
		$("#sp_dob").css('display','none');	
		$("#dob").css('border-color','#BBBBBB');
	}*/	
	if($("#class_section_id").val()==-1)	
	{	
		flag = false;	
		$("#sp_class_section_id").css('display','block');	
		$("#class_section_id").css('border-color','#FF0000');
	}
	else
	{		
		$("#sp_class_section_id").css('display','none');
		$("#class_section_id").css('border-color','#BBBBBB');	
	}	
	if($("#session_id").val()==-1)	
	{	
		flag = false;	
		$("#sp_session_id").css('display','block');	
		$("#session_id").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_session_id").css('display','none');
		$("#session_id").css('border-color','#BBBBBB');
	}
	/*if($("#mail_to").val()=="")	
	{		
		flag = false;
		$("#sp_mail_to").css('display','block');
		$("#mail_to").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_mail_to").css('display','none');	
		$("#mail_to").css('border-color','#BBBBBB');
	}	
	if($("#address1").val()=="")
	{		
		flag = false;	
		$("#sp_address1").css('display','block');
		$("#address1").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_address1").css('display','none');
		$("#address1").css('border-color','#BBBBBB');
	}*/	
	if($("#country_id").val()==-1)	
	{	
		flag = false;
		$("#sp_country_id").css('display','block');	
		$("#country_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_country_id").css('display','none');
		$("#country_id").css('border-color','#BBBBBB');
	}	
	if($("#state_id").val()==-1)
	{		
		flag = false;	
		$("#sp_state_id").css('display','block');
		$("#state_id").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_state_id").css('display','none');	
		$("#state_id").css('border-color','#BBBBBB');
	}	
	if($("#city_id").val()==-1)
	{	
		flag = false;	
		$("#sp_city_id").css('display','block');
		$("#city_id").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_city_id").css('display','none');
		$("#city_id").css('border-color','#BBBBBB');
	}	
	if($("#parent_mobile").val()=="")	
	{	
		flag = false;	
		$("#sp_parent_mobile").css('display','block');
		$("#parent_mobile").css('border-color','#FF0000');
	}
	else	
	{		
		$("#sp_parent_mobile").css('display','none');	
		$("#parent_mobile").css('border-color','#BBBBBB');
	}	
	/*if($("#pincode").val()=="")
	{	
		flag = false;	
		$("#sp_pincode").css('display','block');
		$("#pincode").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_pincode").css('display','none');	
		$("#pincode").css('border-color','#BBBBBB');
	}*/
	if($("#father_salutation_id").val()==-1)
	{		
		flag = false;	
		$("#sp_father_salutation_id").css('display','block');
		$("#father_salutation_id").css('border-color','#FF0000');
	}
	else	
	{		
		$("#sp_father_salutation_id").css('display','none');
		$("#father_salutation_id").css('border-color','#BBBBBB');	
	}	
	if($("#father_first_name").val()=="")	
	{		
		flag = false;		
		$("#sp_father_first_name").css('display','block');
		$("#father_first_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_father_first_name").css('display','none');	
		$("#father_first_name").css('border-color','#BBBBBB');	
	}	
	if($("#father_last_name").val()=="")	
	{		
		flag = false;	
		$("#sp_father_last_name").css('display','block');
		$("#father_last_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_father_last_name").css('display','none');	
		$("#father_last_name").css('border-color','#BBBBBB');
	}	
	/*if($("#mother_salutation_id").val()==-1)	
	{		
		flag = false;
		$("#sp_mother_salutation_id").css('display','block');
		$("#mother_salutation_id").css('border-color','#FF0000');
	}	
	else
	{		
		$("#sp_mother_salutation_id").css('display','none');
		$("#mother_salutation_id").css('border-color','#BBBBBB');	
	}	
	if($("#mother_first_name").val()=="")
	{		
		flag = false;
		$("#sp_mother_first_name").css('display','block');	
		$("#mother_first_name").css('border-color','#FF0000');
	}	
	else
	{		
		$("#sp_mother_first_name").css('display','none');
		$("#mother_first_name").css('border-color','#BBBBBB');
	}
	if($("#mother_last_name").val()=="")
	{	
		flag = false;	
		$("#sp_mother_last_name").css('display','block');	
		$("#mother_last_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_mother_last_name").css('display','none');
		$("#mother_last_name").css('border-color','#BBBBBB');
	} */	
	return flag;
}	


function validate_add_class()
{	
	var flag =  true;
	if($("#class_name").val()=="")	
	{		
	flag = false;
		$("#sp_class_name").css('display','block');	
		$("#class_name").css('border-color','#FF0000');	
	}	
	else
	{		
		$("#sp_class_name").css('display','none');
		$("#class_name").css('border-color','#BBBBBB');
	} 
	return flag;
}


function validate_add_section()
{
	var flag =  true;
	if($("#section_name").val()=="")
	{		
		flag = false;	
		$("#sp_section_name").css('display','block');	
		$("#section_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_section_name").css('display','none');	
		$("#section_name").css('border-color','#BBBBBB');	
	} 	
	return flag;
}


function validate_add_class_section()
{	
	var flag =  true;	
	if($("#class_id").val()==-1)	
	{		
		flag = false;
		$("#sp_class_id").css('display','block');
		$("#class_id").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_class_id").css('display','none');
		$("#class_id").css('border-color','#BBBBBB');
	} 	
	if($("#section_id").val()==-1)
	{		
		flag = false;	
		$("#sp_section_id").css('display','block');	
		$("#section_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_section_id").css('display','none');	
		$("#section_id").css('border-color','#BBBBBB');
	} 	
	if($("#sequence").val()=="")	
	{		
		flag = false;	
		$("#sp_sequence").css('display','block');	
		$("#sequence").css('border-color','#FF0000');
	}	
	else	
	{		
		$("#sp_sequence").css('display','none');
		$("#sequence").css('border-color','#BBBBBB');
	} 	
	return flag;
}

function validate_add_subject()
{
	var flag =  true;
	if($("#subject_name").val()=="")
	{		
		flag = false;	
		$("#sp_subject_name").css('display','block');	
		$("#subject_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_subject_name").css('display','none');	
		$("#subject_name").css('border-color','#BBBBBB');	
	} 	
	return flag;
}

function validate_add_period()
{
	var flag =  true;
	if($("#period_num").val()=="")
	{		
		flag = false;	
		$("#sp_period_num").css('display','block');	
		$("#period_num").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_period_num").css('display','none');	
		$("#period_num").css('border-color','#BBBBBB');	
	} 

	if($("#session_id").val()==-1)
	{		
		flag = false;	
		$("#sp_session_id").css('display','block');	
		$("#session_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_session_id").css('display','none');	
		$("#session_id").css('border-color','#BBBBBB');	
	} 
	
	if($("#season_id").val()==-1)
	{		
		flag = false;	
		$("#sp_season_id").css('display','block');	
		$("#season_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_season_id").css('display','none');	
		$("#season_id").css('border-color','#BBBBBB');	
	} 
	if($("#start_time").val()=="")
	{		
		flag = false;	
		$("#sp_start_time").css('display','block');	
		$("#start_time").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_start_time").css('display','none');	
		$("#start_time").css('border-color','#BBBBBB');	
	} 
	
	if($("#end_time").val()=="")
	{		
		flag = false;	
		$("#sp_end_time").css('display','block');	
		$("#end_time").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_end_time").css('display','none');	
		$("#end_time").css('border-color','#BBBBBB');	
	} 
	return flag;
}

function validate_add_notice()
{
	var flag =  true;
	if($("#notice").val()=="")
	{		
		flag = false;	
		$("#sp_notice").css('display','block');	
		$("#notice").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_notice").css('display','none');	
		$("#notice").css('border-color','#BBBBBB');	
	} 
	if($("#notice_for").val()=="")
	{		
		flag = false;	
		$("#sp_notice_for").css('display','block');	
		$("#notice_for").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_notice_for").css('display','none');	
		$("#notice_for").css('border-color','#BBBBBB');	
	} 
	
	if($("#class_section_id").val()==-1)
	{		
		flag = false;	
		$("#sp_class_section_id").css('display','block');	
		$("#class_section_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_class_section_id").css('display','none');	
		$("#class_section_id").css('border-color','#BBBBBB');	
	} 
	if($("#class_id").val()==-1)
	{		
		flag = false;	
		$("#sp_class_id").css('display','block');	
		$("#class_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_class_id").css('display','none');	
		$("#class_id").css('border-color','#BBBBBB');	
	} 
	
	return flag;
}

function validate_add_session()
{
	var flag =  true;
	if($("#session_name").val()=="")
	{		
		flag = false;	
		$("#sp_session_name").css('display','block');	
		$("#session_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_session_name").css('display','none');	
		$("#session_name").css('border-color','#BBBBBB');	
	} 
	if($("#start_date").val()=="")
	{		
		flag = false;	
		$("#sp_start_date").css('display','block');	
		$("#start_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_start_date").css('display','none');	
		$("#start_date").css('border-color','#BBBBBB');	
	} 
	
	if($("#end_date").val()=="")
	{		
		flag = false;	
		$("#sp_end_date").css('display','block');	
		$("#end_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_end_date").css('display','none');	
		$("#end_date").css('border-color','#BBBBBB');	
	} 
	
	return flag;
}

function validate_add_season()
{
	var flag =  true;
	if($("#season_name").val()=="")
	{		
		flag = false;	
		$("#sp_season_name").css('display','block');	
		$("#season_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_season_name").css('display','none');	
		$("#season_name").css('border-color','#BBBBBB');	
	} 
	if($("#start_date").val()=="")
	{		
		flag = false;	
		$("#sp_start_date").css('display','block');	
		$("#start_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_start_date").css('display','none');	
		$("#start_date").css('border-color','#BBBBBB');	
	} 
	
	if($("#end_date").val()=="")
	{		
		flag = false;	
		$("#sp_end_date").css('display','block');	
		$("#end_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_end_date").css('display','none');	
		$("#end_date").css('border-color','#BBBBBB');	
	} 
	
	return flag;
}

function validate_add_exam()
{
	var flag =  true;
	if($("#exam_name").val()=="")
	{		
		flag = false;	
		$("#sp_exam_name").css('display','block');	
		$("#exam_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_exam_name").css('display','none');	
		$("#exam_name").css('border-color','#BBBBBB');	
	} 
	
	return flag;
}

function validate_fee_type()
{
	var flag =  true;
	if($("#fee_type_name").val()=="")
	{		
		flag = false;	
		$("#sp_fee_type_name").css('display','block');	
		$("#fee_type_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_fee_type_name").css('display','none');	
		$("#fee_type_name").css('border-color','#BBBBBB');	
	} 
	
	return flag;
}

function validate_add_exam_period()
{
	var flag =  true;
	if($("#session_id").val()==-1)
	{		
		flag = false;	
		$("#sp_session_id").css('display','block');	
		$("#session_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_session_id").css('display','none');	
		$("#session_id").css('border-color','#BBBBBB');	
	} 
	
	if($("#exam_id").val()==-1)
	{		
		flag = false;	
		$("#sp_exam_id").css('display','block');	
		$("#exam_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_exam_id").css('display','none');	
		$("#exam_id").css('border-color','#BBBBBB');	
	} 
	if($("#start_date").val()=="")
	{		
		flag = false;	
		$("#sp_start_date").css('display','block');	
		$("#start_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_start_date").css('display','none');	
		$("#start_date").css('border-color','#BBBBBB');	
	} 
		if($("#end_date").val()=="")
	{		
		flag = false;	
		$("#sp_end_date").css('display','block');	
		$("#end_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_end_date").css('display','none');	
		$("#end_date").css('border-color','#BBBBBB');	
	} 
	return flag;
}

function validate_create_time_table()
{
	var flag =  true;
	if($("#class_section_id").val()==-1)
	{		
		flag = false;	
		$("#sp_class_section_id").css('display','block');	
		$("#class_section_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_class_section_id").css('display','none');	
		$("#class_section_id").css('border-color','#BBBBBB');	
	} 
	
	if($("#session_id").val()==-1)
	{		
		flag = false;	
		$("#sp_session_id").css('display','block');	
		$("#session_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_session_id").css('display','none');	
		$("#session_id").css('border-color','#BBBBBB');	
	} 
	if($("#season_id").val()==-1)
	{		
		flag = false;	
		$("#sp_season_id").css('display','block');	
		$("#season_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_season_id").css('display','none');	
		$("#season_id").css('border-color','#BBBBBB');	
	}  
	return flag;
}

function validate_fee_setting()
{
	var flag =  true;
	if($("#fee_type_id").val()==-1)
	{		
		flag = false;	
		$("#sp_fee_type_id").css('display','block');	
		$("#fee_type_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_fee_type_id").css('display','none');	
		$("#fee_type_id").css('border-color','#BBBBBB');	
	} 
	
	if($("#session_id").val()==-1)
	{		
		flag = false;	
		$("#sp_session_id").css('display','block');	
		$("#session_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_session_id").css('display','none');	
		$("#session_id").css('border-color','#BBBBBB');	
	} 
	if($("#amount").val()=="")
	{		
		flag = false;	
		$("#sp_amount").css('display','block');	
		$("#amount").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_amount").css('display','none');	
		$("#amount").css('border-color','#BBBBBB');	
	}  
	return flag;
}

function validate_add_online_exam()
{
	var flag =  true;
	if($("#class_section_id").val()==-1)
	{		
		flag = false;	
		$("#sp_class_section_id").css('display','block');	
		$("#class_section_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_class_section_id").css('display','none');	
		$("#class_section_id").css('border-color','#BBBBBB');	
	} 
	
	if($("#subject_id").val()==-1)
	{		
		flag = false;	
		$("#sp_subject_id").css('display','block');	
		$("#subject_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_subject_id").css('display','none');	
		$("#subject_id").css('border-color','#BBBBBB');	
	} 
	if($("#paper_id").val()==-1)
	{		
		flag = false;	
		$("#sp_paper_id").css('display','block');	
		$("#paper_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_paper_id").css('display','none');	
		$("#paper_id").css('border-color','#BBBBBB');	
	}
	if($("#exam_period_id").val()==-1)
	{		
		flag = false;	
		$("#sp_exam_period_id").css('display','block');	
		$("#exam_period_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_exam_period_id").css('display','none');	
		$("#exam_period_id").css('border-color','#BBBBBB');	
	}
	if($("#exam_duration").val()=="")
	{		
		flag = false;	
		$("#sp_exam_duration").css('display','block');	
		$("#exam_duration").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_exam_duration").css('display','none');	
		$("#exam_duration").css('border-color','#BBBBBB');	
	}
	if($("#exam_date").val()=="")
	{		
		flag = false;	
		$("#sp_exam_date").css('display','block');	
		$("#exam_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_exam_date").css('display','none');	
		$("#exam_date").css('border-color','#BBBBBB');	
	}
	if($("#no_of_question").val()=="")
	{		
		flag = false;	
		$("#sp_no_of_question").css('display','block');	
		$("#exam_date").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_no_of_question").css('display','none');	
		$("#no_of_question").css('border-color','#BBBBBB');	
	}  
	return flag;
}

function validate_add_question()
{
	var flag =  true;
	if($("#question").val()=="")
	{		
		flag = false;	
		$("#sp_question").css('display','block');	
		$("#question").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_question").css('display','none');	
		$("#question").css('border-color','#BBBBBB');	
	} 
	
	if($("#que_no").val()=="")
	{		
		flag = false;	
		$("#sp_que_no").css('display','block');	
		$("#que_no").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_que_no").css('display','none');	
		$("#que_no").css('border-color','#BBBBBB');	
	} 
	if($("#que_marks").val()=="")
	{		
		flag = false;	
		$("#sp_que_marks").css('display','block');	
		$("#que_marks").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_que_marks").css('display','none');	
		$("#que_marks").css('border-color','#BBBBBB');	
	}
	if($("#answer_a").val()=="")
	{		
		flag = false;	
		$("#sp_answer_a").css('display','block');	
		$("#answer_a").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_answer_a").css('display','none');	
		$("#answer_a").css('border-color','#BBBBBB');	
	}
	if($("#answer_b").val()=="")
	{		
		flag = false;	
		$("#sp_answer_b").css('display','block');	
		$("#answer_b").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_answer_b").css('display','none');	
		$("#answer_b").css('border-color','#BBBBBB');	
	}
	if($("#answer_c").val()=="")
	{		
		flag = false;	
		$("#sp_answer_c").css('display','block');	
		$("#answer_c").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_answer_c").css('display','none');	
		$("#answer_c").css('border-color','#BBBBBB');	
	}
	if($("#answer_d").val()=="")
	{		
		flag = false;	
		$("#sp_answer_d").css('display','block');	
		$("#answer_d").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_answer_d").css('display','none');	
		$("#answer_d").css('border-color','#BBBBBB');	
	}
	if($("#correct_ans").val()==-1)
	{		
		flag = false;	
		$("#sp_correct_ans").css('display','block');	
		$("#correct_ans").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_correct_ans").css('display','none');	
		$("#correct_ans").css('border-color','#BBBBBB');	
	}  
	return flag;
}

function validate_staff_registration()
{
	var flag =  true;
	if($("#salutation_id").val()=="-1")
	{		
		flag = false;	
		$("#sp_salutation_id").css('display','block');	
		$("#salutation_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_salutation_id").css('display','none');	
		$("#salutation_id").css('border-color','#BBBBBB');	
	} 	
	if($("#first_name").val()=="")
	{		
		flag = false;	
		$("#sp_first_name").css('display','block');	
		$("#first_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_first_name").css('display','none');	
		$("#first_name").css('border-color','#BBBBBB');	
	} 	
	if($("#last_name").val()=="")
	{		
		flag = false;	
		$("#sp_last_name").css('display','block');	
		$("#last_name").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_last_name").css('display','none');	
		$("#last_name").css('border-color','#BBBBBB');	
	} 	
	if($("#gender").val()=="-1")
	{		
		flag = false;	
		$("#sp_gender").css('display','block');	
		$("#gender").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_gender").css('display','none');	
		$("#gender").css('border-color','#BBBBBB');	
	} 	
	/*if($("#datepicker-example1").val()=="")
	{		
		flag = false;	
		$("#sp_datepicker-example1").css('display','block');	
		$("#datepicker-example1").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_datepicker-example1").css('display','none');	
		$("#datepicker-example1").css('border-color','#BBBBBB');	
	} */	
	if($("#school_user_type_id").val()=="-1")
	{		
		flag = false;	
		$("#sp_school_user_type_id").css('display','block');	
		$("#school_user_type_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_school_user_type_id").css('display','none');	
		$("#school_user_type_id").css('border-color','#BBBBBB');	
	}
	/*if($("#phone").val()=="")
	{		
		flag = false;	
		$("#sp_phone").css('display','block');	
		$("#phone").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_phone").css('display','none');	
		$("#phone").css('border-color','#BBBBBB');	
	}
	if($("#email").val()=="")
	{		
		flag = false;	
		$("#sp_email").css('display','block');	
		$("#email").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_email").css('display','none');	
		$("#email").css('border-color','#BBBBBB');	
	} */
	if($("#address1").val()=="")
	{		
		flag = false;	
		$("#sp_address1").css('display','block');	
		$("#address1").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_address1").css('display','none');	
		$("#address1").css('border-color','#BBBBBB');	
	} 	
	if($("#country_id").val()=="-1")
	{		
		flag = false;	
		$("#sp_country_id").css('display','block');	
		$("#country_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_country_id").css('display','none');	
		$("#country_id").css('border-color','#BBBBBB');	
	} 	
	if($("#state_id").val()=="-1")
	{		
		flag = false;	
		$("#sp_state_id").css('display','block');	
		$("#state_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_state_id").css('display','none');	
		$("#state_id").css('border-color','#BBBBBB');	
	} 	
	if($("#city_id").val()=="-1")
	{		
		flag = false;	
		$("#sp_city_id").css('display','block');	
		$("#city_id").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_city_id").css('display','none');	
		$("#city_id").css('border-color','#BBBBBB');	
	}
	if($("#mobile").val()=="")
	{		
		flag = false;	
		$("#sp_mobile").css('display','block');	
		$("#mobile").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_mobile").css('display','none');	
		$("#mobile").css('border-color','#BBBBBB');	
	}
	/*if($("#pincode").val()=="")
	{		
		flag = false;	
		$("#sp_pincode").css('display','block');	
		$("#pincode").css('border-color','#FF0000');	
	}	
	else	
	{		
		$("#sp_pincode").css('display','none');	
		$("#pincode").css('border-color','#BBBBBB');	
	} */	
	return flag;
}
