<?php
/**
* @file
* Zen theme's implementation to display a single Drupal page.
*
* Available variables:
*
* General utility variables:
* - $base_path: The base URL path of the Drupal installation. At the very
* least, this will always default to /.
* - $directory: The directory the template is located in, e.g. modules/system
* or themes/bartik.
* - $is_front: TRUE if the current page is the front page.
* - $logged_in: TRUE if the user is registered and signed in.
* - $is_admin: TRUE if the user has permission to access administration pages.
*
* Site identity:
* - $front_page: The URL of the front page. Use this instead of $base_path,
* when linking to the front page. This includes the language domain or
* prefix.
* - $logo: The path to the logo image, as defined in theme configuration.
* - $site_name: The name of the site, empty when display has been disabled
* in theme settings.
* - $site_slogan: The slogan of the site, empty when display has been disabled
* in theme settings.
*
* Navigation:
* - $main_menu (array): An array containing the Main menu links for the
* site, if they have been configured.
* - $secondary_menu (array): An array containing the Secondary menu links for
* the site, if they have been configured.
* - $secondary_menu_heading: The title of the menu used by the secondary links.
* - $breadcrumb: The breadcrumb trail for the current page.
*
* Page content (in order of occurrence in the default page.tpl.php):
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title: The page title, for use in the actual HTML content.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
* - $messages: HTML for status and error messages. Should be displayed
* prominently.
* - $tabs (array): Tabs linking to any sub-pages beneath the current page
* (e.g., the view and edit tabs when displaying a node).
* - $action_links (array): Actions local to the page, such as 'Add menu' on the
* menu administration interface.
* - $feed_icons: A string of all feed icons for the current page.
* - $node: The node object, if there is an automatically-loaded node
* associated with the page, and the node ID is the second argument
* in the page's path (e.g. node/12345 and node/12345/revisions, but not
* comment/reply/12345).
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
*/
?>

<?php include_once('common/header.php'); ?>
<!-- Print Meta tags -->
<?php print render($page['content']['metatags']); ?>
<!-- Print Meta tags -->

<?php //print render($title_prefix); ?>
      <?php if ($title): ?>
<div id="billboard">
<div class="story-form container group">
<?php
              $displayTitle = $title;
              if(isset($node->field_kony_landing_page_headline) && !empty($node->field_kony_landing_page_headline)){
                      $displayTitle = $node->field_kony_landing_page_headline[$node->language][0]['value'];
              }
            ?>
<h2 class="title" id="page-title"><?php print $displayTitle; ?></h2>
</div>
</div>
<?php endif; ?>
<?php print render($title_suffix); ?>
<?php print render($tabs); ?>
<?php print render($page['help']); ?>
<?php if ($action_links): ?>
<ul class="action-links"><?php print render($action_links); ?></ul>
<?php endif; ?>
<article id="pri-content" class="container group">
<?php if(count($node->body)): ?>
<section class="kony-feature-generic-cta master">
	<?php if(count($node->field_kony_landing_page_headline) && !empty($node->body)) {?>
	<h3><?php print $node->field_kony_landing_page_headline['und'][0]['value'];?></h3>
	<?php } ?>
	
	<?php if(count($node->body)) {?>
		<p><?php print $node->body['und'][0]['value'];?></p>
	<?php } ?>
<div class="clearfix"></div>
</section>
<?php endif; ?>

<?php if (!empty($node->field_kony_landing_page_content)):
	foreach ($node->field_kony_landing_page_content as $entity_uri):
		$landingCollection = entity_load('field_collection_item', $entity_uri);
		foreach ($landingCollection as $landingCollectionObj):
			if(count($landingCollectionObj->field_kony_land_content_source)) {
				$landingContentId = node_load($landingCollectionObj->field_kony_land_content_source['und'][0]['target_id']);
				$landingContentView = node_view($landingContentId);
				print render($landingContentView);
			}
			
			if(count($landingCollectionObj->field_kony_land_view_source)) {
				$landingviewId = node_load($landingCollectionObj->field_kony_land_view_source['und'][0]['target_id']);
				$landingView = node_view($landingviewId);
				print render($landingView);
			}
		endforeach;
	endforeach;
endif;
?>

<section class="kony-feature-tabbed-apps master">
<!--
<h3>Tabbed Master for Apps</h3>
<p>Donec cursus mattis odio ac porta ellentesque magna mi, ultricies in posuere</p>
-->
<ul class="secondary-tabs tabs three-tabs group">
<li><span><a href="#" class="current"><i class="icon-th icon-large"></i> All</a></span></li>
<li><span><a href="#"><i class="icon-briefcase icon-large"></i> Enterprise</a></span></li>
<li><span><a href="#"><i class="icon-globe icon-large"></i> Consumer</a></span></li>
</ul>
<div class="panel group" style="display: block;">
<?php if ($page['appsalllist']): ?>
<div id="sidebar-first" class="column sidebar"><div class="section">
<?php print render($page['appsalllist']); ?>
</div></div> <!-- /.section, /#sidebar-first -->
<?php endif; ?>
</div>
<div class="panel group" style="display: none;">
<?php if ($page['enterpriseapps']): ?>
<div id="sidebar-first" class="column sidebar"><div class="section">
<?php print render($page['enterpriseapps']); ?>
</div></div> <!-- /.section, /#sidebar-first -->
<?php endif; ?>
</div>
<div class="panel group" style="display: none;">
<?php if ($page['industrysolutions']): ?>
<div id="sidebar-first" class="column sidebar"><div class="section">
<?php print render($page['industrysolutions']); ?>
</div></div> <!-- /.section, /#sidebar-first -->
<?php endif; ?>
</div>
<div class="clearfix"></div>
</section>
</article>
<?php print $feed_icons; ?>
</div><!-- /#content -->

<?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

<?php if ($sidebar_first || $sidebar_second): ?>
<aside class="sidebars">
<?php print $sidebar_first; ?>
<?php print $sidebar_second; ?>
</aside><!-- /.sidebars -->
<?php endif; ?>

</div><!-- /#main -->
<?php include_once('common/footer.php'); ?>
<?php //print render($page['bottom']); ?> 
