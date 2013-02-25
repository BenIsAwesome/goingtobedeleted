<?php
/**
 * @file
 * kony_feature_cloud_docs.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_cloud_docs_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_cloud_docs';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Kony Cloud Docs';
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
  $handler->display->display_options['style_plugin'] = 'grouping_limit';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_kony_soft_doc_product',
      'rendered' => 1,
      'rendered_strip' => 0,
      'grouping-limit' => array(
        'grouping-limit' => '6',
        'grouping-offset' => '0',
      ),
    ),
    1 => array(
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
  /* Relationship: Content: Release Version (field_kony_soft_doc_release_ver) */
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['id'] = 'field_kony_soft_doc_release_ver_value';
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['table'] = 'field_data_field_kony_soft_doc_release_ver';
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['field'] = 'field_kony_soft_doc_release_ver_value';
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['required'] = TRUE;
  $handler->display->display_options['relationships']['field_kony_soft_doc_release_ver_value']['delta'] = '-1';
  /* Field: Content: Product */
  $handler->display->display_options['fields']['field_kony_soft_doc_product']['id'] = 'field_kony_soft_doc_product';
  $handler->display->display_options['fields']['field_kony_soft_doc_product']['table'] = 'field_data_field_kony_soft_doc_product';
  $handler->display->display_options['fields']['field_kony_soft_doc_product']['field'] = 'field_kony_soft_doc_product';
  $handler->display->display_options['fields']['field_kony_soft_doc_product']['label'] = '';
  $handler->display->display_options['fields']['field_kony_soft_doc_product']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_kony_soft_doc_product']['element_label_colon'] = FALSE;
  /* Field: Content: Type */
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['id'] = 'field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['table'] = 'field_data_field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['field'] = 'field_kony_soft_doc_type';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['label'] = '';
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_kony_soft_doc_type']['element_label_colon'] = FALSE;
  /* Field: Content: Name */
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['id'] = 'field_kony_soft_doc_name';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['table'] = 'field_data_field_kony_soft_doc_name';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['field'] = 'field_kony_soft_doc_name';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['label'] = '';
  $handler->display->display_options['fields']['field_kony_soft_doc_name']['element_label_colon'] = FALSE;
  /* Sort criterion: Content: Product (field_kony_soft_doc_product) */
  $handler->display->display_options['sorts']['field_kony_soft_doc_product_tid']['id'] = 'field_kony_soft_doc_product_tid';
  $handler->display->display_options['sorts']['field_kony_soft_doc_product_tid']['table'] = 'field_data_field_kony_soft_doc_product';
  $handler->display->display_options['sorts']['field_kony_soft_doc_product_tid']['field'] = 'field_kony_soft_doc_product_tid';
  /* Sort criterion: Field collection item: Release Date (field_kony_release_release_date) */
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['id'] = 'field_kony_release_release_date_value';
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['table'] = 'field_data_field_kony_release_release_date';
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['field'] = 'field_kony_release_release_date_value';
  $handler->display->display_options['sorts']['field_kony_release_release_date_value']['relationship'] = 'field_kony_soft_doc_release_ver_value';
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

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['path'] = 'kony-cloud-docs';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block_1');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $export['kony_cloud_docs'] = $view;

  return $export;
}
