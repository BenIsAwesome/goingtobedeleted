<?php
/**
 * @file
 * kony_feature_home_page_content.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_home_page_content_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_home_page_content_node_info() {
  $items = array(
    'kony_home_page_content' => array(
      'name' => t('Home Page Content'),
      'base' => 'node_content',
      'description' => t('Home Page Content'),
      'has_title' => '1',
      'title_label' => t('Business Headline'),
      'help' => '',
    ),
  );
  return $items;
}
