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
$dataSheetsArray = array();
//$dataMinHeight = 1;
foreach ($view->result as $dataSheetsItems) {
    $datasheetTitle = $datasheetFile = $datasheetImage = "";
    if (count($dataSheetsItems->_field_data)) {
        $datasheetItemLoad = $dataSheetsItems->_field_data['nid']['entity'];
    } else {
        $datasheetItemLoad = node_load($dataSheetsItems->nid);
    }
	
	if(count($datasheetItemLoad->field_kony_data_sheet_image)) {
		$datasheetImage = file_create_url($datasheetItemLoad->field_kony_data_sheet_image['und'][0]['uri']);
	}
	if(count($datasheetItemLoad->field_kony_data_sheet_cdn_url)) {
		$datasheetFile = kony_custom_link($datasheetItemLoad->field_kony_data_sheet_cdn_url);
	} else {
		$datasheetFile = file_create_url($datasheetItemLoad->field_kony_data_sheet_file['und'][0]['uri']);
	}

	if(count($datasheetItemLoad->field_kony_data_sheet_headline)) {
		$datasheetTitle = $datasheetItemLoad->field_kony_data_sheet_headline['und'][0]['value'];
	} else {
		$datasheetTitle = str_replace('_', ' ', $datasheetItemLoad->title);
		$datasheetTitle = str_replace('RES ', '', $datasheetTitle);
	}
/*
	$titleLength = strlen($datasheetTitle);
	if(strlen($datasheetTitle) > 27 && $dataMinHeight < 63) {
		$dataMinHeight = 63;
	} else if(strlen($datasheetTitle) > 17 && $dataMinHeight < 42) {
		$dataMinHeight = 42;
	}
*/
    $dataSheetsArray[] = array(
        'datasheetTitle' => $datasheetTitle,
		'datasheetFile' => $datasheetFile,
		'buttonText' => 'Download',
		'datasheetImage' => $datasheetImage,
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
					$datasheetCount = 1;
					foreach($dataSheetsArray as $eachDataSheet) { ?>
						<div class="resource three">
							<h4><?php print $eachDataSheet['datasheetTitle']; ?></h4>
							<a class="button" href="<?php print $eachDataSheet['datasheetFile']; ?>">
								<?php print $eachDataSheet['buttonText']; ?> <i class="icon-download-alt"></i>
							</a>
						</div>
						<?php 
						if($datasheetCount%4 == 0) {?>
							<span class="clear-row"></span>
						<?php }
						$datasheetCount = $datasheetCount + 1;
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

