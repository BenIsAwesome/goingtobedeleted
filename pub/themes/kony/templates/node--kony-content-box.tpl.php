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

global $base_path;
$premiumContentPath = $premiumContentPath = $premiumContentId = $premiumContentLoad = "";
$target = "";
$premiumContentLoad = null;
if (count($node->field_content_box_cta)) {
    $premiumContentId = $node->field_content_box_cta['und'][0]['target_id'];
    $premiumContentLoad = node_load($premiumContentId);
    if ($premiumContentLoad->type == "kony_external_link") {
        $premiumContentPath = $premiumContentLoad->field_kony_external_link_url['und'][0]['url'];
        $target = "_blank";
    } else {
        $premiumContentPath = '/' . drupal_lookup_path('alias', 'node/' . $premiumContentId);
    }
}

if (count($node->field_kony_content_box_opt_cta)) {
    $optBandId = $node->field_kony_content_box_opt_cta['und'][0]['target_id'];
    $optContentLoad = node_load($optBandId);
    if ($optContentLoad->type == "kony_external_link") {
        $optBandPath = $optContentLoad->field_kony_external_link_url['und'][0]['url'];
        $optBandTarget = "_blank";
    } else {
        $optBandPath = '/' . drupal_lookup_path('alias', 'node/' . $optBandId);
    }
}

?>
<section class="kony-feature-value-prop master">
    <?php
    $profileImgPath = "";
    $caption = null;
    $premiumClass = "img-placeholder";
    $sliderExist = false;
    if (isset($node->field_kony_content_box_cta_image) && !empty($node->field_kony_content_box_cta_image)) {
        $profileImgPath = file_create_url($node->field_kony_content_box_cta_image['und'][0]['uri']);
    }
    if ($premiumContentId) {
        if ($premiumContentLoad->type == "kony_blog_post" && empty($profileImgPath)) {
            $profileImgPath = file_create_url($premiumContentLoad->field_kony_blog_post_image['und'][0]['uri']);
        } else if ($premiumContentLoad->type == "kony_case_study" && empty($profileImgPath)) {
            $profileImgPath = file_create_url($premiumContentLoad->field_kony_case_study_image['und'][0]['uri']);
        } else if ($premiumContentLoad->type == "kony_data_sheet" && empty($profileImgPath)) {
            $profileImgPath = file_create_url($premiumContentLoad->field_kony_data_sheet_image['und'][0]['uri']);
        } else if ($premiumContentLoad->type == "kony_infographic") {
            if (empty($profileImgPath)) {
                $profileImgPath = file_create_url($premiumContentLoad->field_kony_infograpic_pre_image['und'][0]['uri']);
            }
            $premiumContentPath = file_create_url($premiumContentLoad->field_kony_infograpic_full_img['und'][0]['uri']);
            $premiumClass = "infographic-placeholder lightbox";
        } else if ($premiumContentLoad->type == "kony_tutorial" && empty($profileImgPath)) {
            $profileImgPath = file_create_url($premiumContentLoad->field_kony_tutorial_image['und'][0]['uri']);
        } else if ($premiumContentLoad->type == "kony_video") {
            if (empty($profileImgPath)) {
                $profileImgPath = file_create_url($premiumContentLoad->field_kony_video_image['und'][0]['uri']);
            }
            $premiumContentPath = $premiumContentLoad->field_kony_video_video_link['und'][0]['url'];
			$caption = $premiumContentLoad->field_kony_video_caption['und'][0]['value']; 
            $premiumClass = "video-placeholder fancybox-video";
        } else if ($premiumContentLoad->type == "kony_white_paper" && empty($profileImgPath)) {
            $profileImgPath = file_create_url($premiumContentLoad->field_kony_white_paper_image['und'][0]['uri']);
        }
    }
    ?>
    <?php
    if (isset($premiumContentLoad)) {
        if ($premiumContentLoad->type == "kony_box_slideshow") {
            if (!empty($node->field_content_box_cta)):
                foreach ($node->field_content_box_cta['und'] as $entity_uri):
                    $boxContentLoad = node_load($entity_uri['target_id']);
                    if ($boxContentLoad->type == "kony_box_slideshow") {
                        $slidesCount = 0;
                        if (count($boxContentLoad->field_kony_box_slideshow_img) || count($boxContentLoad->field_kony_infographic_ref)) {
                        	$sliderExist = true;
                            ?>
                            <figure class="right">
                            	<div class="flex-container">
	                                <div class="flexslider seven">
		                                <ul class="slides">
	                                        <?php
	                                        foreach ($boxContentLoad->field_kony_box_slideshow_img['und'] as $slideshowList) {
	                                            $slidesCount = $slidesCount + 1;
	                                            $slideShowPath = file_create_url($slideshowList['uri']);
	                                            ?>
	                                            <li style="" class="">
	                                                <img src="<?php print $slideShowPath; ?>" alt="<?php print $landingContentLoad->title; ?>" />
	                                            </li>
	                                         <?php } //close foreach img?>
	                                         <?php if(count($boxContentLoad->field_kony_infographic_ref)): ?>
												<?php foreach($boxContentLoad->field_kony_infographic_ref['und'] as $infogr): 
													$infographic = node_load($infogr['target_id']);	
													$prevImg = file_create_url($infographic->field_kony_infograpic_pre_image['und'][0]['uri']);
													$fullImg = file_create_url($infographic->field_kony_infograpic_full_img['und'][0]['uri']);
												?>
													<li style="" class="">
									                	<a href="<?php print $fullImg ?>" class="lightbox" rel="group1">
									                		<img src="<?php print $prevImg;?>" alt="" />
									                	</a>
									                </li>				
												<?php endforeach; ?>
											<?php endif; ?>
	                                    </ul>
	                                </div> <!-- close flexslider -->
                            	</div><!-- close flex-container -->
                            </figure>
                        <?php } ?>
                        <?php
                    }
                endforeach;
            endif;
        }
    }
    if (!empty($profileImgPath)):
        ?>
        <figure class="right">
            <?php if (!empty($premiumContentPath)): ?>
                <a href="<?php print $premiumContentPath; ?>" target="<?php print $target; ?>" class="<?php echo $premiumClass; ?>">
                    <img src="<?php echo $profileImgPath; ?>" alt="<?php echo $node->field_kony_content_box_headline['und'][0]['value']; ?>" class="right" />
                </a>
            <?php else: ?>
                <a href="<?php echo $profileImgPath; ?>" title="<?php echo $node->field_kony_content_box_cta_image['und'][0]['alt']; ?>" class="lightbox feature_img">
				<img src="<?php echo $profileImgPath; ?>" alt="<?php echo $node->field_kony_content_box_headline['und'][0]['value']; ?>" class="right" />
				</a>
            <?php endif; ?>

        <?php if (!empty($caption)): ?>
                <figcaption style="text-align:center;"><?php echo $caption; ?></figcaption>
        <?php endif; ?>
        </figure>
