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
				$tutorialCount = 1;
				foreach($view->result as $tutorialItem) {
					if(count($datasheetItem->_field_data)) {
						$tutorialItemLoad = $tutorialItem->_field_data['nid']['entity'];
					} else {
						$tutorialItemLoad = node_load($tutorialItem->nid);
					}
					$path = kony_custom_link($tutorialItemLoad->field_kony_tutorial_video_link);
					$tutorialImage = file_create_url($tutorialItemLoad->field_kony_tutorial_image['und'][0]['uri']);
					if(count($tutorialItemLoad->field_kony_tutorial_headline)) {
						$tutorialTitle = $tutorialItemLoad->field_kony_tutorial_headline['und'][0]['value'];
					} else {
						$tutorialTitle = str_replace('_', ' ', $tutorialItemLoad->title);
                                                $tutorialTitle = str_replace('RES ', '', $tutorialTitle);
					} ?>
					<div class="resource three">
						<?php if(count($tutorialItemLoad->field_kony_tutorial_image)): ?>
						<img alt="<?php print $tutorialTitle; ?>" src="<?php print $tutorialImage; ?>">
						<?php endif; ?>
						<h4><?php print $tutorialTitle; ?></h4>
						<?php
                                                    $tutorialItemDesc = field_view_field('node', $tutorialItemLoad, 'body', 'teaser');
                                                    print render($tutorialItemDesc);
                                                ?>
						<a class="button video-placeholder fancybox-video right" href="<?php print $path; ?>">Watch <i class="icon-play-circle"></i></a>
					</div>
				<?php 
					if($tutorialCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$tutorialCount = $tutorialCount + 1;
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
