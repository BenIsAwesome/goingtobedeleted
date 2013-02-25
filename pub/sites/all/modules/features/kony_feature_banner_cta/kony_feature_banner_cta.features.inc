<?php
/**
 * @file
 * kony_feature_banner_cta.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_banner_cta_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_banner_cta_node_info() {
  $items = array(
    'kony_banner_cta' => array(
      'name' => t('BOX: Banner CTA'),
      'base' => 'node_content',
      'description' => t('The "Banner CTA" content type is used to link a "Resource" (RES), "Landing Page", or other content type on a "Landing Page".'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
