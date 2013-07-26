jQuery(document).ready(function($) {
	UsersFunction = {
		setup: function(){
			if($('#UserAddForm').length > 0) {
				UsersFunction.setupValidationAddUser();
			}
		},
		setupValidationAddUser: function(){
			$("#UserAddFormSubmit").click(UsersFunction.validateUser);
			$("#UserUsername").keyup(UsersFunction.checkUserName);
			$("#UserPassword").keyup(UsersFunction.checkPassword);
		},
		validateUser: function(){
			var goNext = true;
			var userPassword = '';
			$(".control-group .controls .input input, select").each(function(index, element){
				$(this).popover('destroy');
				
				var oId = $(this).attr('id');
				var value = $(this).val();
				var message = '';
				
				if(oId == 'UserUsername'){
					if(UsersFunction.testEmptyString(value)){
						message += 'You can\'t leave the username empty.';
					} else if($('#userNameMessage #em').length>0){
						message += 'Please try another name';
					} else if(value.length<5 || value.length>15) {
						message += 'Please enter between 5 to 15 characters';
					}
				} else if(oId == 'UserPassword'){
					if(UsersFunction.testEmptyString(value)){
						message = 'You can\'t leave the password empty.';
					} else if(value.length<8) {
						message += 'Please enter at least 8 characters';
					} else {
						userPassword = value;
					}
				} else if(oId == 'UserPasswordConfirm'){
					if(UsersFunction.testEmptyString(value)){
						message = 'You need to confirm the password';
					} else if(value!=userPassword){
						message = 'These passwords don\'t match';
					}
				} else if(oId == 'UserRole'){
					if(UsersFunction.testEmptyString(value) || value=='--'){
						message = 'Please select one valid User Role';
					}
				}
				if(!UsersFunction.testEmptyString(message)){
					goNext = false;
					$(this).popover({
						'content' : message,
						'placement' : 'right',
						'delay': { show: 100, hide: 100 }
					});
					$(this).popover('show');
				}
			});
			return goNext;
		},
		checkUserName: function() {
			var un = $('#UserUsername').val();
			var regex = /^[a-zA-Z0-9]+$/;
			
			if(un.length>4){
				if(regex.test(un)){
					var data = {
						username: un
					};
					$.post('/users/checkUserName/', data, function(response) {
						var result = JSON.parse(response);
						if($('#UserUsername').val() == result.username){
							if(result.error == 1){
								$("#userNameMessage").html('<span id="em" class="label label-important">'+result.message+'</span>');
							}else{
								$("#userNameMessage").html('<span class="label label-success">'+result.message+'</span>');
							}
						}
					});
				}else{
					$("#userNameMessage").empty();
					$("#userNameMessage").html('<span class="label label-important">Your username is not valid. You can only use letters and numbers</span>');
				}
			}
		},
		checkPassword: function(){
			var up = $('#UserPassword').val();
			if(up.length>1){
				var strength = 0;

				strength += /[A-Z]+/.test(up) ? 1 : 0;
				strength += /[a-z]+/.test(up) ? 1 : 0;
				strength += /[0-9]+/.test(up) ? 1 : 0;
				strength += /[\W]+/.test(up) ? 1 : 0;

				switch(strength) {
					case 3:
						$("#userPasswordMessage").html('<span class="label label-info">Strong</span>');
						break;
					case 4:
						$("#userPasswordMessage").html('<span class="label label-success">Awesome</span>');
						break;
					default:
						$("#userPasswordMessage").html('<span class="label label-important">Weak</span>');
						break;
				}

								
			}
		},
		testEmptyString: function(str) {
			return (!str || /^\s*$/.test(str));
		},		
	}
	$(UsersFunction.setup);
});