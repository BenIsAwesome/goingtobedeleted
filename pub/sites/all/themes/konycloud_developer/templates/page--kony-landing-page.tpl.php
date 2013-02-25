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
$bgImage = $bgColor = $image = $bgColor = $videoURL = $styleBGColor = "";
$nid=$node->nid;
$name = $node->field_kony_landing_page_headline['und']['0']['value'];
$desc = $node->body['und']['0']['value'];
if(count($node->field_kony_landing_page_image)) {
	$image = file_create_url($node->field_kony_landing_page_image['und']['0']['uri']);
}
if(count($node->field_kony_landing_page_bg_image)) {
	$bgImage = file_create_url($node->field_kony_landing_page_bg_image['und']['0']['uri']);
}
if(count($node->field_kony_landing_page_video_ur)) {
	$videoURL = file_create_url($node->field_kony_landing_page_video_ur['und'][0]['url']);
}
if(count($node->field_kony_landing_page_bg_color)) {
	$bgColor = $node->field_kony_landing_page_bg_color['und']['0']['value'];
}
?>
<?php include_once('common/header.php'); ?>
<?php print render($page['content']['metatags']); ?>
<?php 
if($bgImage) { 
	list($width, $height, $type, $attr) = getimagesize($bgImage);
	$heightPrefer = $height."px";
} else if($image) {
	list($width, $height, $type, $attr) = getimagesize($image);
	$heightPrefer = $height."px";
} else {
	$heightPrefer = "78px";
}
if($bgColor) {
	$styleBGColor = "background-color:#".$bgColor." ! important;";
}

$noSlideShowReference = true;
 $isAvailable = false;
?>

<?php if ($title): ?>
		<?php $nodeArg=explode('/',$_GET['q']);
		$nid=$nodeArg[1];
		$slidesCount = 0;
		if (!empty($page['content']['system_main']['nodes'][$nid]['field_kony_landing_page_content'])):
			foreach ($page['content']['system_main']['nodes'][$nid]['field_kony_landing_page_content']['#items'] as $entity_uri):
				$landingCollection = entity_load('field_collection_item', $entity_uri);
				foreach ($landingCollection as $landingCollectionObj):
					if(count($landingCollectionObj->field_kony_land_content_source)) {
						$landingContentLoad = node_load($landingCollectionObj->field_kony_land_content_source['und'][0]['target_id']);
						if($landingContentLoad->type == "kony_box_slideshow") {?>
							
								<?php 
								if(count($landingContentLoad->field_kony_box_slideshow_img)) { ?>
								      <div id="billboard" style="margin-top: 0pt;">	
									<div class="master-billboard-flexslider container story-form group">
										<div class="col five left">
											<h2><?php print $node->field_kony_landing_page_headline['und'][0]['value']; ?></h2>
										</div>
									<div class="flexslider seven left">
										<ul class="slides">
											<?php foreach($landingContentLoad->field_kony_box_slideshow_img['und'] as $slideshowList) {
												$slidesCount = $slidesCount + 1;
												$slideShowPath = file_create_url($slideshowList['uri']); ?>
												<li style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item; " class="<?php if($slidesCount == 1) {print 'flex-active-slide';}?>">
													<img src="<?php print $slideShowPath;?>" alt="<?php print $landingContentLoad->title; ?>">
												</li>
											<?php }?>
										</ul>
										
										<?php if(count($slidesCount)) {?>
											<ol class="flex-control-nav flex-control-paging">
												<?php for($i=1; $i<count($slidesCount); $i++) {?>
													<li><a class="<?php if($i == 1) {print 'flex-active';}?>"><?php print $i; ?></a></li>
												<?php }?>
											</ol>
										<?php } ?>
									
										<?php if(count($slidesCount)) {?>
											<ul class="flex-direction-nav">
												<li><a class="flex-prev" href="#">Previous</a></li>
												<li><a class="flex-next" href="#">Next</a></li>
											</ul>
										<?php } ?>
									</div>
								<?php
									$noSlideShowReference = false;
								} else{
									$noSlideShowReference = true; } ?>
							</div>
						<?php
						}
					}
				endforeach;
			endforeach;
		endif; ?>
		<?php if($noSlideShowReference && ($bgImage || $bgColor)){?>
		<div id="billboard" class="spacing product-front-billboard-bgcolor" style="background-image:none !important;<?php print $styleBGColor; ?>">
		<div class="master-billboard-homepage group" >
			<div id="intro-slider" class="flexslider" style="min-height:<?php print $heightPrefer;?>;">
				<ul class="slides">
					<li>
						<div class="container group margin-banner landing-banner-styles">	
							<div id="" class="left group">
								<h4><?php print $name; ?></h4>
								<?php print $desc; ?>
							</div>
							<?php if($image) { ?>
								<a href="<?php print $videoURL; ?>" class="lightbox imgPos">
									<img src="<?php print $image; ?>" alt="" class="right prd_img product-image-padding imgPos">
								</a>
							<?php } ?>
						</div>
						<?php if($bgImage) { ?>
							<img class="bg-img" src="<?php print $bgImage; ?>" alt="">
						<?php } ?>
					</li>
				</ul>
			</div>
		</div>
	
		<?php $isAvailable = true;
		}else if($noSlideShowReference && !$isAvailable){ ?>
		        <div id="billboard" style="margin-top: 0pt;">
			<div class="container story-form group">
				<h2><?php print $node->field_kony_landing_page_headline['und'][0]['value']; ?></h2>
			</div>
		<?php } ?>
	</div>
	<!--end .container div-->
