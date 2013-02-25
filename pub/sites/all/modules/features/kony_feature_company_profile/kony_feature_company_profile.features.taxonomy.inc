<?php
/**
 * @file
 * kony_feature_company_profile.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function kony_feature_company_profile_taxonomy_default_vocabularies() {
  return array(
    'kony_company_type' => array(
      'name' => 'Company Type',
      'machine_name' => 'kony_company_type',
      'description' => 'Used to identify company types in the website',
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
    'kony_partner_type' => array(
      'name' => 'Partner Type',
      'machine_name' => 'kony_partner_type',
      'description' => 'Partner Type - Used on Company Profile',
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
