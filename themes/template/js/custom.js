$(document).ready(function () {
			//accessScroll start 
			var $accessScroll = $('#accessScroll'),
				i = 1;
			$accessScroll
				.on('reach.scrollbox', function () {
					if (i < 6) {
						// emulate XHR
						window.setTimeout(function () {
						   
							$accessScroll.scrollbox('update'); // recalculate bar height and position
						}, 300);
					}
				})
				.scrollbox({
					buffer: 150 // position from bottom when reach.scrollbox will be triggered
				});
		//accessScroll end 	
		//exploreScroll start 
			var $exploreScroll = $('#exploreScroll'),
				i = 1;
			$exploreScroll
				.on('reach.scrollbox', function () {
					if (i < 6) {
						// emulate XHR
						window.setTimeout(function () {
						   
							$exploreScroll.scrollbox('update'); // recalculate bar height and position
						}, 300);
					}
				})
				.scrollbox({
					buffer: 150 // position from bottom when reach.scrollbox will be triggered
				});
		//exploreScroll end 
		//accessScroll end 	
		//approachScroll start 
			var $approachScroll = $('#approachScroll'),
				i = 1;
			$approachScroll
				.on('reach.scrollbox', function () {
					if (i < 6) {
						// emulate XHR
						window.setTimeout(function () {
						   
							$approachScroll.scrollbox('update'); // recalculate bar height and position
						}, 300);
					}
				})
				.scrollbox({
					buffer: 150 // position from bottom when reach.scrollbox will be triggered
				});
		//approachScroll end 
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
	
	//career tabs ends here
		$('#access-Links li a').bind('click', function(e){
		$('#access-Links li a').removeClass('orange');
		$('.approach-active:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('orange');
		e.preventDefault();
	}).filter(':first').click();	
		$(".home-login-box ").on("click", function() { // wire up the OK button to dismiss the modal when shown
		 $("#myModal").modal({ // wire up the actual modal functionality and show the dialog
		"backdrop" : "static",
		"keyboard" : true,
		"show" : true // ensure the modal is shown immediately
		});
		});
			$(".home-login-box2").on("click", function() { // wire up the OK button to dismiss the modal when shown
			 $("#myModal").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
			});



});

						