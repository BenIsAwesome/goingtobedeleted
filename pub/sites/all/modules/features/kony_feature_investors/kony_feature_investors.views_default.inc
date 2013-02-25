<?php
/**
 * @file
 * kony_feature_investors.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function kony_feature_investors_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'investors_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Investors List';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Company Name */
  $handler->display->display_options['fields']['field_company_name']['id'] = 'field_company_name';
  $handler->display->display_options['fields']['field_company_name']['table'] = 'field_data_field_company_name';
  $handler->display->display_options['fields']['field_company_name']['field'] = 'field_company_name';
  /* Field: Content: Company Bio */
  $handler->display->display_options['fields']['field_company_bio']['id'] = 'field_company_bio';
  $handler->display->display_options['fields']['field_company_bio']['table'] = 'field_data_field_company_bio';
  $handler->display->display_options['fields']['field_company_bio']['field'] = 'field_company_bio';
  /* Field: Content: Company Logo */
  $handler->display->display_options['fields']['field_company_logo']['id'] = 'field_company_logo';
  $handler->display->display_options['fields']['field_company_logo']['table'] = 'field_data_field_company_logo';
  $handler->display->display_options['fields']['field_company_logo']['field'] = 'field_company_logo';
  $handler->display->display_options['fields']['field_company_logo']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_company_logo']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Company Website URL */
  $handler->display->display_options['fields']['field_company_website_url']['id'] = 'field_company_website_url';
  $handler->display->display_options['fields']['field_company_website_url']['table'] = 'field_data_field_company_website_url';
  $handler->display->display_options['fields']['field_company_website_url']['field'] = 'field_company_website_url';
  $handler->display->display_options['fields']['field_company_website_url']['click_sort_column'] = 'url';
  /* Field: Content: Person Bio */
  $handler->display->display_options['fields']['field_person_bio']['id'] = 'field_person_bio';
  $handler->display->display_options['fields']['field_person_bio']['table'] = 'field_data_field_person_bio';
  $handler->display->display_options['fields']['field_person_bio']['field'] = 'field_person_bio';
  /* Field: Content: Person Designation */
  $handler->display->display_options['fields']['field_person_designation']['id'] = 'field_person_designation';
  $handler->display->display_options['fields']['field_person_designation']['table'] = 'field_data_field_person_designation';
  $handler->display->display_options['fields']['field_person_designation']['field'] = 'field_person_designation';
  /* Field: Content: Person Image */
  $handler->display->display_options['fields']['field_person_image']['id'] = 'field_person_image';
  $handler->display->display_options['fields']['field_person_image']['table'] = 'field_data_field_person_image';
  $handler->display->display_options['fields']['field_person_image']['field'] = 'field_person_image';
  $handler->display->display_options['fields']['field_person_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_person_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Person Name */
  $handler->display->display_options['fields']['field_person_name']['id'] = 'field_person_name';
  $handler->display->display_options['fields']['field_person_name']['table'] = 'field_data_field_person_name';
  $handler->display->display_options['fields']['field_person_name']['field'] = 'field_person_name';
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
  $export['investors_list'] = $view;

  return $export;
}
