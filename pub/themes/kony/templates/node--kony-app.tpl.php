<?php 
/*
 * @file
 * Zen theme's implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   - view-mode-[mode]: The view mode, e.g. 'full', 'teaser'...
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *

 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $pubdate: Formatted date and time for when the node was published wrapped
 *   in a HTML5 time element.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
  * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content. Currently broken; see http://drupal.org/node/823380
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess_node()
 * @see template_process()
 */
 global $theme_path, $base_path;
 //this is used with count(tabs)-1 to get the correct class name for the tabs
 $tabsClassNames = array('one-tab','two-tabs','three-tabs','four-tabs','five-tabs','six-tabs','seven-tabs','eight-tabs','nine-tabs');
 $current_date = strtotime('now');
 
 //dsm($node);
 //count the number of tabs we're displaying
 $countDivs = 0;
 if(count($node->field_kony_app_benefits_body)){
	 $countDivs++;
 }
 if(count($node->field_kony_features_feature_list)){
	 $countDivs++;
 }
 if(count($node->field_kony_resource)){
	 $countDivs++;
 }
 if(count($node->field_kony_app_options_list)){
	 $countDivs++;
 }
 if(count($node->field_kony_app_demos)){
	 $countDivs++;
 }
 
?>
<!-- Use as many story masters as necessary. -->
<section class="kony-feature-content-box-slider master">
  <div class="col group left">
	 <?php if(!empty($node->field_kony_app_headline)): ?>
	 <h3><?php echo $node->field_kony_app_headline['und'][0]['value']; ?></h3>
	 <?php endif; ?>
	 <?php echo $node->field_kony_app_intro_text['und'][0]['value'];?>
  </div>
  <div class="col group left">
     <div class="flex-container">
		 <div class="flexslider twelve left">
			<ul class="slides">
			<?php //print render($content['field_kony_app_screenshots']);
			if (!empty($content['field_kony_app_screenshots'])) {
			  $screenshotsCount = 0;
			  foreach ($content['field_kony_app_screenshots']['#items'] as $entity_uri) {
				$screenshotsCount = $screenshotsCount + 1;
			  }
				  //Start Grab each entity from the field collection items.
				  $scIndex = 0;
				  foreach ($content['field_kony_app_screenshots']['#items'] as $entity_uri) {
					$scIndex = $scIndex + 1;
					$screenshot_fcollection = entity_load('field_collection_item', $entity_uri);
					//Now you have a variable with the entity object loaded in it, and you can do stuff.
					foreach ($screenshot_fcollection as $screenshot_fcollection_object ) {
					  $imgPath = file_create_url($screenshot_fcollection_object->field_kony_app_screenshot['und'][0]['uri']);
	                  $fullImg = file_create_url(empty($screenshot_fcollection_object->field_kony_app_large_img['und'][0]['uri']) ?
	                                             $screenshot_fcollection_object->field_kony_app_screenshot['und'][0]['uri']       :
	                                             $screenshot_fcollection_object->field_kony_app_large_img['und'][0]['uri'] 
	                  );
					  print '<li style="" class="">'.PHP_EOL.
	                  		'<figure>'.PHP_EOL.
	                  		'<a href="'.$fullImg.'" class="lightbox" rel="group1" title="'.$screenshot_fcollection_object->field_kony_app_caption['und'][0]['value'] . '">'.PHP_EOL.
	                        '<img src="'.$imgPath.'" >'.PHP_EOL.
	                        '</a>'.PHP_EOL.
	                        '<figcaption>'.$screenshot_fcollection_object->field_kony_app_caption['und'][0]['value'].'</figcaption>'.PHP_EOL.
	                        '</figure>'.PHP_EOL.
	                        '</li>'.PHP_EOL;
					}//close foreach screenshot collection
				  }//close  item
				}//close if
				?>
			  </ul>
		  </div><!-- //.flex-slider -->
     </div><!-- //.flex-container -->
	</div><!-- //.col -->
	<div class="clear"></div>
</section>

