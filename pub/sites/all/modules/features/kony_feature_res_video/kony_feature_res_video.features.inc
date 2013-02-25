<?php
/**
 * @file
 * kony_feature_res_video.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_res_video_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_res_video_node_info() {
  $items = array(
    'kony_video' => array(
      'name' => t('RES: Video'),
      'base' => 'node_content',
      'description' => t('A video resource that is used on the site in places other than webinars and tutorials.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
