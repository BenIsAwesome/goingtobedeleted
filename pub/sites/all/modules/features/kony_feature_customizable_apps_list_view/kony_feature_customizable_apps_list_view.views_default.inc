<?php
/**
 * @file
 * kony_feature_customizable_apps_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_customizable_apps_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'customizable_apps_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Customizable Apps List';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Customizable Apps List';
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'View more apps';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
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
    'image_link' => '',
  );
  /* Field: Content: App Name */
  $handler->display->display_options['fields']['field_kony_app_title']['id'] = 'field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['table'] = 'field_data_field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['field'] = 'field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_title']['type'] = 'text_plain';
  /* Field: Content: App Type */
  $handler->display->display_options['fields']['field_kony_app_type']['id'] = 'field_kony_app_type';
  $handler->display->display_options['fields']['field_kony_app_type']['table'] = 'field_data_field_kony_app_type';
  $handler->display->display_options['fields']['field_kony_app_type']['field'] = 'field_kony_app_type';
  $handler->display->display_options['fields']['field_kony_app_type']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_type']['type'] = 'taxonomy_term_reference_plain';
  /* Field: Content: App Platform */
  $handler->display->display_options['fields']['field_kony_app_platform']['id'] = 'field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['table'] = 'field_data_field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['field'] = 'field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_platform']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_platform']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_kony_app_platform']['delta_offset'] = '0';
  /* Field: Global: View result counter */
  $handler->display->display_options['fields']['counter']['id'] = 'counter';
  $handler->display->display_options['fields']['counter']['table'] = 'views';
  $handler->display->display_options['fields']['counter']['field'] = 'counter';
  $handler->display->display_options['fields']['counter']['label'] = '';
  $handler->display->display_options['fields']['counter']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['counter']['counter_start'] = '1';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
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
  $handler->display->display_options['filters']['type']['exposed'] = TRUE;
  $handler->display->display_options['filters']['type']['expose']['operator_id'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['label'] = 'Type';
  $handler->display->display_options['filters']['type']['expose']['operator'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['identifier'] = 'type';

  /* Display: Customizable Apps LIst */
  $handler = $view->new_display('block', 'Customizable Apps LIst', 'all_apps_block');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Icon Image */
  $handler->display->display_options['fields']['field_kony_app_icon_image']['id'] = 'field_kony_app_icon_image';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['table'] = 'field_data_field_kony_app_icon_image';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['field'] = 'field_kony_app_icon_image';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_icon_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_app_icon_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: App Name */
  $handler->display->display_options['fields']['field_kony_app_title']['id'] = 'field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['table'] = 'field_data_field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['field'] = 'field_kony_app_title';
  $handler->display->display_options['fields']['field_kony_app_title']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_title']['type'] = 'text_plain';
  /* Field: Content: App Type */
  $handler->display->display_options['fields']['field_kony_app_type']['id'] = 'field_kony_app_type';
  $handler->display->display_options['fields']['field_kony_app_type']['table'] = 'field_data_field_kony_app_type';
  $handler->display->display_options['fields']['field_kony_app_type']['field'] = 'field_kony_app_type';
  $handler->display->display_options['fields']['field_kony_app_type']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_type']['type'] = 'taxonomy_term_reference_plain';
  /* Field: Content: App Platform */
  $handler->display->display_options['fields']['field_kony_app_platform']['id'] = 'field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['table'] = 'field_data_field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['field'] = 'field_kony_app_platform';
  $handler->display->display_options['fields']['field_kony_app_platform']['label'] = '';
  $handler->display->display_options['fields']['field_kony_app_platform']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_app_platform']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_kony_app_platform']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
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
  $handler->display->display_options['filters']['type']['expose']['operator_id'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['label'] = 'Type';
  $handler->display->display_options['filters']['type']['expose']['operator'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['identifier'] = 'type';
  $handler->display->display_options['filters']['type']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    4 => 0,
  );
  $export['customizable_apps_list'] = $view;

  return $export;
}
