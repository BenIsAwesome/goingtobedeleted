<?php
/**
 * @file
 * kony_feature_developer_tutorial.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function kony_feature_developer_tutorial_taxonomy_default_vocabularies() {
  return array(
    'kony_developer_level' => array(
      'name' => 'Developer Tutorial Level',
      'machine_name' => 'kony_developer_level',
      'description' => 'Developer Tutorial Level',
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
    'kony_tutorial_preferred_video' => array(
      'name' => 'Tutorial Preferred Video',
      'machine_name' => 'kony_tutorial_preferred_video',
      'description' => 'Tutorial Preferred Video taxonomy for Developer Tutorial',
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
    'kony_tutorial_track' => array(
      'name' => 'Tutorial Track',
      'machine_name' => 'kony_tutorial_track',
      'description' => 'Tutorial Track',
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
