<?php
/**
 * @file
 * kony_feature_partners_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_partners_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'partner_ecosystem';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Partner Ecosystem';
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
  $handler->display->display_options['pager']['type'] = 'none';
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
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  /* Contextual filter: Content: Profile Type (field_kony_company_profile_type) */
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['id'] = 'field_kony_company_profile_type_tid';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['table'] = 'field_data_field_kony_company_profile_type';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['field'] = 'field_kony_company_profile_type_tid';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['default_argument_options']['argument'] = '26';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_kony_company_profile_type_tid']['summary_options']['items_per_page'] = '25';
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

  /* Display: Partner Ecosystem */
  $handler = $view->new_display('block', 'Partner Ecosystem', 'block_1');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Name (field_company_profile_name) */
  $handler->display->display_options['sorts']['field_company_profile_name_value']['id'] = 'field_company_profile_name_value';
  $handler->display->display_options['sorts']['field_company_profile_name_value']['table'] = 'field_data_field_company_profile_name';
  $handler->display->display_options['sorts']['field_company_profile_name_value']['field'] = 'field_company_profile_name_value';
  $export['partner_ecosystem'] = $view;

  return $export;
}
