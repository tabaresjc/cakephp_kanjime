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
				alert('Please insert your email');
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
						var out = '<div class="alert alert-danger"><i class="icon-exclamation-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>'+result.message+'</div>';
						$('#NewsletterForm').append(out);
					}else{
						var out = '<div class="alert alert-success"><i class="icon-ok-sign"></i> <button type="button" class="close" data-dismiss="alert">&times;</button>'+result.message+'</div>';
						$('#NewsletterForm').empty();
						$('#NewsletterForm').append(out);	
					}
					
				}
			});
			
			
			return false;			
		},
		testEmptyString: function(str) {
			return (!str || /^\s*$/.test(str));
		},
	}
	$(NLFunctions.setup);
});


