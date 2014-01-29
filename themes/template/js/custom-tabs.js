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

	//career tabs ends here
		$('#access-Links li a').bind('click', function(e){
		$('#access-Links li a').removeClass('orange');
		$('.approach-active:visible').hide();
		$(this.hash).slideToggle();
		$(this).addClass('orange');
		e.preventDefault();
	}).filter(':first').click();	

});

						