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

 global $base_path;
 
/* Include Header File for Menu Display */
include_once('common/header.php');
/* Include Header File for Menu Display */

/* Extract all Field Values from Corresponding Product */
$prodcontent = $node->field_kony_prod_det_produ_cont['und']['0']['value'];
$headLine=$node->field_kony_prod_det_product_name ['und']['0']['value'];
$desc = $node->field_kony_prod_det_prod_desc['und']['0']['value'];
$image = file_create_url($node->field_kony_prod_det_prod_image['und'][0]['uri']);
$bgImage = file_create_url($node->field_kony_prod_det_pro_bagd_img['und'][0]['uri']);
$downloadBtnTxt = $node->field_kony_prod_det_cta_link_tex['und']['0']['value'];
$downloadBtnRef = $node->field_kony_prod_det_cta_link_ref['und']['0']['target_id'];
$downloadBtnRefObj = node_load($downloadBtnRef);
if($downloadBtnRefObj->type == 'kony_downloadable_file') {
    $fileURL = file_create_url($downloadBtnRefObj->field_kony_dwnload_file['und'][0]['uri']);
} else {
    $fileURL = $downloadBtnRefObj->field_kony_external_link_url['und'][0]['url'];
}
$productId = $node->field_kony_prod_det_softw_prod['und'][0]['tid'];
$productload = taxonomy_term_load($node->field_kony_prod_det_softw_prod['und'][0]['tid']);
$productName = $productload->name;
/* Extract all Field Values from Corresponding Product */

/*Recent Tutorials Array */
$recentTutorialsView = "kony_developer_tutorials";
$recentTutorialsViewResult = views_get_view_result($recentTutorialsView, "page",$productName);
$count = 0;
foreach ($recentTutorialsViewResult as $tutorialListItems) {
    if($count < 3) {
        if (count($tutorialListItems->_field_data)) {
            $tutorialItemLoad = $tutorialListItems->_field_data['nid']['entity'];
        } else {
            $tutorialItemLoad = node_load($tutorialListItems->nid);
        }
        $tutorialsArray[] = array(
            'title'=>$tutorialItemLoad->title,
            'link'=>$base_path.drupal_lookup_path('alias',"node/".$tutorialItemLoad->nid),
        );
        $count = $count + 1;
    }
}
/*Recent Tutorials Array */

/* API Documentation Array Form */
$documentListView = "kony_documentation_list";
$documentListViewResult = views_get_view_result($documentListView);
$docsArray = "";

foreach ($documentListViewResult as $documentListItems) {
	$documentTitle = $documentDownloadLink = "";
	if (count($documentListItems->_field_data)) {
		$documentItemLoad = $documentListItems->_field_data['nid']['entity'];
	} else {
		$documentItemLoad = node_load($documentListItems->nid);
	}
	
	if(count($documentItemLoad->field_kony_soft_doc_type)) {
		if(!in_array($documentItemLoad->field_kony_soft_doc_type['und'][0]['tid'], $docsArray)) {
			if(count($documentItemLoad->field_kony_soft_doc_html_url)) {
				$documentDownloadLink = kony_custom_link($documentItemLoad->field_kony_soft_doc_html_url);
			} else if(count($documentItemLoad->field_kony_soft_doc_down_file['und'][0]['target_id'])){
				$collection = $documentItemLoad->field_kony_soft_doc_down_file['und'][0]['target_id'];
				$donwloadCollection = entity_load('node',array($collection));
				
				foreach($donwloadCollection as $donwloadCollectionObj) {
					if(count($donwloadCollectionObj->field_kony_dwnload_file)) {
						$documentDownloadLink = file_create_url($donwloadCollectionObj->field_kony_dwnload_file['und'][0]['uri']);
					}	
				}	
			} else if(count($documentItemLoad->field_kony_soft_doc_file_url)) {
				$documentDownloadLink = kony_custom_link($documentItemLoad->field_kony_soft_doc_file_url);
			}
			
			if($documentDownloadLink != "") {
				$documentTitle = $documentItemLoad->field_kony_soft_doc_name['und'][0]['value'];
				$documentsArray[] = array(
					'title'=>$documentTitle,
					'downloadLink'=>$documentDownloadLink
				);
				$docsArray[] = $documentItemLoad->field_kony_soft_doc_type['und'][0]['tid'];
			}
		}
	}
	
}

/* Array of Support Links */
foreach($node->field_kony_prod_det_support['und'] as $eachSupportEntity) {
    $target = "_blank";
    $linkUrl = "";
    $supportRefObj = node_load($eachSupportEntity['target_id']);
    $linkUrl = $supportRefObj->field_kony_external_link_url['und'][0]['url'];
    $position = strpos($linkUrl, 'kony.com');
    if(!$position) {
        $position = strpos($linkUrl, 'konycloud.com');
        if($position) {
            $target = '';
        }
    } else {
        $target = '';
    }
    $supportLinksArray[] = array(
        'title'=>$supportRefObj->field_kony_external_link_url['und'][0]['title'],
        'link'=>$linkUrl,
        'target'=>$target
    );
}
/* Array of Support Links */


