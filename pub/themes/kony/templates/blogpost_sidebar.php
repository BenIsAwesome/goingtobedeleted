<!-- aside for categories and archives -->
<style>
.kony-feature-blog-archives dt {
	border: 1px solid #F2F2F2;
    display: block;
    padding-left: 15px;
    text-decoration: none;
	color: #0074BC;
	cursor: pointer;
}
.archive-months {
	margin-left:15px !important;
	display:none;
}
</style>
<aside id="sidebar-blog">
	<?php 
	if($taxonomyId) {
		$categoryTerm = taxonomy_term_load($taxonomyId);
		$postCategories = taxonomy_get_tree($categoryTerm->vid);
		if(count($postCategories)) { ?>
			<div class="kony-feature-blog-categories">
				<h3><i class="icon-th-list"></i> Categories</h3>
				<ul>
				<?php foreach($postCategories as $postCategory) { ?>
					<li><a href="/resources/blogs/<?php print str_replace(" ", "-", $postCategory->name);?>">
						<i class="icon-chevron-right"></i> <?php print $postCategory->name;?></a>
					</li>
				<?php } ?>
				</ul>
			</div>	
		<?php 
		}
	} ?>
		
		
	<div class="kony-feature-blog-archives">
		<h3><i class="icon-list-alt"></i> Archives</h3>
		<?php
		$view_name = 'blog_posts_archives';
		$view_result = views_get_view_result($view_name);
		$yearsList = $monthsList = array();
		foreach($view_result as $yearsListObj) {
			$yearVal = substr($yearsListObj->created_year_month,0,4);
			$monthVal = substr($yearsListObj->created_year_month,4,2);
			if(!in_array($yearVal, $yearsList) && strlen($yearsListObj->created_year_month) >3) {
				if(!in_array($monthVal, $monthsList)) {
					$yearsList[$yearVal][] = array(
						'month' => $monthVal,
						'recordsCount' => $yearsListObj->num_records,
					);
				}
			}
		}
		?>
		<?php 
		foreach($yearsList as $yearVal => $monthsList) {?>
			<dl class="group">
				<dt><i class="icon-chevron-right"></i> <?php print $yearVal; ?></dt>
			</dl>
			<ul class="archive-months">
			<?php
			foreach($monthsList as $monthVal) {
				$timestamp = mktime(0, 0, 0, $monthVal['month'], 1);
				$monthName = date('F', $timestamp );?>
				<li>
					<a href="/archive-posts/<?php print $yearVal;?>/<?php print $monthVal['month'];?>">
						<i class="icon-chevron-right"></i>
						<?php print $monthName." (".$monthVal['recordsCount'].")"; ?>
					</a>
				</li>
			<?php } ?>
			</ul>
		<?php } ?>
	</div>    
</aside>
