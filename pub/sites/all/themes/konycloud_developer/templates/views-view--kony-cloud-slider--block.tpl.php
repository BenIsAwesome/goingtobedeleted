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
$slidersArray = array();

?>
<div id="intro-slider" class="flexslider dev-home-slide">
    <ul class="slides">
<?php 
foreach ($view->result as $slidersItems) {

$slideObj = $slidersItems->_field_data['nid']['entity'];
$slidesCount = 0;
	foreach($slideObj->field_kony_fs_sldshw_image['und'] as $slideshowList) {
                $slidesCount = $slidesCount + 1;
		//print_r($slideshowList);
                $slideShowPath = file_create_url($slideshowList['uri']);
                $slideAltTextasDescription = $slideshowList['alt'];
                $slideTitleTextasHeadline = $slideshowList['title'];
         ?>
              <li style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item; " class="<?php if($slidesCount == 1) {print 'flex-active-slide';}?>">
                      <img class="developerImg"  src="<?php print $slideShowPath;?>" alt="<?php print $node->title; ?>">
                  </li>
       <?php
        }
}
?>
</ul>
</div>
