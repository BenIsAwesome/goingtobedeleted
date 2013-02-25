<?php
/**
 * @file
 * kony_feature_data_sheet.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_data_sheet_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_data_sheet_node_info() {
  $items = array(
    'kony_data_sheet' => array(
      'name' => t('RES: Data Sheet'),
      'base' => 'node_content',
      'description' => t('The Data Sheet content type is used to upload a pdf file that is used in a CTA and displayed on the resources pages.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
