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
 */
?>

  <?php include_once('common/header.php'); ?>
  <!-- print metatags -->  
<?php print render($page['content']['metatags']); ?>     
  <!-- print metatags -->
      <?php //print render($title_prefix); ?>
      <?php if ($title): ?>
        <div id="billboard">
          <div class="story-form container group">
            <?php 
              $displayTitle = $title;
              if(isset($node->field_kony_landing_page_headline) && !empty($node->field_kony_landing_page_headline)){
	              $displayTitle = $node->field_kony_landing_page_headline[$node->language][0]['value'];
              }else if(isset($node->field_kony_video_headline) && !empty($node->field_kony_video_headline)){
	              $displayTitle = $node->field_kony_video_headline[$node->language][0]['value'];
	          }else if(isset($node->field_kony_tutorial_headline) && !empty($node->field_kony_tutorial_headline)){
	              $displayTitle = $node->field_kony_tutorial_headline[$node->language][0]['value'];
	          }else if(isset($node->field_kony_app_demo_headline) && !empty($node->field_kony_app_demo_headline)){
	              $displayTitle = $node->field_kony_app_demo_headline[$node->language][0]['value'];
	          }else if(isset($node->field_kony_blog_headline) && !empty($node->field_kony_blog_headline)){
	              $displayTitle = $node->field_kony_blog_headline[$node->language][0]['value'];
	          }
			  else if(isset($node->field_kony_comparison_headline) && !empty($node->field_kony_comparison_headline)){
	              $displayTitle = $node->field_kony_comparison_headline[$node->language][0]['value'];
	          }
			  else if(isset($node->field_customer_cta_headline) && !empty($node->field_customer_cta_headline)){
	              $displayTitle = $node->field_customer_cta_headline[$node->language][0]['value'];
	          }
			   else if(isset($node->field_kony_features_headline) && !empty($node->field_kony_features_headline)){
	              $displayTitle = $node->field_kony_features_headline[$node->language][0]['value'];
	          }
			   else if(isset($node->field_kony_content_box_headline) && !empty($node->field_kony_content_box_headline)){
	              $displayTitle = $node->field_kony_content_box_headline[$node->language][0]['value'];
	          }
			  else if(isset($node->field_kony_tabs_headline) && !empty($node->field_kony_tabs_headline)){
	              $displayTitle = $node->field_kony_tabs_headline[$node->language][0]['value'];
	          }			  
			  else if(isset($node->field_kony_job_post_headline) && !empty($node->field_kony_job_post_headline)){
	              $displayTitle = $node->field_kony_job_post_headline[$node->language][0]['value'];
	          }
			   else if(isset($node->field_kony_data_sheet_headline) && !empty($node->field_kony_data_sheet_headline)){
	              $displayTitle = $node->field_kony_data_sheet_headline[$node->language][0]['value'];
	          }
			    else if(isset($node->field_kony_infograpic_headline) && !empty($node->field_kony_infograpic_headline)){
	              $displayTitle = $node->field_kony_infograpic_headline[$node->language][0]['value'];
	          }
			   else if(isset($node->field_kony_news_headline) && !empty($node->field_kony_news_headline)){
	              $displayTitle = $node->field_kony_news_headline[$node->language][0]['value'];
	          }
			   else if(isset($node->field_kony_press_rel_headline) && !empty($node->field_kony_press_rel_headline)){
	              $displayTitle = $node->field_kony_press_rel_headline[$node->language][0]['value'];
	          }
			   else if(isset($node->field_kony_webinar_headline) && !empty($node->field_kony_webinar_headline)){
	              $displayTitle = $node->field_kony_webinar_headline[$node->language][0]['value'];
	          }
			  else if(isset($node->field_kony_white_paper_headline) && !empty($node->field_kony_white_paper_headline)){
	              $displayTitle = $node->field_kony_white_paper_headline[$node->language][0]['value'];
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
        <?php print render($page['content']); ?>
      </article> 
     <?php print $feed_icons; ?>
    </div><!-- /#content -->

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
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

