<?php
/**
 * @file
 * kony_feature_res_app_demo.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_res_app_demo_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_res_app_demo_node_info() {
  $items = array(
    'kony_app_demo' => array(
      'name' => t('RES: Demo'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
