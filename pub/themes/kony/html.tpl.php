<?php
/**
 * @file
 * Zen theme's implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation. $language->dir
 *   contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $html_attributes: String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: Array of html attribute values. It is flattened
 *   into a string within the variable $html_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $default_mobile_metatags: TRUE if default mobile metatags for responsive
 *   design should be displayed.
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $skip_link_anchor: The HTML ID of the element that the "skip link" should
 *   link to. Defaults to "main-menu".
 * - $skip_link_text: The text for the "skip link". Defaults to "Jump to
 *   Navigation".
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can contain one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a Blog entry, this would be "node-type-blog".
 *     Note that the machine name of the content type will often be in a short
 *     form of the human readable label.
 *   The following only apply with the default sidebar_first and sidebar_second
 *   block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see zen_preprocess_html()
 * @see template_process()
 */
?>

<!-- BEGIN stanton -->

<!doctype html>	
<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9 ]>	   <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js no-ie" lang="en"> <!--<![endif]-->
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="cleartype" content="on">
  <meta name="google-site-verification" content="i7frFX5TWwVWR3WFfv7OW0f4rX1JzPk-VQ0O5wXi2lg" />
  <link rel="shortcut icon" href="/kony_icon_0.ico" type="image/x-icon" />
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript">
  	<?php /* add the font file for chrome on windows to resolve rendering issue */ ?>
  	var platformMatch = /windows/ig;
  	var browserMatch = /chrome/ig;
  	var navigator = window.navigator;
  	if(platformMatch.test(window.navigator.platform) && browserMatch.test(window.navigator.userAgent)){
	  	$('head').append('<link rel="stylesheet" type="text/css" href="/<?php echo path_to_theme(); ?>/css/winchrome.css" />)');
	}
  </script>
