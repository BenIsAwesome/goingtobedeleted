<?php
/**
 * @file
 * kony_feature_leadership.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_leadership_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_leadership_node_info() {
  $items = array(
    'kony_leadership' => array(
      'name' => t('leadership'),
      'base' => 'node_content',
      'description' => t('Kony\'s senior leadership team is comprised of global professionals distinguished for their vision and execution. The team is experienced, passionate and dedicated to making the decisions that matter to Kony.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
