<?php
/**
 * @file
 * kony_feature_investors.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_investors_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function kony_feature_investors_views_api() {
  return array("version" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function kony_feature_investors_node_info() {
  $items = array(
    'kony_investors' => array(
      'name' => t('Investors'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
