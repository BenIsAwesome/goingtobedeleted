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
$view_name = 'blog_articles_list';
$view_result = views_get_view_result($view_name);
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
		<div class="container group" id="pri-content">
			<div id="posts">
				<?php foreach($view_result as $item) { ?>
				<article class="kony-feature-blog-tease">
					<h3><?php print $item->_field_data['nid']['entity']->title; ?></h3>
					<?php $postImgPath = file_create_url($item->_field_data['nid']['entity']->field_image['und'][0]['uri']); ?>
					<img class="five right" alt="<?php print $item->_field_data['nid']['entity']->title; ?>" src="<?php print $postImgPath; ?>">
					<p class="byline">By <?php print $item->_field_data['nid']['entity']->name; ?> <span>on <?php print date("M d", $item->_field_data['nid']['entity']->created); //Oct 11, 2012?></span></p>
					<p><?php print substr($item->_field_data['nid']['entity']->body['und'][0]['value'],0,500)."...";?></p>
					<div class="additional-info">
						<?php $postPath = "/".drupal_lookup_path('alias', 'node/'.$item->_field_data['nid']['entity']->nid);?>
						<a href="<?php print $postPath; ?>">Read more <i class="icon-arrow-right"></i></a>
					</div>
				</article>
				<?php } ?>
				<div class="additional-info">
				<?php if ($pager): ?>
					<?php print $pager; ?>
				<?php endif; ?>
			</div>
			</div>
			

			<!-- aside for categories and archives? -->
			<aside id="sidebar-blog">
				<?php 
				$postCategories = taxonomy_get_tree(2);
				if(count($postCategories)) { ?>
					<div class="kony-feature-blog-categories">
						<h3><i class="icon-th-list"></i> Categories</h3>
						<ul>
						<?php foreach($postCategories as $postCategory) {?>
							<li><a href="/related-posts/<?php print $postCategory->tid;?>"><i class="icon-chevron-right"></i> <?php print $postCategory->name;?></a></li>
						<?php } ?>
						</ul>
					</div>	
				<?php } ?>
					
					
				<div class="kony-feature-blog-archives">
					<h3><i class="icon-list-alt"></i> Archives</h3>
					<?php
					 $view_name = 'blog_posts_archives';
					 $view_result = views_get_view_result($view_name);
					 $yearsList = array();
					foreach($view_result as $yearsListObj) {
						if(!in_array(substr($yearsListObj->created_year_month,0,4),$yearsList) && strlen($yearsListObj->created_year_month) >3) {
							$yearsList[] = substr($yearsListObj->created_year_month,0,4);
						}
					}
					?>
					<ul>
						<?php 
						foreach($yearsList as $yearVal) {?>
							<li><a href="/archive-posts/<?php print $yearVal;?>"><i class="icon-chevron-right"></i><?php print $yearVal; ?></a></li>
						<?php } ?>
					</ul>
				</div>    
			</aside>
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

				
			
