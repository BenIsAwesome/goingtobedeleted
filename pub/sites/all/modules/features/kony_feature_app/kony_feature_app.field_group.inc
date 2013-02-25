<?php
/**
 * @file
 * kony_feature_app.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function kony_feature_app_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_kony_app_benefits_panel|node|kony_app|form';
  $field_group->group_name = 'group_kony_app_benefits_panel';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'kony_app';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_kony_app_tabbed_content';
  $field_group->data = array(
    'label' => 'Benefits Panel',
    'weight' => '14',
    'children' => array(
      0 => 'field_kony_app_benefits_body',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Benefits Panel',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_kony_app_benefits_panel|node|kony_app|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_kony_app_demo_panel|node|kony_app|form';
  $field_group->group_name = 'group_kony_app_demo_panel';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'kony_app';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_kony_app_tabbed_content';
  $field_group->data = array(
    'label' => 'Demo Panel',
    'weight' => '17',
    'children' => array(
      0 => 'field_kony_app_demos',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Demo Panel',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_kony_app_demo_panel|node|kony_app|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_kony_app_desc_panel|node|kony_app|form';
  $field_group->group_name = 'group_kony_app_desc_panel';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'kony_app';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_kony_app_tabbed_content';
  $field_group->data = array(
    'label' => 'Features Panel',
    'weight' => '13',
    'children' => array(
      0 => 'field_kony_app_desc_body',
      1 => 'field_kony_features_feature_list',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Features Panel',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_kony_app_desc_panel|node|kony_app|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_kony_app_options_panel|node|kony_app|form';
  $field_group->group_name = 'group_kony_app_options_panel';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'kony_app';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_kony_app_tabbed_content';
  $field_group->data = array(
    'label' => 'Options Panel',
    'weight' => '15',
    'children' => array(
      0 => 'field_kony_app_options_body_copy',
      1 => 'field_kony_app_options_list',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_kony_app_options_panel|node|kony_app|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_kony_app_resource_panel|node|kony_app|form';
  $field_group->group_name = 'group_kony_app_resource_panel';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'kony_app';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_kony_app_tabbed_content';
  $field_group->data = array(
    'label' => 'Resources Panel',
    'weight' => '16',
    'children' => array(
      0 => 'field_kony_resource',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Resources Panel',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_kony_app_resource_panel|node|kony_app|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_kony_app_tabbed_content|node|kony_app|form';
  $field_group->group_name = 'group_kony_app_tabbed_content';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'kony_app';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Tabbed Panels',
    'weight' => '5',
    'children' => array(
      0 => 'group_kony_app_benefits_panel',
      1 => 'group_kony_app_demo_panel',
      2 => 'group_kony_app_desc_panel',
      3 => 'group_kony_app_resource_panel',
      4 => 'group_kony_app_options_panel',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Tabbed Panels',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_kony_app_tabbed_content|node|kony_app|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_kony_app_taxonomy|node|kony_app|form';
  $field_group->group_name = 'group_kony_app_taxonomy';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'kony_app';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Taxonomy',
    'weight' => '4',
    'children' => array(
      0 => 'field_kony_app_industry',
      1 => 'field_kony_app_platform',
      2 => 'field_kony_app_type',
      3 => 'field_kony_app_vertical',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Taxonomy',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_kony_app_taxonomy|node|kony_app|form'] = $field_group;

  return $export;
}
