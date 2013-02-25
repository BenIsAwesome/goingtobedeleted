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

//echo "<pre>";
//print_r($view->result);

?>
<div class="resource six img-width">

		<h4>Recent Blog Posts</h4>
		<section class="cloud-docs-utility-bar nav-margin" id="utility-bar">
		<div class="container group dev-home-tut" id="recent-blog">
<?php
foreach ($view->result as $blogPostItems) {
	if (count($blogPostItems->_field_data)) {
		$blogPostLoad = $blogPostItems->_field_data['nid']['entity'];
	} else {
		$blogPostLoad = node_load($blogPostItems->nid);
	}
	
	$blogTitle = $blogPostLoad->title;
	$blogLink = drupal_lookup_path('alias',"node/".$blogPostLoad->nid);
	$blogPostedDate = date_format_change($blogPostLoad->created);
	
	
	
?>

	<a href="<?php print $blogLink; ?>"><?php print $blogTitle; ?></a>
	<p><?php print $blogPostedDate; ?></p>

<?php } ?>
		
	</div>
	</section>
</div>
