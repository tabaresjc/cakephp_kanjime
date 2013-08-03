jQuery(document).ready(function($) {
	NLFunctions = {
		setup: function() {		
			$('#NewsletterForm').on( "submit", NLFunctions.submitNewEmail);
			$('#NewsletterSubmit').click(NLFunctions.submitNewEmail);
		},
		submitNewEmail: function(){
			$('#NewsletterForm .alert').remove();
			var email = $('#NewsletterEmail').val();
			if(NLFunctions.testEmptyString(email)){
				$('#NewsletterForm').append(NLFunctions.getErrorMessage('Please insert your email'));
				return false;
			}
			
			var data = $('#NewsletterForm').serialize();
			$.ajax({
				type: "POST",
				url: '/newsletters/add/',
				data: data,
				success: function(response) {
					var result = JSON.parse(response);
					
					if(result.error) {
						$('#NewsletterForm').append(NLFunctions.getErrorMessage(result.message));
					}else{
						$('#NewsletterForm').empty();
						$('#NewsletterForm').append(NLFunctions.getSuccessMessage(result.message));
					}
				}
			});
			return false;			
		},
		getErrorMessage: function(message) {
			return '<div class="alert alert-danger" style="margin: 0px 10px;"><i class="icon-exclamation-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>'+message+'</div>';
		},
		getSuccessMessage: function(message) {
			return '<div class="alert alert-success" style="margin: 0px 10px;"><i class="icon-ok-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>'+message+'</div>';
		},
		testEmptyString: function(str) {
			return (!str || /^\s*$/.test(str));
		},
	}
	$(NLFunctions.setup);
});


