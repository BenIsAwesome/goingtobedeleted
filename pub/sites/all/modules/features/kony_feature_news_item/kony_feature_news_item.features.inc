<?php
/**
 * @file
 * kony_feature_news_item.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function kony_feature_news_item_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function kony_feature_news_item_node_info() {
  $items = array(
    'kony_news_item' => array(
      'name' => t('RES: News Item'),
      'base' => 'node_content',
      'description' => t('Represents a news item and a link back to the original internet article.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
