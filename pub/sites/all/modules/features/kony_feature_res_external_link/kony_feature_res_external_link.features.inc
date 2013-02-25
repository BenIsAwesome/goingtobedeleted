<?php
/**
 * @file
 * kony_feature_res_external_link.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_res_external_link_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_res_external_link_node_info() {
  $items = array(
    'kony_external_link' => array(
      'name' => t('RES: External Link'),
      'base' => 'node_content',
      'description' => t('This content type is used to create an external link so that it can be referenced throughout the site and if the link changes, it can be updated in one place.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
