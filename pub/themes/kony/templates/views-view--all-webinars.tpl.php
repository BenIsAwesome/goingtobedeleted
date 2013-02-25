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
$current_date = strtotime('now');
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
				$webinarsCount = 1;
				foreach($view->result as $webinarsViewItem) {                                    
					if(isset($webinarsViewItem->_field_data)) {
						$webinarItemSingle = $webinarsViewItem->_field_data['nid']['entity'];                                                
					} else {
						$webinarItemSingle = node_load($webinarsViewItem->nid);
					}
					if(count($webinarItemSingle->field_kony_webinar_video_link)) {
						$webinar_watch_Path = $webinarItemSingle->field_kony_webinar_video_link['und'][0]['url'];
					}
					if(count($webinarItemSingle->field_kony_webinar_reg_link)) {
						$webinar_register_Path = $webinarItemSingle->field_kony_webinar_reg_link['und'][0]['url'];
					}
					if(count($webinarItemSingle->field_kony_webinar_date)) {
						$timestamp = $webinarItemSingle->field_kony_webinar_date['und'][0]['value'];
						$gmtDate = gmdate('D, M j, Y g A', $timestamp);
						
						$gDate = gmdate('Y-m-d H:i:s', $timestamp);
						//Date IN GMT Timezone
						$date1 = date_create($gDate, timezone_open('GMT'));
						
						//EST Date Format
						date_timezone_set($date1, timezone_open('America/New_York'));
						$estDate = date_format($date1, 'g A');
						
						//PST Date Format
						date_timezone_set($date1, timezone_open('America/Los_Angeles'));
						$pstDate = date_format($date1, 'g A');
						
					}
					if(count($webinarItemSingle->field_kony_webinar_image)) {
						$webinarImage = file_create_url($webinarItemSingle->field_kony_webinar_image['und'][0]['uri']);
					}
					if((count($webinarItemSingle->field_kony_webinar_headline)) && (isset($webinarItemSingle->field_kony_webinar_headline))) {
						$webinarTitle = $webinarItemSingle->field_kony_webinar_headline['und'][0]['value'];
					} else {
						 $webinarTitle = str_replace('_', ' ', $webinarItemSingle->title);
                                                 $webinarTitle = str_replace('RES ', '', $webinarTitle);
					}
                                         $webinarLink = drupal_lookup_path('alias', 'node/'.$webinarItemSingle->nid);
					?>
					<div class="resource three">
						
						<h4><?php print $webinarTitle; ?></h4>
						<?php if(count($webinarItemSingle->field_kony_webinar_date) && $webinarItemSingle->field_kony_webinar_date['und'][0]['value'] > time()): ?>
						<?php echo $gmtDate; ?> GMT/ <?php echo $estDate; ?> EST/ <?php echo $pstDate; ?> PST<br>
						<?php endif; ?>
						<?php
							$webinarItemDesc = field_view_field('node', $webinarItemSingle, 'body', 'teaser');
                            print render($webinarItemDesc);
                        ?>                                                
						<?php if($current_date > $timestamp) {?>
							<a class="button" href="/<?php print $webinarLink;?>">Watch <i class="icon-play-circle"></i></a>
						<?php } else {?>
							<a class="button" href="/<?php print $webinarLink;?>">Register <i class="icon-arrow-right"></i></a>
						<?php } ?>
					</div>
				<?php 
					if($webinarsCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$webinarsCount = $webinarsCount + 1;
				} ?>
			</div>
                        <div class="clearfix"></div>
			
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

