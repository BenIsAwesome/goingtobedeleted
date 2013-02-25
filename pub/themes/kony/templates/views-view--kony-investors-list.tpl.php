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
$investorsArray = array();
foreach ($view->result as $investorsItems) {
    $investorImage = $investorsName = $investorsItemDesc = $learnMorePath = "";
    if (count($investorsItems->_field_data)) {
        $investorLoad = $investorsItems->_field_data['nid']['entity'];
    } else {
        $investorLoad = node_load($investorsItems->nid);
    }

    if (count($investorLoad->field_investor_company_name)) {
        $investorsName = $investorLoad->field_investor_company_name['und'][0]['value'];
    }
	
	if (count($investorLoad->field_investor_persona_name)) {
        $personaName = $investorLoad->field_investor_persona_name['und'][0]['value'];
    }
	
    if (count($investorLoad->field_investor_company_logo)) {
        $investorImage = file_create_url($investorLoad->field_investor_company_logo['und'][0]['uri']);
    }
	
	if (count($investorLoad->field_investor_persona_image)) {
        $personaImage = file_create_url($investorLoad->field_investor_persona_image['und'][0]['uri']);
    }
	
	if (count($investorLoad->field_investor_persona_desg)) {
        $personaDesignation = $investorLoad->field_investor_persona_desg['und'][0]['value'];
    }
	
	if (count($investorLoad->field_investor_company_url)) {
        $investorsURL = kony_custom_link($investorLoad->field_investor_company_url);
    }
	
    $investorsItemDesc = $investorLoad->field_investor_company_bio['und'][0]['value'];
	$personaDescription = $investorLoad->field_investor_persona_bio['und'][0]['value'];
	
    $investorsArray[] = array(
        'investorsName' => $investorsName,
        'investorImage' => $investorImage,
        'investorsItemDesc' => $investorsItemDesc,
		'personaDescription' => $personaDescription,
		'personaName' => $personaName,
		'personaImage' => $personaImage,
		'personaDesignation' => $personaDesignation,
		'investorsURL' => $investorsURL
    );
}
?>

<hr />
<?php 
$index = 1;
foreach ($investorsArray as $eachinvestor) { ?>
	<article class="leader">
		<!-- Company Info -->
		<a href="<?php print $eachinvestor['investorsURL'];?>" target="_blank">
			<img alt="<?php print $eachinvestor['investorsName'];?>" src="<?php print $eachinvestor['investorImage'];?>">
		</a>
		<a href="<?php print $eachinvestor['investorsURL'];?>" target="_blank">
			<h5><?php print $eachinvestor['investorsName'];?></h5>
		</a>
		<?php print $eachinvestor['investorsItemDesc'];?>
		<!-- Company Info -->
		
		<!-- Persona Info -->
		<img alt="<?php print $eachinvestor['personaName'];?>" src="<?php print $eachinvestor['personaImage'];?>">
		<h5><?php print $eachinvestor['personaName'];?></h5>
		<p><?php print $eachinvestor['personaDesignation'];?></p>
		<?php print $eachinvestor['personaDescription'];?>
		<!-- Persona Info -->

	</article>
	<?php if($index % 2 == 0) {?>
	<span class="clear-row"></span>
	<?php } ?>
	<?php $inde++;
} ?>	


<?php if ($pager): ?>
	<?php print $pager; ?>
<?php endif; ?>
          

