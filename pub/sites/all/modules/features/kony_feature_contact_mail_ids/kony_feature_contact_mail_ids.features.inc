<?php
/**
 * @file
 * kony_feature_contact_mail_ids.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_contact_mail_ids_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_contact_mail_ids_node_info() {
  $items = array(
    'kony_contact_mail_ids' => array(
      'name' => t('Contact Mail Ids'),
      'base' => 'node_content',
      'description' => t('Contact Mail Ids'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
