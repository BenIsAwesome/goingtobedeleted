<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $css_name: A css-safe version of the view name.
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */
$caseStudysArray = array();
//$caseMinHeight = 1;
foreach ($view->result as $caseStudysItems) {
    $caseStudyTitle = $caseStudyFile = $caseStudyImage = "";
    if (count($caseStudysItems->_field_data)) {
        $caseStudyItemLoad = $caseStudysItems->_field_data['nid']['entity'];
    } else {
        $caseStudyItemLoad = node_load($caseStudysItems->nid);
    }
	
	if(count($caseStudyItemLoad->field_kony_case_study_image)) {
		$caseStudyImage = file_create_url($caseStudyItemLoad->field_kony_case_study_image['und'][0]['uri']);
	}
	if(count($caseStudyItemLoad->field_kony_case_study_cdn_url)) {
		$caseStudyFile = kony_custom_link($caseStudyItemLoad->field_kony_case_study_cdn_url);
	} else {
		$caseStudyFile = file_create_url($caseStudyItemLoad->field_kony_case_study_file['und'][0]['uri']);
	}

	if(count($caseStudyItemLoad->field_kony_case_study_headline)) {
		$caseStudyTitle = $caseStudyItemLoad->field_kony_case_study_headline['und'][0]['value'];
	} else {
		$caseStudyTitle = str_replace('_', ' ', $caseStudyItemLoad->title);
		$caseStudyTitle = str_replace('RES ', '', $caseStudyTitle);
	}
/*
	$titleLength = strlen($caseStudyTitle);
	if(strlen($caseStudyTitle) > 27 && $caseMinHeight < 63) {
		$caseMinHeight = 63;
	} else if(strlen($caseStudyTitle) > 17 && $caseMinHeight < 42) {
		$caseMinHeight = 42;
	}
*/
    $caseStudysArray[] = array(
        'caseStudyTitle' => $caseStudyTitle,
		'caseStudyFile' => $caseStudyFile,
		'buttonText' => 'Download',
		'caseStudyImage' => $caseStudyImage,
    );
}
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
	<?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
	<div class="view-header">
	  <?php print $header; ?>
	</div>
  <?php endif; ?>

  <?php if ($exposed): ?>
	<div class="view-filters">
	  <?php print $exposed; ?>
	</div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
	<div class="attachment attachment-before">
	  <?php print $attachment_before; ?>
	</div>
  <?php endif; ?>

  <?php if ($rows): ?>
	<div class="view-content">
		<div class="story-branch">
			<section class="kony-feature-resources master">			
				<div class="group">
					<?php 
					$caseStudyCount = 1;
					foreach($caseStudysArray as $eachcaseStudy) { ?>
						<div class="resource three">
							<h4><?php print $eachcaseStudy['caseStudyTitle']; ?></h4>
							<a class="button" href="<?php print $eachcaseStudy['caseStudyFile']; ?>" target="_blank">
								<?php print $eachcaseStudy['buttonText']; ?> <i class="icon-download-alt"></i>
							</a>
						</div>
						<?php 
						if($caseStudyCount%4 == 0) {?>
							<span class="clear-row"></span>
						<?php }
						$caseStudyCount = $caseStudyCount + 1;
					} ?>
				</div>
			</section>			
		</div>
		<?php if ($pager): ?>
			<?php print $pager; ?>
		<?php endif; ?>
	</div>

	<?php elseif ($empty): ?>
		<div class="view-empty">
			<?php print $empty; ?>
		</div>
	<?php endif; ?>

  
	<?php if ($attachment_after): ?>
		<div class="attachment attachment-after">
			<?php print $attachment_after; ?>
		</div>
	<?php endif; ?>

	<?php if ($more): ?>
		<?php print $more; ?>
	<?php endif; ?>

	<?php if ($footer): ?>
		<div class="view-footer">
			<?php print $footer; ?>
		</div>
	<?php endif; ?>

	<?php if ($feed_icon): ?>
		<div class="feed-icon">
			<?php print $feed_icon; ?>
		</div>
	<?php endif; ?>
</div>
<?php /* class view */ ?>

