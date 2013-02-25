<?php
/**
 * @file
 * kony_feature_resource_list.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_resource_list_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_resource_list_node_info() {
  $items = array(
    'kony_resource_list' => array(
      'name' => t('BOX: Resource List'),
      'base' => 'node_content',
      'description' => t('A list of links to "Resource" content types, e.g. White Paper, Case Study, Webinars.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
