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
global $theme_path,$base_path;
///themes/kony/images/arrowbullet.png
$imgpath = "/themes/kony/";

?>

  <?php include_once('common/header.php'); ?>  
  
      <?php //print render($title_prefix); ?>
     <?php 
      //echo "<pre>";print_r($node);
      $bulletCount = 1;
	   $mainHeading = $node->field_kony_gated_land_main_head['und'][0]['value'];
      //$backgroundImage = file_create_url($userLoad->field_kony_background_image['und'][0]['uri']);     
      $body = $node->body['und'][0]['value'];
      $backgroundImage = file_create_url($node->field_kony_gated_land_bg_img['und'][0]['uri']);
	  $videoImage = file_create_url($node->field_kony_gated_land_video_img['und'][0]['uri']);
      $videoLink = $node->field_kony_gated_land_video_link['und'][0]['url'];
      $moreInformationText = $node->field_kony_gated_land_more_info['und'][0]['title'];
      $moreInformationLink = $node->field_kony_gated_land_more_info['und'][0]['url'];
      $regLinkText = $node->field_kony_gated_land_reg_link['und'][0]['title'];
      $regLink = $node->field_kony_gated_land_reg_link['und'][0]['url'];
      //$loginIframeLink = $node->field_kony_login_iframe_link['und'][0]['uri'];
      
          
      $gatedLandingPageArray = array(
          'mainheading' => $mainHeading,
          'body' => $body,
          'backgroundimage' => $backgroundImage,
          'videoimage' => $videoImage,
	  'videolink' => $videoLink,
          'moreinfotext' => $moreInformationText,
          'moreinfolink' => $moreInformationLink,
          'reglinktext' => $regLinkText,
          'reglink' => $regLink,
         // 'loginiframelink' => $loginIframeLink,      
      );
     //echo "<pre>";print_r($gatedLandingPageArray);
      ?>

      <!-- Content Starts here-->
      <?php
        if($gatedLandingPageArray['backgroundimage'] != ''){
            $style = 'style="background-image:url('.$gatedLandingPageArray['backgroundimage'].')"';
            $bgimg = $gatedLandingPageArray['backgroundimage'];
        }
        else{
            $style = '';
            $bgimg='';
        }
      ?>
      <!-- content starts here -->
      
<div id="billboard">
    <div class="master-billboard-homepage group gated-landing-banner-height" >
        <div id="intro-slider" class="flexslider panel" >
            <ul class="slides">
                <li>
                    <div class="container group margin-left" id="header-text" >	
                        <h2><?php print $gatedLandingPageArray['mainheading']?></h2>
                        <?php if($gatedLandingPageArray['body'] != ''){ ?>
                           <?php print $gatedLandingPageArray['body']?>
                        <?php } ?>
                        <a href="<?php print $gatedLandingPageArray['videolink']?>" class="video-placeholder fancybox-video">
                            <img src="<?php print $gatedLandingPageArray['videoimage']?>" alt="" />
                        </a>
                    </div>
                <img class="bg-img" src="<?php print $bgimg; ?>" alt="">
                </li>
            </ul>
            <article class="container group gated-article-margin" id="pri-content"> 
                <div class="story-branch" id="gated-landing-page">
                    <section class="kony-feature-resources">
                        <div class="group">
                        <?php
                             foreach($node->field_kony_gated_land_bullet_pt['und'] as $entity_uri){
                                 $bulletPointCollection = entity_load('field_collection_item', $entity_uri);
                                 foreach($bulletPointCollection as $bulletPointCollectionObj){
                                     $bulletPointHeading = $bulletPointCollectionObj->field_kony_bullet_point_heading['und'][0]['value'];   
                                     $bulletPointDesc = $bulletPointCollectionObj->field_kony_bullet_pt_desc['und'][0]['value']; ?>
                                     <div class="resource three">
                                        <h4><img src="<?php print $imgpath ?>images/arrowbullet.png" alt="" /><?php print $bulletPointHeading; ?></h4>
                                        <p><?php print $bulletPointDesc ;?></p>
                                    </div>
                                    <?php
                                        if($bulletCount %3 == 0){ ?>
                                            <div class="clear"></div>
                                       <?php }
                                       $bulletCount = $bulletCount +1;
                                    ?>
                                <?php }
                             }
                        ?>                                                                                                                                                                    
                        </div>
                        <div class="gated-hr-line"></div>
                        <div class="gated-button-div gated-div-width">
                            <?php
                                if($gatedLandingPageArray['moreinfotext'] != ''){
                                    $morelinktext = $gatedLandingPageArray['moreinfotext'];
                                }
                                else{
                                    $morelinktext = 'Learn More';
                                }
                                if($gatedLandingPageArray['reglinktext'] != ''){
                                    $reglinktext = $gatedLandingPageArray['reglinktext'];
                                }
                                else{
                                    $reglinktext = 'SIGN UP NOW';
                                }                               
                            ?>
                            <p>
                                <a href="<?php print $gatedLandingPageArray['moreinfolink']; ?>"><?php print $morelinktext ?></a> or&nbsp;&nbsp;&nbsp;
                                <a href="<?php print $gatedLandingPageArray['reglink']?>" class="button"><?php print $reglinktext; ?><i class="icon-arrow-right"></i></a>
                            </p>                           
                        </div>
                    </section>
                </div>
            </article>
        </div>
    </div>	
</div>
      
    </div><!-- /#content -->
</div><!-- /#main -->
  <?php include_once('common/footer.php'); ?>


