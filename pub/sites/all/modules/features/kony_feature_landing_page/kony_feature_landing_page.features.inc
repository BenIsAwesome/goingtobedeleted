<?php
/**
 * @file
 * kony_feature_landing_page.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_landing_page_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_landing_page_node_info() {
  $items = array(
    'kony_landing_page' => array(
      'name' => t('Landing Page'),
      'base' => 'node_content',
      'description' => t('This is the generic landing page content type for kony 2.0'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
