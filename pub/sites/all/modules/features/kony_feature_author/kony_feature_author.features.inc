<?php
/**
 * @file
 * kony_feature_author.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_author_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_author_node_info() {
  $items = array(
    'kony_author' => array(
      'name' => t('Author'),
      'base' => 'node_content',
      'description' => t('Author content type for developer tutorial'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
