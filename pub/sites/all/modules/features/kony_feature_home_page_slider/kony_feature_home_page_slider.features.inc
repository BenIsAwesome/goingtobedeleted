<?php
/**
 * @file
 * kony_feature_home_page_slider.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_home_page_slider_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_home_page_slider_node_info() {
  $items = array(
    'kony_home_page_slider' => array(
      'name' => t('Home Page Slider'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
