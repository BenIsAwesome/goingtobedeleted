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

$caseStudiesImages = array(); 
$caseStudiesArray= array();
if (count($node->field_company_profile_case_study)): 
	$caseMinHeight = 1;
	foreach ($node->field_company_profile_case_study['und'] as $eachCaseStudyURI):
		$caseStudyObject = $eachCaseStudyURI['entity']; 
		$caseStudyTitle = $caseStudyObject->field_kony_case_study_headline['und'][0]['value'];
		if(count($caseStudyObject->field_kony_case_study_cdn_url)) {
			$caseStudyURL = $caseStudyObject->field_kony_case_study_cdn_url['und'][0]['url'];
		} else {
			$caseStudyURL = file_create_url($caseStudyObject->field_kony_case_study_file['und'][0]['uri']);
		}
		$titleLength = strlen($caseStudyTitle);
		if(strlen($caseStudyTitle) >27 && $caseMinHeight < 63) {
			$caseMinHeight = 63;
		} else if(strlen($caseStudyTitle) > 17 && $caseMinHeight < 42) {
			$caseMinHeight = 42;
		}
		$caseStudiesArray[] = array(
			'linkURL' => $caseStudyURL,
			'linkText' => $caseStudyTitle
		);
	endforeach;
endif;
?>

<section class="kony-feature-customer-grid master">
	<div class="panel group" style="display:block">
		<h4><?php print $node->field_company_profile_name['und'][0]['value'];?></h4>
		<dl class="four left">
			<?php if(count($node->field_company_profile_industry)) {
				$industryLoad = taxonomy_term_load($node->field_company_profile_industry['und'][0]['tid']);?>
				<dt>Industry:</dt>
				<dd><?php print render($industryLoad->name);?></dd>
			<?php }	?>
			
			<?php if(!empty($node->field_company_profile_country['und'][0]['value'])) {?>
				<dt>Country:</dt>
				<dd><?php print $node->field_company_profile_country['und'][0]['value']; ?></dd>
			<?php } ?>
			
			<?php if(!empty($node->field_company_profile_memb['und'][0]['value'])) { ?>
				<dt>Customer Since:</dt>
				<dd><?php print date("Y",$node->field_company_profile_memb['und'][0]['value']); ?></dd>
			<?php } ?>
			
			<?php 
			if(count($node->field_company_profile_webinar)) {
				$webinarContentLoad = node_load($node->field_company_profile_webinar['und'][0]['target_id']);
				$webinarPath = drupal_lookup_path('alias', 'node/'.$webinarContentLoad->nid);
				if(count($webinarContentLoad->field_kony_webinar_date)) {
					$timestamp = $webinarContentLoad->field_kony_webinar_date['und'][0]['value'];
				}
				if($current_date > $timestamp) {
					$webinarText = "Watch";
				} else {
					$webinarText = "Register";
				} ?>
				<dt>Webinar:</dt>
				<dd><a href="<?php print $webinarPath;?>"><?php print $webinarText; ?></a></dd>
			<?php } ?>
			
			<?php if(count($node->field_company_profile_value_prop)) {
				$GenericContentLoad = node_load($node->field_company_profile_value_prop['und'][0]['target_id']);
				$generalContentPath = drupal_lookup_path('alias', 'node/'.$GenericContentLoad->nid);?>
				<dt>Generic Content:</dt>
				<dd>
					<a href="<?php print $generalContentPath;?>">
						<?php print $GenericContentLoad->field_kony_content_box_headline['und'][0]['value']; ?>
					</a>
				</dd>
			<?php } ?>
		</dl>
		<?php $profileImgPath = file_create_url($node->field_kony_company_profile_img['und'][0]['uri']); 
		if(!empty($profileImgPath)) { ?>
			<img src="<?php echo $profileImgPath; ?>" alt="<?php print $node->field_company_profile_name['und'][0]['value'];?>" class="right" />
		<?php } ?>
		<?php print $node->body['und'][0]['value'];?>
		
		
	</div>
  <div class="clearfix"></div>	
</section>

<!-- Releated Case Studies Section -->		
<?php if (count($caseStudiesArray)): ?>		
	<section class="kony-feature-additional-case-studies master">
		<h3>Additional Case Studies</h3>
		<div class="group">
			<?php 
			$caseStudyCount = 1;
			foreach($caseStudiesArray as $eachcaseStudy) { ?>
				<div class="resource three">
					<h4 style="min-height: <?php print $caseMinHeight;?>px"><?php print $eachcaseStudy['linkText']; ?></h4>
					<a class="button" href="<?php print $eachcaseStudy['linkURL']; ?>">
						Download <i class="icon-download-alt"></i>
					</a>
				</div>
				<?php 
				if($caseStudyCount%4 == 0) {?>
					<span class="clear-row"></span>
				<?php }
				$caseStudyCount = $caseStudyCount + 1;
			} ?>
		</div><!-- /.group -->
        <div class="clearfix"></div>
	</section>
<?php endif; ?>		
<!-- Releated Case Studies Section -->		

<!-- Related Companies Section -->		
<?php if (count($node->field_company_profile_related_co)): ?>		
	<section class="kony-feature-additional-case-studies master">
		<h3>Related Companies</h3>
		<div class="group">
			<?php foreach ($node->field_company_profile_related_co['und'] as $eachCompanyURI):
				$relCompanyObject = $eachCompanyURI['entity'];
				$relCompanyTitle = $relCompanyObject->field_company_profile_name['und'][0]['value'];
				$relCompanyURL = drupal_lookup_path('alias', 'node/'.$relCompanyObject->nid);?>
					<div class="study three">
						<a href="/<?php print $relCompanyURL; ?>">
							<?php if(count($relCompanyObject->field_kony_company_profile_img)): 
								$imgPath = file_create_url($relCompanyObject->field_kony_company_profile_img['und'][0]['uri']); ?>
								<img src="<?php echo $imgPath; ?>" alt="<?php echo $relCompanyTitle; ?>" />
							<?php endif; ?>
							<h4><?php print $relCompanyTitle; ?></h4>
						</a>
					</div>
			<?php endforeach;	?>
		</div><!-- /.group -->
                 <div class="clearfix"></div>
	</section>
<?php endif; ?>		
<!-- Related Companies Section -->			

<!-- Next Steps Section -->		
<?php if(count($node->field_company_profile_next_steps)) {
	$nextSetpsLoad = node_load($node->field_company_profile_next_steps['und'][0]['target_id']);
	$nextSetpsView = node_view($nextSetpsLoad);
	print render($nextSetpsView);
} ?>		
<!-- Next Steps Section -->


