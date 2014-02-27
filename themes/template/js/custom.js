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
	$('#forget-form').hide();
	$('.hot-link-icon a').tooltip();
	$('.footer_2left span a').tooltip();
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
	$('.tab-description').hide();
		//career tabs ends here
		$('#access-Links li a').bind('click', function(e){
		$('#access-Links li a').removeClass('orange ');
		$('.approach-active:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('orange');
		e.preventDefault();
	}).filter(':first').click();
	
		$(".home-login-box ").on("click", function() { 
		$("#confirm-gudaak-id").hide();
		 $(".remove").show();
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
		$(".login-boot-box").on("click", function() {
			 $("#alert-confirm-gudaak-id2").show();
			 $(".min-height-login").hide();
			 $("#login-boot-box").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
			});
	
		$("#forget").on("click", function() { // wire up the OK button to dismiss the modal when shown
			 $("#login-form").hide();
			 $("#forget-form").show();
		});	
		$("#forget2").on("click", function() { // wire up the OK button to dismiss the modal when shown
			 $("#login-form2").hide();
			 $("#forget-form2").show();
		});	
		$(".backto").on("click", function() { // wire up the OK button to dismiss the modal when shown
			  $("#forget-form2").hide();
			 $("#login-form2").show();
			
		});	
		$(".login-visible").on("click", function() { 
			 $("#forget-form").hide();
			 $("#login-form").show();
			 
		});	
		$("#gudaakIdYes").on("click", function() { 
			 $(".remove").hide();
			 $("#confirm-gudaak-id").show();
			 
			 
		});	
		$("#loginGudaakIdNo").on("click", function() { 
			 $("#alert-confirm-gudaak-id2").hide();
			 $(".min-height-login").fadeIn();
			 
		});	
 
		/*$("#gudaakIdNo").on("click", function() {
			 $(".talktoAdmin").hide();
			 $("#icon-move").show();
			$("#icon-move").animate({top: "+=520",left: "-=100"}, 2000);
			$("#icon-move").animate({top: "-=170",left: "-=100"}, 2000);
			$("#icon-move").animate({top: "+=170",left: "-=100"}, 2000);
			$("#icon-move").animate({top: "-=170",left: "-=100"}, 2000);
			$("#icon-move").animate({top: "+=180",left: "-=90"}, 2000);
			$("#icon-move").fadeOut(200);
			$(".purechat-expanded").show(300);
			$("#icon-move").animate({top: "-=520",left: "+=490"}, 2000);	
			 
		});	*/
		$("#gudaakIdNo").on("click", function() {
			$('#popup_box').fadeIn("slow");
			$("#container").css({ // this is just for style
				"opacity": "0.3" 
			}); 
		});
		$("#loginGudaakIdYes").on("click", function() {
			$('#popup_box').fadeIn("slow");
			$("#container").css({ // this is just for style
				"opacity": "0.3" 
			}); 
		});
		   $("#popup_box").click(function() { 
				 $("#popup_box").fadeOut();
			});
		$(".purechat-button-expand").on("click", function() {
			 $("#icon-move").hide();
		});
		$('.left_nav li a').bind('click', function(e){
				$('.left_nav li a').removeClass('white-text');
				$(this).addClass('white-text');
				e.preventDefault();
			});

		
	});

						