jQuery(function(){
    var opts = {
    lines: 9, // The number of lines to draw
    length: 6, // The length of each line
    width: 2, // The line thickness
    radius: 5, // The radius of the inner circle
    corners: 0.4, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    color: '#FFF', // #rgb or #rrggbb
    speed: 1, // Rounds per second
    trail: 60, // Afterglow percentage
    shadow: true, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: 'auto', // Top position relative to parent in px
    left: 'auto' // Left position relative to parent in px
  };
  var target = document.getElementById('portfolio-loader');
  var spinner = new Spinner(opts).spin(target);
  var target2 = document.getElementById('portfolio-loader2');
  var spinner2 = new Spinner(opts).spin(target2);
  var target3 = document.getElementById('slider-loader');
  var spinner3 = new Spinner(opts).spin(target3);
})


jQuery(document).ready(function($){

    jQuery('.flexslider').flexslider();

    //MENU
    $('ul.sf-menu').superfish({
        delay:       1000,
        animation:   {opacity:'show',height:'show'}
    });

    jQuery("#cat-nav").superfish();

    //LOAD ISOTOPE
    var container = jQuery('.project-home-content');
    jQuery(container).imagesLoaded(function(){
        jQuery('.portfolio-loader').attr('style', 'display:none');
        jQuery(container).show().animate({opacity:1},1000);
        jQuery('.project-home-content').show();
        jQuery(container).isotope({
            itemSelector: '.project-home-one',
            isAnimated: true,
            animationEngine : 'jquery',
            animationOptions: {
                duration: 800,
                easing: 'easeOutCubic',
                queue: false
            }
        });
    });
    
    jQuery('.portfolio-category-link ul li a').click(function(){
        var selector = jQuery(this).attr('data-filter');
        jQuery(container).isotope({ filter: selector });
        return false;
    });

    jQuery(container).imagesLoaded(function(){
        jQuery('.portfolio-loader2').attr('style', 'display:none');
        jQuery('.portfolio-single-images-center img').attr('style', 'display:inline-block');
    });


    // PROJECT NAVIGATION CLASS CHANGER
    
    jQuery('.portfolio-category-link li a').each(function(){
        jQuery(this).live('click', function(){
            jQuery('.active-project').removeClass('active-project');
            jQuery(this).addClass('active-project');
        })
    })

    // PIRO BOX
    jQuery().piroBox({
        my_speed: 300, //animation speed
        bg_alpha: 0.5, //background opacity
        slideShow : 'true', // true == slideshow on, false == slideshow off
        slideSpeed : 3, //slideshow
        close_all : '.piro_close' // add class .piro_overlay(with comma)if you want overlay click close piroBox
    });
    
    // PREVENT EMPTY SEARCH
    
    jQuery('.submit-search-form').click(function(e){
        e.preventDefault();
        var search_val = jQuery('.search-input', this).val();
        if(search_val != ""){
            jQuery(this).submit();
        }
    });


    // HOVER-IMAGES      
    jQuery('.header-copy-icon1').hover(function(){
        jQuery('a',this).stop().animate({top: '-16px'},300);
    },function(){
        jQuery('a',this).stop().animate({top: '0'},300);
    });
         
    jQuery('.header-copy-icon2').hover(function(){
        jQuery('a',this).stop().animate({top: '-16px'},300);
    },function(){
        jQuery('a',this).stop().animate({top: '0'},300);
    });
         
    jQuery('.header-copy-icon3').hover(function(){
        jQuery('a',this).stop().animate({top: '-16px'},300);
    },function(){
        jQuery('a',this).stop().animate({top: '0'},300);
    });
         
    jQuery('.header-copy-icon4').hover(function(){
        jQuery('a',this).stop().animate({top: '-16px'},300);
    },function(){
        jQuery('a',this).stop().animate({top: '0'},300);
    });
         
    jQuery('.header-copy-icon5').hover(function(){
        jQuery('a',this).stop().animate({top: '-16px'},300);
    },function(){
        jQuery('a',this).stop().animate({top: '0'},300);
    });
        
    jQuery('.project-home-images').hover(function(){
       jQuery('a',this).stop().animate({opacity:1},500);
    },function(){
       jQuery('a',this).stop().animate({opacity:0},300);
    });
        
    jQuery('.blog-one-images a div').hover(function(){
       jQuery(this).stop().animate({opacity:1},500);
       jQuery('h2',this).stop().animate({opacity:1},500);
       jQuery('span',this).stop().animate({opacity:1},500);
       jQuery('p',this).stop().animate({opacity:1},500);
    },function(){
       jQuery(this).stop().animate({opacity:0},300);
       jQuery('h2',this).stop().animate({opacity:0},300);
       jQuery('span',this).stop().animate({opacity:0},300);
       jQuery('p',this).stop().animate({opacity:0},300);
    });


});



jQuery(function($) {


    jQuery("<select />").appendTo(".header-nav nav");

    // Create default option "Go to..."
    jQuery("<option />", {
     "selected": "selected",
     "value"   : "",
     "text"    : '{goto}'.replace('{goto}', objectL10n.goto)
    }).appendTo(".header-nav nav select");

    // Populate dropdown with menu items
    jQuery(".header-nav nav a").each(function() {
    var el = $(this);
    jQuery("<option />", {
       "value"   : el.attr("href"),
       "text"    : el.text()
    }).appendTo(".header-nav nav select");
    });

       // To make dropdown actually work
       // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    jQuery(".header-nav nav select").change(function() {
    window.location = $(this).find("option:selected").val();
    });
    

    jQuery("<select />").appendTo(".portfolio-category-link nav");

    // Create default option "Go to..."
    jQuery("<option />", {
     "selected": "selected",
     "value"   : "",
     "text"    : '{goto}'.replace('{goto}', objectL10n.goto)
    }).appendTo(".portfolio-category-link nav select");

    // Populate dropdown with menu items
    jQuery(".portfolio-category-link nav a").each(function() {
    var el = $(this);
    jQuery("<option />", {
       "value"   : el.attr("href"),
       "data-filter"   : el.attr("data-filter"),
       "text"    : el.text()
    }).appendTo(".portfolio-category-link nav select");
    });

       // To make dropdown actually work
       // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    jQuery(".portfolio-category-link nav select").change(function() {
        var container = jQuery('.project-home-content');
        var selector = jQuery(this).find("option:selected").attr('data-filter');
        jQuery(container).isotope({ filter: selector });
        return false;
    });

});