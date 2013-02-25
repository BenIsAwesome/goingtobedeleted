<?php
/**
 * @file
 * kony_feature_res_infographic.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_res_infographic_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_res_infographic_node_info() {
  $items = array(
    'kony_infographic' => array(
      'name' => t('RES: Infographic'),
      'base' => 'node_content',
      'description' => t('An info graphic that displays in a modal window'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
