<?php
/**
 * @file
 * kony_feature_job_posting.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_job_posting_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_job_posting_node_info() {
  $items = array(
    'kony_job_posting' => array(
      'name' => t('Job Posting'),
      'base' => 'node_content',
      'description' => t('A job posting for display to the public.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
