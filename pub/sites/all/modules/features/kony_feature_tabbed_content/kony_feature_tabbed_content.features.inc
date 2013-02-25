<?php
/**
 * @file
 * kony_feature_tabbed_content.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_tabbed_content_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_tabbed_content_node_info() {
  $items = array(
    'kony_tabbed_content' => array(
      'name' => t('BOX: Tabbed Content'),
      'base' => 'node_content',
      'description' => t('A content box that renders its sections as interactive tabs that contain one or two columns of body copy, a "Feature List", or a "CTA".'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
