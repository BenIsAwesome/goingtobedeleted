<?php
/**
 * @file
 * kony_feature_static_about_us.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_static_about_us_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_static_about_us_node_info() {
  $items = array(
    'about_us' => array(
      'name' => t('About Us'),
      'base' => 'node_content',
      'description' => t('About Us page'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
