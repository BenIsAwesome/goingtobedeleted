<?php
/**
 * @file
 * kony_feature_leadership.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function kony_feature_leadership_taxonomy_default_vocabularies() {
  return array(
    'kony_leader_designation' => array(
      'name' => 'Leader Designation',
      'machine_name' => 'kony_leader_designation',
      'description' => '',
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
