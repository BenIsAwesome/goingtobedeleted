<?php
/**
 * @file
 * kony_feature_customer_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_customer_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'customer_proven';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Customer Proven';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Full Color Logo */
  $handler->display->display_options['fields']['field_kony_company_profile_img']['id'] = 'field_kony_company_profile_img';
  $handler->display->display_options['fields']['field_kony_company_profile_img']['table'] = 'field_data_field_kony_company_profile_img';
  $handler->display->display_options['fields']['field_kony_company_profile_img']['field'] = 'field_kony_company_profile_img';
  $handler->display->display_options['fields']['field_kony_company_profile_img']['label'] = 'Profile Image';
  $handler->display->display_options['fields']['field_kony_company_profile_img']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_company_profile_img']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
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
    'kony_company_profile' => 'kony_company_profile',
  );
  /* Filter criterion: Content: Profile Type (field_kony_company_profile_type) */
  $handler->display->display_options['filters']['field_kony_company_profile_type_tid']['id'] = 'field_kony_company_profile_type_tid';
  $handler->display->display_options['filters']['field_kony_company_profile_type_tid']['table'] = 'field_data_field_kony_company_profile_type';
  $handler->display->display_options['filters']['field_kony_company_profile_type_tid']['field'] = 'field_kony_company_profile_type_tid';
  $handler->display->display_options['filters']['field_kony_company_profile_type_tid']['value'] = array(
    25 => '25',
  );
  $handler->display->display_options['filters']['field_kony_company_profile_type_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_kony_company_profile_type_tid']['vocabulary'] = 'kony_company_type';

  /* Display: Customer Proven Block */
  $handler = $view->new_display('block', 'Customer Proven Block', 'block_1');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Name (field_company_profile_name) */
  $handler->display->display_options['sorts']['field_company_profile_name_value']['id'] = 'field_company_profile_name_value';
  $handler->display->display_options['sorts']['field_company_profile_name_value']['table'] = 'field_data_field_company_profile_name';
  $handler->display->display_options['sorts']['field_company_profile_name_value']['field'] = 'field_company_profile_name_value';
  $export['customer_proven'] = $view;

  return $export;
}