<?php endif; ?>

    <?php /* replace inline with lightbox
    	if (!empty($premiumContentLoad) && $premiumContentLoad->type == "kony_video"): ?>
        <div class="twelve video-container hide" style="width: 50%; float: right; padding: 4% 0 56.25%;">
            <iframe frameborder="0" src="<?php echo $premiumContentPath; ?>" scrolling="no"></iframe>
        </div>
    <?php endif; */ ?>

    <?php if (isset($node->field_kony_content_box_headline['und'][0]['value']) && !empty($node->field_kony_content_box_headline['und'][0]['value'])): ?>
        <?php
        if (!empty($profileImgPath) || $sliderExist):
            $h3Class = "style='max-width:50%'";
        else:
            $h3Class = "";
        endif;
        ?>
        <h3 <?php echo $h3Class; ?>><?php echo $node->field_kony_content_box_headline['und'][0]['value']; ?></h3>
    <?php endif; ?>

    <?php if (isset($node->body['und'][0]['value']) && !empty($node->body['und'][0]['value'])): ?>
        <?php print $node->body['und'][0]['value']; ?>
<?php endif; ?>
	<div class="clearfix"></div>
    <?php if (!empty($optBandPath)) { ?>
        <div class="additional-info">
            <a href="<?php print $optBandPath; ?>" target="<?php echo $optBandTarget; ?>"><?php print $node->field_kony_content_box_lrn_txt['und'][0]['value']; ?> <i class="icon-arrow-right"></i></a>
        </div>
<?php } ?>
</section>


