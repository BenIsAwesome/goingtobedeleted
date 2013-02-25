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
$resultObject = $view->result[0];
$dataObject = $resultObject->_field_data['nid']['entity'];

$videoLink = $dataObject->field_kony_dev_tut_video_link['und'][0]['url'];
$imageLink = file_create_url($dataObject->field_kony_dev_tut_image['und'][0]['uri']);
?>


<a class="video-placeholder fancybox-video" href="<?php print $videoLink ?>"><img src="<?php print $imageLink;?>"></a>
