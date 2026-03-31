var BIZADM = {
	init:function(){
		jQuery("#biz_from_date, #biz_to_date").datepicker({ dateFormat: 'yy-mm-dd' });
		var val = parseInt(jQuery('input[name="show_mostview"]:checked').val());
		BIZADM.showHideDate(val);
		jQuery("input[name='show_mostview']").change(function(){
			var val = parseInt(jQuery('input[name="show_mostview"]:checked').val());
			BIZADM.showHideDate(val);
		});
	},
	showHideDate:function(val){
		if(val == 1){
			jQuery("#biz_from_date, #biz_to_date").closest(".form-group").show();
		}else{
			jQuery("#biz_from_date, #biz_to_date").closest(".form-group").hide();
		}
	}
}
jQuery(document).ready(function(){
	BIZADM.init();
});