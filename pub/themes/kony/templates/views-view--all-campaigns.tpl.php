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
				$campaignsCount = 1;
				foreach($view->result as $campaignsViewItem) { 
					if(isset($campaignsViewItem->_field_data)) {
						$campaignsItemSingle = $campaignsViewItem->_field_data['nid']['entity'];
					} else {
						$campaignsItemSingle = node_load($campaignsViewItem->nid);
					}
					if(count($campaignsItemSingle->field_kony_campaigns_video_link)) {
						$campaigns_watch_Path = $campaignsItemSingle->field_kony_campaigns_video_link['und'][0]['url'];
					}
					if(count($campaignsItemSingle->field_kony_campaigns_reg_link)) {
						$campaigns_register_Path = $campaignsItemSingle->field_kony_campaigns_reg_link['und'][0]['url'];
					}
					if(count($campaignsItemSingle->field_kony_campaigns_date)) {
						$timestamp = $campaignsItemSingle->field_kony_campaigns_date['und'][0]['value'];
					}
					if(count($campaignsItemSingle->field_kony_campaigns_image)) {
						$campaignsImage = file_create_url($campaignsItemSingle->field_kony_campaigns_image['und'][0]['uri']);
					}
					if((count($campaignsItemSingle->field_kony_campaigns_headline)) && (isset($campaignsItemSingle->field_kony_campaigns_headline))) {
						$campaignsTitle = $campaignsItemSingle->field_kony_campaigns_headline['und'][0]['value'];
					} else {
						$campaignsTitle = $campaignsItemSingle->title;
					}
					?>
					<div class="resource three">
						<?php if($campaignsImage) {?>
							<img alt="<?php print $campaignsTitle; ?>" src="<?php print $campaignsImage; ?>">
						<?php } ?>
						<h4><?php print $campaignsTitle; ?></h4>
						<?php if(count($campaignsItemSingle->body)) {
							if(!empty($campaignsItemSingle->body['und'][0]['summary'])) {
								print $campaignsItemDesc = $campaignsItemSingle->body['und'][0]['summary'];
							} else {
								$campaignsItemDesc = field_view_field('node', $campaignsItemSingle, 'body', 'teaser');
								print render($campaignsItemDesc);
							}
						} ?>
						<?php if($current_date > $timestamp) {?>
							<a class="button" href="<?php print $campaigns_watch_Path;?>">Watch <i class="icon-play-circle"></i></a>
						<?php } else {?>
							<a class="button" href="<?php print $campaigns_register_Path;?>">Register <i class="icon-arrow-right"></i></a>
						<?php } ?>
					</div>
				<?php 
					if($campaignsCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$campaignsCount = $campaignsCount + 1;
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



