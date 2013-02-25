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


global $base_path;
$nodesArray = "";
$indexVal = 1;
$recordsLimit = 3;
foreach ($view->result as $tutorialListItems) {
	if (count($tutorialListItems->_field_data)) {
		$tutorialItemLoad = $tutorialListItems->_field_data['nid']['entity'];
	} else {
		$tutorialItemLoad = node_load($tutorialListItems->nid);
	}
	
	$tutorialTitle = $tutorialItemLoad->title;
	$tutorialLink = drupal_lookup_path('alias',"node/".$tutorialItemLoad->nid);
	$tutorialPostedDate = date_format_change($tutorialItemLoad->created);
	if($indexVal <= $recordsLimit) {
		if(!in_array($tutorialItemLoad->nid, $nodesArray)) {
			$tutorialsArray[] = array(
				'tutorialTitle'=>$tutorialTitle,
				'tutorialLink'=>$tutorialLink,
				'tutorialPostedDate'=>$tutorialPostedDate
			);
			$nodesArray[] = $tutorialItemLoad->nid;
			$indexVal++;
		}
	}
}
if(count($tutorialsArray) < $recordsLimit) {
	$viewCountData = views_get_view_result('kony_developer_tutorials', 'popular_tutorials_views');
	//print_r($viewCountData);
	foreach ($viewCountData as $tutorialListItems) {
		$tutorialItemLoad = "";
		if (count($tutorialListItems->_field_data)) {
			$tutorialItemLoad = $tutorialListItems->_field_data['nid']['entity'];
		} else {
			$tutorialItemLoad = node_load($tutorialListItems->nid);
		}
		
		$tutorialTitle = $tutorialItemLoad->title;
		$tutorialLink = drupal_lookup_path('alias',"node/".$tutorialItemLoad->nid);
		$tutorialPostedDate = date_format_change($tutorialItemLoad->created);
		if($indexVal <= $recordsLimit) {
			if(!in_array($tutorialItemLoad->nid, $nodesArray)) {
				$tutorialsArray[] = array(
					'tutorialTitle'=>$tutorialTitle,
					'tutorialLink'=>$tutorialLink,
					'tutorialPostedDate'=>$tutorialPostedDate
				);
				$nodesArray[] = $tutorialItemLoad->nid;
				$indexVal++;
			}
		}
	}
}
//echo "<pre>";
//print_r($view->result);

?>
<div class="resource six">
	<h4>Popular Tutorials</h4>
	<section class="cloud-docs-utility-bar nav-margin" id="utility-bar">
		<div class="container group dev-home-tut" id="recent-blog">
			<?php foreach ($tutorialsArray as $eachTutorial) { ?>
				<a href="<?php print $base_path.$eachTutorial['tutorialLink']; ?>"><?php print $eachTutorial['tutorialTitle']; ?></a>
				<p><?php print $eachTutorial['tutorialPostedDate']; ?></p>
			<?php } ?>
		</div>
	</section>
</div>

