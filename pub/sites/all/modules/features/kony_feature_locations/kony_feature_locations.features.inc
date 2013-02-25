<?php
/**
 * @file
 * kony_feature_locations.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_locations_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_locations_node_info() {
  $items = array(
    'kony_locations' => array(
      'name' => t('Locations'),
      'base' => 'node_content',
      'description' => t('Locations'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
