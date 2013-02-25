<?php
/**
 * @file
 * kony_feature_comparison_content.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_comparison_content_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_comparison_content_node_info() {
  $items = array(
    'kony_comparison_content' => array(
      'name' => t('BOX: Comparison'),
      'base' => 'node_content',
      'description' => t('This is where we properly define the Kony Comparison section'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
