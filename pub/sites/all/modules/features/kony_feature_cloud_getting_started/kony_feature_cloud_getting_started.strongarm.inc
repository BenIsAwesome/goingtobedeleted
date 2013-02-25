<?php
/**
 * @file
 * kony_feature_cloud_getting_started.strongarm.inc
 */

/**
 * Implements hook_strongarm().
 */
function kony_feature_cloud_getting_started_strongarm() {
  $export = array();

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'comment_anonymous_kony_cloud_getting_started';
  $strongarm->value = '0';
  $export['comment_anonymous_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'comment_default_mode_kony_cloud_getting_started';
  $strongarm->value = 1;
  $export['comment_default_mode_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'comment_default_per_page_kony_cloud_getting_started';
  $strongarm->value = '50';
  $export['comment_default_per_page_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'comment_form_location_kony_cloud_getting_started';
  $strongarm->value = 1;
  $export['comment_form_location_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'comment_kony_cloud_getting_started';
  $strongarm->value = '1';
  $export['comment_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'comment_preview_kony_cloud_getting_started';
  $strongarm->value = '1';
  $export['comment_preview_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'comment_subject_field_kony_cloud_getting_started';
  $strongarm->value = 1;
  $export['comment_subject_field_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'field_bundle_settings_node__kony_cloud_getting_started';
  $strongarm->value = array(
    'view_modes' => array(),
    'extra_fields' => array(
      'form' => array(
        'domain' => array(
          'weight' => '7',
        ),
        'metatags' => array(
          'weight' => '10',
        ),
        'title' => array(
          'weight' => '0',
        ),
        'path' => array(
          'weight' => '8',
        ),
        'redirect' => array(
          'weight' => '9',
        ),
      ),
      'display' => array(),
    ),
  );
  $export['field_bundle_settings_node__kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'menu_options_kony_cloud_getting_started';
  $strongarm->value = array();
  $export['menu_options_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'menu_parent_kony_cloud_getting_started';
  $strongarm->value = 'main-menu:0';
  $export['menu_parent_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'node_options_kony_cloud_getting_started';
  $strongarm->value = array(
    0 => 'status',
    1 => 'revision',
  );
  $export['node_options_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'node_preview_kony_cloud_getting_started';
  $strongarm->value = '1';
  $export['node_preview_kony_cloud_getting_started'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'node_submitted_kony_cloud_getting_started';
  $strongarm->value = 0;
  $export['node_submitted_kony_cloud_getting_started'] = $strongarm;

  return $export;
}
