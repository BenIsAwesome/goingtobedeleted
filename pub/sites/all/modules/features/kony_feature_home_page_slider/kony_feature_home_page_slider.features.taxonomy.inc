<?php
/**
 * @file
 * kony_feature_home_page_slider.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function kony_feature_home_page_slider_taxonomy_default_vocabularies() {
  return array(
    'slider_category' => array(
      'name' => 'Slider Category',
      'machine_name' => 'slider_category',
      'description' => 'Slider Category',
      'hierarchy' => '0',
      'module' => 'taxonomy',
      'weight' => '0',
      'rdf_mapping' => array(
        'rdftype' => array(
          0 => 'skos:ConceptScheme',
        ),
        'name' => array(
          'predicates' => array(
            0 => 'dc:title',
          ),
        ),
        'description' => array(
          'predicates' => array(
            0 => 'rdfs:comment',
          ),
        ),
      ),
    ),
  );
}
