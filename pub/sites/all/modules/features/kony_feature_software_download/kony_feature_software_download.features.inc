<?php
/**
 * @file
 * kony_feature_software_download.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_software_download_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_software_download_node_info() {
  $items = array(
    'kony_software_download' => array(
      'name' => t('Software Download'),
      'base' => 'node_content',
      'description' => t('This Content type is used to create Software Download'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
