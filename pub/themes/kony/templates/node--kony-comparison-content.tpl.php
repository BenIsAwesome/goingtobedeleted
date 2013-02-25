<?php
/**
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

//this is used with count(tabs)-1 to get the correct class name for the tabs
$tabsClassNames = array('one-tabs','two-tabs','three-tabs','four-tabs','five-tabs','six-tabs');
?>
<section class="kony-feature-tabbed-comparison master">
	<?php if(isset($node->field_kony_comparison_headline['und'][0]['value']) && !empty($node->field_kony_comparison_headline['und'][0]['value'])): ?>
	<h3><?php print $node->field_kony_comparison_headline['und'][0]['value'];?></h3>
	<?php endif; ?>
	<?php if(isset($content['body']) && !empty($content['body'])): ?>
		<?php print $node->body['und'][0]['value'];?>
	<?php endif; ?>
	<?php
	$numTabs = count($content['field_kony_tabs_tabs']['#items']);
	if($numTabs > 1):
		$tabsCount = 1; ?>
		<ul class="tabs secondary-tabs-alt group <?php echo($tabsClassNames[$numTabs-1]); ?>">
			<?php foreach ($content['field_kony_tabs_tabs']['#items'] as $entity_uri) {
				$eachTabCollection = entity_load('field_collection_item', $entity_uri);
				foreach ($eachTabCollection as $eachTabObject ) {?>
					<li><span><a href="" class="<?php if($tabsCount == 1) print 'current';?>"><i class="icon-sitemap icon-large"></i><?php print $eachTabObject->field_kony_tabs_tab_title['und'][0]['value'];?></a></span></li>
				<?php $tabsCount++;}
			}?>
		</ul>
	<?php endif;?>
	
<?php  if(count($content['field_kony_tabs_tabs'])): ?>	
<?php		$tabsCount = 1; ?>
<?php 		foreach ($content['field_kony_tabs_tabs']['#items'] as $entity_uri): ?>
<?php 			$eachTabCollection = entity_load('field_collection_item', $entity_uri); ?>
<?php			foreach ($eachTabCollection as $eachTabObject ) :?>
                	<div class="panel comparison group" style="display: <?php if($tabsCount == 1) print 'block'; else print 'none';?>;">
<?php				if(count($eachTabObject->field_kony_tabs_tab_cols)): ?>
<?php 					foreach($eachTabObject->field_kony_tabs_tab_cols as $eachColumnLp):
							$i=0;
                            foreach($eachColumnLp as $eachColumn):
						        $eachColumnCollection = entity_load('field_collection_item', array($eachColumn['value']));
						        foreach ($eachColumnCollection as $columnsInfo ):
						       		if(count($columnsInfo->field_kony_tabs_tab_col_head)):
										$headers[]= $columnsInfo->field_kony_tabs_tab_col_head['und'][0]['value'];
									endif;
                                    if(count($columnsInfo->field_kony_tabs_tab_col_body)):
                                        print $columnsInfo->field_kony_tabs_tab_col_body['und'][0]['value'];
                                    endif;
                                    if(count($columnsInfo->field_kony_features_feature_list)):
                                    	foreach($columnsInfo->field_kony_features_feature_list as $eachFeatureLp):
	                                        foreach($eachFeatureLp as $eachFeature):
                                                $eachFeatureCollection = entity_load('field_collection_item', array($eachFeature['value']));
	                                                foreach ($eachFeatureCollection as $eachFeatureInfo ):
                                                        $FeatureListHeader[$i][]=$eachFeatureInfo->field_kony_features_headline['und'][0]['value'];
                                                        $FeatureListContent[$i][]= $eachFeatureInfo->field_kony_feature_body['und'][0]['value'];
													    $imgMediaPath = "";
														if($eachFeatureInfo->field_kony_feature_opt_media_lnk['und'][0]['uri']!=''):
															$imgMediaPath = file_create_url($eachFeatureInfo->field_kony_feature_opt_media_lnk['und'][0]['uri']);
														else:
															$imgMediaPath = '';
														$featureimgMediaPath[$i][]=$imgMediaPath;
														$lookPathId = $eachFeatureInfo->field_kony_feature_opt_lnk['und'][0]['target_id'];
														$optionalLink = drupal_lookup_path('alias', 'node/'.$lookPathId);
														$featureoptionalLink[$i][]=$optionalLink;
														$featureoptionalLinkTxt[$i][]=$eachFeatureInfo->field_kony_feature_opt_lnk_txt['und'][0]['value'];
														endif;
													endforeach;
											endforeach;
										endforeach;
									endif;
									$i++;
								endforeach; // End of Columns Loop
							endforeach;
						endforeach;
					endif;//end if count eachTabObject
?>
					<table><thead><tr>
			        <?php 
				    $numberOfTabs=count($headers); 
		            for($i=0; $i<$numberOfTabs;$i++):
		            ?>
		            	<th><h4> <?php print $headers[$i] ?> </h4></th>
		            <?php endfor;?>
		           	</tr></thead><tbody>
			        <?php
				    $numberOfFeatures=count($FeatureListHeader[0]);
				    $numberOfFeaturescols=count($FeatureListHeader);
				    $k=0;
				    for($i=0;$i<$numberOfFeatures;$i++):
				    ?>
				    <tr>
					    <?php for($j=0;$j<$numberOfFeaturescols;$j++):?>  
					    	<td>
						    	<h5><?php print $FeatureListHeader[$j][$i];?></h5>
						    	<?php print $FeatureListContent[$j][$i];
							    	if($featureimgMediaPath[$j][$i]!=''): 
							    ?>
							    		<a href="<?php print $featureoptionalLink[$j][$i];?>"><img src="<?php print $featureimgMediaPath[$j][$i]; ?>"></a>
							    <?php
								    else:
								?>
								<?php	if(!empty($featureoptionalLinkTxt[$j][$i])): ?>
											<a href="/<?php print $featureoptionalLink[$j][$i];?>">
											<?php print $featureoptionalLinkTxt[$j][$i];?>
											</a> <i class="icon-arrow-right"></i>
								<?php   elseif(!empty($featureoptionalLink[$j][$i])):  ?>
											<a href="/<?php print $featureoptionalLink[$j][$i];?>">Learn More<i class="icon-arrow-right"></i></a>
								<?php   endif; ?>
								<?php 
									endif; 
								?>
						<?php endfor;?>                                                
				          </td>
				      </tr>
				   <?php 
				   endfor; 
				   ?>
        		   </tbody>
				   </table>

 			</div> <!-- /panel comparison group -->
            <?php $tabsCount++; $headers=array(); $FeatureListHeader=array(); $FeatureListContent=array();$featureoptionalLink=array(); $featureoptionalLinkTxt=array();$featureimgMediaPath=array();
            endforeach;
         endforeach;?>
<?php 	endif;?>
	
	<?php if(isset($node->field_comparison_opt_cta['und'][0]['target_id']) && !empty($node->field_comparison_opt_cta['und'][0]['target_id'])): ?>
	<?php
		$refID = $node->field_comparison_opt_cta['und'][0]['target_id'];
		$learnText = $node->field_comparison_lrn_txt['und'][0]['value'];
		$refPath = '/'.drupal_lookup_path('alias', 'node/'.$refID);
	?>
	
	<div class="additional-info">
		<a href="<?php print $refPath; ?>"><?php print $learnText; ?> <i class="icon-arrow-right"></i></a>
	</div>
	<?php endif; ?>
         <div class="clearfix"></div>      
</section>
