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

global $theme_path,$base_path,$user;
//echo "<pre>";print_r($node);
//$productNameSpe = $node->field_kony_dev_tut_soft_type['und'][0]['taxonomy_term']->name;
$productNameSpetid = taxonomy_term_load($node->field_kony_dev_tut_soft_type['und'][0]['tid']);
$productName = $productNameSpetid->name;
//print $productNameSpe;
//$productName = str_replace(' ','-',$productNameSpe);
$authObj = node_load($node->field_kony_dev_tut_author['und'][0]['target_id']);
$authorName = $authObj->field_kony_author_first_name['und'][0]['value']." ".$authObj->field_kony_author_last_name['und'][0]['value'];
$designation = $authObj->field_kony_author_position['und'][0]['value'];
$company = $authObj->field_kony_author_company['und'][0]['value'];
$bio = $authObj->field_kony_author_bio['und'][0]['value'];
$image = file_create_url($authObj->field_kony_author_image['und'][0]['uri']);
$image_path  = file_create_url($node->field_kony_dev_tut_image['und'][0]['uri']);
$video_link = $node->field_kony_dev_tut_video_link['und'][0]['url'];
$createddate = date_format_change($node->created);
$devTeutorialLevelterm = taxonomy_term_load($node->field_kony_dev_tut_level['und'][0]['tid']);
$devTeutorialLevel = $devTeutorialLevelterm->name;
$colorClass = $devTeutorialLevelterm->field_kony_dev_level_color_class['und'][0]['value'];
?>
<div id="tutuorial-billboard" class="billboard-bgcolor">
	<!--Banner Image ends here-->
	<p class="backbtn"><i class="icon-arrow-left"></i>
		<a href="<?php print $base_path."tutorials/".$productName;?>">&nbsp;Back to Tutorials		</a>
	</p>
	<!--Banner Image ends here-->
</div>

<article id="pri-content" class="container group">    
	<!-- <div class="container group " id="pri-content">-->
		<div class="max-width" id="posts">
			<article id="article-posts" class="kony-tutorial-blog-tease left tutorial-title">
				<h4><?php print $node->field_kony_dev_tut_headline['und'][0]['value'];?></h4>
				<span class="tutorial-byline">
                                    Posted on <?php print $createddate; ?>
                                    <?php  if(count($node->field_kony_dev_tut_author['und'])){  ?>
                                            &nbsp;<?php print 'by '.$authorName;?>
                                       <?php } ?>
                                                                    
                                    &nbsp;|&nbsp;Level:
                                </span>
				<span class="<?php print $colorClass;?>"><?php print $devTeutorialLevel; ?></span>
				<p>
					<a href="<?php print $video_link;?>" class="lightbox feature_img fancybox-video">
						<img class="tutorial-img" alt="<?php print $node->field_kony_dev_tut_headline['und'][0]['value'];?>" src="<?php print $image_path; ?>">
					</a>
				</p>
			</article>
                        <?php if(count($node->field_kony_dev_tut_rel_downloads['und'])): ?>
			<article id="article-posts" class="kony-tutorial-blog-tease">		
				<div class="left tutorial-sidebar">
					<div id="tutorial-two-columns">
						<h3>Resources</h3>
						<div id="column1">
							<div>
								<ul>
									<?php
										foreach($node->field_kony_dev_tut_rel_downloads['und'] as $resourceObj):
											$reObj = node_load($resourceObj['target_id']);
											$path = file_create_url($reObj->field_kony_dwnload_file['und'][0]['uri']);
                                                                                        if($reObj->field_kony_dwnload_file['und'][0]['uri'] != ''){?>
											<li>
												<a href="<?php print $path;?>"><?php print $reObj->field_kony_dwnload_file_headline['und'][0]['value'];?></a>
											</li>
										<?php } endforeach; ?>
											
								</ul>	
							</div>	
						</div>
					</div>  
				</div>		
			</article>
			<?php endif; ?>	
			<div class="line-style clear"></div>
			<?php if (count($node->field_kony_dev_tutorial_content)) {
				foreach ($content['field_kony_dev_tutorial_content']['#items'] as $entity_uri) {	
					$tutorialCollection = entity_load('field_collection_item', $entity_uri);
					foreach ($tutorialCollection as $tutorialcollectionObj ) {
                                            //echo "<pre>";print_r($tutorialcollectionObj);
						$tutorialText = $tutorialcollectionObj->field_kony_dev_tut_text['und'][0]['value'];					
						$tutorialImagePath = file_create_url($tutorialcollectionObj->field_kony_dev_tut_timage['und'][0]['uri']); 					
						$codeBlock = $tutorialcollectionObj->field_kony_dev_tut_code_block['und'][0]['value'];	?>
						<article id="article-posts" class="kony-tutorial-blog-tease left sub-heading">
							<?php if(count($tutorialcollectionObj->field_kony_dev_tut_heading['und'][0]['value'])) { ?>
								<h3><?php print $tutorialcollectionObj->field_kony_dev_tut_heading['und'][0]['value'];?></h3>
							<?php } ?>
							<?php if(count($tutorialcollectionObj->field_kony_dev_tut_text['und'][0]['value'])) {
								print $tutorialcollectionObj->field_kony_dev_tut_text['und'][0]['value'];
							} ?>
                                                        <?php if(count($tutorialcollectionObj->field_kony_dev_tut_timage['und'][0]['uri'])){ ?>
                                                               <p><img class="tutorial-img" src="<?php print $tutorialImagePath; ?>"></p>
                                                            
                                                        <?php } ?>
								<?php if(count($tutorialcollectionObj->field_kony_dev_tut_code_block['und'][0]['value'])) { ?>
                                                                    <div class="left tutorial_master">
									<?php print $tutorialcollectionObj->field_kony_dev_tut_code_block['und'][0]['value']; ?>
                                                                    </div> 
                                                                 <?php } ?>
                                                                 
							                  
						</article>					
					<?php }			
				}		
			} ?>
		</div>
    <!-- </div> -->
</article>
<?php
    if(count($node->field_kony_dev_tut_author['und'])){ ?>
       <article>
	<div class="about-author">
		<h4>About the Author</h4>
		<img src="<?php print $image;?>" alt="<?php print $authorName;?>" class="left">
		<span class="heading-txt"><?php print $authorName;?></span>
		<p><?php  print $designation.",&nbsp;".$company;?></p>
		<p><?php print $bio;?></p>
	</div>
      </article> 
   <?php  }
?>


