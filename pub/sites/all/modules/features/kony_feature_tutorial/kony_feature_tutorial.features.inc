<?php
/**
 * @file
 * kony_feature_tutorial.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_tutorial_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_tutorial_node_info() {
  $items = array(
    'kony_tutorial' => array(
      'name' => t('RES: Tutorial'),
      'base' => 'node_content',
      'description' => t('The Tutorial content type is used to reference a hosted video and is displayed on the Tutorials page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
