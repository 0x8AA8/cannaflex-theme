var BIZ = {
	init:function(){
		BIZ.DorBizProduct();
	},
	DorBizProduct:function(){
		var urlAjax = jQuery(".dor-biz-product > .biz-contents").attr("data-ajaxurl");
		jQuery(".biz-group-content").each(function(){
			var idBiz = jQuery(this).attr("id").replace("bizTab-","");
			var params = {}
			params.tab = idBiz;
			jQuery.ajax({
	            url: urlAjax,
	            data:params,
	            type:"POST",
	            success:function(data){
	            	var results = JSON.parse(data);
	            	jQuery("#bizTab-"+idBiz).html(results);
	            	BIZ.BizProducts("#bizTab-"+idBiz);
	            	if(typeof OREGON != "undefined" && typeof OREGON.DorQuantity != "undefined" && typeof OREGON.DorQuantity == "function"){
	            		OREGON.DorQuantity();
	            	}
	            	
	                return false;
	            }
	        });
		});
		jQuery(".biz-group:nth-child(2)").addClass("active");
		jQuery(".tab-biz-control li a").click(function(e){
			e.preventDefault();
			var ibObjTab = jQuery(this).attr("href");
			jQuery(".tab-biz-control li a").removeClass("active");
			jQuery(this).addClass("active");
			jQuery(".biz-group").removeClass("active");
			jQuery(ibObjTab).addClass("active");
		});
	},
	BizProducts:function(objElement){
		$('.biz-group-content .product_list').owlCarousel({
            items: 1,
            loop: false,
            navigation: true,
            nav: true,
            autoplay: false,
            margin:0,
            responsive: {
                0: {items: 1},
                1200: {items: 1},
                1165: {items: 1},
                992: {items: 1},
                768: {items: 1},
                600: {items: 1},
                480: {items: 1},
                320: {items: 1}
            },
            onInitialize: function (event) {
		        if ($(objElement).find('article').length <= 1) {
		           this.settings.loop = false;
		        }
		    },
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
	},
}

jQuery(document).ready(function(){
	BIZ.init();
});