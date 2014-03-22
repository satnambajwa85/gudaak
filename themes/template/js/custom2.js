<<<<<<< HEAD
function afterResponse($data){
	var $response	=	jQuery.parseJSON($data);
	console.log($response.status);
	if($response.status==1)
	{
		$('#class_register').html($response.data);
		$('#medium_register').html($response.medium);
		
	}
	 else{alert($response.data);$('#Register_gudaak_id').val('');}
=======
function afterResponse($data){
	var $response	=	jQuery.parseJSON($data);
	console.log($response.status);
	if($response.status==1)
	{
		$('#class_register').html($response.data);
		$('#medium_register').html($response.medium);
		
	}
	 else{alert($response.data);$('#Register_gudaak_id').val('');}
>>>>>>> 1279c3defb076de0d6ec381dd9fb5ee2f5bae04d
}