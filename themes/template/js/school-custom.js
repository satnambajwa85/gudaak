$(document).ready(function () {
		$(".Summary-details").on("click", function() {
			$("#Summary-details").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});
		$(".counsellor-comment").on("click", function() { // wire up the OK button to dismiss the modal when shown
			$("#myModal").modal({ // wire up the actual modal functionality and show the dialog
			"backdrop" : "static",
			"keyboard" : true,
			"show" : true // ensure the modal is shown immediately
			});
		});
		
	});

						