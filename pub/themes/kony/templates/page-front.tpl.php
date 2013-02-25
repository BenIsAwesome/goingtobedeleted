<?php
/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can be one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a "Blog entry" it would result in "node-type-blog".
 *     Note that the machine name will often be in a short form of the human readable label.
 *   - page-views: Page content is generated from Views. Note: a Views block
 *     will not cause this class to appear.
 *   - page-panels: Page content is generated from Panels. Note: a Panels block
 *     will not cause this class to appear.
 *   The following only apply with the default 'sidebar_first' and 'sidebar_second' block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 * - $menu_item: (array) A page's menu item. This is only available if the
 *   current page is in the menu.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing the Primary menu links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $help: Dynamic help text, mostly for admin pages.
 * - $content: The main content of the current page.
 * - $feed_icons: A string of all feed icons for the current page.
 *
 * Footer/closing data:
 * - $footer_message: The footer message as defined in the admin settings.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * Regions:
 * - $content_top: Items to appear above the main content of the current page.
 * - $content_bottom: Items to appear below the main content of the current page.
 * - $navigation: Items for the navigation bar.
 * - $sidebar_first: Items for the first sidebar.
 * - $sidebar_second: Items for the second sidebar.
 * - $header: Items for the header region.
 * - $footer: Items for the footer region.
 * - $page_closure: Items to appear below the footer.
 *
 * The following variables are deprecated and will be removed in Drupal 7:
 * - $body_classes: This variable has been renamed $classes in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess()
 * @see zen_process()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php print $head_title; ?></title>

  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
<!--  
<script type="text/javascript">
var rwContext = 'http://go.kony.com/kn';
</script>
<link href="http://go.kony.com/rwpop/fancybox/rwlightwindow.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://go.kony.com/rwpop/rwlightwindow.js"></script>
-->
<script type="text/javascript" src="/sites/all/themes/kony/js/cufon.js" ></script>
<script type="text/javascript" src="/sites/all/themes/kony/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="/sites/all/themes/kony/fancybox/jquery.easing-1.3.pack.js"></script>
<link rel="stylesheet" href="/sites/all/themes/kony/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript" src="/sites/all/themes/kony/fancybox/video.js"></script>
<script type="text/javascript" src="/sites/all/themes/kony/flowplayer/flowplayer-3.2.6.min.js"></script>  
<script type="text/javascript" src="/sites/all/themes/kony/js/jquery.main.js" ></script>
<script type="text/javascript" src="/sites/all/themes/kony/js/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="/sites/all/themes/kony/js/jquery.cookie.js"></script>  

