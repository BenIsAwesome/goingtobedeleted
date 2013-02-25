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
$whitepaperView = 'kony_downloads';
$whitepaperViewRes = views_get_view_result($whitepaperView);

$datasheetView = 'data_sheets_list';
$datasheetViewRes = views_get_view_result($datasheetView);

$casestudyView = 'case_studies_list';
$casestudyViewRes = views_get_view_result($casestudyView);
global $base_path;
?>
<article class="container group" id="pri-content">		
	<div class="story-branch">
		<section class="kony-feature-resources master">
			<h3>White Papers Download Master</h3>
			<div class="group">
				<?php 
				$whitepaperCount = 1;
				foreach($whitepaperViewRes as $whitepaperItem) { 
					$whitepaperImage = file_create_url($whitepaperItem->_field_data['nid']['entity']->field_kony_white_paper_image['und'][0]['uri']);
					$whitepaperFile = file_create_url($whitepaperItem->_field_data['nid']['entity']->field_kony_white_paper_file['und'][0]['uri']);?>
					<div class="resource three">
						<img alt="<?php print $whitepaperItem->_field_data['nid']['entity']->title; ?>" src="<?php print $whitepaperImage; ?>">
						<h4><?php print $whitepaperItem->_field_data['nid']['entity']->title; ?> <i class="icon-film"></i></h4>
						<p><?php print substr($whitepaperItem->_field_data['nid']['entity']->body['und'][0]['value'], 0, 200)."..."; ?></p>
						<a class="button" href="<?php print $whitepaperFile; ?>">DOWNLOAD <i class="icon-download-alt"></i></a>
					</div>
				<?php 
					if($whitepaperCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$whitepaperCount = $whitepaperCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/white-papers-list">View more <i class="icon-arrow-right"></i></a>
			</div>
			<div class="clearfix"></div>
		</section>	
		
		<section class="kony-feature-resources master">
			<h3>Data Sheets Download Master</h3>
			<div class="group">
				<?php 
				$datasheetCount = 1;
				foreach($datasheetViewRes as $datasheetItem) { 
					$datasheetImage = file_create_url($datasheetItem->_field_data['nid']['entity']->field_kony_data_sheet_image['und'][0]['uri']);
					$datasheetFile = file_create_url($datasheetItem->_field_data['nid']['entity']->field_kony_data_sheet_file['und'][0]['uri']);?>
					<div class="resource three">
						<img alt="<?php print $datasheetItem->_field_data['nid']['entity']->title; ?>" src="<?php print $datasheetImage; ?>">
						<h4><?php print $datasheetItem->_field_data['nid']['entity']->title; ?> <i class="icon-film"></i></h4>
						<p><?php print substr($datasheetItem->_field_data['nid']['entity']->body['und'][0]['value'],0,200)."..."; ?></p>
						<a class="button" href="<?php print $datasheetFile; ?>">DOWNLOAD <i class="icon-download-alt"></i></a>
					</div>
				<?php 
					if($datasheetCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$datasheetCount = $datasheetCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/data-sheets-list">View more <i class="icon-arrow-right"></i></a>
			</div>
			<div class="clearfix"></div>
		</section>
		
		<section class="kony-feature-resources master">
			<h3>Case Studies Download Master</h3>
			<div class="group">
				<?php 
				$casestudyCount = 1;
				foreach($casestudyViewRes as $casestudyItem) { 
					$casestudyImage = file_create_url($casestudyItem->_field_data['nid']['entity']->field_kony_case_study_image['und'][0]['uri']);
					$casestudyFile = file_create_url($casestudyItem->_field_data['nid']['entity']->field_kony_case_study_file['und'][0]['uri']);?>
					<div class="resource three">
						<img alt="<?php print $casestudyItem->_field_data['nid']['entity']->title; ?>" src="<?php print $casestudyImage; ?>">
						<h4><?php print $casestudyItem->_field_data['nid']['entity']->title; ?> <i class="icon-film"></i></h4>
						<p><?php print substr($casestudyItem->_field_data['nid']['entity']->body['und'][0]['value'],0,200)."..."; ?></p>
						<a class="button" href="<?php print $casestudyFile; ?>">DOWNLOAD <i class="icon-download-alt"></i></a>
					</div>
				<?php 
					if($casestudyCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$casestudyCount = $casestudyCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/case-studies-list">View more <i class="icon-arrow-right"></i></a>
			</div>
			<div class="clearfix"></div>
		</section>
    </div>
</article>
