function send(url){
	var data=$("#person-form-edit_person-form").serialize();
	if(!validateFull()){
		$.ajax({
			type: 'POST',
			url: url,
			data:data,
			success:function(data){
				alert('Successfully updated.');
			},
			error: function(data) { // if error occured
				alert("Error occured.please try again");
			},
			dataType:'html'
		});
	}else{
		alert('Please provide correct information');
	}
}
function testFormSend(id)
{	
	var data=$("#user-person-test-form").serialize();
	  $.ajax({
	   type: 'POST',
		url: test+'&id='+id,
	   data:data,
		success:function(data){ 
			var $response	=	jQuery.parseJSON(data);
			if($response.status==1){
				loadPopupBox();
				location.reload();
				
			}
			else{
					alert("Oops! Looks like you've skipped a question.");
					$.each($response.message, function(i, obj) {
					  $('.required'+obj).css( "backgroundColor", "#E9D1D4" );
					});
			}
		},
		   error: function(data) { // if error occured
				 alert("Error occured.please try again");
				 alert(data);
			},
		 
		  dataType:'html'
	  });
}    

function loadPopupBox() {    // To Load the Popupbox
	$('#popup_box').fadeIn("slow");
	$("#container").css({ // this is just for style
		"opacity": "0.3" 
	});        
}  		

function sendTestRequest()
	 {
	   var data=$("#retake-test-form").serialize();
	  $.ajax({
	   type: 'POST',
		url: retakeTUrl,
	   data:data,
	success:function(data){
					alert(data); 
				  },
	   error: function(data) { // if error occured
			 alert("Error occured.please try again");
			 alert(data);
		},
	 
	  dataType:'html'
	  });
	 
	}
function academic(value)
{    
	
	$.ajax({
	url: url+'&subject='+value,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}
function favorite(value)
{    
	$.ajax({
	url: url+'&favorite='+value,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}
function lestFavorite(value)
{    
	$.ajax({
	url: url+'&lestFavorite='+value,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}

function subjectUpdateCall(value,id)
{    
	$.ajax({
	url: url+'&subjectId='+id+'&subjectIdValue='+value,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}
function interest(value,id)
{    
	$.ajax({
	url: url+'&interestID='+id+'&interestValue='+value,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}
function userInterest(value)
{    
	$.ajax({
	url: url+'&userInterest='+value,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}
function userProfileData(value,id)
{    
	$.ajax({
	url: url+'&profileData='+value+'&Rid='+id,
	type	:	"POST",
	data	:	'json',
	
	complete:	function(result) {
		console.log('Success:'+ result);
		
		}
	});
    
}
function validateFull(){
	var errorList	=	0;
	var $fieldId	=	"person-form-edit_person-form";
	$('#'+$fieldId+' :input.required').each(function (){
		if($(this).val().length==0){
			$(this).addClass('error');
			$(this).attr('title','Please enter required field');
			errorList	=	1;
			console.log($(this));
		}else if($(this).hasClass('alpha') && !testAlpha($(this).val())){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid name.');
			errorList	=	1;
			console.log($(this));
		}else if($(this).hasClass('email') && !testEmail($(this).val())){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid email address');
			errorList	=	1;
			console.log($(this));
		}else if($(this).hasClass('url') && !testURL($(this).val())){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid url (www.example.com)');
			errorList	=	1;
			console.log($(this));
        }else if($(this).hasClass('phone') && !testPhone($(this).val())){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid phone number');
			errorList	=	1;
			console.log($(this));
		}else
			$(this).removeClass('error');
	});
	$('#'+$fieldId+' :input.url').each(function (){
		if(!testURL($(this).val())){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid url (www.example.com)');
			errorList	=	1;
			console.log($(this));
        }else if($(this).hasClass('required') && $(this).val().length==0){
			$(this).addClass('error');
			$(this).attr('title','Please enter required field');
			errorList	=	1;
			console.log($(this));
		}else
			$(this).removeClass('error');
	});
	$('#'+$fieldId+' :input.alpha').each(function (){
		if(!testAlpha($(this).val())){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid url (www.example.com)');
			errorList	=	1;
			console.log($(this));
        }else if($(this).hasClass('required') && $(this).val().length==0){
			$(this).addClass('error');
			$(this).attr('title','Please enter required field');
			errorList	=	1;
			console.log($(this));
		}else
			$(this).removeClass('error');
	});
	
	
	$('#'+$fieldId+' :input.date').each(function (){
		if(!testDate($(this).val())){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid date (YYYY-MM-DD)');
			errorList	=	1;
			console.log($(this));
        }else if($(this).hasClass('required') && $(this).val().length==0){
			$(this).addClass('error');
			$(this).attr('title','Please enter required field');
			errorList	=	1;
			console.log($(this));
		}else
			$(this).removeClass('error');
	});
	$('#'+$fieldId+' :input.to').each(function (){
		var dateFrom	=	$(this).parent().find('.from').val();
		var dateTo		=	$(this).val();
		
		if(!testDateRange(dateFrom,dateTo)){
			$(this).addClass('error');
			$(this).attr('title','Please enter valid date (YYYY-MM-DD)');
			errorList	=	1;
			console.log($(this));
        }else if($(this).hasClass('required') && $(this).val().length==0){
			$(this).addClass('error');
			$(this).attr('title','Please enter required field');
			errorList	=	1;
			console.log($(this));
		}else
			$(this).removeClass('error');
	});
	
	return errorList;
}
function testPhone(value){
	var regexp = /^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/;
	var re = new RegExp(regexp);
	return re.test(value);
}

function testAlpha(value){
	var regexp = /^[a-z A-Z]{1,30}$/;
	if(!$(this).hasClass('required')){	
		var re = new RegExp(regexp);
		if(value=='')
			return true;
		else
			return re.test(value);
	}else{
		var re = new RegExp(regexp);
		return re.test(value);
	}
}

function testEmail(value){
	var regexp = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
	var re = new RegExp(regexp);
	return re.test(value);
}

function testURL(value){
    var regexp=/^((https?|s?ftp):\/\/)?(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i;
        
	if(!$(this).hasClass('required')){	
		var re = new RegExp(regexp);
		if(value=='')
			return true;
		else
			return re.test(value);
	}else{
		var re = new RegExp(regexp);
		return re.test(value);
	}
}
function testDate(value){
    var regexp=/^(([1-9]{1}\d{3}))-(([0]?\d{1})|([1][0,1,2]{1}))-(([0-2]?\d{1})|([3][0,1]{1}))$/;
	if(!$(this).hasClass('required')){
		var re = new RegExp(regexp);
		if(value=='')
			return true;
		else
			return re.test(value);
	}else{
		var re = new RegExp(regexp);
		return re.test(value);
	}
}
function testDateRange(dateFrom,dateTo){
    if(dateFrom == '' && dateTo == '' )
        return true;
	Date.prototype.yyyymmdd = function() {
		var yyyy = this.getFullYear().toString();
		var mm = (this.getMonth()+1).toString();
		var dd  = this.getDate().toString();
		return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]);
	};
	d	=	new Date();	
	cur	=	d.yyyymmdd();
	if(dateTo > dateFrom){
		if(dateTo <= cur){
			return true;
		}else
			return false;	
	}else
		return false;
}