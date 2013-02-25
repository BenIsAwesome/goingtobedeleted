<?php
/**
 * @file
 * kony_feature_investors_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_investors_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'kony_investors_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Investors List All';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Investors List';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Company Bio */
  $handler->display->display_options['fields']['field_investor_company_bio']['id'] = 'field_investor_company_bio';
  $handler->display->display_options['fields']['field_investor_company_bio']['table'] = 'field_data_field_investor_company_bio';
  $handler->display->display_options['fields']['field_investor_company_bio']['field'] = 'field_investor_company_bio';
  $handler->display->display_options['fields']['field_investor_company_bio']['label'] = '';
  $handler->display->display_options['fields']['field_investor_company_bio']['element_label_colon'] = FALSE;
  /* Field: Content: Company Logo */
  $handler->display->display_options['fields']['field_investor_company_logo']['id'] = 'field_investor_company_logo';
  $handler->display->display_options['fields']['field_investor_company_logo']['table'] = 'field_data_field_investor_company_logo';
  $handler->display->display_options['fields']['field_investor_company_logo']['field'] = 'field_investor_company_logo';
  $handler->display->display_options['fields']['field_investor_company_logo']['label'] = '';
  $handler->display->display_options['fields']['field_investor_company_logo']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_investor_company_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_investor_company_logo']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Company Name */
  $handler->display->display_options['fields']['field_investor_company_name']['id'] = 'field_investor_company_name';
  $handler->display->display_options['fields']['field_investor_company_name']['table'] = 'field_data_field_investor_company_name';
  $handler->display->display_options['fields']['field_investor_company_name']['field'] = 'field_investor_company_name';
  $handler->display->display_options['fields']['field_investor_company_name']['label'] = '';
  $handler->display->display_options['fields']['field_investor_company_name']['element_label_colon'] = FALSE;
  /* Field: Content: Company Website Url */
  $handler->display->display_options['fields']['field_investor_company_url']['id'] = 'field_investor_company_url';
  $handler->display->display_options['fields']['field_investor_company_url']['table'] = 'field_data_field_investor_company_url';
  $handler->display->display_options['fields']['field_investor_company_url']['field'] = 'field_investor_company_url';
  $handler->display->display_options['fields']['field_investor_company_url']['label'] = '';
  $handler->display->display_options['fields']['field_investor_company_url']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_investor_company_url']['click_sort_column'] = 'url';
  /* Field: Content: Persona Bio */
  $handler->display->display_options['fields']['field_investor_persona_bio']['id'] = 'field_investor_persona_bio';
  $handler->display->display_options['fields']['field_investor_persona_bio']['table'] = 'field_data_field_investor_persona_bio';
  $handler->display->display_options['fields']['field_investor_persona_bio']['field'] = 'field_investor_persona_bio';
  $handler->display->display_options['fields']['field_investor_persona_bio']['label'] = '';
  $handler->display->display_options['fields']['field_investor_persona_bio']['element_label_colon'] = FALSE;
  /* Field: Content: Persona Designation */
  $handler->display->display_options['fields']['field_investor_persona_desg']['id'] = 'field_investor_persona_desg';
  $handler->display->display_options['fields']['field_investor_persona_desg']['table'] = 'field_data_field_investor_persona_desg';
  $handler->display->display_options['fields']['field_investor_persona_desg']['field'] = 'field_investor_persona_desg';
  $handler->display->display_options['fields']['field_investor_persona_desg']['label'] = '';
  $handler->display->display_options['fields']['field_investor_persona_desg']['element_label_colon'] = FALSE;
  /* Field: Content: Persona Image */
  $handler->display->display_options['fields']['field_investor_persona_image']['id'] = 'field_investor_persona_image';
  $handler->display->display_options['fields']['field_investor_persona_image']['table'] = 'field_data_field_investor_persona_image';
  $handler->display->display_options['fields']['field_investor_persona_image']['field'] = 'field_investor_persona_image';
  $handler->display->display_options['fields']['field_investor_persona_image']['label'] = '';
  $handler->display->display_options['fields']['field_investor_persona_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_investor_persona_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_investor_persona_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Persona Name */
  $handler->display->display_options['fields']['field_investor_persona_name']['id'] = 'field_investor_persona_name';
  $handler->display->display_options['fields']['field_investor_persona_name']['table'] = 'field_data_field_investor_persona_name';
  $handler->display->display_options['fields']['field_investor_persona_name']['field'] = 'field_investor_persona_name';
  $handler->display->display_options['fields']['field_investor_persona_name']['label'] = '';
  $handler->display->display_options['fields']['field_investor_persona_name']['element_label_colon'] = FALSE;
  /* Field: Content: Nid */
  $handler->display->display_options['fields']['nid']['id'] = 'nid';
  $handler->display->display_options['fields']['nid']['table'] = 'node';
  $handler->display->display_options['fields']['nid']['field'] = 'nid';
  $handler->display->display_options['fields']['nid']['label'] = '';
  $handler->display->display_options['fields']['nid']['element_label_colon'] = FALSE;
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
    'kony_investors' => 'kony_investors',
  );

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $export['kony_investors_list'] = $view;

  return $export;
}
