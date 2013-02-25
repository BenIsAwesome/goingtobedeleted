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
$view_name = 'latest_job_openings';
$latestJobsRes = views_get_view_result($view_name);
$jobsList = array();
$jobCountries = array();
foreach($latestJobsRes as $item) {
	if(isset($item->_field_data)) {
		$jobsObj = $item->_field_data['nid']['entity'];
	} else {
		$jobsObj = node_load($item->nid);
	}
	$countryId = $jobsObj->field_kony_job_post_country['und'][0]['tid'];	
	$jobTitle = $jobsObj->field_kony_job_post_headline['und'][0]['value'];
	$jobLink = "/".drupal_lookup_path('alias', 'node/'.$jobsObj->nid);
	$jobsList[$countryId][] = array(
		'jobTitle' => $jobTitle,
		'jobLink' => $jobLink
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
		<div class="col five right">
			<h4>Latest Job Openings</h4>
			<p> We are always on the lookout for smart, talented, energetic people who are driven by a passion for technology and business. If you are looking to work in a challenging environment with a focus on learning quickly and delivering results, you've come to the right place. </p>
			<strong>Here are some of our job openings:</strong>
			
			<?php foreach($jobsList as $jobKSey => $singleJobArray) {
					
					$jobCountries[] = $countryId;
					$countryLoad = taxonomy_term_load($jobKSey);					
					?>
					<h5><?php print $countryLoad->name; ?></h5>
				<?php
				foreach($singleJobArray as $singleJob) { ?>
					<a href="<?php print $singleJob['jobLink']; ?>"><?php print $singleJob['jobTitle']; ?></a><br>
				<?php }
			}	?>
		</div>
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

</div><?php /* class view */ ?>

				
			

