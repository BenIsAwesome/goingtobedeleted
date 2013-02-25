<?php
/**
 * @file
 * kony_feature_company_profile.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_company_profile_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function kony_feature_company_profile_views_api() {
  return array("version" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function kony_feature_company_profile_node_info() {
  $items = array(
    'kony_company_profile' => array(
      'name' => t('Company Profile'),
      'base' => 'node_content',
      'description' => t('This is the content type that will hold all the info for the company\'s listed on the kony.com website'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
