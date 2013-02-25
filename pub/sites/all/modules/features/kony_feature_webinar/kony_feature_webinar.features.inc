<?php
/**
 * @file
 * kony_feature_webinar.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_webinar_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_webinar_node_info() {
  $items = array(
    'kony_webinar_' => array(
      'name' => t('RES: Webinar'),
      'base' => 'node_content',
      'description' => t('The Webinar content type is used to define an upcoming or past webinar event.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
