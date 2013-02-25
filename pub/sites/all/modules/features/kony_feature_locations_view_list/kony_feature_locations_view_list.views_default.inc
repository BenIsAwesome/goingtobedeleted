<?php
/**
 * @file
 * kony_feature_locations_view_list.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_locations_view_list_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_locations_list_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Locations List View';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Locations List View';
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
  /* Field: Content: Address Line 1 */
  $handler->display->display_options['fields']['field_kony_address_line_1']['id'] = 'field_kony_address_line_1';
  $handler->display->display_options['fields']['field_kony_address_line_1']['table'] = 'field_data_field_kony_address_line_1';
  $handler->display->display_options['fields']['field_kony_address_line_1']['field'] = 'field_kony_address_line_1';
  /* Field: Content: Address Line 2 */
  $handler->display->display_options['fields']['field_kony_address_line_2']['id'] = 'field_kony_address_line_2';
  $handler->display->display_options['fields']['field_kony_address_line_2']['table'] = 'field_data_field_kony_address_line_2';
  $handler->display->display_options['fields']['field_kony_address_line_2']['field'] = 'field_kony_address_line_2';
  /* Field: Content: City */
  $handler->display->display_options['fields']['field_kony_city']['id'] = 'field_kony_city';
  $handler->display->display_options['fields']['field_kony_city']['table'] = 'field_data_field_kony_city';
  $handler->display->display_options['fields']['field_kony_city']['field'] = 'field_kony_city';
  /* Field: Content: Country */
  $handler->display->display_options['fields']['field_kony_job_post_country']['id'] = 'field_kony_job_post_country';
  $handler->display->display_options['fields']['field_kony_job_post_country']['table'] = 'field_data_field_kony_job_post_country';
  $handler->display->display_options['fields']['field_kony_job_post_country']['field'] = 'field_kony_job_post_country';
  /* Field: Content: Display Order */
  $handler->display->display_options['fields']['field_kony_display_order']['id'] = 'field_kony_display_order';
  $handler->display->display_options['fields']['field_kony_display_order']['table'] = 'field_data_field_kony_display_order';
  $handler->display->display_options['fields']['field_kony_display_order']['field'] = 'field_kony_display_order';
  /* Field: Content: Email */
  $handler->display->display_options['fields']['field_kony_email']['id'] = 'field_kony_email';
  $handler->display->display_options['fields']['field_kony_email']['table'] = 'field_data_field_kony_email';
  $handler->display->display_options['fields']['field_kony_email']['field'] = 'field_kony_email';
  /* Field: Content: State */
  $handler->display->display_options['fields']['field_kony_state']['id'] = 'field_kony_state';
  $handler->display->display_options['fields']['field_kony_state']['table'] = 'field_data_field_kony_state';
  $handler->display->display_options['fields']['field_kony_state']['field'] = 'field_kony_state';
  /* Field: Content: Telephone */
  $handler->display->display_options['fields']['field_kony_telephone']['id'] = 'field_kony_telephone';
  $handler->display->display_options['fields']['field_kony_telephone']['table'] = 'field_data_field_kony_telephone';
  $handler->display->display_options['fields']['field_kony_telephone']['field'] = 'field_kony_telephone';
  /* Field: Content: Toll Free Telephone */
  $handler->display->display_options['fields']['field_kony_toll_free']['id'] = 'field_kony_toll_free';
  $handler->display->display_options['fields']['field_kony_toll_free']['table'] = 'field_data_field_kony_toll_free';
  $handler->display->display_options['fields']['field_kony_toll_free']['field'] = 'field_kony_toll_free';
  /* Field: Content: Zip */
  $handler->display->display_options['fields']['field_kony_zip']['id'] = 'field_kony_zip';
  $handler->display->display_options['fields']['field_kony_zip']['table'] = 'field_data_field_kony_zip';
  $handler->display->display_options['fields']['field_kony_zip']['field'] = 'field_kony_zip';
  /* Sort criterion: Content: Display Order (field_kony_display_order) */
  $handler->display->display_options['sorts']['field_kony_display_order_value']['id'] = 'field_kony_display_order_value';
  $handler->display->display_options['sorts']['field_kony_display_order_value']['table'] = 'field_data_field_kony_display_order';
  $handler->display->display_options['sorts']['field_kony_display_order_value']['field'] = 'field_kony_display_order_value';
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
    'kony_locations' => 'kony_locations',
  );

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;

  /* Display: Locations Tel No List */
  $handler = $view->new_display('block', 'Locations Tel No List', 'block_1');
  $handler->display->display_options['display_description'] = 'To display as drop down in the top right menu for globe icon ';
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Country */
  $handler->display->display_options['fields']['field_kony_job_post_country']['id'] = 'field_kony_job_post_country';
  $handler->display->display_options['fields']['field_kony_job_post_country']['table'] = 'field_data_field_kony_job_post_country';
  $handler->display->display_options['fields']['field_kony_job_post_country']['field'] = 'field_kony_job_post_country';
  /* Field: Content: Telephone */
  $handler->display->display_options['fields']['field_kony_telephone']['id'] = 'field_kony_telephone';
  $handler->display->display_options['fields']['field_kony_telephone']['table'] = 'field_data_field_kony_telephone';
  $handler->display->display_options['fields']['field_kony_telephone']['field'] = 'field_kony_telephone';
  /* Field: Content: Display Order */
  $handler->display->display_options['fields']['field_kony_display_order']['id'] = 'field_kony_display_order';
  $handler->display->display_options['fields']['field_kony_display_order']['table'] = 'field_data_field_kony_display_order';
  $handler->display->display_options['fields']['field_kony_display_order']['field'] = 'field_kony_display_order';
  $handler->display->display_options['fields']['field_kony_display_order']['label'] = '';
  $handler->display->display_options['fields']['field_kony_display_order']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_display_order']['settings'] = array(
    'thousand_separator' => ' ',
    'prefix_suffix' => 0,
  );
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
    'kony_locations' => 'kony_locations',
  );
  /* Filter criterion: Content: Telephone (field_kony_telephone) */
  $handler->display->display_options['filters']['field_kony_telephone_value']['id'] = 'field_kony_telephone_value';
  $handler->display->display_options['filters']['field_kony_telephone_value']['table'] = 'field_data_field_kony_telephone';
  $handler->display->display_options['filters']['field_kony_telephone_value']['field'] = 'field_kony_telephone_value';
  $handler->display->display_options['filters']['field_kony_telephone_value']['operator'] = 'not empty';
  $export['kony_locations_list_view'] = $view;

  return $export;
}
