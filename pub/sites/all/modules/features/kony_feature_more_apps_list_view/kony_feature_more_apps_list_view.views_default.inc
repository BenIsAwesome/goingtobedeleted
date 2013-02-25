<?php
/**
 * @file
 * kony_feature_more_apps_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_more_apps_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'more_apps';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'More Apps';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Kony Applications';
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['columns'] = '6';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Icon Image */
  $handler->display->display_options['fields']['field_kony_app_icon_image']['id'] = 'field_kony_app_icon_image';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['table'] = 'field_data_field_kony_app_icon_image';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['field'] = 'field_kony_app_icon_image';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_icon_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['settings'] = array(
    'image_style' => '',
    'image_link' => 'content',
  );
  /* Field: Content: Kony App Title */
  $handler->display->display_options['fields']['field_kony_app_title']['id'] = 'field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['table'] = 'field_data_field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['field'] = 'field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_title']['element_type'] = 'h5';
  $handler->display->display_options['fields']['field_kony_app_title']['element_label_colon'] = FALSE;
  /* Field: Content: App Platform */
  $handler->display->display_options['fields']['field_kony_app_platform']['id'] = 'field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['table'] = 'field_data_field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['field'] = 'field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_platform']['element_class'] = 'group';
  $handler->display->display_options['fields']['field_kony_app_platform']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_platform']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_platform']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_kony_app_platform']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_kony_app_platform']['multi_type'] = 'ul';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Content: App Type (field_kony_app_type) */
  $handler->display->display_options['arguments']['field_kony_app_type_tid']['id'] = 'field_kony_app_type_tid';
  $handler->display->display_options['arguments']['field_kony_app_type_tid']['table'] = 'field_data_field_kony_app_type';
  $handler->display->display_options['arguments']['field_kony_app_type_tid']['field'] = 'field_kony_app_type_tid';
  $handler->display->display_options['arguments']['field_kony_app_type_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_kony_app_type_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_kony_app_type_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_kony_app_type_tid']['summary_options']['items_per_page'] = '25';
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
    'kony_app' => 'kony_app',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['path'] = 'more-apps';
  $export['more_apps'] = $view;

  return $export;
}
