<?php
/**
 * @file
 * kony_feature_webinar_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_webinar_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'all_webinars';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'All Webinars';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'WEBINARS LIST';
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
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
  /* Field: Content: Date */
  $handler->display->display_options['fields']['field_kony_webinar_date']['id'] = 'field_kony_webinar_date';
  $handler->display->display_options['fields']['field_kony_webinar_date']['table'] = 'field_data_field_kony_webinar_date';
  $handler->display->display_options['fields']['field_kony_webinar_date']['field'] = 'field_kony_webinar_date';
  /* Field: Content: Registration Link */
  $handler->display->display_options['fields']['field_kony_webinar_reg_link']['id'] = 'field_kony_webinar_reg_link';
  $handler->display->display_options['fields']['field_kony_webinar_reg_link']['table'] = 'field_data_field_kony_webinar_reg_link';
  $handler->display->display_options['fields']['field_kony_webinar_reg_link']['field'] = 'field_kony_webinar_reg_link';
  /* Sort criterion: Content: Date (field_kony_webinar_date) */
  $handler->display->display_options['sorts']['field_kony_webinar_date_value']['id'] = 'field_kony_webinar_date_value';
  $handler->display->display_options['sorts']['field_kony_webinar_date_value']['table'] = 'field_data_field_kony_webinar_date';
  $handler->display->display_options['sorts']['field_kony_webinar_date_value']['field'] = 'field_kony_webinar_date_value';
  $handler->display->display_options['sorts']['field_kony_webinar_date_value']['order'] = 'DESC';
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
    'kony_webinar_' => 'kony_webinar_',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['path'] = 'resources/webinars';
  $export['all_webinars'] = $view;

  return $export;
}
