<?php
/**
 * @file
 * kony_feature_documentation_list_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_documentation_list_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_documentation_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Documentation List';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Documentation List';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'grouping_limit';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_kony_soft_doc_type',
      'rendered' => 1,
      'rendered_strip' => 0,
      'grouping-limit' => array(
        'grouping-limit' => '1',
        'grouping-offset' => '0',
      ),
    ),
  );
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Type */
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['id'] = 'field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['table'] = 'field_data_field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['field'] = 'field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['label'] = '';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['type'] = 'taxonomy_term_reference_plain';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: HTML Url */
  $handler->display->display_options['fields']['field_kony_soft_doc_html_url']['id'] = 'field_kony_soft_doc_html_url';
  $handler->display->display_options['fields']['field_kony_soft_doc_html_url']['table'] = 'field_data_field_kony_soft_doc_html_url';
  $handler->display->display_options['fields']['field_kony_soft_doc_html_url']['field'] = 'field_kony_soft_doc_html_url';
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
    'kony_software_documentation' => 'kony_software_documentation',
  );
  /* Filter criterion: Content: Type (field_kony_soft_doc_type) */
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['id'] = 'field_kony_soft_doc_type_tid';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['table'] = 'field_data_field_kony_soft_doc_type';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['field'] = 'field_kony_soft_doc_type_tid';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['value'] = array(
    327 => '327',
    328 => '328',
  );
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['vocabulary'] = 'kony_software_documentation_type';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'grouping_limit';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_kony_soft_doc_type',
      'rendered' => 1,
      'rendered_strip' => 0,
      'grouping-limit' => array(
        'grouping-limit' => '1',
        'grouping-offset' => '0',
      ),
    ),
  );
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['relationships'] = FALSE;
  /* Relationship: Content: Release Version (field_kony_soft_doc_release_ver) */
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['id'] = 'field_kony_soft_doc_release_ver_value';
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['table'] = 'field_data_field_kony_soft_doc_release_ver';
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['field'] = 'field_kony_soft_doc_release_ver_value';
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['delta'] = '-1';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Type */
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['id'] = 'field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['table'] = 'field_data_field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['field'] = 'field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['label'] = '';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['type'] = 'taxonomy_term_reference_plain';
  /* Field: Content: Name */
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['id'] = 'field_kony_soft_doc_name';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['table'] = 'field_data_field_kony_soft_doc_name';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['field'] = 'field_kony_soft_doc_name';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['label'] = '';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['type'] = 'text_plain';
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Type (field_kony_soft_doc_type) */
  $handler->display->display_options['sorts']['field_kony_soft_doc_type_tid']['id'] = 'field_kony_soft_doc_type_tid';
  $handler->display->display_options['sorts']['field_kony_soft_doc_type_tid']['table'] = 'field_data_field_kony_soft_doc_type';
  $handler->display->display_options['sorts']['field_kony_soft_doc_type_tid']['field'] = 'field_kony_soft_doc_type_tid';
  /* Sort criterion: Field collection item: Release Date (field_kony_release_release_date) */
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['id'] = 'field_kony_release_release_date_value';
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['table'] = 'field_data_field_kony_release_release_date';
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['field'] = 'field_kony_release_release_date_value';
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['relationship'] = 'field_kony_soft_doc_release_ver_value';
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['order'] = 'DESC';
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
    'kony_software_documentation' => 'kony_software_documentation',
  );
  /* Filter criterion: Content: Type (field_kony_soft_doc_type) */
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['id'] = 'field_kony_soft_doc_type_tid';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['table'] = 'field_data_field_kony_soft_doc_type';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['field'] = 'field_kony_soft_doc_type_tid';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['value'] = array(
    327 => '327',
    328 => '328',
  );
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['vocabulary'] = 'kony_software_documentation_type';
  $handler->display->display_options['filters']['field_kony_soft_doc_type_tid']['hierarchy'] = 1;
  $export['kony_documentation_list'] = $view;

  return $export;
}
