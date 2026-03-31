var DORTHEME = {
	idShop:(typeof DOR != "undefined" && typeof DOR.id_shop != "undefined" && DOR.id_shop != null)?DOR.id_shop:1,
	checkLoad:0,
	init:function(){
		window.addEventListener('load', function (){
		    $(".dor-page-loading").remove();
		});
		DORTHEME.ScrollTop();
		DORTHEME.SortCateProduct();
		DORTHEME.MoveTitlePage();
		DORTHEME.ToggleSearch();
		DORTHEME.ToolTipBootstrap();
		DORTHEME.QuickViewAct();
		DORTHEME.AboutUsListUser();
		DORTHEME.EventSite();
		DORTHEME.ResizeCategoryWindow();
		DORTHEME.ShowDisplay();
		DORTHEME.RebuildShowDisplay();
		DORTHEME.AboutSayClient();
		DORTHEME.CheckCmsPage();
		DORTHEME.BrandLogoLists();
		DORTHEME.SucategoryCarousel();
		DORTHEME.AboutUsBrands();
		DORTHEME.AboutUsFarmers();
		DORTHEME.DorHeaderStyle();
		//DORTHEME.MoveLogo();
		DORTHEME.DorQuantity();
		DORTHEME.LoadMoreList();
		if(parseInt($( window ).width()) <= 991){
			DORTHEME.checkLoad = 1;
			DORTHEME.MobileEventHeader();
		}
		$( window ).resize(function() {
			if(parseInt($( window ).width()) <= 991 && DORTHEME.checkLoad == 0){
				DORTHEME.MobileEventHeader();
			}
		});
	},
	DorHeaderStyle:function(){
		if(typeof DOR != "undefined" && typeof DOR.dorHeader != "undefined"){
			var header = DOR.dorHeader;
			if(header == "header02"){
				$(".dorheader02 .head-dorsetting .right-nav > #_desktop_language_selector").remove();
				$(".dorheader02 .head-dorsetting .right-nav > #_desktop_currency_selector").remove();
			}
			if(header == "header03"){
				$(".dorheader03 .head-dorsetting #_desktop_language_selector").remove();
				$(".dorheader03 .head-dorsetting #_desktop_currency_selector").remove();
			}
			if(header == "header04"){
				$('body').on('click','#btn-close-ver-info', function( event ) {
					event.preventDefault();
					$(".dor-setting-lists").animate({left: -375}, 500);
				});
				$('body').on('click','.nav-setting-button-header2 button', function( event ) {
					event.preventDefault();
					$(".dor-setting-lists").animate({left: 0}, 500);
				});
				$( window ).resize(function() {
					if(parseInt($( window ).width()) > 991){
						var check = $(".dorfix-logo").html();
						if(typeof check == "undefined"){
							DORTHEME.MoveLogo();
						}
					}
				});
				if(parseInt($( window ).width()) > 991){
					DORTHEME.MoveLogo();
				}
			}
			if(header == "header05"){
				$('body').on('click','#btn-close-ver-info', function( event ) {
					event.preventDefault();
					$(".dor-setting-lists").animate({right: -375}, 500);
				});
				$('body').on('click','.nav-setting-button-header2 button', function( event ) {
					event.preventDefault();
					$(".dor-setting-lists").animate({right: 0}, 500);
				});
				
			}
		}
	},
	MobileEventHeader:function(){
		jQuery(".nav-setting-button").click(function(){
			var checkOpen1 = $(this).closest(".dor-block-selection").hasClass("open");
			if(!checkOpen1){
				$(this).closest(".dor-block-selection").addClass("open");
			}else{
				$(this).closest(".dor-block-selection").removeClass("open");
			}
		});


		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".nav-setting-button, .dor-block-selection *")) {
                jQuery(".dor-block-selection").removeClass("open");
            }
        });


        jQuery(".user-info.selection-options-wrapper > .line-selected").click(function(){
			var checkOpen2 = $(this).closest(".user-info.selection-options-wrapper").hasClass("open");
			if(!checkOpen2){
				$(this).closest(".user-info.selection-options-wrapper").addClass("open");
			}else{
				$(this).closest(".user-info.selection-options-wrapper").removeClass("open");
			}
		});


		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".user-info.selection-options-wrapper.open *")) {
                jQuery(".user-info.selection-options-wrapper").removeClass("open");
            }
        });



		

        jQuery("#dor-topbar02 .language-selector-wrapper").click(function(){
			var checkOpen2 = $(this).hasClass("open");
			if(!checkOpen2){
				jQuery("#dor-topbar02 .language-selector-wrapper").addClass("open");
			}else{
				jQuery("#dor-topbar02 .language-selector-wrapper").removeClass("open");
			}
		});


		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".language-selector-wrapper, .language-selector-wrapper *")) {
                jQuery(".language-selector-wrapper").removeClass("open");
            }
        });
		

        jQuery("#dor-topbar02 .currency-selector").click(function(){
			var checkOpen2 = $(this).hasClass("open");
			if(!checkOpen2){
				jQuery("#dor-topbar02 .currency-selector").addClass("open");
			}else{
				jQuery("#dor-topbar02 .currency-selector").removeClass("open");
			}
		});


		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".currency-selector, .currency-selector *")) {
                jQuery(".currency-selector").removeClass("open");
            }
        });


	},
	LoadMoreList:function(){
		jQuery(".load-more-data").click(function(){
			jQuery(".next.js-search-link").click();
		});
	},
	DorQuantity:function(){
		$('.dor_quantity_wanted').unbind("change");
		$('.dor_quantity_wanted').TouchSpin({
	      verticalbuttons: true,
	      verticalupclass: 'material-icons touchspin-up',
	      verticaldownclass: 'material-icons touchspin-down',
	      buttondown_class: 'btn btn-touchspin js-touchspin',
	      buttonup_class: 'btn btn-touchspin js-touchspin',
	      min: 1,
	      max: 1000000
	    });
	},
	EventSite:function(){
		var idObjPage = jQuery("body").attr("id");
		if(idObjPage == "category" || idObjPage == "authentication" || idObjPage == "password" || idObjPage == "module-dorblockwishlist-dorwishlist"){
			if(parseInt($( window ).width()) <= 991){
			  	jQuery("#left-column").detach().insertAfter('#content-wrapper');
			}
			DORTHEME.ResizeCategoryWindow();
		}

		var headerfloat = localStorage.getItem("optionHeaderFloat-Shop"+DORTHEME.idShop);
		if((typeof DOR != "undefined" && typeof DOR.dorFloatHeader != "undefined" && parseInt(DOR.dorFloatHeader) == 1 && headerfloat == null) || (headerfloat != null && parseInt(headerfloat) == 1)){
			DORTHEME.ScrollFixedMenu();
		}
		
		if((typeof DOR != "undefined" && typeof DOR.dorSubscribe != "undefined" && parseInt(DOR.dorSubscribe) == 1)){
			var localStorPopup = localStorage.getItem("popupScrAgain-"+DORTHEME.idShop);
	        if(localStorPopup == null && parseInt(localStorPopup) != 1 && typeof sessionStorage['popupScr-'+DORTHEME.idShop] == "undefined" && sessionStorage['popupScr-'+DORTHEME.idShop] != 1){
	        	DORTHEME.ShowPopupScre();
	        }
	        if(typeof sessionStorage['popupScr-'+DORTHEME.idShop] == "undefined" && sessionStorage['popupScr-'+DORTHEME.idShop] != 1){
	        	sessionStorage['popupScr-'+DORTHEME.idShop] = 1;
	        }
	        jQuery("input[name='notShowSubs']").change(function(){
	        	if($(this).is(':checked')){
	        		localStorage.setItem("popupScrAgain-"+DORTHEME.idShop,1);
	        	}else{
	        		localStorage.removeItem("popupScrAgain-"+DORTHEME.idShop);
	        	}
	        });
        }

		jQuery(".nav-group > button").click(function(){
			var checkopen = jQuery(".main-data-nav-setting").hasClass("open");
			if(!checkopen){
				jQuery(".main-data-nav-setting").addClass("open");
			}else{
				jQuery(".main-data-nav-setting").removeClass("open");
			}
		});
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".nav-group > button, .main-data-nav-setting *")) {
                jQuery(".main-data-nav-setting").removeClass("open");
            }
        });
		jQuery("#product .social-sharing > span").click(function(){
			var checkopenSocial = jQuery("#product .social-sharing").hasClass("open");
			if(!checkopenSocial){
				jQuery("#product .social-sharing").addClass("open");
			}else{
				jQuery("#product .social-sharing").removeClass("open");
			}
		});
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is("#product .social-sharing, #product .social-sharing *")) {
                jQuery("#product .social-sharing").removeClass("open");
            }
        });
	},
	MoveLogo:function(){
		var checkLengthMenu = jQuery('#dor-top-menu > .nav.navbar-nav.megamenu > li').length;
		var posLogo = Math.ceil(checkLengthMenu/2);
		if(parseInt($( window ).width()) >= 992){
			var html = jQuery(".h1-logo").detach().html();
			html = '<li class="dorfix-logo">'+html+'</li>';
			jQuery(html).insertAfter('#dor-top-menu > .nav.navbar-nav.megamenu > li:nth-child('+posLogo+')');
		}

		$( window ).resize(function() {
		  var widthW = $( window ).width();
		  var posLogo = Math.ceil(checkLengthMenu/2);
		  var checkpage = jQuery("body").attr("id");
		  if(checkpage != "checkout"){
			  if(parseInt(widthW) <= 991){
			  	var checkFixLogo = jQuery(".h1-logo").html();
			  	var checkPage = jQuery("body").attr("id");
			  	var html = jQuery(".dorfix-logo").detach().html();
			  	if(jQuery.trim(checkFixLogo) == ""){
				  	jQuery(".h1-logo").remove();
				  	if(checkPage != "index"){
				  		html = '<div class="h1-logo no-margin">'+html+'</div>';
				  	}else{
				  		html = '<h1 class="h1-logo no-margin">'+html+'</h1>';
				  	}
				  	jQuery("#_desktop_logo").html(html);
			  	}
			  }else{
			  	var checkFixLogo = jQuery(".dorfix-logo").html();
			  	if(jQuery.trim(checkFixLogo) == ""){
				  	jQuery(".dorfix-logo").remove();
				  	var html = jQuery(".h1-logo").detach().html();
					html = '<li class="dorfix-logo">'+html+'</li>';
					jQuery(html).insertAfter('#dor-top-menu > .nav.navbar-nav.megamenu > li:nth-child('+posLogo+')');
			  	}
			  }
		  }
		});
	},
	SortCateProduct:function(){
		jQuery("body").on("click",".products-sort-order .select-title",function(){
			var checkShow = jQuery(".products-sort-order").hasClass("show-sort-order");
			if(!checkShow)
				jQuery(".products-sort-order").addClass("show-sort-order");
			else
				jQuery(".products-sort-order").removeClass("show-sort-order");
			return false;
		});
		jQuery("body").on("click",".select-list.js-search-link",function(){
			var title = jQuery(this).text();
			setTimeout(function(){
				jQuery(".products-sort-order .select-title").text(title);
			},2000);
		});
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".products-sort-order .select-title, .products-sort-order .select-title *, .products-sort-order .dropdown-menu, .products-sort-order .dropdown-menu *")) {
                jQuery(".products-sort-order").removeClass("show-sort-order");
            }
        });
	},
	MoveTitlePage:function(){
		var checkpage = jQuery("body").attr("id");
		if(typeof checkpage != "undefined" && checkpage != "index"){
			var titlePage = "<h1>";
				titlePage += "";
			var titleCate = jQuery("h1.h1").first().text();
			if(checkpage == "authentication" || checkpage == "password" || checkpage == "my-account" || checkpage == "identity" || 
			checkpage == "addresses" || checkpage == "address" || checkpage == "order-slip" || checkpage == "discount" || checkpage == "history" ){
				titleCate = jQuery(".page-header > h1").first().text();
				jQuery(".page-header > h1").remove();
			}
			if(checkpage == "search"){
				titleCate = jQuery("#main > h2.h2").first().text();
			}
			if(typeof titleCate != "undefined"){
				titlePage += titleCate;
			}
			if(checkpage == "product"){
				titlePage += jQuery(".h1.product-name-detail").first().text();
			}
			if(checkpage == "cms"){
				titlePage += jQuery(".page-header > h1").first().text();
				jQuery("header.page-header").remove();
			}
			if(checkpage == "order-confirmation"){

				titlePage += jQuery(".h1.card-title > span").first().text();
			}
			titlePage += "</h1>";
			jQuery("#title-page-show").html(titlePage);
			if(checkpage != "product"){
				jQuery("h1.h1").remove();
			}
			
		}

	},
	ShowDisplay:function(){
		$('body').on('click','.dor-display-cate a', function( event ) {
			event.preventDefault();
			var objId = jQuery(this).attr("data-id");
			localStorage.removeItem("dorDisplay-"+DORTHEME.idShop);
			localStorage.setItem("dorDisplay-"+DORTHEME.idShop,objId);
			DORTHEME.DisplayAct(objId);
		});
		
	},
	DisplayAct:function(objId){
		jQuery(".dor-display-cate a").removeClass("active");
		jQuery(".dor-display-cate a[data-id='"+objId+"']").addClass("active");
		if(objId == "list"){
			jQuery("#js-product-list article.product-miniature").addClass("dor-list-display");
			jQuery("#category article.product-miniature").each(function(){
				jQuery(this).find(".left-block .show-btn-products").detach().insertAfter(jQuery(this).find('.right-block .product-description-short'));
				jQuery(this).find(".left-block .dor-addcart-button").detach().insertAfter(jQuery(this).find('.right-block .product-description-short'));
				setTimeout(function(){
					$('[data-toggle="tooltip"]').tooltip();
				},1000);
			});
			
		}else{
			jQuery("#js-product-list article.product-miniature").removeClass("dor-list-display");
			jQuery("#category article.product-miniature").each(function(){
				jQuery(this).find(".right-block .show-btn-products").detach().insertAfter(jQuery(this).find('.left-block .product-image-container'));
				jQuery(this).find(".right-block .dor-addcart-button").detach().insertAfter(jQuery(this).find('.left-block .product-image-container'));
				setTimeout(function(){
					$('[data-toggle="tooltip"]').tooltip();
				},1000);
			});
		}
	},
	RebuildShowDisplay:function(){
		var display = localStorage.getItem("dorDisplay-"+DORTHEME.idShop);
		if(display == null){
			if(typeof DOR != "undefined" && typeof DOR.dorCategoryShow != "undefined" && DOR.dorCategoryShow == "list"){
				display = "list";
			}else{
				display = "grid";
			}
		}
		DORTHEME.DisplayAct(display);
	},
	ToggleSearch:function(){
		jQuery(".nav-search-button button").click(function(e){
			e.preventDefault();
			jQuery(".dorHeaderSearch-Wapper").slideToggle(300,function(){
				if(jQuery(this).is(":hidden")){
					jQuery(".dorHeaderSearch-Wapper").removeClass("openSearch")
				}else{
					jQuery(".dorHeaderSearch-Wapper").addClass("openSearch")
					$("#dor_query_top").focus();
				}
			});
			var checkSearchOpen = jQuery("#header").hasClass("openSearch");
			if(!checkSearchOpen){
				jQuery("#header").addClass("openSearch");
			}else{
				jQuery("#header").removeClass("openSearch");
			}
		});
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".dor_search, .dor_search *, .nav-search-button button, .nav-search-button button *")) {
                jQuery("#header").removeClass("openSearch");
            }
        });
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".dorHeaderSearch-Wapper, .dorHeaderSearch-Wapper *, .nav-search-button button, .nav-search-button button *")) {
                if(!jQuery(".dorHeaderSearch-Wapper").is(":hidden")){
                	jQuery(".dorHeaderSearch-Wapper").slideToggle(300,function(){});
                }
            }
        });
	},
	ToolTipBootstrap:function(){
		setTimeout(function(){
			$('[data-toggle="tooltip"]').tooltip();
		},1000);
	},
	QuickViewAct:function(){
		jQuery("body").on("click",".quickview .btn-group.bootstrap-select", function(){
			var checkShow = jQuery(this).find(".dropdown-menu").hasClass("showview");
			if(!checkShow){
				jQuery(this).find(".dropdown-menu").addClass("showview");
			}else{
				jQuery(this).find(".dropdown-menu").removeClass("showview");
			}
		});
	},
	BrandLogoLists:function(){
		$('.logoPartners').owlCarousel({
	        items: 5,
	        loop: true,
	        nav: false,
	        autoplay: true,
	        margin:0,
	        autoplayHoverPause:true,
	        autoplayTimeout:3000,
	        responsive: {
	            0: {items: 1},
	            1500: {items: 5},
	            1200: {items: 5},
	            990: {items: 4},
	            767: {items: 3},
	            650: {items: 3},
	            370: {items: 2},
	            320: {items: 1}
	        },
	        onInitialize: function (event) {
	            if ($('.logoPartners').find('.item-partner').length <= 1) {
	               this.settings.loop = false;
	            }
	        },
	        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"]
	    });
	},
	SucategoryCarousel:function(){
		$('#subcategories .list-sub-cate').owlCarousel({
	        items: 3,
	        loop: true,
	        nav: false,
	        autoplay: true,
	        margin:20,
	        dots:true,
	        autoplayHoverPause:true,
	        autoplayTimeout:3000,
	        responsive: {
	            0: {items: 1},
	            1500: {items: 3},
	            1200: {items: 3},
	            990: {items: 3},
	            767: {items: 3},
	            650: {items: 2},
	            370: {items: 2},
	            320: {items: 1}
	        },
	        onInitialize: function (event) {
	            if ($('#subcategories .list-sub-cate').find('li').length <= 1) {
	               this.settings.loop = false;
	            }
	        },
	        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"]
	    });
	},
	AboutUsListUser:function(){
		$('.about-us-lists').owlCarousel({
	        items: 4,
	        loop: true,
	        nav: false,
	        autoplay: true,
	        margin:20,
	        responsive: {
	            0: {items: 1},
	            1500: {items: 4},
	            1200: {items: 4},
	            990: {items: 3},
	            767: {items: 2},
	            551: {items: 2},
	            320: {items: 1}
	        },
	        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
	    });
	},
	ResizeCategoryWindow:function(){
		if(parseInt($( window ).width()) <= 991){
			jQuery(".cart-grid .blockproductscategory").detach().insertAfter('#cart .card.cart-summary');
		}
		$( window ).resize(function() {
		  var widthW = $( window ).width();
		  if(parseInt(widthW) <= 991){
		  	jQuery("#left-column").detach().insertAfter('#content-wrapper');
		  	jQuery(".cart-grid .blockproductscategory").detach().insertAfter('#cart .card.cart-summary');
		  }else{
		  	jQuery("#left-column").detach().insertBefore('#content-wrapper');
		  	jQuery(".cart-grid .blockproductscategory").detach().insertAfter('#cart .cart-grid-body > a.label');
		  }
		});
	},
	ScrollTop:function(){
		jQuery('.to-top').click(function () {
            jQuery('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
        jQuery(window).scroll(function () {
		    if (jQuery(this).scrollTop() > 100) {
		        jQuery('.to-top').css({bottom: '20px'});
		    }
		    else {
		        jQuery('.to-top').css({bottom: '-50px'});
		    }

		});
	},
	ScrollFixedMenu:function(){
		var n = 90;
		var n1 = 100;
		$(window).bind('scroll', function() {
	     var navHeight = n;
	       if ($(window).scrollTop() > navHeight) {
	         $('#header').addClass('fixed');
	         var checkLogoFix = jQuery(".logoFixed").html();
	       }
	       else {
	         $('#header').removeClass('fixed');
	         $('#header').removeClass('fixed-tran');
	       }
	       if($(window).scrollTop() > n1) {
	       	$('#header').addClass('fixed-tran');
	       }
	       jQuery(".main-data-nav-setting").removeClass("open");
	    });
	},
	ShowPopupScre:function(){
		$('.subscribe-me').bPopup({
            speed: 450,
            transition: 'slideDown'
        });
	},
	AboutSayClient:function(){
		$('.aboutus-sayclient > ul').owlCarousel({
            items: 1,
	        loop: true,
	        navigation: true,
	        nav: true,
	        autoplay: true,
	        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
	},
	CheckCmsPage:function(){
		var checkPage = jQuery("#dor-aboutus-main").html();
		var checkPageCms = jQuery("#cms").html();
		if( typeof checkPageCms != "undefined" && typeof checkPage != "undefined"){
			jQuery("#cms").addClass("dor-page-cms");
		}

		jQuery("#accordion .panel-title > a").click(function(event){
			event.preventDefault();
			var objId = jQuery(this).attr("href");
			var checkHeight = jQuery(objId).height();
			var checkStatus = jQuery(objId).hasClass("in");
			if(!checkStatus){
				jQuery(".panel-collapse").removeClass("in");
				jQuery("#accordion .panel-title > a").find("i.add").removeClass("hidden");
				jQuery("#accordion .panel-title > a").find("i.remove").addClass("hidden");
				jQuery(this).find("i.add").addClass("hidden");
				jQuery(this).find("i.remove").removeClass("hidden");
				jQuery(objId).addClass("in");
			}else{
				jQuery(".panel-collapse").removeClass("in");
				jQuery(this).find("i.remove").addClass("hidden");
				jQuery(this).find("i.add").removeClass("hidden");
			}
			

		});
	},

	AboutUsBrands:function(){
		$('.aboutPartners').owlCarousel({
            items: 5,
	        loop: true,
	        navigation: true,
	        nav: false,
	        autoplay: true,
	        margin:0,
	        responsive: {
	            0: {items: 1},
	            1200: {items: 5},
	            992: {items: 4},
	            500: {items: 3},
	            380: {items: 2},
	            300: {items: 1}
	        },
	        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
	},
	AboutUsFarmers:function(){
		$('.aboutus-ourfarmers').owlCarousel({
            items: 4,
	        loop: true,
	        navigation: true,
	        nav: false,
	        autoplay: true,
	        margin:30,
	        responsive: {
	            0: {items: 1},
	            1200: {items: 4},
	            992: {items: 4},
	            768: {items: 3},
	            400: {items: 2},
	            300: {items: 1}
	        },
	        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
	},
}



var DORTHEME1 = {
	init1:function(){
		DORTHEME1.CarouselStatic();
		DORTHEME1.EventTheme();
		DORTHEME1.FooterClickMobile();
		DORTHEME1.MoveBannerStatic();
	},
	CarouselStatic:function(){
		$('.brands-carousel ').owlCarousel({
	        items: 5,
	        loop: true,
	        nav: false,
	        autoplay: true,
	        margin:0,
	        lazyLoad: true,
	        responsive: {
	            0: {items: 5},
	            1200: {items: 5},
	            992: {items: 4},
	            650: {items: 3},
	            370: {items: 2},
	            300: {items: 1}
	        },
	        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
	    });
	},
	EventTheme:function(){
		jQuery(".select-setting").click(function(){
			var checkOpen = jQuery(this).closest(".dor-topbar-inner").hasClass("open");
			if(!checkOpen){
				jQuery(this).closest(".dor-topbar-inner").addClass("open");
			}else{
				jQuery(this).closest(".dor-topbar-inner").removeClass("open");
			}
		});
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".select-setting, .select-setting *, .topbar-selector, .topbar-selectorn *")) {
                jQuery(".dor-topbar-inner").removeClass("open");
            }
        });
	},
	FooterClickMobile:function(){
		jQuery(".footer-block .navbar-toggler").click(function(){
			var checkOpen = jQuery(this).closest(".footer-block").hasClass("open");
			if(!checkOpen){
				jQuery(this).closest(".footer-block").addClass("open");
			}else{
				jQuery(this).closest(".footer-block").removeClass("open");
			}
		});
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is(".footer-block .navbar-toggler, .footer-block .navbar-toggler *, .dorFooterInner .collapse, .dorFooterInner .collapse *")) {
                jQuery(".footer-block").removeClass("open");
            }
        });

        jQuery("#footer .block_newsletter .navbar-toggler").click(function(){
			var checkOpen = jQuery(this).closest("#footer .block_newsletter").hasClass("open");
			if(!checkOpen){
				jQuery(this).closest("#footer .block_newsletter").addClass("open");
			}else{
				jQuery(this).closest("#footer .block_newsletter").removeClass("open");
			}
		});
		jQuery(document).click(function (event) {
            if (!jQuery(event.target).is("#footer .block_newsletter .navbar-toggler, #footer .block_newsletter .navbar-toggler *")) {
                jQuery("#footer .block_newsletter").removeClass("open");
            }
        });
	},
	MoveBannerStatic:function(){
		if(parseInt($( window ).width()) <= 767){
			jQuery(".banner-field.main-field").detach().insertAfter('.banner-field.tickfield');
		}
		$( window ).resize(function() {
		  var widthW = $( window ).width();
		  if(parseInt(widthW) <= 767){
		  	jQuery(".banner-field.main-field").detach().insertAfter('.banner-field.tickfield');
		  }else{
		  	jQuery(".banner-field.tickfield").detach().insertAfter('.banner-field.main-field');
		  }
		});
	},

};




var DORPHOTOSWIPE = {
	initPhotoSwipeFromDOM:function(gallerySelector){

		// select all gallery elements
		var galleryElements = document.querySelectorAll( gallerySelector );
		for(var i = 0, l = galleryElements.length; i < l; i++) {
			galleryElements[i].setAttribute('data-pswp-uid', i+1);
			galleryElements[i].onclick = DORPHOTOSWIPE.onThumbnailsClick;
		}

		// Parse URL and open gallery if it contains #&pid=3&gid=1
		var hashData = DORPHOTOSWIPE.photoswipeParseHash();
		if(hashData.pid && hashData.gid) {
			DORPHOTOSWIPE.openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
		}
	},

	parseThumbnailElements:function(el) {
	    var thumbElements = el.childNodes,
	        numNodes = thumbElements.length,
	        items = [],
	        el,
	        childElements,
	        thumbnailEl,
	        size,
	        item;

	    for(var i = 0; i < numNodes; i++) {
	        el = thumbElements[i];

	        // include only element nodes 
	        if(el.nodeType !== 1) {
	          continue;
	        }

	        childElements = el.children;

	        size = el.getAttribute('data-size').split('x');

	        // create slide object
	        item = {
				src: el.getAttribute('href'),
				w: parseInt(size[0], 10),
				h: parseInt(size[1], 10),
				author: el.getAttribute('data-author')
	        };

	        item.el = el; // save link to element for getThumbBoundsFn

	        if(childElements.length > 0) {
	          item.msrc = childElements[0].getAttribute('src'); // thumbnail url
	          if(childElements.length > 1) {
	              item.title = childElements[1].innerHTML; // caption (contents of figure)
	          }
	        }


			var mediumSrc = el.getAttribute('data-med');
          	if(mediumSrc) {
            	size = el.getAttribute('data-med-size').split('x');
            	// "medium-sized" image
            	item.m = {
              		src: mediumSrc,
              		w: parseInt(size[0], 10),
              		h: parseInt(size[1], 10)
            	};
          	}
          	// original image
          	item.o = {
          		src: item.src,
          		w: item.w,
          		h: item.h
          	};

	        items.push(item);
	    }

	    return items;
	},

	closest:function(el, fn) {
	    return el && ( fn(el) ? el : DORPHOTOSWIPE.closest(el.parentNode, fn) );
	},

	onThumbnailsClick:function(e) {
	    e = e || window.event;
	    e.preventDefault ? e.preventDefault() : e.returnValue = false;

	    var eTarget = e.target || e.srcElement;DORPHOTOSWIPE.photoswipeParseHash

	    var clickedListItem = DORPHOTOSWIPE.closest(eTarget, function(el) {
	        return el.tagName === 'A';
	    });

	    if(!clickedListItem) {
	        return;
	    }

	    var clickedGallery = clickedListItem.parentNode;

	    var childNodes = clickedListItem.parentNode.childNodes,
	        numChildNodes = childNodes.length,
	        nodeIndex = 0,
	        index;

	    for (var i = 0; i < numChildNodes; i++) {
	        if(childNodes[i].nodeType !== 1) { 
	            continue; 
	        }

	        if(childNodes[i] === clickedListItem) {
	            index = nodeIndex;
	            break;
	        }
	        nodeIndex++;
	    }

	    if(index >= 0) {
	        DORPHOTOSWIPE.openPhotoSwipe( index, clickedGallery );
	    }
	    return false;
	},

	photoswipeParseHash:function() {
		var hash = window.location.hash.substring(1),
	    params = {};

	    if(hash.length < 5) { // pid=1
	        return params;
	    }

	    var vars = hash.split('&');
	    for (var i = 0; i < vars.length; i++) {
	        if(!vars[i]) {
	            continue;
	        }
	        var pair = vars[i].split('=');  
	        if(pair.length < 2) {
	            continue;
	        }           
	        params[pair[0]] = pair[1];
	    }

	    if(params.gid) {
	    	params.gid = parseInt(params.gid, 10);
	    }

	    return params;
	},

	openPhotoSwipe:function(index, galleryElement, disableAnimation, fromURL) {
	    var pswpElement = document.querySelectorAll('.pswp')[0],
	        gallery,
	        options,
	        items;

		items = DORPHOTOSWIPE.parseThumbnailElements(galleryElement);

	    // define options (if needed)
	    options = {

	        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

	        //getThumbBoundsFn: function(index) {
	            // See Options->getThumbBoundsFn section of docs for more info
	            // Dorado Comment
	            /*var thumbnail = items[index].el.children[0],
	                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
	                rect = thumbnail.getBoundingClientRect(); 

	            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};*/
	        //},

	        addCaptionHTMLFn: function(item, captionEl, isFake) {
				if(!item.title) {
					captionEl.children[0].innerText = '';
					return false;
				}
				captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
				return true;
	        },
			
	    };


	    if(fromURL) {
	    	if(options.galleryPIDs) {
	    		// parse real index when custom PIDs are used 
	    		// http://photoswipe.com/documentation/faq.html#custom-pid-in-url
	    		for(var j = 0; j < items.length; j++) {
	    			if(items[j].pid == index) {
	    				options.index = j;
	    				break;
	    			}
	    		}
		    } else {
		    	options.index = parseInt(index, 10) - 1;
		    }
	    } else {
	    	options.index = parseInt(index, 10);
	    }

	    // exit if index not found
	    if( isNaN(options.index) ) {
	    	return;
	    }

		var radios = document.getElementsByName('gallery-style');
		for (var i = 0, length = radios.length; i < length; i++) {
		    if (radios[i].checked) {
		        if(radios[i].id == 'radio-all-controls') {

		        } else if(radios[i].id == 'radio-minimal-black') {
		        	options.mainClass = 'pswp--minimal--dark';
			        options.barsSize = {top:0,bottom:0};
					options.captionEl = false;
					options.fullscreenEl = false;
					options.shareEl = false;
					options.bgOpacity = 0.85;
					options.tapToClose = true;
					options.tapToToggleControls = false;
		        }
		        break;
		    }
		}

	    if(disableAnimation) {
	        options.showAnimationDuration = 0;
	    }

	    // Pass data to PhotoSwipe and initialize it
	    gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

	    // see: http://photoswipe.com/documentation/responsive-images.html
		var realViewportWidth,
		    useLargeImages = false,
		    firstResize = true,
		    imageSrcWillChange;

		gallery.listen('beforeResize', function() {

			var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
			dpiRatio = Math.min(dpiRatio, 2.5);
		    realViewportWidth = gallery.viewportSize.x * dpiRatio;


		    if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
		    	if(!useLargeImages) {
		    		useLargeImages = true;
		        	imageSrcWillChange = true;
		    	}
		        
		    } else {
		    	if(useLargeImages) {
		    		useLargeImages = false;
		        	imageSrcWillChange = true;
		    	}
		    }

		    if(imageSrcWillChange && !firstResize) {
		        gallery.invalidateCurrItems();
		    }

		    if(firstResize) {
		        firstResize = false;
		    }

		    imageSrcWillChange = false;

		});

		gallery.listen('gettingData', function(index, item) {
		    if( useLargeImages ) {
		        item.src = item.o.src;
		        item.w = item.o.w;
		        item.h = item.o.h;
		    } else {
		        item.src = item.m.src;
		        item.w = item.m.w;
		        item.h = item.m.h;
		    }
		});

	    gallery.init();
	},
}




