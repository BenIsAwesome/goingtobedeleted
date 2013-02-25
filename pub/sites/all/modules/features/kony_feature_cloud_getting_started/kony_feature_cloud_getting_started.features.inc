<?php
/**
 * @file
 * kony_feature_cloud_getting_started.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_cloud_getting_started_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_cloud_getting_started_node_info() {
  $items = array(
    'kony_cloud_getting_started' => array(
      'name' => t('Getting Started'),
      'base' => 'node_content',
      'description' => t('This is a content type '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
