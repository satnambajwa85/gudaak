$(document).ready(function () {
	$('.hot-link-icon a').tooltip();
	//$('.tab-description').hide();
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
		$('.links a').bind('click', function(e){
			$('.links a.current').removeClass('current');
			$(this.hash).slideToggle();
			$(this).addClass('current');
			e.preventDefault();
		});
		
	// career page js end
	//dashboard menu js start here
	$(".side-navigation ul li").click( function(){
		$("ul",this).slideToggle();
	});			
	//career tabs js end here
		//$('.tab-description').hide();
	$('#career-description-tabs li a').bind('click', function(e){
		$('#career-description-tabs li a.current').removeClass('current');
		$('.tab-visible:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('current');
		e.preventDefault();
	}).filter(':first').click();	
	//career tabs ends here	//career tabs js end here
	//$('.tab-description').hide();
	$('.career-list-view ul li a').bind('click', function(e){
		$('.career-list-view ul li a.currentTab').removeClass('currentTab');
		$('.career-tab-section:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('currentTab');
		e.preventDefault();
	}).filter(':first').click();	
	//$('.tab-description').hide();
	$('.top-nav-bar  li a').bind('click', function(e){
		$('.top-nav-bar li a.active-tab').removeClass('active-tab');
		$('.home-tab-section:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('active-tab');
		e.preventDefault();
	}).filter(':first').click();	

	//career tabs ends here
	



});
						