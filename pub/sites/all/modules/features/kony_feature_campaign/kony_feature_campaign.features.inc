<?php
/**
 * @file
 * kony_feature_campaign.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_campaign_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_campaign_node_info() {
  $items = array(
    'res_campaigns' => array(
      'name' => t('RES: Campaigns'),
      'base' => 'node_content',
      'description' => t('The Campaigns content type is used to define a Landing page content.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
