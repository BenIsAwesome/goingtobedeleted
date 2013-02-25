<?php
/**
 * @file
 * kony_feature_white_paper.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_white_paper_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_white_paper_node_info() {
  $items = array(
    'kony_white_paper' => array(
      'name' => t('RES: White Paper'),
      'base' => 'node_content',
      'description' => t('The White Paper content type is used to upload a pdf file that is used in a CTA and displayed in the Resources Section.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
