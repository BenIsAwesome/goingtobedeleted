<?php
/**
 * @file
 * kony_feature_developer_tutorials_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_developer_tutorials_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_developer_tutorials';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Developer Tutorials';
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
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '2';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'field_kony_dev_tut_video_link' => 'field_kony_dev_tut_video_link',
    'field_kony_dev_tut_image' => 'field_kony_dev_tut_image',
    'field_kony_dev_tut_headline' => 'field_kony_dev_tut_headline',
    'created' => 'created',
    'field_kony_level' => 'field_kony_level',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'field_kony_dev_tut_video_link' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_kony_dev_tut_image' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_kony_dev_tut_headline' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'created' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_kony_level' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['empty_table'] = TRUE;
  /* Field: Content: Image */
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['id'] = 'field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['table'] = 'field_data_field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['field'] = 'field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Headline */
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['id'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['table'] = 'field_data_field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['field'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['element_label_colon'] = FALSE;
  /* Sort criterion: Content: Updated date */
  $handler->display->display_options['sorts']['changed']['id'] = 'changed';
  $handler->display->display_options['sorts']['changed']['table'] = 'node';
  $handler->display->display_options['sorts']['changed']['field'] = 'changed';
  $handler->display->display_options['sorts']['changed']['order'] = 'DESC';
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
    'kony_developer_tutorial' => 'kony_developer_tutorial',
  );
  /* Filter criterion: Content: Headline (field_kony_dev_tut_headline:format) */
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['id'] = 'field_kony_dev_tut_headline_format';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['table'] = 'field_data_field_kony_dev_tut_headline';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['field'] = 'field_kony_dev_tut_headline_format';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['operator'] = 'contains';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['expose']['operator_id'] = 'field_kony_dev_tut_headline_format_op';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['expose']['operator'] = 'field_kony_dev_tut_headline_format_op';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['expose']['identifier'] = 'field_kony_dev_tut_headline_format';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_format']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    4 => 0,
  );

  /* Display: Tutorials List */
  $handler = $view->new_display('page', 'Tutorials List', 'page');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['exposed_form'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['submit_button'] = 'Go';
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['exposed_block'] = TRUE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Image */
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['id'] = 'field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['table'] = 'field_data_field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['field'] = 'field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Headline */
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['id'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['table'] = 'field_data_field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['field'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['element_label_colon'] = FALSE;
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  /* Field: Content: Tags */
  $handler->display->display_options['fields']['field_kony_dev_tut_tags']['id'] = 'field_kony_dev_tut_tags';
  $handler->display->display_options['fields']['field_kony_dev_tut_tags']['table'] = 'field_data_field_kony_dev_tut_tags';
  $handler->display->display_options['fields']['field_kony_dev_tut_tags']['field'] = 'field_kony_dev_tut_tags';
  $handler->display->display_options['fields']['field_kony_dev_tut_tags']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_tags']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_dev_tut_tags']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Software Product Type (field_kony_dev_tut_soft_type) */
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['id'] = 'field_kony_dev_tut_soft_type_tid';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['table'] = 'field_data_field_kony_dev_tut_soft_type';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['field'] = 'field_kony_dev_tut_soft_type_tid';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['validate']['type'] = 'taxonomy_term';
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['validate_options']['vocabularies'] = array(
    'kony_software_product' => 'kony_software_product',
  );
  $handler->display->display_options['arguments']['field_kony_dev_tut_soft_type_tid']['validate_options']['type'] = 'convert';
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
    'kony_developer_tutorial' => 'kony_developer_tutorial',
  );
  /* Filter criterion: Content: Headline (field_kony_dev_tut_headline) */
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['id'] = 'field_kony_dev_tut_headline_value';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['table'] = 'field_data_field_kony_dev_tut_headline';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['field'] = 'field_kony_dev_tut_headline_value';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['operator'] = 'contains';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['expose']['operator_id'] = 'field_kony_dev_tut_headline_value_op';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['expose']['operator'] = 'field_kony_dev_tut_headline_value_op';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['expose']['identifier'] = 'field_kony_dev_tut_headline_value';
  $handler->display->display_options['filters']['field_kony_dev_tut_headline_value']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    4 => 0,
  );
  /* Filter criterion: keyword */
  $handler->display->display_options['filters']['combine']['id'] = 'combine';
  $handler->display->display_options['filters']['combine']['table'] = 'views';
  $handler->display->display_options['filters']['combine']['field'] = 'combine';
  $handler->display->display_options['filters']['combine']['ui_name'] = 'keyword';
  $handler->display->display_options['filters']['combine']['operator'] = 'contains';
  $handler->display->display_options['filters']['combine']['exposed'] = TRUE;
  $handler->display->display_options['filters']['combine']['expose']['operator_id'] = 'combine_op';
  $handler->display->display_options['filters']['combine']['expose']['label'] = 'Combine fields filter';
  $handler->display->display_options['filters']['combine']['expose']['operator'] = 'combine_op';
  $handler->display->display_options['filters']['combine']['expose']['identifier'] = 'keyword';
  $handler->display->display_options['filters']['combine']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    4 => 0,
  );
  $handler->display->display_options['filters']['combine']['fields'] = array(
    'field_kony_dev_tut_headline' => 'field_kony_dev_tut_headline',
    'body' => 'body',
    'field_kony_dev_tut_tags' => 'field_kony_dev_tut_tags',
  );
  $handler->display->display_options['path'] = 'tutorials/%';

  /* Display: Recent Tutorials */
  $handler = $view->new_display('block', 'Recent Tutorials', 'recenttutorials');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
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
    'kony_developer_tutorial' => 'kony_developer_tutorial',
  );

  /* Display: Popular Tutorials */
  $handler = $view->new_display('block', 'Popular Tutorials', 'populartutorials');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '3';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
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
    'kony_developer_tutorial' => 'kony_developer_tutorial',
  );
  /* Filter criterion: Content: Popular Tutorial (field_kony_dev_tut_popular_tut) */
  $handler->display->display_options['filters']['field_kony_dev_tut_popular_tut_value']['id'] = 'field_kony_dev_tut_popular_tut_value';
  $handler->display->display_options['filters']['field_kony_dev_tut_popular_tut_value']['table'] = 'field_data_field_kony_dev_tut_popular_tut';
  $handler->display->display_options['filters']['field_kony_dev_tut_popular_tut_value']['field'] = 'field_kony_dev_tut_popular_tut_value';
  $handler->display->display_options['filters']['field_kony_dev_tut_popular_tut_value']['operator'] = 'not empty';
  $handler->display->display_options['filters']['field_kony_dev_tut_popular_tut_value']['value'] = array(
    'Yes' => 'Yes',
  );

  /* Display: Featured Tutorial */
  $handler = $view->new_display('block', 'Featured Tutorial', 'featuredtutorial');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Image */
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['id'] = 'field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['table'] = 'field_data_field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['field'] = 'field_kony_dev_tut_image';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_dev_tut_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Headline */
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['id'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['table'] = 'field_data_field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['field'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['label'] = 'Title';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['element_label_colon'] = FALSE;
  /* Field: Content: Tutorial Video Link */
  $handler->display->display_options['fields']['field_kony_dev_tut_video_link']['id'] = 'field_kony_dev_tut_video_link';
  $handler->display->display_options['fields']['field_kony_dev_tut_video_link']['table'] = 'field_data_field_kony_dev_tut_video_link';
  $handler->display->display_options['fields']['field_kony_dev_tut_video_link']['field'] = 'field_kony_dev_tut_video_link';
  $handler->display->display_options['fields']['field_kony_dev_tut_video_link']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_video_link']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_dev_tut_video_link']['click_sort_column'] = 'url';
  $handler->display->display_options['fields']['field_kony_dev_tut_video_link']['type'] = 'link_plain';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
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
    'kony_developer_tutorial' => 'kony_developer_tutorial',
  );

  /* Display: Tutorials Front */
  $handler = $view->new_display('block', 'Tutorials Front', 'tutorial_products');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Software Product Type */
  $handler->display->display_options['fields']['field_kony_dev_tut_soft_type']['id'] = 'field_kony_dev_tut_soft_type';
  $handler->display->display_options['fields']['field_kony_dev_tut_soft_type']['table'] = 'field_data_field_kony_dev_tut_soft_type';
  $handler->display->display_options['fields']['field_kony_dev_tut_soft_type']['field'] = 'field_kony_dev_tut_soft_type';
  $handler->display->display_options['fields']['field_kony_dev_tut_soft_type']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_soft_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_dev_tut_soft_type']['type'] = 'taxonomy_term_reference_plain';
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
    'kony_developer_tutorial' => 'kony_developer_tutorial',
  );

  /* Display: Popular Tutorials Views */
  $handler = $view->new_display('block', 'Popular Tutorials Views', 'popular_tutorials_views');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '6';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Headline */
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['id'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['table'] = 'field_data_field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['field'] = 'field_kony_dev_tut_headline';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['label'] = '';
  $handler->display->display_options['fields']['field_kony_dev_tut_headline']['element_label_colon'] = FALSE;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content statistics: Total views */
  $handler->display->display_options['sorts']['totalcount']['id'] = 'totalcount';
  $handler->display->display_options['sorts']['totalcount']['table'] = 'node_counter';
  $handler->display->display_options['sorts']['totalcount']['field'] = 'totalcount';
  $handler->display->display_options['sorts']['totalcount']['order'] = 'DESC';
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
    'kony_developer_tutorial' => 'kony_developer_tutorial',
  );
  $export['kony_developer_tutorials'] = $view;

  return $export;
}
