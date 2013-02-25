<?php
/**
 * @file
 * kony_feature_press_release.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_press_release_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_press_release_node_info() {
  $items = array(
    'kony_press_release' => array(
      'name' => t('RES: Press Release'),
      'base' => 'node_content',
      'description' => t('This is the press release content type that holds all the information of press releases'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
