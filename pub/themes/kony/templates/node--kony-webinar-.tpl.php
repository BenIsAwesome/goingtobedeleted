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
//echo "<pre>"; 
//print_r($node);
$webinarImage = "";
if(count($node->field_kony_webinar_image)) {
	$webinarImage = file_create_url($node->field_kony_webinar_image['und'][0]['uri']); 
} 
$sectionClass = "webinar-col";
$timestamp = null;
$now = time();
if(count($node->field_kony_webinar_date)) {
	$timestamp = $node->field_kony_webinar_date['und'][0]['value'];
        $endTimestamp = $node->field_kony_webinar_date['und'][0]['value2'];
}
if($endTimestamp > $now){
	$sectionClass = "webinar-col webinar-col-full";
}

?>
<section class="webinar">
<section class="<?php echo $sectionClass; ?>">
	<?php if(!empty($webinarImage)) {?>
		<img class="right" alt="<?php print $node->title;  ?>" src="<?php print $webinarImage; ?>">
	<?php } ?>
	
	<h2>Overview</h2>
	<?php if(count($node->body)) {
		print render($content['body']);
	} ?>
	<?php if($endTimestamp > $now): 
		$registrationLink = kony_custom_link($node->field_kony_webinar_reg_link);
	?>		
	<div class="register-button">
		<a class="button" target="_blank" href="<?php echo $registrationLink; ?>">Reserve Your Seat Now<i class="icon-arrow-right"></i></a>
	</div>
	<div class="clearfix"></div>
	<?php endif; ?>
	<?php if (count($node->field_kony_webinar_speaker)) {?>
		<h2>Presented By</h2>
		<ul class="speaker-list">
			<?php foreach ($content['field_kony_webinar_speaker']['#items'] as $entity_uri) {
				$speakersCollection = entity_load('field_collection_item', $entity_uri);
				foreach ($speakersCollection as $speakercollectionObject ) {
					$speakerName = $speakercollectionObject->field_kony_webinar_speaker_name['und'][0]['value'];
					$speakerDescription = $speakercollectionObject->field_kony_webinar_speaker_bio['und'][0]['value'];?>
					<li>
						<?php /* if(count($speakercollectionObject->field_kony_webinar_cmp_logo)) {
							$speakerCompPath = file_create_url($speakercollectionObject->field_kony_webinar_cmp_logo['und'][0]['uri']); ?>
							<img alt="<?php print $speakerName; ?>" src="<?php print $speakerCompPath; ?>">
						<?php } */?>
						<?php  if(count($speakercollectionObject->field_kony_webinar_speaker_image)) {
							$speakerImgPath = file_create_url($speakercollectionObject->field_kony_webinar_speaker_image['und'][0]['uri']); ?>
							<img alt="<?php print $speakerName; ?>" src="<?php print $speakerImgPath; ?>">
						<?php } ?>
						<h4><?php print $speakerName; ?></h4>
						<p><?php print $speakerDescription; ?></p>
					</li>
				<?php }
			}?>
		</ul>
	<?php } ?>
	<div class="clearfix"></div>
</section>
<?php if($endTimestamp < time()): 
	$iframeLink = kony_custom_link($node->field_kony_webinar_video_link);
?>
<section class="webinar-col webinar-col-right left">
	<h2>Register To View Now</h2>
	<iframe height="530" width="40%" src="<?php echo $iframeLink; ?>" id="webinar-registration" style="overflow: hidden;" scrolling="no"></iframe>
	<div class="clearfix"></div>
</section>
<?php endif; ?>
<div class="clearfix"></div>
</section>

