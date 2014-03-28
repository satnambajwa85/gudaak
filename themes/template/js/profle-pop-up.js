function send()
	 {
	   var data=$("#person-form-edit_person-form").serialize();
	  $.ajax({
	   type: 'POST',
		url: url,
	   data:data,
	success:function(data){
					alert('Sccessfully updated.'); 
				  },
	   error: function(data) { // if error occured
			 alert("Error occured.please try again");
			 alert(data);
		},
	 
	  dataType:'html'
	  });
	 
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
					alert('Plsease don not skip any question please.');
					$.each($response.message, function(i, obj) {
						$('.required'+obj).css( "backgroundColor", "#E9D1D4" );
					});
					$('#user-person-test-form').offset({top:$('.required4').offset().top});
						console.log($('.required40').offset().top);
						
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
