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
          <section class="kony-feature-content-box-about master">
           		<h1 id="logo"><a href="/" class="hide-text"> Forrester Reviews the KonyOne Platform</a></h1>
                <!-- Left Side --> 
                 <!-- Left Side --> 
                <div class="col seven left">
                    <p>
                      In this August 2012 report, Forrester Principal Analyst Jeffrey Hammond gets hands-on with the KonyOne Platform to build and deploy a native and web app for multiple mobile devices, and offers a detailed review of the Kony development experience at every step along the way.
                    </p>
                    <p>
                       <h2>In this report, Mr. Hammond evaluates:</h2></p>
                    <ul style="margin-left:20px">
                        <li>
                           Development experience in building native, hybrid, and web apps
                        </li>
                        <li>
                            Deployment capabilities and options
                        </li>
                        <li>
                           Performance in cross-platform native and web 
                        </li>
                        <li>
                            Enterprise scalability and robustness
                        </li>
                    </ul>
                    <br>
                    <div style="font:bold 20px/1 'KarbonRegular'; color:#0e5978;">
                        <strong>&ldquo;If you need to build native, hybrid, and web apps from a common code base, we recommend that you put KonyOne on your evaluation shortlist.&rdquo;</strong></div>
                    <br>    
                    <table border="0" cellpadding="0" height="172" width="349" style="margin-top:20px;">
                        <tbody>
                            <tr>
                                <td>
                                    <img alt="" src="http://kony.com/sites/default/files/Jeffrey-Hammond.png" style="width: 155px; height: 150px;" /></td>
                                <td>
                                    
                                        <img alt="" src="http://kony.com/sites/default/files/forrester.png" style="width: 162px; height: 54px; margin-left:5px;" />
                                    <p>
                                        <strong>Jeffrey Hammond</strong>
                                        <br>
                                        <em>Forrester Principal Analyst</em></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        <h2>Why Read This Report</h2></p>
                    <p>
                       In the latest installment in our &ldquo;hands-on mobile&rdquo; series, we rebuild and deploy the simple mobile application we built last fall with the KonyOne mobile middleware platform. The KonyOne platform allows developers to build and deploy apps in a variety of mobile configurations, including apps that run natively on Android, iOS, and Research In Motion (RIM) devices. In the process, we install the KonyOne platform and use Kony Studio to define mobile forms, wrap web services, and map RESTful payload data into form fields as well as deploy the app as a native app and a web app to multiple mobile devices. Read on to get a feel for the KonyOne development experience.</p>
                </div>
                <!-- End Left Side -->
                
                <!-- Right Side -->
                <div class="col five left" style="margin-top:30px;">
                     <h3>Register Now to View Report</h3>
                     <p>
                        <iframe frameborder="0" height="600" name="iframeContents" scrolling="no" src="http://info.konysolutions.com/Forrester-White-Paper-KonyOneOffersAFlexibleLow-CodePlatform.html" style="border:  0" type="text/html" width="275"></iframe></p>
                     <p>&nbsp;</p>
                </div>
                <!-- End Right Side -->
         <span class="clear-row"></span>
	<div class="clearfix"></div>
  	   </section>
    
    
    
      </article>
     <?php print $feed_icons; ?>
    </div><!-- /#content -->


  </div><!-- /#main -->
  <?php include_once('common/footer.php'); ?>
  
  <?php //print render($page['bottom']); ?>  
