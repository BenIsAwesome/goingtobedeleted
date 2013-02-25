<?php
/**
 * @file
 * kony_feature_product_details.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_product_details_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_product_details_node_info() {
  $items = array(
    'kony_product_details' => array(
      'name' => t('Product Details'),
      'base' => 'node_content',
      'description' => t('Product Details'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
