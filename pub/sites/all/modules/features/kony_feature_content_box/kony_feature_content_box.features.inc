<?php
/**
 * @file
 * kony_feature_content_box.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_content_box_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_content_box_node_info() {
  $items = array(
    'kony_content_box' => array(
      'name' => t('BOX: Generic Content'),
      'base' => 'node_content',
      'description' => t('This is the merged content type for Value Props 1 & 2.  This content type has a title, body text, CTA, and an optional learn more link'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