<?php
$tabSectionDisplay = 1;
if((!count($node->field_kony_app_desc_body)) && (!count($node->field_kony_features_feature_list))  && (!count($node->field_kony_app_benefits_body))	  && (!count($node->field_kony_app_demos))  && (!count($node->field_kony_resource))) {
	$tabSectionDisplay = 0;
}
if($tabSectionDisplay) { ?>
<section class="kony-feature-tabbed master">
	<ul class="tabs secondary-tabs <?php echo $tabsClassNames[$countDivs-1]; ?> group">
		<?php if((count($node->field_kony_app_benefits_body))) { ?>	
			<li><span><a href="#beta">Benefits</a></span></li>
		<?php } ?>		

		<?php if((count($node->field_kony_app_desc_body)) || (count($node->field_kony_features_feature_list))) { ?>
			<li><span><a href="#alpha">Features</a></span></li>
		<?php } ?>
		
  	    <?php if((count($node->field_kony_app_options_list))) { ?>
             <li><span><a href="#alphaOpt">Options</a></span></li>
        <?php } ?>
         <?php if((count($node->field_kony_resource))) { ?>
              <li><span><a href="#gamma">Resources</a></span></li>
         <?php } ?>
	
		<?php if((count($node->field_kony_app_demos))) { ?>	
			<li><span><a href="#delta">Demos</a></span></li>
		<?php } ?>
		
	</ul>
	
	<?php if(count($node->field_kony_app_benefits_body)) {?>
		<div id="beta" class="panel group">
			<table>
			<tbody>
			<tr>
			<td><?php echo $node->field_kony_app_benefits_body['und'][0]['value'];?></td>
			</tr>
			</tbody>
			</table>
		</div>
	<?php } ?>

	<?php if((count($node->field_kony_app_desc_body)) || (count($node->field_kony_features_feature_list))) {?>
		<div id="alpha" class="panel group">
			<?php echo $node->field_kony_app_desc_body['und'][0]['value'];?>			
			<div class="col left" style="width:100%">
				<div id="featureslist">
					<?php	$i=0;
						foreach ($content['field_kony_features_feature_list']['#items'] as $entity_uri):
							$featuresCollection = entity_load('field_collection_item', $entity_uri);
							foreach ($featuresCollection as $featuresCollectionObject ): ?>						
									<?php $featuresCollectionHeader[$i]= $featuresCollectionObject->field_kony_features_headline['und'][0]['value']; ?>											
										<?php $featuresCollectionBody[$i]=$featuresCollectionObject->field_kony_feature_body['und'][0]['value']; 										
											if(isset($featuresCollectionObject->field_kony_feature_opt_lnk) && !empty($featuresCollectionObject->field_kony_feature_opt_lnk)){
												$featuresCollectionOptLink[$i] = $featuresCollectionObject->field_kony_feature_opt_lnk['und'][0]['target_id'];											
												$learnMoreId = $featuresCollectionObject->field_kony_feature_opt_lnk['und'][0]['target_id'];
												$learnMoreLoad = node_load($learnMoreId);
												if($learnMoreLoad->type == "kony_external_link") {
													$learnMorePath = $learnMoreLoad->field_kony_external_link_url['und'][0]['url'];
												} else {
													$learnMorePath = '/'.drupal_lookup_path('alias', 'node/'.$learnMoreId);
												}
												$featuresLearnMorePath[$i]  = $learnMorePath ;
												$featuresCollectionOptLink[$i] = $featuresCollectionObject->field_kony_feature_opt_lnk_txt['und'][0]['value'];									   
											}
											$featuresCollectionImage[$i] = $featuresCollectionObject->field_kony_feature_image['und'][0]['uri'];
											$featureImagePath = file_create_url($featuresCollectionObject->field_kony_feature_image['und'][0]['uri']);
											$featuresCollectionImagePath[$i] = $featureImagePath;
											$featuresCollectionImageTitle[$i] = $featuresCollectionObject->field_kony_feature_image['und'][0]['alt']
											?>
							<?php endforeach;
							$i++;
						endforeach;
						?>
										<table>
											<tbody>
											<?php
											$numberOfFeatures=count($featuresCollectionHeader);
											for($i=0;$i<$numberOfFeatures;$i++){?>
											<tr>											
												<td class="feature">
												<?php if($featuresCollectionImage[$i]!='') { ?>
												  <a rel="group<?php print $node->nid?>" href="<?php print $featuresCollectionImagePath[$i];?>" class="lightbox feature_img" title="<?php print $featuresCollectionImageTitle[$i] ?> ">
												    <img alt="<?php print $featuresCollectionHeader[$i];?>" src="<?php print $featuresCollectionImagePath[$i];?>">  </a>                                                    
												   <?php } ?>  
												<div class="feature_desc">
												 <h4 id="feature1"><?php print $featuresCollectionHeader[$i];?></h4>
												 
												 <?php print $featuresCollectionBody[$i];
												 if($featuresCollectionOptLink[$i]!='') { ?>
												    <a href="<?php print $featuresLearnMorePath[$i]; ?>">
														<?php print $featuresCollectionOptLink[$i]; ?>
														<i class="icon-arrow-right"></i>
													</a>                                                       
												   <?php } ?>
												 
												</div>
												</td>
											</tr>
											<?php } ?>
											</tbody>	
										</table>
				</div>

			</div>		
					
		</div>

	<?php } ?>

	<!-- Options Panel -->
	<?php if((count($node->field_kony_app_options_list))) {?>
	    <?php 
			$i =0;
			foreach ($content['field_kony_app_options_list']['#items'] as $entity_uri):
			   		$optionsCollection = entity_load('field_collection_item', $entity_uri);
					foreach ($optionsCollection as $optionsCollectionObject ): 
						$optionsBody = $optionsCollectionObject->field_kony_app_options_body['und'][0]['value'];
						 foreach($optionsCollectionObject->field_kony_features_feature_list['und'] as $featureObject):
							$optionsFeaturesObject[] = $featureObject;
						endforeach;	
					endforeach;					
			endforeach;
			$i=0;
			foreach ($optionsFeaturesObject as $entity_uri ): 	
			$optFeaturesCollection = entity_load('field_collection_item', $entity_uri);
			foreach ($optFeaturesCollection as $optFeaturesCollectionObject ): 
						$optFeaturesCollectionHeader[$i]= $optFeaturesCollectionObject->field_kony_features_headline['und'][0]['value']; 			 $optFeaturesCollectionBody[$i]=$optFeaturesCollectionObject->field_kony_feature_body['und'][0]['value']; 				 if(isset($optFeaturesCollectionObject->field_kony_feature_opt_lnk) && !empty($optFeaturesCollectionObject->field_kony_feature_opt_lnk)){
							$optFeaturesCollectionOptLink[$i] = $optFeaturesCollectionObject->field_kony_feature_opt_lnk['und'][0]['target_id'];								
							$optLearnMoreId = $optFeaturesCollectionObject->field_kony_feature_opt_lnk['und'][0]['target_id'];
							$optLearnMoreLoad = node_load($optLearnMoreId);
						    if($optLearnMoreId->type == "kony_external_link") {
								$optLearnMorePath = $optLearnMoreId->field_kony_external_link_url['und'][0]['url'];
							} else {
								$optLearnMorePath = '/'.drupal_lookup_path('alias', 'node/'.$optLearnMoreId);
							}
							   $optFeaturesLearnMorePath[$i]  = $learnMorePath ;
							   $optFeaturesCollectionOptLink[$i] = $optFeaturesCollectionObject->field_kony_feature_opt_lnk_txt['und'][0]['value'];								   
						}
						   $optFeaturesCollectionImage[$i] = $optFeaturesCollectionObject->field_kony_feature_image['und'][0]['uri'];							$optFeatureImagePath = file_create_url($optFeaturesCollectionObject->field_kony_feature_image['und'][0]['uri']);
						   $optFeatureImageTitle = $optFeaturesCollectionObject->field_kony_feature_image['und'][0]['alt'];
						$optFeaturesCollectionImagePath[$i] = $optFeatureImagePath;
						$optFeaturesCollectionImageTitle[$i] = $optFeatureImageTitle;
					?>
		<?php endforeach;
			$i++;		
	endforeach;	
 ?>
		<div id="alphaOpt" class="panel group">
			<?php echo $optionsBody;?>			
			<div class="col left" style="width:100%">
				<div id="featureslist">
					 <table>
						<tbody>
											<?php
											$numberOfFeatures=count($optFeaturesCollectionHeader);
											for($i=0;$i<$numberOfFeatures;$i++){?>
											<tr>											
												<td class="feature">
												 <?php if($optFeaturesCollectionImage[$i]!='') { ?>
												 <a rel="group<?php print $node->nid?>" href=<?php print $optFeaturesCollectionImagePath[$i];?> class="lightbox feature_img" title="<?php print $optFeaturesCollectionImageTitle[$i] ?> ">										    <img alt="<?php print $optFeaturesCollectionHeader[$i];?>" src="<?php print $optFeaturesCollectionImagePath[$i];?>">  </a>                                                    
												   <?php } ?>  
												 <div class="feature_desc">
													 <h4 id="feature1"><?php print $optFeaturesCollectionHeader[$i];?></h4>
													 
													 <?php print $optFeaturesCollectionBody[$i];
													 if($optFeaturesCollectionOptLink[$i]!='') { ?>
													    <a href="<?php print $optLearnMorePath[$i]; ?>">
															<?php print $optFeaturesCollectionOptLink[$i]; ?>
															<i class="icon-arrow-right"></i>
														</a>                                                       
													   <?php } ?>
												 </div>
												
												</td>
											</tr>
											<?php } ?>
											</tbody>	
										</table>
				</div>
			</div>		
		</div>
   <?php } ?>
	<!-- Options Panel ends-->

	
	<?php if((count($node->field_kony_resource))) {
		$dataSheets = array();
		$whitePapers = array();
		$webinars = array();
		$caseStudies = array();
		$blogPost = array();
		$countResourceTabs = 0;
		foreach($content['field_kony_resource']['#items'] as $item){
			$nodeRes = node_load($item['target_id']);
			switch($nodeRes->type){
				case 'kony_data_sheet':
					$dataSheets[] = $nodeRes;
					break;
				case 'kony_case_study':
					$caseStudies[] = $nodeRes;
					break;
				case 'kony_blog_post':
					$blogPost[] = $nodeRes;
					break;
				case 'kony_webinar_':
				case 'kony_res_webinar':
					$webinars[] = $nodeRes;
					break;
				case 'kony_white_paper':
					$whitePapers[] = $nodeRes;
					break;
				default:
					break;	
			}
		}
		
		if(!empty($dataSheets)){
			$countResourceTabs++;
		}
		if(!empty($caseStudies)){
			$countResourceTabs++;
		}
		if(!empty($blogPost)){
			$countResourceTabs++;
		}
		if(!empty($webinars)){
			$countResourceTabs++;
		}
		if(!empty($whitePapers)){
			$countResourceTabs++;
		}
	?>
		<div id="delta" class="panel group">
			<div class="resourcetabs">
         
				<ul style="padding:0px;" class="resources-tabs <?php echo $tabsClassNames[$countResourceTabs-1];?>">
					<?php if(!empty($dataSheets)): ?>
					<li><span><a href="#data-sheets">Data Sheets</a></span></li>
					<?php endif; ?>
					<?php if(!empty($caseStudies)): ?>
					<li><span><a href="#case-studies">Case Studies</a></span></li>
					<?php endif; ?>
					<?php if(!empty($blogPost)): ?>
					<li><span><a href="#blog-post">Blog Post</a></span></li>
					<?php endif; ?>
					<?php if(!empty($webinars)): ?>
					<li><span><a href="#webinars">Webinars</a></span></li>
					<?php endif; ?>
					<?php if(!empty($whitePapers)): ?>
					<li><span><a href="#white-papers">White Papers</a></span></li>
					<?php endif; ?>
				</ul>
        
				<?php 
					$i = 0;//used for count of resource materials
					?>
				<?php if(!empty($dataSheets)): ?>
				<div class="resource-panel kony-feature-resources group" id="data-sheets">
					<?php foreach($dataSheets as $ds):
                                                if(count($ds->field_kony_data_sheet_cdn_url)) {
                                                        $datasheetFile = $ds->field_kony_data_sheet_cdn_url['und'][0]['url'];
                                                        $datasheetText = $ds->field_kony_data_sheet_cdn_url['und'][0]['title'];
                                                } else {
                                                        $datasheetFile = file_create_url($ds->field_kony_data_sheet_file['und'][0]['uri']);
                                                        $datasheetText = "Download";
                                                }
                                            ?>
						<div class="resource three">
							<h4><?php echo !empty($ds->headline) ? $ds->headline : str_replace('RES','',str_replace('_',' ',$ds->title)); ?></h4>
							<!--<a href="/<?php //echo drupal_lookup_path('alias', 'node/'.$ds->id); ?>" class="button">Download<i class="icon-download-alt"></i></a>-->
                                                        <a class="button" href="<?php print $datasheetFile; ?>"><?php print $datasheetText; ?> <i class="icon-download-alt"></i></a>
						</div>
						<?php $i++; ?>	
					<?php endforeach; ?>
				</div>
				<?php 
					$i = 0;
					endif; 
				?>
				<?php if(!empty($caseStudies)): ?>
				<div class="resource-panel kony-feature-resources group" id="case-studies">
					<?php foreach($caseStudies as $item):
                                                    if(count($item->field_kony_case_study_cdn_url)) {
                                                            $casestudyFile = $item->field_kony_case_study_cdn_url['und'][0]['url'];
                                                            $casestudyText = $item->field_kony_case_study_cdn_url['und'][0]['title'];
                                                    } else {
                                                            $casestudyFile = file_create_url($item->field_kony_case_study_file['und'][0]['uri']);
                                                            $casestudyText = "Download";
                                                    }?>
						<div class="resource three">
							<h4><?php echo !empty($item->headline) ? $item->headline : str_replace('RES','',str_replace('_',' ',$item->title)); ?></h4>
							<!--<a href="/<?php //echo drupal_lookup_path('alias', 'node/'.$item->id); ?>" class="button">Download<i class="icon-download-alt"></i></a>-->
                                                        <a class="button" href="<?php print $casestudyFile; ?>"><?php print $casestudyText; ?> <i class="icon-download-alt"></i></a>
						</div>
						<?php $i++; ?>	
					<?php endforeach; ?>
				</div>
				<?php 
					$i = 0;
					endif; 
				?>
				<?php if(!empty($blogPost)): ?>
				<div class="resource-panel kony-feature-resources group" id="blog-post">
					<?php foreach($blogPost as $item): ?>
						<div class="resource three">                                                    
							<h4><?php echo !empty($item->headline) ? $item->headline : str_replace('RES','',str_replace('_',' ',$item->title)); ?></h4>
							<a href="/<?php echo drupal_lookup_path('alias', 'node/'.$item->nid); ?>" class="button">More<i class="icon-download-alt"></i></a>
						</div>
						<?php $i++; ?>	
					<?php endforeach; ?>
				</div>
				<?php 
					$i = 0;
					endif; 
				?>
				<?php if(!empty($webinars)): ?>
				<div class="resource-panel kony-feature-resources group" id="webinars">
					<?php foreach($webinars as $item): 
                                                    if(count($item->field_kony_webinar_date)) {
                                                            $timestamp = $item->field_kony_webinar_date['und'][0]['value'];
                                                    }
                                                     $webinarLink = drupal_lookup_path('alias', 'node/'.$item->nid);
                                            ?>
						<div class="resource three">
							<h4><?php echo !empty($item->headline) ? $item->headline : str_replace('RES','',str_replace('_',' ',$item->title)); ?></h4>
							<!--<a href="/<?php //echo drupal_lookup_path('alias', 'node/'.$item->id); ?>" class="button">Download<i class="icon-download-alt"></i></a>-->
                                                        <?php if($current_date > $timestamp) { ?>
                                                                <a class="button" href="/<?php print $webinarLink;?>">Watch <i class="icon-play-circle"></i></a>
                                                        <?php } else {?>
                                                                <a class="button" href="/<?php print $webinarLink;?>">Register <i class="icon-arrow-right"></i></a>
                                                        <?php } ?>
						</div>
						<?php $i++; ?>	
					<?php endforeach; ?>
				</div>
				<?php 
					$i = 0;
					endif; 
				?>
				<?php if(!empty($whitePapers)): ?>
				<div class="resource-panel kony-feature-resources group" id="white-papers">
					<?php foreach($whitePapers as $item):
                                                    $whitePaperLink = "";
                                                    if(count($item->field_kony_white_paper_lnk)) {
                                                            $whitePaperLink = $item->field_kony_white_paper_lnk['und'][0]['url'];
                                                    } 
                                            ?>
						<div class="resource three">
							<h4><?php echo !empty($item->headline) ? $item->headline : str_replace('RES','',str_replace('_',' ',$item->title)); ?></h4>
							<!--<a href="/<?php //echo drupal_lookup_path('alias', 'node/'.$item->nid); ?>" class="button">Download<i class="icon-download-alt"></i></a>-->
                                                        <?php if(!empty($whitePaperLink)) {?>
							<a class="button" href="<?php print $whitePaperLink; ?>">Download<i class="icon-download-alt"></i></a>
						<?php } ?>
						</div>
						<?php $i++; ?>	
					<?php endforeach; ?>
				</div>
				<?php 
					$i = 0;
					endif; 
				?>	
			</div><!-- //tabs group -->
			<?php /*if (!empty($content['field_kony_resource'])):
				foreach ($content['field_kony_resource']['#items'] as $entity_uri):
					$resourcesCollection = entity_load('node', $entity_uri);
					foreach ($resourcesCollection as $resourcesCollectionObj ):?>
						<div class="col left">
							<h4><?php print $resourcesCollectionObj->title; ?></h4>
							<p><?php print $resourcesCollectionObj->body['und'][0]['value'];?></p>
						</div>
					<?php  endforeach;
				endforeach;
			endif; */?>
		</div>	<!-- //close delta group -->
	<?php 
	} //close if resource ?>
	
	
	
	<?php if((count($node->field_kony_app_demos))) {?>
	<div id="delta" class="panel group">
		<section class="kony-feature-resources"> 
		<?php if (!empty($content['field_kony_app_demos'])) {
			foreach ($content['field_kony_app_demos']['#items'] as $entity_uri) {
				$demosfcollection = entity_load('field_collection_item', $entity_uri);
				foreach ($demosfcollection as $demosfcollection_object) {
					$demoImgPath = file_create_url($demosfcollection_object->field_kony_app_demo_image['und'][0]['uri']);
					$demoPlatform = $demosfcollection_object->field_kony_app_demo_platform['und'][0]['value'];
					$demoPathId = $demosfcollection_object->field_kony_app_demo_ref['und'][0]['target_id']; 
					$demoPath = drupal_lookup_path('alias', 'node/'.$demoPathId);?>
					<div class="resource three">
						<h4><?php echo $demoPlatform; ?></h4>
						<a href="/<?php echo $demoPath; ?>" class="button">Watch <i class="icon-play-circle"></i></a>
					</div>
				<?php }
			}
		} ?>
		</section>
		</div>
		<?php } ?>
</section>
<?php } ?>