<link href="http://go.kony.com/rwpop/fancybox/rwlightwindow.css" rel="stylesheet" type="text/css" />
<script src="http://go.kony.com/rwpop/rwquery.js" type="text/javascript"></script>
<script src="http://go.kony.com/rwpop/rwlightwindow.js" type="text/javascript"></script>

  <!--[if IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/kony/css/ie7.css" />
<![endif]-->	
 <script type="text/javascript">
 

 
 
$(document).ready(function(){


$('a.modaltrigger').fancybox({
autoDimensions: true
		});


$('a.videopopup').live('click', function(e){
e.preventDefault();

var videofile = $(this).attr('href');
$('#videomodal').html('<div id="player" style="width:864px;height:486px;" href="'+ videofile +'"></div>')

flowplayer("player", "/sites/all/themes/kony/flowplayer/flowplayer.commercial-3.2.7.swf", {
			key: '#$f4153da28de3cad9d1c',
			clip: {
				autoPlay: true,
				scaling: 'orig',
				autoBuffering: true
			//	onStart: function(clip) {   
				//	var wrap = jQuery(this.getParent()); 
				//	wrap.css({width: clip.metaData.width, height: clip.metaData.height}); 
				//	var wrap2 = jQuery('#videomodal');
				//	wrap2.css({width: clip.metaData.width, height: clip.metaData.height}); 
				//	var wrap3 = jQuery('#fancybox-content');
				//	wrap3.css({width: clip.metaData.width, height: clip.metaData.height}); 
				//	var wrap4 = jQuery('#fancybox-wrap');
				//	wrap4.css({width: clip.metaData.width, height: clip.metaData.height}); 
				//	var wrap5 = jQuery('#fancybox-tmp');
				//	wrap5.css({width: clip.metaData.width, height: clip.metaData.height});
				//	$.fancybox.center();
			//	  } 
			}
		});

 jQuery('a.modaltrigger').trigger('click');






 });



/*uncomment this to open pardot assets in a new window
    $('.dl_register, .dl_reged').attr('target', '_blank');
*/
 
$("#regdemo").fancybox({
href: 'http://www2.kony-solutions.com/l/3472/2010-07-05/10WX',
type: 'iframe',
width: 400,
height: 450,
istype : 'noneselected',
autoDimensions:true,
padding: 0,
autoScale: false,
transitionIn: 'none',
transitionOut: 'none',
showCloseButton: true,
overlayOpacity: 0.1,
overlayColor: '#ccc',
speedIn:500,
speedOut:500
});
 $(".overlay, .simple_overlay").hide();


$('a.dl_reged, a.dl_register').click(function(e){


if( $.cookie('kony5a45d7c1ce8f80d8db') == null ) { 
e.preventDefault();
  $('#regdemo').trigger('click');
}
if( $.cookie('kony5a45d7c1ce8f80d8db') == '2bf8b7a49de933b80c02c93c9d3372e2' ) { 

}
					
})


 
       
})	

	$(function() {
		$( "#news_events" ).tabs();
	});

	</script>
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
</head>
<body class="<?php print $classes; ?>">

 <div class="w1">
		<div class="w2">
			<div class="w3">
				<div id="wrapper" style="background-color:#d8d8d8;">
					<div id="header">
						<div class="frame">
							<div class="header_bg">
							</div>
							<?php if ($logo): ?>
							<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
							<?php endif; ?>
							<div id="name-and-slogan">
							  <?php if ($site_name): ?>
							    <?php if ($title): ?>
							      <div id="site-name"><strong>
								<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
							      </strong></div>
							    <?php else: /* Use h1 when the content title is empty */ ?>
							      <h1 id="site-name">
								<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
							      </h1>
							    <?php endif; ?>
							  <?php endif; ?>

							  <?php if ($site_slogan): ?>
							    <strong class="slogan"><?php print $site_slogan; ?></strong>
							  <?php endif; ?>
							</div><!-- /#name-and-slogan -->
							<ul class="top-list" style="position:relative; left:-25px;">
								<li><a style="color:#0064B6;" href="/about-us">About Us</a></li>
								<li>
								<!--<div id="triggers"><a id="regdemo" href="#plzregfordemo">Sign-Up for a Demo</a></div>-->
								<a style="color:#0064B6;" id="contact_us" href="/contact-us">Contact Kony</a>
								</li>
								<li><strong style="color:#0064B6;">1-888-323-9630</strong></li>
							</ul>
				
				<div class="overlay" id="plzregfordemo" style="background:#fff;overflow:hidden;"> 
				<div class="registration_form"> 
				
				<?php print $demo_form1; ?>
			
				</div> 
				</div> 
				
			
				
				<div class="simple_overlay" id="demoschedule"> 
				<div class="registration_form"> 
				
				<?php print $demo_form2; ?>
			
				</div> 
				</div> 			
				

				
				
											
							
							<div id="top-search">
                            <div class="search-form">
							<?php print $search_box ?>
							</div>
                            </div>
							
							<?php if ($top_nav): ?>
									  <?php print $top_nav; ?>
							<?php endif; ?>
							
	
						</div>
					</div>
					<?php if ($fp_banner): ?>
							  <?php print $fp_banner; ?>
					<?php endif; ?>

					<!--<div class="fpblogcontainer">							
						<div class="blog"><a href="http://www.kony-solutions.com/">Blog</a></div>						
					</div>-->
					
					<div class="container">				
			
						<?php print $fp_columns; ?>
						
					</div>
					</div>
					<div id="footer">
                    <!--Footer Row One-->
						<div class="greyPartnerLogo-ftrBG">
							<div class="frame-ftr" style="margin0 auto;">
						    <a href="/customers" style="border:0px;"><img src="../../sites/all/themes/kony/images/partnersLogos-ftr.gif" width="1066" height="80" /></a>
                            </div>
						</div>
                        <div class="homeLearningResource-ftrBG">
                        	<div style="text-align:center; ">
                        		<span style="color:#5a5a5a;">
                                More Learning Resources:
                                </span> 
                                <span>
                                <a style="color:#0064B6;" href="/resources/webinars">Webinars</a > - 
                                <a style="color:#0064B6;" href="/resources/case-studies">Case Studies</a> -
                                <a style="color:#0064B6;" href="/newdemo">Demos</a> -  
                                <a style="color:#0064B6;" href="/resources/white-papers">Whitepapers</a> - 
                                <a style="color:#0064B6;" href="/Resource Center/tutorials">Tutorials</a>
                                </span>
                        	</div>
                        </div>
                        <!--Footer Row Two-->
						<div class="ftrNavigation-BG" >
							<div style="margin:0 auto; width: 975px;">
                            
								<div class="footer-column">
								<ul style="list-style:none;" >
                                	<li style="margin-bottom:5px;"><strong>About Kony</strong>
                                    	
                                        	<li><a href="/why-kony">Why Kony</a></li>
                                            <li><a href="/about-us/privacy-policy">Privacy Policy</a></li>
                                            <li><a href="/resources/case-studies">Success Stories</a></li>
                                            <li><a href="/about-us/careers">Careers</a></li>
                                        
                                    </li>
                                </ul>
                                </div>
                                <div class="footer-column">
                                <ul style="list-style:none;" >
                                    <li style="margin-bottom:5px;"><strong>News & Events</strong>
                                    	
                                        	<li><a href="/about-us/press-room">Press Room</a></li>
                                            <li><a href="/about-us/press-room/news">Kony in the News</a></li>
                                            <li><a href="/about-us/press-room/events">Events</a></li>
                                        
                                    </li>
                                </ul>
                                </div>
                                <div class="footer-column">
                                <ul style="list-style:none;" >
                                    <li style="margin-bottom:5px;"><strong>Contact Kony</strong>
                                    	<li></li>
                                        	<li><a href="/about-us/contact-us#location-map">Locations</a></li>
                                            <li><a href="/about-us/contact-us">Customer Support</a></li>
                                            <li><a href="/about-us/contact-us">Sales</a></li>
                                        
                                    </li>
                                </ul>
                                </div>
                                <div class="footer-column">
                                <ul style="list-style:none;" >
                                    <li style="margin-bottom:5px;"><strong>Support</strong>
                                    	
                                        	<li><a href="http://developer.kony.com">Developer Portal</a></li>
                                            <li><a href="/Resource Center/tutorials">Tutorials</a></li>
                                            <li><a href="http://kug.kony.com/">Kony User Group</a></li>
                                    </li>
                                </ul>
                                </div>
                                <div class="footer-column">
                                <ul style="list-style:none;" >
                                    <li style="margin-bottom:5px;"><strong>Social Networks</strong>
                                    	<li></li>
                                        	<li><a href="https://www.facebook.com/pages/Kony/130841488764" target="_blank">Facebook</a></li>
                                            <li><a href="https://twitter.com/Kony " target="_blank">Twitter</a></li>
                                            <li><a href="http://www.youtube.com/user/KonyOneSolutions?feature=mhee" target="_blank">YouTube</a></li>
                                            <li><a href="http://www.linkedin.com/company/324781?trk=tyah" target="_blank">LinkedIn</a></li>
                                            <li><a href="http://www.kony-solutions.com/" target="_blank">Blogs</a></li>
                                            <li><a href="http://www.slideshare.net/KonySolutionsInc" target="_blank">Slideshare</li>
                                    </li>
                                </ul>
                                </div>
      
							</div>
						</div>
					</div>
					

				<!--wrapper-->	
				</div>
			</div>
		</div>
	</div>
  <?php print $page_closure; ?>

  <?php print $closure; ?>
  <div id="triggers" style="display:none;"><a id="regdemo" href="#plzregfordemo"></a></div>  
 
<a href="#videomodal" id="modaltrigger" class="modaltrigger" style="display:none;"></a>
<div style="display:none;">
	
<div id="videomodal" style="overflow:hidden;width:864px;height:486px;"> 
</div>
</div> 
 
      <script type="text/javascript">

$('ul#nav').hover(function(){


$('.qtip-content .menu-minipanel-461').parent().parent().parent().addClass('short_qtip_wrapper');
$('.qtip-content .menu-minipanel-457').parent().parent().parent().addClass('short_qtip_wrapper');
})

  </script>


<!--Start Marketo Code-->


<script type="text/javascript">
document.write(unescape("%3Cscript src='" + document.location.protocol +
  "//munchkin.marketo.net/munchkin.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script>Munchkin.init('656-WNA-414');</script>

<!-- End Marketo Code-->    	
</body>
</html>
