var PROCATEAJAXTAB = {
	init:function(){
		PROCATEAJAXTAB.ActTab();
		PROCATEAJAXTAB.LoadMoreData();
		
		window.addEventListener('load', function (){
		    PROCATEAJAXTAB.LoadDefault();
		});
	},
	ReloadProcess:function(){
		var html = "";
		html += '<div class="graph__preloader">';
	        html += '<div class="js-preloader preloader">';
	          html += '<b class="preloader__bar -bar1"></b>';
	          html += '<b class="preloader__bar -bar2"></b>';
	          html += '<b class="preloader__bar -bar3"></b>';
	          html += '<b class="preloader__bar -bar4"></b>';
	          html += '<b class="preloader__bar -bar5"></b>';
	        html += '</div>';
	    html += '</div>';
	    return html;
	},
	LoadDefault:function(){
		var checkTab = jQuery("#dorTabAjax").attr("data-defaulttab");
		var processHtml = PROCATEAJAXTAB.ReloadProcess();
		if(typeof checkTab == "undefined") return false;
		type = 1;
		if(isNaN(parseInt(checkTab))){
			type = 0;
		}
		var limit = parseInt(jQuery("#cate-tab-data-"+checkTab+" .dor-load-more-tab").attr("data-limit"));
		jQuery("#dorTabProductCategoryContent.tab-content").css({
			"min-height":420,
			"max-height":420,
			"overflow":"hidden"
		});
		jQuery("#cate-tab-data-"+checkTab+" .dor-content-items > div").css({
			"opacity":0,
			"visibility":"hidden"
		});
		jQuery("#dorTabProductCategoryContent .loaddingAjaxTab").remove();
		jQuery("#dorTabProductCategoryContent .graph__preloader").remove();
		jQuery("#dorTabProductCategoryContent").append(processHtml);
		var urlAjax = jQuery("#dorTabAjax").attr("data-ajaxurl");
		var params = {}
		params.cateID = checkTab;
		params.type = type;
		jQuery.ajax({
            url: urlAjax,
            data:params,
            type:"POST",
            success:function(data){
            	var results = JSON.parse(data);
            	jQuery("#cate-tab-data-"+checkTab+" .dor-content-items > div").html(results);
            	var lengthVal = jQuery(results).find(".product-miniature").length;
            	if(lengthVal < limit){
            		jQuery("#cate-tab-data-"+checkTab+" .dor-load-more-tab").remove();
            	}
            	jQuery("#dorTabAjax li a").removeClass("active");
            	setTimeout(function(){
            		PROCATEAJAXTAB.TabCarousel("#cate-tab-data-"+checkTab+" .product_list");
            		jQuery("#dorTabProductCategoryContent.tab-content").css({
            			"min-height":"auto",
            			"overflow":"inherit",
						"max-height":"none"
            		});
            		jQuery("#cate-tab-data-"+checkTab+" .dor-content-items > div").css({
						"opacity":1,
						"visibility":"visible"
					});
            		jQuery("#dorTabProductCategoryContent .graph__preloader").remove();
            		jQuery(".loaddingAjaxTab").remove();
            	},200);
            	
				if(typeof DORTHEME != "undefined" && typeof DORTHEME.ToolTipBootstrap == "function"){
					DORTHEME.ToolTipBootstrap();
				}
				if(typeof DORTHEME != "undefined" && typeof DORTHEME.DorQuantity != "undefined" && typeof DORTHEME.DorQuantity == "function"){
            		//DORTHEME.DorQuantity();
            	}
                return false;
            }
        });
	},
	ActTab:function(){

		var objElement = $('#dor-tab-product-category .tab-pane.active').attr("id");
		if(typeof objElement != "undefined"){
			var objId = "#"+objElement+" .product_list";
			PROCATEAJAXTAB.TabCarousel(objId);
		}

		jQuery("#dorTabAjax > li a").unbind("click");
		jQuery("#dorTabAjax > li a").click(function(){
			var _this = this;
			var processHtml = PROCATEAJAXTAB.ReloadProcess();
			var idTxt = jQuery(this).attr("href");
			var idObjTxt = idTxt;
			idTxt = idTxt.replace("#cate-tab-data-","");
			type = 1;
			var idObj = parseInt(idTxt);
			if(isNaN(idObj)){
				idObj = idTxt;
				type = 0;
			}

			var limit = parseInt(jQuery("#cate-tab-data-"+idObj+" .dor-load-more-tab").attr("data-limit"));
			var checkExist = jQuery("#cate-tab-data-"+idObj+" .dor-content-items > div").html();
			if(jQuery.trim(checkExist).length == 0 || checkExist == undefined){
				jQuery("#cate-tab-data-"+idObj+" .dor-load-more-tab").addClass("hidden");
				jQuery("#dorTabProductCategoryContent.tab-content").css("min-height",420);
				jQuery("#dorTabProductCategoryContent .loaddingAjaxTab").remove();
				jQuery("#dorTabProductCategoryContent .graph__preloader").remove();
				//jQuery("#dorTabProductCategoryContent").append('<span class="loaddingAjaxTab">Loadding...</span>');
				jQuery("#dorTabProductCategoryContent").append(processHtml);
				var urlAjax = jQuery(this).closest("ul").attr("data-ajaxurl");
				var params = {}
				params.cateID = idObj;
				params.type = type;
				jQuery.ajax({
		            url: urlAjax,
		            data:params,
		            type:"POST",
		            success:function(data){
		            	setTimeout(function(){
		            		var results = JSON.parse(data);
			            	//jQuery(".tab_container.dorlistproducts .sliderLoadingTab").remove();
			            	jQuery("#dorTabProductCategoryContent .graph__preloader").remove();
			            	jQuery("#cate-tab-data-"+idObj+" .dor-content-items > div").html(results);
			            	var lengthVal = jQuery(results).find(".product-miniature").length;
			            	if(lengthVal < limit){
			            		jQuery("#cate-tab-data-"+idObj+" .dor-load-more-tab").remove();
			            	}else{
			            		jQuery("#cate-tab-data-"+idObj+" .dor-load-more-tab").removeClass("hidden");
			            	}


			            	jQuery(".loaddingAjaxTab").remove();
			            	jQuery("#dorTabProductCategoryContent.tab-content").css("min-height","auto");
			            	jQuery("#dorTabAjax li a").removeClass("active");
							jQuery(_this).addClass("active");
							jQuery(_this).closest("li").addClass("in active");

							var objId = idObjTxt+" .product_list";
							PROCATEAJAXTAB.TabCarousel(objId);

							if(typeof DORTHEME != "undefined" && typeof DORTHEME.ToolTipBootstrap == "function"){
								DORTHEME.ToolTipBootstrap();
							}
							if(typeof OREGON != "undefined" && typeof OREGON.DorQuantity != "undefined" && typeof OREGON.DorQuantity == "function"){
			            		OREGON.DorQuantity();
			            	}
			            	if(typeof DORCORE != "undefined" && typeof DORCORE.LazyLoad != "undefined" && typeof DORCORE.LazyLoad == "function"){
			            		DORCORE.LazyLoad();
			            	}
		            	},600);
		                return false;
		            }
		        });
			}else{
				jQuery("#dorTabAjax li a").removeClass("active");
				jQuery("#dorTabAjax li").removeClass("active");
				jQuery(_this).addClass("active");
				jQuery(_this).closest("li").addClass("active");
				jQuery("#dorTabProductCategoryContent .tab-pane").removeClass('active');
				jQuery(idObjTxt+".tab-pane").addClass('in active');
			}
		});
	},
	LoadMoreData:function(){
		jQuery(".dor-load-more-tab").click(function(){
			var _this=this;
			var limit = parseInt(jQuery(_this).attr("data-limit"))
			var urlAjax = jQuery(_this).attr("data-ajax");
			var page = jQuery(_this).attr("data-page");
			var idTxt = jQuery(_this).closest(".tab-pane").attr("id");
			jQuery("#"+idTxt).append("<span class='load-more-small'></span>");
			idTxt = idTxt.replace("cate-tab-data-","");
			type = 1;
			var idObj = parseInt(idTxt);
			if(isNaN(idObj)){
				idObj = idTxt;
				type = 0;
			}
			var params = {}
			params.cateID = idObj;
			params.type = type;
			params.page = page;
			setTimeout(function(){
				jQuery.ajax({
		            url: urlAjax,
		            data:params,
		            type:"POST",
		            success:function(data){
		            	var results = JSON.parse(data);
		            	jQuery("#cate-tab-data-"+idObj+" .product_list").append(results);

		            	var lengthVal = jQuery(results).filter("article").length;
		            	if(lengthVal < limit){
		            		jQuery("#cate-tab-data-"+idObj+" .dor-load-more-tab").remove();
		            	}else{
		            		jQuery("#cate-tab-data-"+idObj+" .dor-load-more-tab").removeClass("hidden");
		            		jQuery(_this).attr("data-page",parseInt(page)+1);
		            	}
		            	
		            	jQuery(".load-more-small").remove();
		            	if(typeof DORTHEME != "undefined" && typeof DORTHEME.ToolTipBootstrap == "function"){
							DORTHEME.ToolTipBootstrap();
						}
		            	if(typeof OREGON != "undefined" && typeof OREGON.DorQuantity != "undefined" && typeof OREGON.DorQuantity == "function"){
		            		OREGON.DorQuantity();
		            	}
		                return false;
		            }
		        });
	        },1000);
		});
	},
	TabCarousel:function(objElement){
		/*$(objElement).owlCarousel({
	        items: 4,
	        loop: true,
	        nav: true,
	        autoplay: false,
	        margin:20,
	        lazyLoad: true,
	        responsive: {
	            0: {items: 1},
	            1200: {items: 4},
	            992: {items: 4},
	            650: {items: 3, margin:20},
	            370: {items: 2, margin:20},
	            300: {items: 1, margin:0}
	        },
	        onInitialize: function (event) {
		        if ($(objElement).find('article').length <= 1) {
		           this.settings.loop = false;
		        }
		    },
	        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
	    });*/
	}
};

jQuery(document).ready(function(){
	PROCATEAJAXTAB.init();
});