<?php
/**
 * @file
 * kony_feature_leadership_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_leadership_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_leadership_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Leadership List';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Leadership List';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '9';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Leader Designation */
  $handler->display->display_options['fields']['field_kony_leader_designation']['id'] = 'field_kony_leader_designation';
  $handler->display->display_options['fields']['field_kony_leader_designation']['table'] = 'field_data_field_kony_leader_designation';
  $handler->display->display_options['fields']['field_kony_leader_designation']['field'] = 'field_kony_leader_designation';
  $handler->display->display_options['fields']['field_kony_leader_designation']['label'] = '';
  $handler->display->display_options['fields']['field_kony_leader_designation']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_leader_designation']['type'] = 'taxonomy_term_reference_plain';
  /* Field: Content: Leader Image */
  $handler->display->display_options['fields']['field_kony_leader_image']['id'] = 'field_kony_leader_image';
  $handler->display->display_options['fields']['field_kony_leader_image']['table'] = 'field_data_field_kony_leader_image';
  $handler->display->display_options['fields']['field_kony_leader_image']['field'] = 'field_kony_leader_image';
  $handler->display->display_options['fields']['field_kony_leader_image']['label'] = '';
  $handler->display->display_options['fields']['field_kony_leader_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_leader_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_leader_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Leader Name */
  $handler->display->display_options['fields']['field_kony_leader_name']['id'] = 'field_kony_leader_name';
  $handler->display->display_options['fields']['field_kony_leader_name']['table'] = 'field_data_field_kony_leader_name';
  $handler->display->display_options['fields']['field_kony_leader_name']['field'] = 'field_kony_leader_name';
  $handler->display->display_options['fields']['field_kony_leader_name']['label'] = '';
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
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
    'kony_leadership' => 'kony_leadership',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  $export['kony_leadership_list'] = $view;

  return $export;
}
