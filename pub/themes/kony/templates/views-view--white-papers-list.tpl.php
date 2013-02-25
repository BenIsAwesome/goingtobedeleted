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
				$whitepaperCount = 1;
				foreach($view->result as $whitepaperItem) { 
					if(count($whitepaperItem->_field_data)) {
						$whitePaperLoad = $whitepaperItem->_field_data['nid']['entity'];
					} else {
						$whitePaperLoad = node_load($whitepaperItem->nid);
					}
					$whitePaperLink = $whitepaperImage = "";
					if(count($whitePaperLoad->field_kony_white_paper_image)) {
						$whitepaperImage = file_create_url($whitePaperLoad->field_kony_white_paper_image['und'][0]['uri']);
					}
					if(count($whitePaperLoad->field_kony_white_paper_lnk)) {
						$whitePaperLink = kony_custom_link($whitePaperLoad->field_kony_white_paper_lnk);
					} 
					if(count($whitePaperLoad->field_kony_white_paper_headline)) {
						$whitepaperHeadline = $whitePaperLoad->field_kony_white_paper_headline['und'][0]['value'];
					} else {
						$whitepaperHeadline = str_replace('_', ' ', $whitePaperLoad->title);
                                                $whitepaperHeadline = str_replace('RES ', '', $whitepaperHeadline);
					} 
					?>
					<div class="resource three">
						<?php if(!empty($whitepaperImage)) {?>
							<img alt="<?php print $whitepaperHeadline; ?>" src="<?php print $whitepaperImage; ?>">
						<?php } ?>
						<h4><?php print $whitepaperHeadline; ?></h4>
						<?php 
                                                    $whitePaperDesc = field_view_field('node', $whitePaperLoad, 'body', 'teaser');
                                                    print render($whitePaperDesc);
                                                ?>
						<?php if(!empty($whitePaperLink)) {?>
							<a class="button" href="<?php print $whitePaperLink; ?>">Download <i class="icon-download-alt"></i></a>
						<?php } ?>
					</div>
				<?php 
					if($whitepaperCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$whitepaperCount = $whitepaperCount + 1;
				} ?>
			</div>
		</section>
		</div>
	</div>
	<?php if ($pager): ?>
		<?php print $pager; ?>
	<?php endif; ?>
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



