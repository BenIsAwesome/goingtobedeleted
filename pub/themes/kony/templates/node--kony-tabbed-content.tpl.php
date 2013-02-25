<?php
/**
* @file
* Zen theme's implementation to display a node.
*
* Available variables:
* - $title: the (sanitized) title of the node.
* - $content: An array of node items. Use render($content) to print them all,
* or print a subset such as render($content['field_example']). Use
* hide($content['field_example']) to temporarily suppress the printing of a
* given element.
* - $user_picture: The node author's picture from user-picture.tpl.php.
* - $date: Formatted creation date. Preprocess functions can reformat it by
* calling format_date() with the desired parameters on the $created variable.
* - $name: Themed username of node author output from theme_username().
* - $node_url: Direct url of the current node.
* - $display_submitted: Whether submission information should be displayed.
* - $submitted: Submission information created from $name and $date during
* template_preprocess_node().
* - $classes: String of classes that can be used to style contextually through
* CSS. It can be manipulated through the variable $classes_array from
* preprocess functions. The default values can be one or more of the
* following:
* - node: The current template type, i.e., "theming hook".
* - node-[type]: The current node type. For example, if the node is a
* "Blog entry" it would result in "node-blog". Note that the machine
* name will often be in a short form of the human readable label.
* - node-teaser: Nodes in teaser form.
* - node-preview: Nodes in preview mode.
* - view-mode-[mode]: The view mode, e.g. 'full', 'teaser'...
* The following are controlled through the node publishing options.
* - node-promoted: Nodes promoted to the front page.
* - node-sticky: Nodes ordered above other non-sticky nodes in teaser
* listings.
* - node-unpublished: Unpublished nodes visible only to administrators.
* The following applies only to viewers who are registered users:
* - node-by-viewer: Node is authored by the user currently viewing the page.
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
*
* Other variables:
* - $node: Full node object. Contains data that may not be safe.
* - $type: Node type, i.e. story, page, blog, etc.
* - $comment_count: Number of comments attached to the node.
* - $uid: User ID of the node author.
* - $created: Time the node was published formatted in Unix timestamp.
* - $pubdate: Formatted date and time for when the node was published wrapped
* in a HTML5 time element.
* - $classes_array: Array of html class attribute values. It is flattened
* into a string within the variable $classes.
* - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
* teaser listings.
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
* main body content. Currently broken; see http://drupal.org/node/823380
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

//this is used with count(tabs)-1 to get the correct class name for the tabs
$tabsClassNames = array('one-tab','two-tabs','three-tabs','four-tabs','five-tabs','six-tabs','seven-tabs','eight-tabs','nine-tabs');
?>
<section class="kony-feature-tabbed master">
    <?php if(isset($node->field_kony_tabs_headline['und'][0]['value']) && !empty($node->field_kony_tabs_headline['und'][0]['value'])): ?>
            <h3><?php print $node->field_kony_tabs_headline['und'][0]['value'];?></h3>
    <?php endif; ?>
    <?php if(isset($content['body']) && !empty($content['body'])): ?>
            <?php print $node->body['und'][0]['value'];?>
    <?php endif; ?>

    <?php $numTabs = count($node->field_kony_tabs_tabs['und']);
    if($numTabs > 1) {
        $tabsCount = 1; ?>
        <ul class="tabs secondary-tabs group <?php echo($tabsClassNames[$numTabs-1]); ?>">
            <?php foreach ($content['field_kony_tabs_tabs']['#items'] as $entity_uri) {
                $eachTabCollection = entity_load('field_collection_item', $entity_uri);
                foreach ($eachTabCollection as $eachTabObject ) {?>
                    <li>
                        <span><a href="#tabs-<?php echo $tabsCount ;?>" class="<?php if($tabsCount == 1) print 'current';?>">
                            <?php print $eachTabObject->field_kony_tabs_tab_title['und'][0]['value'];?>
                        </a></span>
                    </li>
                    <?php $tabsCount++;
                }
            }?>
        </ul>
    <?php }?>

    <?php if($numTabs !== 0) {
        $tabsCount = 1; ?>
        <?php foreach ($content['field_kony_tabs_tabs']['#items'] as $entity_uri) {
            $eachTabCollection = entity_load('field_collection_item', $entity_uri);
            foreach ($eachTabCollection as $eachTabObject ) { ?>
				<div class="panel group" id="tabs-<?php echo $tabsCount ;?>" style="display: <?php if($tabsCount == 1) print 'block'; else print 'none';?>;">
                <?php if(count($eachTabObject->field_kony_tabs_tab_cols)) {
                    foreach($eachTabObject->field_kony_tabs_tab_cols as $eachColumnLp) {
                        foreach($eachColumnLp as $eachColumn) {
                            $eachColumnCollection = entity_load('field_collection_item', array($eachColumn['value']));
                                foreach ($eachColumnCollection as $columnsInfo ) {
								    if(count($columnsInfo->field_kony_tabs_tab_col_body)) {
											print $columnsInfo->field_kony_tabs_tab_col_body['und'][0]['value'];
                                        } ?>
                                    <div class="panel group" style="display: block;">
                                        <?php                                        
                                        if(count($columnsInfo->field_kony_features_feature_list)) {?>
                                            <?php foreach($columnsInfo->field_kony_features_feature_list as $eachFeatureLp) {
													foreach($eachFeatureLp as $eachFeature) {
											?>
														<div class="feature">
                                            <?php
                                                        $eachFeatureCollection = entity_load('field_collection_item', array($eachFeature['value']));
                                                        foreach ($eachFeatureCollection as $eachFeatureInfo ) {?>
                                                        		<?php
																if(count($eachFeatureInfo->field_kony_feature_image)) {
																	$imgPath = file_create_url($eachFeatureInfo->field_kony_feature_image['und'][0]['uri']); 
																	$imgPathTitle = $eachFeatureInfo->field_kony_feature_image['und'][0]['alt'];
																	if(count($eachFeatureInfo->field_kony_feature_opt_media_lnk)) { 
																		$imgMediaPath = file_create_url($eachFeatureInfo->field_kony_feature_opt_media_lnk['und'][0]['uri']);
																		$imgMediaTitle = $eachFeatureInfo->field_kony_feature_opt_media_lnk['und'][0]['alt'];
																?>
																		<a title="<?php print $imgMediaTitle;?>" class="lightbox feature_img" href="<?php print $imgMediaPath;?>" rel="group<?php print $node->nid;?>"><img alt="<?php print $eachFeatureInfo->field_kony_features_headline['und'][0]['value'];?>" src="<?php echo $imgPath; ?>"></a>
																<?php } else{?>
																		<a title="<?php print $imgPathTitle;?> " class="lightbox feature_img"  href="<?php print $imgPath;?>" rel="group<?php print $node->nid;?>"><img alt="<?php print $eachFeatureInfo->field_kony_features_headline['und'][0]['value'];?>" src="<?php echo $imgPath; ?>"></a>			
																<?php } ?>																	
                                                            <?php } //close if feature image ?>
                                                            <div class="feature_desc">
															<?php if(count($eachFeatureInfo->field_kony_features_headline)) { ?>
                                                                <h4><?php print $eachFeatureInfo->field_kony_features_headline['und'][0]['value'];?></h4>
                                                            <?php } ?>
                                                            <?php if(count($eachFeatureInfo->field_kony_feature_body)) : ?>
                                         	                    <p><?php print $eachFeatureInfo->field_kony_feature_body['und'][0]['value']; ?></p>
                                                            <?php endif; ?>
															
                                                            <?php if(count($eachFeatureInfo->field_kony_feature_opt_lnk)) { 
                                                                $imgMediaPath = "";
                                                                $lookPathId = $eachFeatureInfo->field_kony_feature_opt_lnk['und'][0]['target_id'];
                                                                $refPath = null;
                                                                $optLinkNode = node_load($lookPathId);
                                                                $optLinkTarget = "";
																$target = '_blank';
                                                                if($optLinkNode->type == 'kony_external_link'){
														            $optionalLink = kony_custom_link($optLinkNode->field_kony_external_link_url);
													            }else if($optLinkNode->type == 'kony_case_study'){
													            	$optionalLink = kony_custom_link($optLinkNode->field_kony_case_study_cdn_url);
													            }else if($optLinkNode->type == 'kony_data_sheet'){
													            	$optionalLink = kony_custom_link($optLinkNode->field_kony_data_sheet_cdn_url);
													            }else if($optLinkNode->type == 'kony_white_paper'){
													            	$optionalLink = kony_custom_link($optLinkNode->field_kony_white_paper_lnk);
													            }else{
																	$target = '';
														        	$optionalLink = '/'.drupal_lookup_path('alias', 'node/'.$lookPathId);
													            }

                                                                if(count($eachFeatureInfo->field_kony_feature_opt_media_lnk)) :
                                                                    $imgMediaPath = file_create_url($eachFeatureInfo->field_kony_feature_opt_media_lnk['und'][0]['uri']);
                                                                endif;
                                                                if($imgMediaPath) { ?>
                                                                    <a href="<?php print $optionalLink;?>"><img src="<?php print $imgMediaPath; ?>"></a>
                                                               <?php } 
															   else {
																	if(count($eachFeatureInfo->field_kony_feature_opt_lnk_txt)) {?>
																		<a href="<?php print $optionalLink;?>" target="<?php echo $target; ?>">
																		<?php print $eachFeatureInfo->field_kony_feature_opt_lnk_txt['und'][0]['value'];?> <i class="icon-arrow-right"></i>
																		</a>
																	<?php } else {?>
																	<a href="<?php print $optionalLink;?>">Learn More <i class="icon-arrow-right"></i></a>
																	<?php }
																}
                                                            } ?>
                                                            </div> <!-- close feature desc -->
                                                            <?php //dsm($eachFeatureInfo); ?>
                                                            <?php //TODO add optional link text ?>
                                                        <?php }
                                                        ?>
                                                    	</div>
                                                    <?php
                                                    }
                                            } ?>
                                        <?php } ?>
                                    </div>
								<?php } // End of Columns Loop
                        }
                }
                } ?>
                </div>
                <?php $tabsCount++;
			}
		}
    }?>
    <?php if(isset($node->field_tabbed_content_opt_cta['und'][0]['target_id']) && !empty($node->field_tabbed_content_opt_cta['und'][0]['target_id'])): 
            $refID = $node->field_tabbed_content_opt_cta['und'][0]['target_id'];
            $learnText = $node->field_tabbed_content_lrn_txt['und'][0]['value'];
            $refnode = node_load($refID);
            $refPath = null;
            if($refnode->type == 'kony_external_link'){
	            $refPath = kony_custom_link($refnode->field_kony_external_link_url);
	            $target = '_blank';
            }else{
	        	$refPath = '/'.drupal_lookup_path('alias', 'node/'.$refID);
            }
    ?>
            

            <div class="additional-info">
                    <a href="<?php print $refPath; ?>" target="<?php echo $target; ?>"><?php print $learnText; ?> <i class="icon-arrow-right"></i></a>
            </div>
    <?php endif; ?>
<div class="clearfix"></div>
</section>



