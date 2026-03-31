(function(){
	$.fn.dorCountDown = function( options ) {
	 	return this.each(function() { 
			// get instance of the dorCountDown.
			new  $.dorCountDown( this, options ); 
		});
 	 }
	$.dorCountDown = function( obj, options ){
		
		this.options = $.extend({
				autoStart: true,
				LeadingZero:true,
				DisplayFormat:"<div>%%D%% Days</div><div>%%H%% Hours</div><div>%%M%% Minutes</div><div>%%S%% Seconds</div>",
				FinishMessage:"Expired",
				CountActive:true,
				finishDate:null
		}, options || {} );
		if( this.options.finishDate == null || this.options.finishDate == '' ){
			return ;
		}
		this.timer  = null;
		this.element = obj;
		this.CountStepper = -1;
		this.CountStepper = Math.ceil(this.CountStepper);
		this.SetTimeOutPeriod = (Math.abs(this.CountStepper)-1)*1000 + 990;
		var dthen = new Date(this.options.finishDate);
		var dnow = new Date();
		if( this.CountStepper > 0 ) {
			ddiff = new Date(dnow-dthen);
		}
		else {
			 ddiff = new Date(dthen-dnow);
		}
		gsecs = Math.floor(ddiff.valueOf()/1000); 
		this.CountBack(gsecs, this);
	};
	 $.dorCountDown.fn =  $.dorCountDown.prototype;
     $.dorCountDown.fn.extend =  $.dorCountDown.extend = $.extend;
	 $.dorCountDown.fn.extend({
		calculateDate:function( secs, num1, num2 ){
			  var s = ((Math.floor(secs/num1))%num2).toString();
			  if ( this.options.LeadingZero && s.length < 2) {
					s = "0" + s;
			  }
			  return "<span>" + s + "</span>";
		},
		CountBack:function( secs, self ){
			 if (secs < 0) {
				self.element.innerHTML = '<div class="dor-labelexpired"> '+self.options.FinishMessage+"</div>";
				return;
			  }
			  clearInterval(self.timer);
			  DisplayStr = self.options.DisplayFormat.replace(/%%D%%/g, self.calculateDate( secs,86400,100000) );
			  DisplayStr = DisplayStr.replace(/%%H%%/g, self.calculateDate(secs,3600,24));
			  DisplayStr = DisplayStr.replace(/%%M%%/g, self.calculateDate(secs,60,60));
			  DisplayStr = DisplayStr.replace(/%%S%%/g, self.calculateDate(secs,1,60));
			  self.element.innerHTML = DisplayStr;
			  if (self.options.CountActive) {
			   	self.timer = null;
				self.timer = setTimeout( function(){
					self.CountBack((secs+self.CountStepper),self);			
				},( self.SetTimeOutPeriod ) );
			 }
		}
					
	})
})(jQuery)


var DORDEALS = {
	init:function(){
		window.addEventListener('load', function (){
		    DORDEALS.AjaxLoadData();
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
	
	AjaxLoadData:function(){
		var urlAjax = jQuery("#countdown-data").attr("data-ajaxurl");
		var processHtml = DORDEALS.ReloadProcess();
		if(typeof urlAjax == "undefined") {
			DORDEALS.DealCarousel();
			return false;
		}
		
		jQuery("#countdown-data").css("min-height",435);
		jQuery("#countdown-data .dailydeal-content").css("min-height",435);
		jQuery("#countdown-data .graph__preloader").remove();
		jQuery("#countdown-data").append(processHtml);
		var params = {}
		jQuery.ajax({
            url: urlAjax,
            data:params,
            type:"POST",
            success:function(data){
            	setTimeout(function(){
            		var results = JSON.parse(data);
	            	jQuery("#countdown-data .graph__preloader").remove();
	            	jQuery("#countdown-data .dailydeal-content").html(results);
	            	jQuery("#countdown-data").css("min-height","auto");
	            	jQuery("#countdown-data .dailydeal-content").css("min-height","auto");
	            	DORDEALS.DealCarousel();
            	},300);
                return false;
            }
        });
	},
	DealCarousel:function(){
		jQuery(".countdown-daily").each(function(){
	    	var productID = jQuery(this).attr("data-id");
	    	var time = jQuery(this).attr("data-time");
	    	var objID = "#countdown-timer-"+productID;
	    	$(objID).countdown(time, function (event) {
	            var $this = $(this).html(event.strftime(''
	                    + '<div class="item-time"><span class="dw-time">%D</span> <span class="dw-txt">Day</span></div>'
	                    + '<div class="item-time"><span class="dw-time">%H</span> <span class="dw-txt">Hour</span></div>'
	                    + '<div class="item-time"><span class="dw-time">%M</span> <span class="dw-txt">Min</span></div>'
	                    + '<div class="item-time"><span class="dw-time">%S</span> <span class="dw-txt">Sec</span></div>'));
	        });
	    });
		$('.dailydeal-content > .product_list').owlCarousel({
	        items: 1,
	        loop: true,
	        nav: true,
	        autoplay: false,
	        margin:10,
	        autoplayHoverPause:true,
	        autoplayTimeout:4000,
	        responsive: {
	            0: {items: 1},
	            1500: {items: 1},
	            1200: {items: 1},
	            992: {items: 1},
	            768: {items: 2,margin:30},
	            551: {items: 1},
	            320: {items: 1}
	        },
	        onInitialize: function (event) {
	            if ($('.dailydeal-content > .product_list').find('article').length <= 1) {
	               this.settings.loop = false;
	            }
	        },
	        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"]
	    });
	}
};

jQuery(document).ready(function($){
	DORDEALS.init();
});