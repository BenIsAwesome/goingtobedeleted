<?php
/**
 * @file
 * kony_feature_next_steps_cta.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_next_steps_cta_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_next_steps_cta_node_info() {
  $items = array(
    'kony_next_steps_cta' => array(
      'name' => t('BOX: Next Steps'),
      'base' => 'node_content',
      'description' => t('The "Next Steps" CTA links three "Box or Banner" CTAs into a single box (a la Content Box) and should only be used on a Landing Page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
