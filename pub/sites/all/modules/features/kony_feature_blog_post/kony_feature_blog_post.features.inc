<?php
/**
 * @file
 * kony_feature_blog_post.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_blog_post_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_blog_post_node_info() {
  $items = array(
    'kony_blog_post' => array(
      'name' => t('RES: Blog Post'),
      'base' => 'node_content',
      'description' => t('A blog post for the site'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
