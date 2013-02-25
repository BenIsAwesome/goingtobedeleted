<?php
/**
 * @file
 * kony_feature_news_items_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_news_items_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_news_items_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'News Items List';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'News Items List';
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  /* Field: Content: Image */
  $handler->display->display_options['fields']['field_kony_news_img']['id'] = 'field_kony_news_img';
  $handler->display->display_options['fields']['field_kony_news_img']['table'] = 'field_data_field_kony_news_img';
  $handler->display->display_options['fields']['field_kony_news_img']['field'] = 'field_kony_news_img';
  $handler->display->display_options['fields']['field_kony_news_img']['label'] = '';
  $handler->display->display_options['fields']['field_kony_news_img']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_news_img']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_news_img']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: News Date */
  $handler->display->display_options['fields']['field_kony_news_item_date']['id'] = 'field_kony_news_item_date';
  $handler->display->display_options['fields']['field_kony_news_item_date']['table'] = 'field_data_field_kony_news_item_date';
  $handler->display->display_options['fields']['field_kony_news_item_date']['field'] = 'field_kony_news_item_date';
  $handler->display->display_options['fields']['field_kony_news_item_date']['label'] = '';
  $handler->display->display_options['fields']['field_kony_news_item_date']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_news_item_date']['settings'] = array(
    'format_type' => 'long',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
  );
  /* Field: Content: News Link */
  $handler->display->display_options['fields']['field_kony_news_item_lnk']['id'] = 'field_kony_news_item_lnk';
  $handler->display->display_options['fields']['field_kony_news_item_lnk']['table'] = 'field_data_field_kony_news_item_lnk';
  $handler->display->display_options['fields']['field_kony_news_item_lnk']['field'] = 'field_kony_news_item_lnk';
  $handler->display->display_options['fields']['field_kony_news_item_lnk']['label'] = '';
  $handler->display->display_options['fields']['field_kony_news_item_lnk']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_news_item_lnk']['click_sort_column'] = 'url';
  /* Sort criterion: Content: News Date (field_kony_news_item_date) */
  $handler->display->display_options['sorts']['field_kony_news_item_date_value']['id'] = 'field_kony_news_item_date_value';
  $handler->display->display_options['sorts']['field_kony_news_item_date_value']['table'] = 'field_data_field_kony_news_item_date';
  $handler->display->display_options['sorts']['field_kony_news_item_date_value']['field'] = 'field_kony_news_item_date_value';
  $handler->display->display_options['sorts']['field_kony_news_item_date_value']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'kony_news_item' => 'kony_news_item',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['path'] = 'news-items-list';
  $export['kony_news_items_list'] = $view;

  return $export;
}
