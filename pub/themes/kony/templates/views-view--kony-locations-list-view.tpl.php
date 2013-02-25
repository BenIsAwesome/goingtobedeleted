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
	if (count($locationLoad->field_kony_address_line_1)) {
		$locationAddress1 = $locationLoad->field_kony_address_line_1['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_address_line_2)) {
		$locationAddress2 = $locationLoad->field_kony_address_line_2['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_city)) {
		$locationCity = $locationLoad->field_kony_city['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_state)) {
		$locationState = $locationLoad->field_kony_state['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_zip)) {
		$locationZip = $locationLoad->field_kony_zip['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_job_post_country)) {
		$locationCountry = $locationLoad->field_kony_job_post_country['und'][0]['tid'];
	}
        if (count($locationLoad->field_kony_telephone)) {
        	$locationTelephone = $locationLoad->field_kony_telephone['und'] [0]['value'];
        }
	if (count($locationLoad->field_kony_toll_free)) {
		$locationTollFree = $locationLoad->field_kony_toll_free['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_fax)) {
		$locationFax = $locationLoad->field_kony_fax['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_email)) {
		$locationEmail = $locationLoad->field_kony_email['und'][0]['value'];
	}
	if (count($locationLoad->field_kony_display_order)) {
		$locationDisplayOrder = $locationLoad->field_kony_display_order['und'][0]['value'];
	}
	$countryLoad = taxonomy_term_load($locationCountry);
	$countryName = $countryLoad->name;
    $locationsArray[$locationDisplayOrder] = array(
        'locationName' => $locationName,
        'locationAddress1' => $locationAddress1,
		'locationAddress2' => $locationAddress2,
		'locationCity' => $locationCity,
		'locationState' => $locationState,
		'locationZip' => $locationZip,
		'countryName' => $countryName,
        'locationTelephone' => $locationTelephone,
        'locationTollFree' => $locationTollFree,
        'locationFax' => $locationFax,
        'locationEmail' => $locationEmail,
	'locationDisplayOrder' => $locationDisplayOrder,
);
	ksort($locationsArray);
}
?>
<h4>Global Offices</h4>  
<div class="map_items col left seven">
	<table>
		<tbody>
			<tr>
				<td>
				<div class="col">
			    <?php $arrCount = count($locationsArray); 
				for($i=1;$i<=$arrCount;$i=$i+2):
					$locationCity1 = $locationState1 = $locationZip1 = $countryName1 = ""; ?>
                                        <div class="location">
                                                <strong><?php print $locationsArray[$i]['locationName']; ?></strong>
                                                <?php if($locationsArray[$i]['locationAddress1']) {?>
                                                        <br><?php print $locationsArray[$i]['locationAddress1']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationAddress2']) {?>
                                                        <br><?php print $locationsArray[$i]['locationAddress2']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationCity']) {
                                                        $locationCity1 = $locationsArray[$i]['locationCity']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationState']) {
                                                        $locationState1 = ', '.$locationsArray[$i]['locationState']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationZip']) {
                                                        $locationZip1 = ' '.$locationsArray[$i]['locationZip']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['countryName']) {
                                                        $countryName1 = ' '.$locationsArray[$i]['countryName']; ?>
                                                <?php } ?>
                                                <?php if($locationCity1 || $locationState1 || $locationZip1 || $countryName1): ?>
                                                <br/><?php print $locationCity1.$locationState1.$locationZip1.$countryName1; ?>
                                                <?php endif; ?>
                                                <?php if($locationsArray[$i]['locationTelephone']) {?>
                                                                <br><strong>Tel: <?php print $locationsArray[$i]['locationTelephone']; ?></strong>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationTollFree']) {?>
                                                        <br><strong>Toll free: <?php print $locationsArray[$i]['locationTollFree']; ?></strong>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationFax']) {?>
                                                        <br><strong>Fax: <?php print $locationsArray[$i]['locationFax']; ?></strong>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationEmail']) {?>
                                                        <br><a href="mailto:<?php print $locationsArray[$i]['locationEmail']; ?>"><?php print $eachLocation['locationEmail']; ?></a>
                                                <?php } ?>      
                                        </div>
				<?php endfor; ?>
				</div>
				<div class="col">
				<?php for($i=2;$i<=$arrCount;$i=$i+2): 
					$locationCity1 = $locationState1 = $locationZip1 = $countryName1 = ""; ?>
                                        <div class="location">
                                                <strong><?php print $locationsArray[$i]['locationName']; ?></strong>
                                                <?php if($locationsArray[$i]['locationAddress1']) {?>
                                                        <br><?php print $locationsArray[$i]['locationAddress1']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationAddress2']) {?>
                                                        <br><?php print $locationsArray[$i]['locationAddress2']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationCity']) {
                                                        $locationCity1 = $locationsArray[$i]['locationCity']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationState']) {
                                                        $locationState1 = ', '.$locationsArray[$i]['locationState']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationZip']) {
                                                        $locationZip1 = ' '.$locationsArray[$i]['locationZip']; ?>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['countryName']) {
                                                        $countryName1 = ' '.$locationsArray[$i]['countryName']; ?>
                                                <?php } ?>
                                                <?php if($locationCity1 || $locationState1 || $locationZip1 || $countryName1): ?>
                                                <br/><?php print $locationCity1.$locationState1.$locationZip1.$countryName1; ?>
                                                <?php endif; ?>
                                                <?php if($locationsArray[$i]['locationTelephone']) {?>
                                                                <br><strong>Tel: <?php print $locationsArray[$i]['locationTelephone']; ?></strong>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationTollFree']) {?>
                                                        <br><strong>Toll free: <?php print $locationsArray[$i]['locationTollFree']; ?></strong>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationFax']) {?>
                                                        <br><strong>Fax: <?php print $locationsArray[$i]['locationFax']; ?></strong>
                                                <?php } ?>
                                                <?php if($locationsArray[$i]['locationEmail']) {?>
                                                        <br><a href="mailto:<?php print $locationsArray[$i]['locationEmail']; ?>"><?php print $eachLocation['locationEmail']; ?></a>
                                                <?php } ?>      
                                        </div>
				<?php endfor; ?>
				</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
