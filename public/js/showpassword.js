// Perlihatkan/Sembunyikan Password
$(document).ready(function(){		
		$('.form-checkbox').click(function(){		
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
