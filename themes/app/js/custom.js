$(document).ready(function () {
	$('.hot-link-icon a').tooltip();
	$('.tab-description').hide();
	$('#test-tab a').bind('click', function(e){
		$('#test-tab a.current').removeClass('current');
		$('.tab-section:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('current');
		e.preventDefault();
	}).filter(':first').click();	
	//user live chat script start here
		$('.tab-section').hide();
	$('#tabs a').bind('click', function(e){
		$('#tabs a.current').removeClass('current');
		$('.tab-section:visible').hide();
		$(this.hash).show();
		$(this).addClass('current');
		e.preventDefault();
	}).filter(':first').click();
	$(".recent").click(function(){
		$("#recent-activity").slideToggle(500);
	 
	});
	$(".contacts").click(function(){
		$("#contact-list").slideToggle(500);
	 
	}); 
	$(".history").click(function(){
		$("#recent-history").slideToggle(500);
	 
	}); 
	//user live chat script end here
	// career page js start
	$('.categories-tab').hide();
		$('.description a').bind('click', function(e){
			$('.description a.current').removeClass('current');
			$(this.hash).slideToggle();
			$(this).addClass('current');
			e.preventDefault();
		});
		
	// career page js end
});
						