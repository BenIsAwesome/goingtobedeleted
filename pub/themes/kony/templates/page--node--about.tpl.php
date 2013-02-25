<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 *
 */
?>
<?php include_once('common/header.php'); ?>
<!-- Print Meta tags -->
<?php print render($page['content']['metatags']); ?>
<!-- Print Meta tags -->
<div id="billboard">
	<div class="story-form container group">
		<h2 class="title" id="page-title"><?php print $node->title; ?></h2>
    </div>
</div>
      
<article id="pri-content" class="container group">
	<section class="kony-feature-tabbed-about master">
		<ul class="tabs secondary-tabs six-tabs group">
			<li><span><a href="#" class="current" id="about_nav">About Kony</a></span></li>
			<li><span><a href="#" class="" id="leadership_nav">Leadership</a></span></li>
			<li><span><a href="#" class="" id="locations_nav">Locations</a></span></li>
			<li><span><a href="#" id="pressroom_nav">Press Room</a></span></li>
			<li><span><a href="#" id="events_nav">Events</a></span></li>
			<li><span><a href="#" id="careers_nav">Careers</a></span></li>
		</ul>

		<div class="panel group" style="display: none;" id="about_div">
			<?php if(count($node->body)) {?>
				<?php print $node->body['und'][0]['value'];?>
			<?php } ?>		
		</div> 
		
		<div class="panel group" style="" id="leadership_div">
			<p>Kony's senior leadership team is comprised of global professionals distinguished for their vision and execution. The team is experienced, passionate and dedicated to making the decisions that matter to Kony.</p>
			<?php if ($page['leaderssection']): ?>
				<?php print render($page['leaderssection']); ?>
			<?php endif; ?>
		</div>
		<div class="panel group" style="display: none;" id="locations_div">  
			<?php if ($page['locationssection']): ?>
				<?php print render($page['locationssection']); ?>
			<?php endif; ?>
			<?php if ($page['contactmailsection']): ?>
				<?php print render($page['contactmailsection']); ?>
			<?php endif; ?> 
		</div>
		<div class="panel group" style="display: none;" id="pressroom_div">
			<div class="col seven left">
			<h4>Recent Press Releases</h4>
			  <?php if ($page['pressreleasesection']): ?>
					<?php print render($page['pressreleasesection']); ?>
				<?php endif; ?>
			</div>                 
			<div class="col five right">
			<h4>Recent News</h4>
				 <?php if ($page['recentnewssection']): ?>
					<?php print render($page['recentnewssection']); ?>
				<?php endif; ?>
			  </div>
		
	    </div>  
		
		<div class="panel group" style="display: none;" id="events_div">
			<div style="padding-right: 20px; width:41.66%" class="col six left">
				<h4>Upcoming Events</h4>
                <?php if ($page['eventssection']): ?>
					<?php print render($page['eventssection']); ?>
				<?php endif; ?>	
				</div>  
			        	        
            <div class="col five right" style="width:55%">
                <h4>Upcoming Webinars</h4>							
				<?php if ($page['webinarssection']): ?>
					<?php print render($page['webinarssection']); ?>
				<?php endif; ?>	
			</div>      
        </div>
		
		<div class="panel group" style="display: none;" id="careers_div">
                     
			        	
                        <div class="col seven left">
                        <h4>Careers At Kony</h4>
			        	<p>Kony is dedicated to creating a diverse work environment where people can leverage the collective expertise, share unique experiences, foster new ideas, and achieve their best. If you want to make businesses better one app at a time, we have offices around the globe and a seat with your name on it. </p>
			        	<p>Knowledge. Drive. Creativity. Passion.  These are the qualities we value in others and expect in ourselves. These are the qualities that help us unleash the power of technology and deliver the promise of mobility.
</p>

<strong>Knowledge.</strong>
<p>
You have a unique set of skills and your experiences, both personal and professional, have shaped a unique perspective. You have a lot to share. You have a lot to learn. Knowledge isn't about being book smart. It's about being business smart, technology smart and people smart. The application of, and the quest for knowledge fuels every Kony employee. 
</p>
<strong>Drive.</strong>
<p>
We have bold vision. It requires sometimes herculean efforts. It requires strict attention to detail. It also requires an extreme focus on execution. Every Kony employee is driven by a desire to succeed by helping our customers succeed.
</p>
<strong>Creativity.</strong>
<p>
Big transformations require big ideas. Kony is transforming the way businesses leverage mobile technology. We need your big ideas to help us do it.
</p>
<strong>Passion.</strong>
<p>
Your passion is what makes your successes even sweeter. It's what keeps you going amidst challenges and setbacks. It's also what inspires your teammates to work harder, smarter, beside you. Passion is critical to achieving our collective goals.</p>

</div>
<!-- Jobs Postings Section -->
<?php if ($page['jobpostingssection']): ?>
	<?php print render($page['jobpostingssection']); ?>
<?php endif; ?>
<!-- Jobs Postings Section -->

			        </div>
                                 
            <div class="clearfix"></div>
	</section>
 </article> 
    </div><!-- /#content -->
  </div><!-- /#main -->
  <?php include_once('common/footer.php'); ?>
