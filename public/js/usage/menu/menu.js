var ADMIN_MENU = {
		
		initForm: function()
		{
			$('#target_type').change(function(){
				var value = $(this).val();
				
				$('.target_value').hide();
				$('#target_' + value).show();
			});
		}
		
};