<!-- Load Customer CTA Section -->
<?php if(count($node->field_kony_app_customer_cta)) {
	$customerCTAId = $node->field_kony_app_customer_cta['und'][0]['target_id'];
	$customerCTALoad = node_load($customerCTAId);
	$customerCTAView = node_view($customerCTALoad);
	print render($customerCTAView);
} ?>

<!-- Load Customer CTA Section -->
<?php if (!empty($content['field_kony_app_related'])):?>
	<section class="kony-feature-related-apps master">
		<h3>Related Apps</h3>
		<?php foreach ($content['field_kony_app_related']['#items'] as $entity_uri):
			$relatedAppsCollection = entity_load('node', $entity_uri);
			foreach ($relatedAppsCollection as $relatedAppsCollectionObj):	
				$relAppPath = drupal_lookup_path('alias', 'node/'.$relatedAppsCollectionObj->nid);
				if(empty($relAppPath)) {
					$relAppPath = "node/".$relatedAppsCollectionObj->nid;
				}?>
				<article class="app-listing">
					<?php if(isset($relatedAppsCollectionObj->field_kony_app_icon_image['und'][0]['uri'])
							&& !empty($relatedAppsCollectionObj->field_kony_app_icon_image['und'][0]['uri'])): ?>
						<?php $imgPath = file_create_url($relatedAppsCollectionObj->field_kony_app_icon_image['und'][0]['uri']); ?>
						<a href="/<?php print $relAppPath; ?>">
							<img src="<?php echo $imgPath; ?>" alt="<?php echo $relatedAppsCollectionObj->title; ?>" />
					                <h5><?php echo $relatedAppsCollectionObj->field_kony_app_title['und'][0]['value']; ?></h5>
						</a>
					<?php endif; ?>
					<?php
					if(count($relatedAppsCollectionObj->field_kony_app_platform)) {?>
						<ul class="group">
							<?php foreach($relatedAppsCollectionObj->field_kony_app_platform['und'] as $platformList) {
								$platformTData = taxonomy_term_load($platformList['tid']);?>
								<li class="platform-<?php print strtolower($platformTData->name);?> hide-text"><?php print $platformTData->name;?></li>
							<?php }	?>
						</ul>
					<?php }	?>
				</article>
			<?php endforeach;
		endforeach;?>
		<span class="clear-row"></span>
		<div class="additional-info">
			<a href="/apps/browse">View more apps <i class="icon-arrow-right"></i></a>
		</div>
	</section>
<?php endif; ?>	

