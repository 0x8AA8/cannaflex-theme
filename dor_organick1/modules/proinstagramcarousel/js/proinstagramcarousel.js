/*
* jQuery InstaStream - A jQuery plugin for the Instagram API
* Version 0.1
* http://www.exibit.be
* Free to use and abuse under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
*/

;(function ( $, window, undefined ) {

    // Create the defaults once
    var pluginName = 'instastream',
        document = window.document,
        defaults = {
            instaUser: '1011689',
            instaResults: 3,
            instaMenu: 'yes'
        };
    
    var $nbrResults;
    var $instaUrl;
    var $slideStatus =0;
    // Constructor
    function Plugin( element, options ) {
        this.element = element;
        
        this.options = $.extend( {}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }
    
    // Date converter
String.prototype.timeconverter=function(){
var a = new Date(this*1000);
var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
var year = a.getFullYear();
var month = months[a.getMonth()];
var date = a.getDate();
var time = date+' '+month+' '+year ;
return time;
};

// Stream function
    $.fn.createStream = function(slide, target){
      var j = slide;
     /*$(target).addClass('slider-wrapper').append("<div class='loading'></div>");
     $('div').remove('.slider-content');
      $('div').remove('.slider-menu');*/
     // stream constructor
$.ajax({
type: "GET",
dataType: "jsonp",
cache: false,
url: $instaUrl,
success: function(data) {
if ($instaMenu == 'yes'){
$(target).append("<div class='slider-menu'><a href='#' class='prev'><i class='icon-prev'></i></a><a href='#' class='next'><i class='icon-next'></i></a></div>");
}
$(target).append("<div class='dorInstagramContent'></div>");
for (var i = 0; i < $nbrResults; i++) {
if (j<20){

if(data.data[j].caption == null){var myCaption = '';} else{var myCaption = data.data[j].caption.text;}
if (data.data[j].comments.count < 2){var commentLabel = 'commentaire'} else {var commentLabel = 'commentaires'}
if (data.data[j].likes.count < 2){var likeLabel = 'like'} else {var likeLabel = 'likes'}

$('.dorInstagramContent').append("<div id='inst-slider-item"+i+"' class='inst-slider-item inst-slider-col"+$nbrResults+"'><div class='frame'><a href='" + data.data[j].link + "' target='_blank'><img class='dorlazy' data-original='" + data.data[j].images.standard_resolution.url + "' alt=''><span class='instagramCaption'><span class='frame-title' style='display: block; bottom: -60px;'><em>" + data.data[j].likes.count + "<i class='icon-like white'>" + likeLabel + "</i> " + data.data[j].comments.count + "<i class='icon-comment white'>" + commentLabel + "</i> " + data.data[j].created_time.timeconverter() + "</em></span><span class='frame-more' style='display: block; top: -38px;'>+</span><span class='frame-reflect'></span></span></a></div><header><h4>" + myCaption + "</h4></header>");
j++;
$slideStatus = j;
}
};
if(typeof DORCORE != "undefined" && typeof DORCORE.LazyLoad != "undefined" && typeof DORCORE.LazyLoad == "function"){
  DORCORE.LazyLoad();
}
//prevLoad
$('.prev').on('click',function(e){
e.preventDefault();
var nextSlide = $slideStatus - ($nbrResults * 2);
$().createStream(nextSlide,target); 
});

//nextLoad
$('.next').on('click',function(e){
e.preventDefault();
var nextSlide = $slideStatus;
$().createStream(nextSlide,target);
});
}
}).done(function() {
$('.slider-item').hide();
$('.frame').find('span.frame-more').hide();
$('.frame').find('span.frame-title').hide();
$('.frame').hover(function(){
//$(this).find('span.blocWhite').hide().stop().fadeTo(200,1);
$(this).find('span.frame-more').show().animate({'top': -5},{queue:false,duration:200});
$(this).find('span.frame-title').show().animate({'bottom': 0},{queue:false,duration:200});
}, function(){
//$(this).find('span.blocWhite').stop().fadeOut();
$(this).find('span.frame-more').show().animate({'top': -38},{queue:false,duration:200});
$(this).find('span.frame-title').show().animate({'bottom': -60},{queue:false,duration:200});
});
var beginStatus = $slideStatus - $nbrResults;
if ($instaMenu == 'yes'){
if (beginStatus == 0){
$('.prev').hide();
} else {
$('.prev').show();
}
if ($slideStatus > 19){
$('.next').hide();
} else {
$('.next').show();
}
}
// stream appearance
$('div').remove('.loading');
for (var l = 0; l < $nbrResults; l++) {
k = l +1;
$('#slider-item'+ l).delay(200*k).fadeIn(800);
}
}); 

    }
    
    Plugin.prototype.init = function () {
    
     // Initial variables
     $slideStatus =0;
     $nbrResults =this.options.instaResults;
     $instaMenu = this.options.instaMenu;
     $instaUrl = 'https://api.instagram.com/v1/users/' + this.options.instaUser + '/media/recent/?access_token=' + this.options.instaToken;

var $myContainer = this.element;

      $().createStream($slideStatus,$myContainer);
      
    };

    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new Plugin( this, options ));
            }
        });
    };
}(jQuery, window));

jQuery(document).ready(function(){
    var proistcid = jQuery("#proistcid").val();
    var proistctoken = jQuery("#proistctoken").val();
    var proistclimit = jQuery("#proistclimit").val();
    jQuery("#footerInstagram").instastream({
      instaToken: '2324131028.422b4d6.d6d71d31431a4e8fbf6cb1efa1a2dfdc',
      instaUser: '2324131028',
      instaResults: '6',
      instaMenu: 'no'
    });
    jQuery("#theplaceyouwant").instastream({
      instaToken: '2324131028.422b4d6.d6d71d31431a4e8fbf6cb1efa1a2dfdc',
      instaUser: '2324131028',
      instaResults: '15',
      instaMenu: 'no'
    });

    setTimeout(function(){
      $('#theplaceyouwant .dorInstagramContent').owlCarousel({
          items: 9,
          loop: true,
          navigation: true,
          nav: true,
          autoplay: true,
          lazyLoad: true,
          responsive: {
              1830: {items: 9},
              1500: {items: 8},
              1200: {items: 6},
              992: {items: 6},
              650: {items: 4},
              370: {items: 2},
              300: {items: 1}
          },
          navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
      });
    },2000);

});