</head>	
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top;  ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <script>
	(function($){
	  $(document).ready(function() {
	  	$('ul.sf-menu').superfish();
	  	
	    if($(window).width() < 768) {
	    	$('#intro-slider .slides li:first').remove();
            $('.flexslider').flexslider({
	            pauseOnHover: true,
	            animation: "slide"
	        });
    	} else {
	    	$('.flexslider').flexslider({
		    	pauseOnHover: true,
		    	animationLoop: true,
		    	controlsContainer: ".flex-container"
		    	//animation: 'slide',  this breaks the homepage slider???
		    });
		}    
	        
	    
	    $('.flexslider-tour').flexslider({
		    animationLoop: false,
		    slideshow: false
	    });
		
		$('section .tabs').tabs('> .panel');
        	$('#pri-tabs').tabs('#pri-content > .story-branch');
       		$('.resources-tabs').tabs('> .resource-panel');
		
		var personaSliders = $('div.panel');
		
	    $('.persona-tabs li a').click(function () {
	        personaSliders.hide().filter(this.hash).show();
	        return false;
	    });
		
		// Fixed tabs
		
		var mainWidth = $('#main-container').width();
		var tabPos = $('#pri-tabs').offset();
		
		$(window).resize(function() {
			// Resize .fixed-tabs-container in accordance with #main-container resizing
			var mainResized = $('#main-container').width();
			
			$('.fixed').css('width' , mainResized);
		});
		
	    $(window).scroll(function() {		    	
	    	if (tabPos != null && $(window).scrollTop() >= tabPos.top) {
		    	$('.fixed-tabs-container').addClass('fixed');
		    	//Set tab container width to width on #main-container to retain tab size
		    	$('.fixed').css('width' , mainWidth);
	    	}
	    	else {
		    	$('.fixed-tabs-container').removeClass('fixed');
		    	$('.fixed-tabs-container').css('width' , '100%');
	    	}
        });
        
        //Set fixed header bar on scroll
        var utilityHeight = $('#utility-bar').height();
        $(window).scroll(function() {
            var windowPos = $(document).scrollTop();
            var headerHeight = $('header').height();
            if (windowPos > (utilityHeight + 10)) {
                $('header').addClass('fixed').css('top' , (-11 - utilityHeight));
                $('#billboard').css('margin-top' , headerHeight);
            } else {
	            $('header').removeClass('fixed');
	            $('#billboard').css('margin-top' , '0');
            }
        });
        
	//Locations drop down list
	$('#location-list').hover(function() {
		$('ul.loc-list').show();
		$('ul.loc-list').slideDown('medium');
		},function() {
                $('ul.loc-list').slideUp('fast');
        });
        // webinar accordion
        $('.webinar-listing dt').click(function() {
	    	$(this).parent().next('div').slideToggle(150);
	    	$(this).find('i').toggleClass('icon-caret-down').toggleClass('icon-caret-up');
        });
		
		 // Blog Archives accordion
        $('.kony-feature-blog-archives dt').click(function() {
	    	$(this).parent().next('ul').slideToggle(150);
	    	$(this).find('i').toggleClass('icon-chevron-down').toggleClass('icon-chevron-right');
        });
        
        // Customer grid master
        var customerProfiles = $('div.customer-panel');
    	
    	$('.customer-tabs li a').click(function() {
    		if ($(this).parent().hasClass('selected')) {
    			$(this).parent().removeClass('selected');
	    		$('.customer-tabs').css('border-bottom' , 'none');
	    		customerProfiles.slideUp('1000');
    		} else {
    		$('.customer-tabs').css('border-bottom' , 'none');
    		$(this).parent().parent().css('border-bottom' , '1px solid #ccc');
	        customerProfiles.hide().filter(this.hash).show();
	        
	        $('.customer-tabs li').removeClass('selected');
	        $(this).parent().addClass('selected');
	        
	        }
	        
	        return false;
	    });
	    
	    // App grid master
	    //jquery hack for apps browse tabs to fix divs
	    /*
$('ul.app-tabs li div.app-panel').each(
	    	function(idx,val){
		    	$(this).appendTo($(this).parents('div.panel'));
		    	if(idx == 6){
			    	$(this).parents('div.panel').append('<span class="clear-row"></span>');
		    	}
		    	//alert(val.innerHTML);
	    	}
	    );
*/
	    /*
$('ul.app-tabs').each(function(index, value){
	    	alert($(value).children('li').length);
	    //alert($(value).children('li div.app-panel'));//.children('div.app-panel'));
	    	$(value).children('li div.app-panel').appendTo($(value).parents('div.panel'));
	    })
*/;
	    
        
	    var appProfiles = $('div.app-panel');
    	
    	$('.app-tabs li a').click(function() {
    		if ($(this).parent().hasClass('selected')) {
    			$(this).parent().removeClass('selected');
	    		appProfiles.slideUp('1000');
    		} else {
    			appProfiles.hide().filter(this.hash).show();
    			$('.app-tabs li').removeClass('selected');
    			$(this).parent().addClass('selected');
	        }
	        
	        return false;
	    });

	   
    	// Homepage tour toggle
	    $('.tour-button').click(function() {
		  $('.tour-slide').fadeToggle('slow');
	    });
	    
	    $('.restart').click(function(){
           $('.flexslider-tour').hide();
           $('#intro-slider').show();
        });

	    //Video/image swap
	    /*
$('.video-placeholder').click(function(event){
	    	event.preventDefault();
		    $(this).parent().addClass('hide').next().removeClass('hide');
	    });
*/
	    //About Us JS fix for hot linking from nav items
   		var hash = window.location.hash;
		if(hash.length != 0){
			$('.tabs li a').removeClass('current');
			$('#about_div').hide();
			$('#leadership_div').hide();
			$(hash+'_nav').addClass('current');
			$(hash+'_div').show();
			//$(document).scrollTop($('.kony-feature-tabbed-about').offset().top);
		}
		
	    // Lightbox functionality
	    $('.lightbox').fancybox({
		    openEffect: 'none',
		    closeEffect: 'none',
			aspectRatio : true,
		    autoCenter: true,
		    fitToView: true,
		    arrows: true,
		    type: 'image'
	    });
	    
	    $('.fancybox-video').fancybox({
			type: 'iframe',
			aspectRatio : true,
			iframe: {
				scrolling: 'no',
				preload: true,		
			}
			/* height: 360 */
		});
	    
	    var os = (function(){
			var ua = navigator.userAgent.toLowerCase();
			return {
				isWin2K: /windows nt 5.0/.test(ua),
				isXP: /windows nt 5.1/.test(ua),
				isVista: /windows nt 6.0/.test(ua),
				isWin7: /windows nt 6.1/.test(ua)
			};
		});//close os
		
		//add scroll to function for app folder clicking incase below the screen
		$('.app-click').click(function(event){
			var appDiv = $($(this).attr('href'));
			//get the corresponding div and scroll to it
			if($(window).scrollTop() < $(this).parents('article').offset().top - 105){
				$(window).scrollTop($(this).parents('article').offset().top - 105);	
			}
		});
		
		// Mobile select nav
		$("<select />").appendTo("header div nav");

		//if their on the home page show go to
		if(window.location.pathname == '/'){
			// Create default option "Go to..."
			$("<option />", {
			   "selected": "selected",
			   "value"   : "",
			   "text"    : "Go to..."
			}).appendTo("header nav select");
		}
		
		// Populate dropdown with menu items
		var menu = $('ul.menu');
		menu.children('li').each(function(){
			var el = $(this).children('a');
			//skips menus with 3rd level nav
			if(el.text().indexOf(" » »") != -1){
				return;
			}
			var option = $("<option />",{
				"value"   : el.attr("href"),
			    "text"    : el.text().replace(" »", '')
			});
			if(el.hasClass('active-trail')){
				option.attr('selected','selected');
			}
			option.appendTo("header nav select");
		});
		
		//Create and populate second level nav if needed
		if(window.location.pathname != '/'){
			var activeNavItem = $('.active-trail.sf-with-ul');
			if(activeNavItem.length != 0){
				var subSelect = $("<select />").appendTo("header div nav");
				if(window.location.pathname == activeNavItem.attr('href')){
					// Create default option "Go to..."
					$("<option />", {
					   "selected": "selected",
					   "value"   : "",
					   "text"    : "In this section..."
					}).appendTo(subSelect);
				}
				//incase we're on an item with a 3rd level nav
				activeNavItem = $(activeNavItem[0]);
				var subMenu = activeNavItem.siblings('ul').children('li');
				subMenu.each(function(){
					var el = $(this).children('a');
					var option = $("<option />",{
						"value"   : el.attr("href"),
					    "text"    : el.text().replace(" »",'').replace(" »", '')
					});
					if(el.hasClass('active-trail')){
						option.attr('selected','selected');
					}
					option.appendTo(subSelect);
					
					var thirdLevel = el.siblings('ul');
					if(thirdLevel.length != 0){
						//var optgrp = $("<optgroup />");
						thirdLevel.children('li').each(function(){
							var el = $(this).children('a');	
							var option = $("<option />",{
								"value"   : el.attr("href"),
							    "text"    : ' -- ' + el.text().replace(" »",'')
							});
							if(el.hasClass('active-trail')){
								option.attr('selected','selected');
							}
							//option.appendTo(optgrp);
							option.appendTo(subSelect);
						});
						//optgrp.appendTo(subSelect);
					}
				});
					
			}
		}
		
		$("header nav select").change(function() {
		  window.location = $(this).find("option:selected").val();
		});
		
		$('.app-vert-name').click(function(event){
			$('.app-vert-name').siblings('div').hide();
			$(this).next().show();
		});
		
		/*
		// Tabbed app nav for mobile
		$("<select />").appendTo(".kony-feature-tabbed-apps");
		
		// Create default option "Go to..."
		$("<option />", {
		   "selected": "selected",
		   "value"   : "",
		   "text"    : "Go to..."
		}).appendTo(".kony-feature-tabbed-apps select");
		
		// Populate dropdown with menu items
		$(".kony-feature-tabbed-apps .app-tabs li").each(function() {
		 var el = $(this).find("h5");
		 $("<option />", {
		     "value"   : el.attr("href"),
		     "text"    : el.text()
		 }).appendTo(".kony-feature-tabbed-apps select");
		});
		
		$(".kony-feature-tabbed-apps select").change(function() {
		// Insert filter code here for apps tabbed box
		});
		*/
		
	  });//close dom ready
	})(jQuery);
  </script> 
  
  <?php 
  	$host = $_SERVER['SERVER_NAME'];
  	if($host == 'www.kony.com'  || $host == 'kony.com'): 
  ?>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-16675865-1']);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	
  	<script type="text/javascript">
	document.write(unescape("%3Cscript src='" + document.location.protocol +
	"//munchkin.marketo.net/munchkin.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script>Munchkin.init('656-WNA-414');</script>	
  <?php endif; ?>
</body>
</html>
