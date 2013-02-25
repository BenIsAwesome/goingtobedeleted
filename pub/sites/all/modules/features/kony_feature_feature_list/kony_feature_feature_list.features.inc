<?php
/**
 * @file
 * kony_feature_feature_list.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_feature_list_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_feature_list_node_info() {
  $items = array(
    'kony_features_list' => array(
      'name' => t('BOX: Feature List'),
      'base' => 'node_content',
      'description' => t('A repeatable list of a headline, body copy, and an image that can describe a highlighted feature of a product or service. This is a standalone content type, used by but separate from the "Tabbed Content" content type.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
