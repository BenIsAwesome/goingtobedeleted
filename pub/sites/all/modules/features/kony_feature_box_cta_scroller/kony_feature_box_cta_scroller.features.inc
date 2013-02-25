<?php
/**
 * @file
 * kony_feature_box_cta_scroller.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_box_cta_scroller_ctools_plugin_api() {
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
 * Implements hook_node_info().
 */
function kony_feature_box_cta_scroller_node_info() {
  $items = array(
    'kony_box_cta_scroller' => array(
      'name' => t('BOX: CTA Scroller'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
