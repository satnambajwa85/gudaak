$(document).ready(function () {
	//scroll starts
		var $scrollBar = $('#scrollBar'),
		i = 1;
	$scrollBar
		.on('reach.scrollbox', function () {
			if (i < 6) {
				// emulate XHR
				window.setTimeout(function () {
				   
					$scrollBar.scrollbox('update'); // recalculate bar height and position
				}, 300);
			}
		})
		.scrollbox({
			buffer: 150 // position from bottom when reach.scrollbox will be triggered
		});
		
	//scroll ends	
	//scroll starts
		var $testScroll = $('#testScroll'),
		i = 1;
	$testScroll
		.on('reach.scrollbox', function () {
			if (i < 6) {
				// emulate XHR
				window.setTimeout(function () {
				   
					$testScroll.scrollbox('update'); // recalculate bar height and position
				}, 300);
			}
		})
		.scrollbox({
			buffer: 150 // position from bottom when reach.scrollbox will be triggered
		});
		
	//scroll ends
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
	$(".side-navigation ul li").hover( function(){
		$("ul",this).slideDown();
	});
 
	//$(".side-navigation ul li").mouseout( function(){
		//$("ul",this).slideUp();
	//});
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
		$('.career-list-view ul li.li-active').removeClass('li-active');
		$('.career-tab-section:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('currentTab');
		$(this).parent().addClass('li-active');
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
		$('#access-Links li a').bind('click', function(e){
		$('#access-Links li a').removeClass('orange');
		$('.approach-active:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('orange');
		e.preventDefault();
	}).filter(':first').click();	
	$('.subject-details').bind('click', function(e){
		$(this).hide();
	});
	//Stream tabs
	$('.preferred-career ul li a').bind('click', function(e){
		$('.preferred-career ul li a').removeClass('activeCareer');
		$(this).addClass('activeCareer');
		e.preventDefault();
	});	
		$('#stream-user-tabs li a').bind('click', function(e){
		$('#stream-user-tabs li a').removeClass('current-tab');
		$('.stream-user-active:visible').hide();
		$(this.hash).show();
		$('li.currrent-tab').removeClass('currrent-tab');
		$(this).parent().addClass('currrent-tab');
		e.preventDefault();
	}).filter(':first').click();	
	$( "#tabs" ).tabs();
	//user profile edit tab 
	$(".edit-form").click(function(){
		$("#user-profile-form").hide();
		$(".profile_tab1_form").show();
		
	}); 	
	//ends here 
		$(".retakePersonality").on("click", function() { // wire up the OK button to dismiss the modal when shown
			$("#retake2").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		}); 
		$(".retakeInterest").on("click", function() { // wire up the OK button to dismiss the modal when shown
			$("#retake3").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});
		$(".Summary-details").on("click", function() { // wire up the OK button to dismiss the modal when shown
			$("#Summary-details").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});
		$("#talk-btn").on("click", function() { // wire up the OK button to dismiss the modal when shown
			$("#talk-coun").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});
		$(".profile-details").on("click", function() { // wire up the OK button to dismiss the modal when shown
			$("#profile-details").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});
		$(".talk-to-counsellor").on("click", function() { // wire up the OK button to dismiss the modal when shown
			$("#talk-to-counsellor").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});
		
		$(".next_button1").click(function(){
			$("#tabs-1").hide(10);
			$("#tabs-2").show(10);
			$(".next-active-res1").removeClass("ui-state-active");
			$(".next-active-res2").addClass("ui-state-active");
		});
		$(".next_button2").click(function(){
			$("#tabs-2").hide(10);
			$("#tabs-3").show(10);
			$(".next-active-res2").removeClass("ui-state-active");
			$(".next-active-res3").addClass("ui-state-active");
		});
		$("#ui-id-1").click(function(){
			$(".next-active-res1").addClass("ui-state-active");
			$(".next-active-res2").removeClass("ui-state-active");
			$(".next-active-res3").removeClass("ui-state-active");
		
			 
		});
		  $("#add-more").click(function () {
		  $('.profileHide input').clone().insertBefore(".profileHide");
			//$('.tab2_form_box').clone();
		});
		$(".ans_set span label").on("click", function() {
			$(this).parent().parent().parent().css( "backgroundColor", "" );
		});
	 
		
		/*$(".subject-details").on("click", function() { 
			 $(".s-details").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});*/
		//$( "#add-more" ).clone().prependTo( "tab2_form_box" );

});