var DORPHOTOSWIPE2 = {
	GalleryOpt: "#portfoliolist0.dor-gallery-show",
	initPhotoSwipeFromDOM:function(gallerySelector){

		// select all gallery elements
		var galleryElements = document.querySelectorAll( gallerySelector );
		for(var i = 0, l = galleryElements.length; i < l; i++) {
			galleryElements[i].setAttribute('data-pswp-uid', i+1);
			galleryElements[i].onclick = DORPHOTOSWIPE2.onThumbnailsClick;
		}

		// Parse URL and open gallery if it contains #&pid=3&gid=1
		var hashData = DORPHOTOSWIPE2.photoswipeParseHash();
		if(hashData.pid && hashData.gid) {
			DORPHOTOSWIPE2.openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
		}
	},

	parseThumbnailElements:function(el) {
	    var thumbElements = [];
		jQuery(el).find("div a").each(function(k,elm){
			thumbElements.push(elm);
		});
	     var numNodes = thumbElements.length,
	        items = [],
	        el,
	        childElements,
	        thumbnailEl,
	        size,
	        item;
	   	jQuery(el).find("div a").each(function(key,item1){
	    	el = item1;
	        childElements = el.children;
	        size = el.getAttribute('data-size').split('x');

	        // create slide object
	        item = {
				src: el.getAttribute('href'),
				w: parseInt(size[0], 10),
				h: parseInt(size[1], 10),
				author: el.getAttribute('data-author')
	        };

	        item.el = el; // save link to element for getThumbBoundsFn

	        if(childElements.length > 0) {
	          item.msrc = childElements[0].getAttribute('src'); // thumbnail url
	          if(childElements.length > 1) {
	              item.title = childElements[1].innerHTML; // caption (contents of figure)
	          }
	        }

		
			var mediumSrc = el.getAttribute('data-med');
          	if(mediumSrc) {
            	size = el.getAttribute('data-med-size').split('x');
            	// "medium-sized" image
            	item.m = {
              		src: mediumSrc,
              		w: parseInt(size[0], 10),
              		h: parseInt(size[1], 10)
            	};
          	}
          	// original image
          	item.o = {
          		src: item.src,
          		w: item.w,
          		h: item.h
          	};

	        items.push(item);
	        
	    });

	    return items;
	},

	closest:function(el, fn) {
	    return el && ( fn(el) ? el : DORPHOTOSWIPE2.closest(el.parentNode, fn) );
	},

	onThumbnailsClick:function(e) {
	    e = e || window.event;
	    e.preventDefault ? e.preventDefault() : e.returnValue = false;

	    var eTarget = e.target || e.srcElement;

	    var clickedListItem = DORPHOTOSWIPE2.closest(eTarget, function(el) {
	        return el.tagName === 'A';
	    });

	    if(!clickedListItem) {
	        return;
	    }

	    var clickedGallery = clickedListItem.parentNode;
	   	var childNodes = [];
	   		jQuery(DORPHOTOSWIPE2.GalleryOpt).find("div a").each(function(k,child){
				childNodes.push(child);
			});
		var numChildNodes = childNodes.length,
	        nodeIndex = 0,
	        index;
	    for (var i = 0; i < numChildNodes; i++) {
	        if(childNodes[i].nodeType !== 1) { 
	            continue; 
	        }

	        if(childNodes[i] === clickedListItem) {
	            index = nodeIndex;
	            break;
	        }
	        nodeIndex++;
	    }

	    if(index >= 0) {
	        DORPHOTOSWIPE2.openPhotoSwipe( index, clickedGallery );
	    }
	    return false;
	},

	photoswipeParseHash:function() {
		var hash = window.location.hash.substring(1),
	    params = {};

	    if(hash.length < 5) { // pid=1
	        return params;
	    }

	    var vars = hash.split('&');
	    for (var i = 0; i < vars.length; i++) {
	        if(!vars[i]) {
	            continue;
	        }
	        var pair = vars[i].split('=');  
	        if(pair.length < 2) {
	            continue;
	        }           
	        params[pair[0]] = pair[1];
	    }

	    if(params.gid) {
	    	params.gid = parseInt(params.gid, 10);
	    }
	    alert(params)
	    return params;
	},

	openPhotoSwipe:function(index, galleryElement, disableAnimation, fromURL) {
	    galleryElement = jQuery(galleryElement).closest(DORPHOTOSWIPE2.GalleryOpt);
	    var pswpElement = document.querySelectorAll('.pswp')[0],
	        gallery,
	        options,
	        items;

		items = DORPHOTOSWIPE2.parseThumbnailElements(galleryElement);
		var idObj = jQuery(galleryElement).closest(DORPHOTOSWIPE2.GalleryOpt).attr("data-pswp-uid");
	    // define options (if needed)
	    options = {

	        galleryUID: jQuery(galleryElement).closest(DORPHOTOSWIPE2.GalleryOpt).attr("data-pswp-uid"),

	        
	        addCaptionHTMLFn: function(item, captionEl, isFake) {
				if(!item.title) {
					captionEl.children[0].innerText = '';
					return false;
				}
				captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
				return true;
	        },
			
	    };


	    if(fromURL) {
	    	if(options.galleryPIDs) {

	    		// parse real index when custom PIDs are used 
	    		// http://photoswipe.com/documentation/faq.html#custom-pid-in-url
	    		for(var j = 0; j < items.length; j++) {
	    			if(items[j].pid == index) {
	    				options.index = j;
	    				break;
	    			}
	    		}
		    } else {
		    	options.index = parseInt(index, 10) - 1;
		    }
	    } else {
	    	options.index = parseInt(index, 10);
	    }

	    // exit if index not found
	    if( isNaN(options.index) ) {
	    	return;
	    }

		var radios = document.getElementsByName('gallery-style');
		for (var i = 0, length = radios.length; i < length; i++) {
		    if (radios[i].checked) {
		        if(radios[i].id == 'radio-all-controls') {

		        } else if(radios[i].id == 'radio-minimal-black') {
		        	options.mainClass = 'pswp--minimal--dark';
			        options.barsSize = {top:0,bottom:0};
					options.captionEl = false;
					options.fullscreenEl = false;
					options.shareEl = false;
					options.bgOpacity = 0.85;
					options.tapToClose = true;
					options.tapToToggleControls = false;
		        }
		        break;
		    }
		}

	    if(disableAnimation) {
	        options.showAnimationDuration = 0;
	    }

	    // Pass data to PhotoSwipe and initialize it
	    gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

	    // see: http://photoswipe.com/documentation/responsive-images.html
		var realViewportWidth,
		    useLargeImages = false,
		    firstResize = true,
		    imageSrcWillChange;

		gallery.listen('beforeResize', function() {

			var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
			dpiRatio = Math.min(dpiRatio, 2.5);
		    realViewportWidth = gallery.viewportSize.x * dpiRatio;


		    if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
		    	if(!useLargeImages) {
		    		useLargeImages = true;
		        	imageSrcWillChange = true;
		    	}
		        
		    } else {
		    	if(useLargeImages) {
		    		useLargeImages = false;
		        	imageSrcWillChange = true;
		    	}
		    }

		    if(imageSrcWillChange && !firstResize) {
		        gallery.invalidateCurrItems();
		    }

		    if(firstResize) {
		        firstResize = false;
		    }

		    imageSrcWillChange = false;

		});

		gallery.listen('gettingData', function(index, item) {
		    if( useLargeImages ) {
		        item.src = item.o.src;
		        item.w = item.o.w;
		        item.h = item.o.h;
		    } else {
		        item.src = item.m.src;
		        item.w = item.m.w;
		        item.h = item.m.h;
		    }
		});

	    gallery.init();
	},
}

jQuery(document).ready(function(){
	DORTHEME.init();
	DORTHEME1.init1();
	var checkGallery = $(".demo-gallery").html();
	if(typeof checkGallery != "undefined")
		DORPHOTOSWIPE.initPhotoSwipeFromDOM(".demo-gallery");
});