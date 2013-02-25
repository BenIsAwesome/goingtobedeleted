<?php
/**
 * @file
 * kony_feature_software_products_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_software_products_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_software_products';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'taxonomy_term_data';
  $view->human_name = 'Software Products';
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
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['name']['link_to_taxonomy'] = TRUE;
  /* Filter criterion: Taxonomy vocabulary: Machine name */
  $handler->display->display_options['filters']['machine_name']['id'] = 'machine_name';
  $handler->display->display_options['filters']['machine_name']['table'] = 'taxonomy_vocabulary';
  $handler->display->display_options['filters']['machine_name']['field'] = 'machine_name';
  $handler->display->display_options['filters']['machine_name']['value'] = array(
    'kony_software_product' => 'kony_software_product',
  );

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'softwareproducts');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['name']['link_to_taxonomy'] = TRUE;
  /* Field: Taxonomy term: Product Icon */
  $handler->display->display_options['fields']['field_kony_product_icon']['id'] = 'field_kony_product_icon';
  $handler->display->display_options['fields']['field_kony_product_icon']['table'] = 'field_data_field_kony_product_icon';
  $handler->display->display_options['fields']['field_kony_product_icon']['field'] = 'field_kony_product_icon';
  $handler->display->display_options['fields']['field_kony_product_icon']['label'] = '';
  $handler->display->display_options['fields']['field_kony_product_icon']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_product_icon']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_product_icon']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Taxonomy term: Product Image */
  $handler->display->display_options['fields']['field_kony_product_image']['id'] = 'field_kony_product_image';
  $handler->display->display_options['fields']['field_kony_product_image']['table'] = 'field_data_field_kony_product_image';
  $handler->display->display_options['fields']['field_kony_product_image']['field'] = 'field_kony_product_image';
  $handler->display->display_options['fields']['field_kony_product_image']['label'] = '';
  $handler->display->display_options['fields']['field_kony_product_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_kony_product_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_kony_product_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  $export['kony_software_products'] = $view;

  return $export;
}
