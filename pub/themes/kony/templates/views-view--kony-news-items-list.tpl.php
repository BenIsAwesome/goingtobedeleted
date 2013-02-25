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
$newsItemsArray = array();
foreach ($view->result as $newsItems) {
    $newsItemTitle = $newsItemDesc = $learnMorePath = $newsImagePath = $dateTime = "";
    if (count($newsItems->_field_data)) {
        $newsItemLoad = $newsItems->_field_data['nid']['entity'];
    } else {
        $newsItemLoad = node_load($newsItems->nid);
    }

    if (count($newsItemLoad->field_kony_news_headline)) {
        $newsItemTitle = $newsItemLoad->field_kony_news_headline['und'][0]['value'];
    } else {
        $newsItemTitle = str_replace('_', ' ', $newsItemLoad->title);
    }
    
    if (count($newsItemLoad->field_kony_news_img)) {
        $newsImagePath = file_create_url($newsItemLoad->field_kony_news_img['und'][0]['uri']);
    }
	if(count($newsItemLoad->field_kony_news_item_lnk)) {
	$linkText = $newsItemLoad->field_kony_news_item_lnk['und'][0]['title'];
	if(empty($linkText)) {
		$linkText = "View Now";
	}
	$linkURL = kony_custom_link($newsItemLoad->field_kony_news_item_lnk);
}
    if (empty($learnMorePath)) {
        $learnMorePath = "node/" . $newsItemLoad->nid;
    }
	
	if(count($newsItemLoad->field_kony_news_item_date)) {
		$dateTime = $newsItemLoad->field_kony_news_item_date['und'][0]['value'];
	}

    $newsItemsArray[] = array(
        'newsItemTitle' => $newsItemTitle,
        'newsImagePath' => $newsImagePath,
        'newsItemDesc' => $newsItemDesc,
        'learnMorePath' => $linkURL,
		'dateTime' => $dateTime
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
			<?php if(count($newsItemsArray)) {
				foreach($newsItemsArray as $eachNewsItem) { ?>
					<section class="master-1 master">
						<?php if(isset($eachNewsItem['newsImagePath']) && !empty($eachNewsItem['newsImagePath'])): ?>
						<img src="<?php print $eachNewsItem['newsImagePath'];?>" alt="<?php print $eachNewsItem['newsItemTitle'];?>" class="right">
						<?php endif; ?>
						<h3><?php print $eachNewsItem['newsItemTitle'];?></h3>
								<p><?php print date('M d, Y',$eachNewsItem['dateTime']); ?></p>
								<?php print render($eachNewsItem['newsItemDesc']); ?>								
								<div class="additional-info">
								<a target ="_blank" href="<?php print $eachNewsItem['learnMorePath'];  ?>">Read More <i class="icon-arrow-right"></i></a>
							</div>
					</section>
				<?php } 
			} ?>
			<?php if ($pager): ?>
				<?php print $pager; ?>
			<?php endif; ?>
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
