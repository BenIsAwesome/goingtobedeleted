<?php
/**
 * @file
 * kony_feature_app.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_app_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function kony_feature_app_views_api() {
  return array("version" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function kony_feature_app_node_info() {
  $items = array(
    'kony_app' => array(
      'name' => t('App'),
      'base' => 'node_content',
      'description' => t('This is the app content type that holds all the information for a specific app'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
