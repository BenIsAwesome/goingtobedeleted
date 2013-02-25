<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $css_name: A css-safe version of the view name.
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */
// print "<pre>";
 //print_r($view->result);
 //exit();
$locationsArray = array();
foreach ($view->result as $locationsItems) {

	$locationName = $locationAddress1 = $locationAddress2 = $locationCity = $locationState = $locationZip = $locationCountry = $locationTelephone = $locationTollFree = $locationFax = $locationEmail = $locationDisplayOrder = "";
    if (count($locationsItems->_field_data)) {
        $locationLoad = $locationsItems->_field_data['nid']['entity'];
    } else {
        $locationLoad = node_load($locationsItems->nid);
    }

	$locationName = $locationLoad->field_kony_location_name['und'][0]['value'];
	
	if (count($locationLoad->field_kony_telephone)) {
		$locationTelephone = $locationLoad->field_kony_telephone['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_job_post_country)) {
                $locationCountry = $locationLoad->field_kony_job_post_country['und'][0]['tid'];
        }
	 $countryLoad = taxonomy_term_load($locationCountry);
         $countryName = $countryLoad->name;
 	 if (count($locationLoad->field_kony_display_order)) {
                $locationDisplayOrder = $locationLoad->field_kony_display_order['und'][0]['value'];
        }
     if($countryName!='USA' && $countryName!=''){	
	    $locationsArray[$locationDisplayOrder] = array(
        	'locationName' => $locationName,
	        'locationTelephone' => $locationTelephone,
		'locationCountry' => $countryName,
	    );
	    
	}
	ksort($locationsArray);
}
?>
<ul class="loc-list" style="display:none">
<?php
$isAlreadyAvi = array();
foreach($locationsArray as $key=>$loc){
  $country = $loc['locationCountry'];
  $telNo = $loc['locationTelephone'];	
 if(!in_array($country,$isAlreadyAvi)){
  $isAlreadyAvi[]=$country;
?>
	<li><?php print $country." :";?><i class="icon-phone"></i><?php print $telNo;?></li>
<?php
 }
}
?>
</ul>

