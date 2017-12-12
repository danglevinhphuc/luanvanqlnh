 /*
 *
 * Theme functions
 * Initialize all scripts and adds custom js
 *
 * Version 1.0
 */
( function( $ ) {
    "use strict";

    $(document).ready( function() {
    ///////////////////////////////


        /////////////////////////////////
        // Masonry 
        /////////////////////////////////
        var $container = jQuery( '.sidebar' );
        $container.imagesLoaded( function(){
            $container.masonry( {   } );
        } );

        /////////////////////////////////
        // Slider Featured Articles
        /////////////////////////////////
        jQuery("#featured-slider").hide().css({'left' : "0px"}).fadeIn(1000); // fade effect for images, lovely.
        jQuery('#featured-slider').owlCarousel({
            loop: true,
            center: true,
            autoWidth: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
        })  
        // Slider Nav
        jQuery('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });

        /////////////////////////////////
        // Accordion 
        /////////////////////////////////       
        jQuery(".accordionButton").click(function(){jQuery(".accordionButton").removeClass("on");jQuery(".accordionContent").slideUp("normal");if(jQuery(this).next().is(":hidden")==true){jQuery(this).addClass("on");jQuery(this).next().slideDown("normal")}});jQuery(".accordionButton").mouseover(function(){jQuery(this).addClass("over")}).mouseout(function(){jQuery(this).removeClass("over")});jQuery(".accordionContent").hide(); 

        /////////////////////////////////
        // Go to TOP & Prev/Next Article.
        /////////////////////////////////
        // hide #back-top first
        jQuery("#back-top").hide();
            
        // fade in #back-top
        jQuery(function () {
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 100) {
                    jQuery('#back-top').fadeIn();
                } else {
                    jQuery('#back-top').fadeOut();
                }
            });

            // scroll body to 0px on click
            jQuery('#back-top a').click(function () {
                jQuery('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });

        /////////////////////////////////
        // Menu & link arrows
        /////////////////////////////////
        var jquerycssmenu={fadesettings:{overduration:0,outduration:100},buildmenu:function(b,a){jQuery(document).ready(function(e){var c=e("#"+b+">ul");var d=c.find("ul").parent();d.each(function(g){var h=e(this);var f=e(this).find("ul:eq(0)");this._dimensions={w:this.offsetWidth,h:this.offsetHeight,subulw:f.outerWidth(),subulh:f.outerHeight()};this.istopheader=h.parents("ul").length==1?true:false;f.css({top:this.istopheader?this._dimensions.h+"px":0});h.children("a:eq(0)").css(this.istopheader?{paddingRight:a.down[2]}:{}).append('<img src="'+(this.istopheader?a.down[1]:a.right[1])+'" class="'+(this.istopheader?a.down[0]:a.right[0])+'" style="border:0;" />');h.hover(function(j){var i=e(this).children("ul:eq(0)");this._offsets={left:e(this).offset().left,top:e(this).offset().top};var k=this.istopheader?0:this._dimensions.w;k=(this._offsets.left+k+this._dimensions.subulw>e(window).width())?(this.istopheader?-this._dimensions.subulw+this._dimensions.w:-this._dimensions.w):k;i.css({left:k+"px"}).fadeIn(jquerycssmenu.fadesettings.overduration)},function(i){e(this).children("ul:eq(0)").fadeOut(jquerycssmenu.fadesettings.outduration)})});c.find("ul").css({display:"none",visibility:"visible"})})}};
        var arrowimages={down:['downarrowclass', (food_wp_js_custom.template_url+'/images/menu/arrow-down.png')], right:['rightarrowclass', (food_wp_js_custom.template_url+'/images/menu/arrow-right.png')]}; jquerycssmenu.buildmenu("myjquerymenu", arrowimages); jquerycssmenu.buildmenu("myjquerymenu-cat", arrowimages);

    
    //////////////////////////////
    } ); // End doc ready  ///////
    
} )( jQuery );