<?php
/**
 * @file
 * kony_feature_box_customer_cta.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_box_customer_cta_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_box_customer_cta_node_info() {
  $items = array(
    'kony_box_customer_cta' => array(
      'name' => t('Box: Customer CTA'),
      'base' => 'node_content',
      'description' => t('This is used to create a reference to a customer profile that is displayed on landing pages.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
