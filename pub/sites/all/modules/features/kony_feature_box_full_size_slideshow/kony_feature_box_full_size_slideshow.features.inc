<?php
/**
 * @file
 * kony_feature_box_full_size_slideshow.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_box_full_size_slideshow_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_box_full_size_slideshow_node_info() {
  $items = array(
    'kony_box_full_size_slideshow' => array(
      'name' => t('BOX:Full-Size Slideshow'),
      'base' => 'node_content',
      'description' => t('The idea here is that to scroll through the full-size screenshots for a given product'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
