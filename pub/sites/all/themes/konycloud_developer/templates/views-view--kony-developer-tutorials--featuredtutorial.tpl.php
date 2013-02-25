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
global $base_path,$theme_path;

//echo "<pre>";
foreach($view->result as $latestTutorialItems)
{
	if (count($latestTutorialItems->_field_data)) {
		$latestTutorial = $latestTutorialItems->_field_data['nid']['entity'];
	} else {
		$latestTutorial = node_load($latestTutorialItems->nid);
	}
}	
	

//print_r($latestTutorial);
$latestTutorialHeadline = $latestTutorial->field_kony_dev_tut_headline['und'][0]['value'];
$latestTutorialImage = file_create_url($latestTutorial->field_kony_dev_tut_image['und'][0]['uri']);
$latestTutorialVideoLink = $latestTutorial->field_kony_dev_tut_video_link['und'][0]['url'];
?>
<div class="col">
                <h4>
		<span class="featured-tutorial-icn">Latest Tutorial</span></h4>
		<p class="dev-front-spacing">
                 <a class="fancybox-video" href="<?php print $latestTutorialVideoLink; ?>">
		<img src="<?php print $latestTutorialImage; ?>" alt="<?php print $latestTutorialHeadline; ?>" style="width: 293px;height: 172px">
		</a>
		</p>
</div>