/* All Reference Generic Contents */
$class = "left";
foreach($node->field_kony_prod_det_produ_cont['und'] as $refObject) {
    $headline = $description = $imageLink = "";
    $refContentLoad = node_load($refObject['target_id']);
    if($refContentLoad->type == "kony_content_box") {
        $headline = $refContentLoad->field_kony_content_box_headline['und'][0]['value'];
        $description = $refContentLoad->body['und'][0]['value'];
        $imageLink = file_create_url($refContentLoad->field_kony_content_box_cta_image['und'][0]['uri']);
        if($class == "left")
            $class = 'right';
        else
            $class = 'left';
            
        $moreInformtionArray[] = array(
            'headline'=> $headline,
            'description'=> $description,
            'className'=> $class,
            'image'=>$imageLink
        );
    } else {
        $nextStepsArray[] = array(
            'nodeload'=> $refContentLoad
        );
    }
    
}
/* All Reference Generic Contents */
?>

<div id="billboard" class="spacing bodybg-color" >
    <div class="master-billboard-homepage group" >
	<div id="intro-slider" class="flexslider panel header-height-product-details">
	    <ul class="slides">
		<li>
		    <div class="container group margin-banner ">	
			<div id="header-text" class="left group">
                            <?php if(count($node->field_kony_prod_det_product_name)){?>
			    <h2><?php print $headLine; ?></h2>
                            <?php }?>                            
                            
                            <?php if (count( $node->field_kony_prod_det_prod_desc)) {?>
			    <?php print $desc; ?>
                            <?php }?>
                            <a class="button left" href="<?php print $fileURL; ?>"><?php print $downloadBtnTxt; ?><i class="icon-arrow-right"></i></a>
		    	</div>
                        <?php if(count($node->field_kony_prod_det_prod_image)) {?>
			<img src="<?php print $image; ?>" alt="" class="right prd_img product-image-padding imgPos products-banner-img">
                        <?php }?>
                    </div>
                    <?php if(count($node->field_kony_prod_det_pro_bagd_img)) {?>
                    <img class="bg-img" src="<?php print $bgImage; ?>" alt="">
                    <?php }?>
		</li>
            </ul>
	</div>
    </div>
</div>
	  
<div class="product_detail_konycloud_content" align="center">
    <article id="pri-content" class="container group">
        <section class="kony-feature-next-steps padding-section">
            <div class="group">
                <?php if (count($tutorialsArray)) { ?>
                    <div class="col">	
                        <h4>Latest Tutorials</h4>
                        <?php foreach($tutorialsArray as $eachTutotial) { ?>
                            <p><a href="<?php print $eachTutotial['link'];?>"><?php print $eachTutotial['title'];?></a></p>
                        <?php } ?>
                    </div>
                <?php } ?>
                
                <?php if (count($documentsArray)) { ?>
                    <div class="col">	
                        <h4>Documentation</h4>
                        <?php foreach($documentsArray as $eachDocument) { ?>
                            <p><a href="<?php print $eachDocument['downloadLink'];?>" target="_blank"><?php print $eachDocument['title'];?></a></p>
                        <?php } ?>
                    </div>
                <?php } ?>
                
                <?php if (count($supportLinksArray)) { ?>
                    <div class="col">	
                        <h4>Support</h4>
                        <?php foreach($supportLinksArray as $eachSupport) { ?>
                            <p><a href="<?php print $eachSupport['link'];?>" target="<?php print $eachSupport['target'];?>"><?php print $eachSupport['title'];?></a></p>
                        <?php } ?>
                    </div>
                 <?php } ?>
                 
            </div>
            <div class="clearfix"></div>
        </section>      
    </article>
</div>

<article class="container group article-margin contPadd" id="pri-content">
    <?php foreach($moreInformtionArray as $eachInformation) { ?>
        <section class="kony-feature-value-prop prd_master">
            <?php if ($eachInformation['image']) { ?>
                <figure class="<?php print $eachInformation['className'];?>">
                    <a class="video-placeholder fancybox-video" target="" href="#">
                        <img class="" alt="" src="<?php print $eachInformation['image'];?>">
                    </a>
                </figure>
            <?php } ?>

            <h4 class="half-heading"><?php print $eachInformation['headline'];?></h4>
            <?php print $eachInformation['description'];?>
            <div class="clearfix"></div>
        </section>
    <?php }
    
    foreach ($nextStepsArray as $eachnextSteps) {
        $nextstepContentView = node_view($eachnextSteps['nodeload']);
        print render($nextstepContentView);
    } ?>
</article>

<?php 
/* Footer Section */
include_once('common/footer.php');
/* Footer Section */
?>