<?php endif; ?>


<?php print render($title_suffix); ?>
<?php print render($tabs); ?>
<?php print render($page['help']); ?>
<?php if ($action_links): ?>
	<ul class="action-links"><?php print render($action_links); ?></ul>
<?php endif; ?>

<article id="pri-content" class="container group">
	
	<?php 
		
	$nextStepsArray = array();
	$tabbedContentsArray = array();
	
	if (!empty($page['content']['system_main']['nodes'][$nid]['field_kony_landing_page_content'])):
		foreach ($page['content']['system_main']['nodes'][$nid]['field_kony_landing_page_content']['#items']  as $entity_uri):
			$landingCollection = entity_load('field_collection_item', $entity_uri);
			foreach ($landingCollection as $landingCollectionObj):
				if(count($landingCollectionObj->field_kony_land_content_source)) {
					$landingContentLoad = node_load($landingCollectionObj->field_kony_land_content_source['und'][0]['target_id']);
					if($landingContentLoad->type == "kony_tabbed_content" && $nid == 8) {
						$tabbedContentsArray[] = $landingContentLoad;
					} else {
						if($landingContentLoad->type != "kony_next_steps_cta") {	
							if($landingContentLoad->type != "kony_box_slideshow") {	
								$landingContentView = node_view($landingContentLoad);
								print render($landingContentView);
							}		
						} else {
							$nextStepsArray[] = $landingContentLoad;
						}
					} 
				}

				if(count($landingCollectionObj->field_kony_land_view_source)) {
					$landingviewLoad = node_load($landingCollectionObj->field_kony_land_view_source['und'][0]['target_id']);
					if($landingviewLoad->type == "kony_tabbed_content" && $nid == 8) {
						$tabbedContentsArray[] = $landingviewLoad;
					} else {
						if($landingviewLoad->type != "kony_next_steps_cta") { 
							if($landingviewLoad->type != "kony_box_slideshow") { 
								$landingView = node_view($landingviewLoad);
								print render($landingView);
							}
						} else {
							$nextStepsArray[] = $landingviewLoad;
						}
					}	
				}
			endforeach;
		endforeach;
	endif; ?>	
		
	<?php if ($page['appsalllist']): ?>
		<?php print render($page['appsalllist']); ?>
	<?php endif; ?>
		
	<?php if ($page['customerproven']): ?>
		<?php print render($page['customerproven']); ?>
	<?php endif; ?>
	
	<?php if ($page['partnersecosystem']): ?>
		<?php print render($page['partnersecosystem']); ?>
	<?php endif; ?>
	
	<?php foreach($tabbedContentsArray as $eachTabbedContent) { 
		  $eachTabbedView = node_view($eachTabbedContent);
		  print render($eachTabbedView);
	 } ?>
	 
	<?php foreach($nextStepsArray as $eachNextStep) { 
		$eachNextStepView = node_view($eachNextStep);
		print render($eachNextStepView);
	} ?>
					
</article> 
     
<?php print $feed_icons; ?>
</div><!-- /#content -->
</div><!-- /#main -->

<?php include_once('common/footer.php'); ?>