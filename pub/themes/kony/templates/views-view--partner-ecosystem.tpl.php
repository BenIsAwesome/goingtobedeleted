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
$view_name = 'partner_ecosystem';
$view_result = views_get_view_result($view_name);
$partnersArray = array();
$termIdRef = array(34 => 'Global Integrators', 35 => 'Regional Integrators', 36 => 'Technology Partners');
foreach($view_result as $item) {
	$nodeEntity = $item->_field_data['nid']['entity'];
	$termId = $nodeEntity->field_kony_company_profile_prt_t['und'][0]['tid'];
	$partnerIconImage = file_create_url($nodeEntity->field_kony_company_profile_img['und'][0]['uri']);
	$partnerPath = "/".drupal_lookup_path('alias','node/'.$nodeEntity->nid); 
	if(!empty($nodeEntity->body['und'][0]['summary'])) {
		$partnerDesc = $nodeEntity->body['und'][0]['summary'];
	} else {
		$partnerDesc = substr($nodeEntity->body['und'][0]['value'],0,150);
	}
	$partnerTitle = $nodeEntity->field_company_profile_name['und'][0]['value'];
	$partnersArray[$termId][$partnerTitle] =  array(
		'partnerImage' => $partnerIconImage,
		'partnerPath' => $partnerPath,
		'partnerDesc' => $partnerDesc,
		'partnerTitle' => $partnerTitle
	);
	
	}
if(count(partnersArray)) { 
?>
	<section class="kony-feature-tabbed-partners master arrows">
		<h3>Partners</h3>
		<ul class="tabs secondary-tabs three-tabs group">
			<li><span><a href="#global" class="current">Global Integrators</a></span></li>
			<li><span><a href="#regional">Regional Integrators</a></span></li>
			<li><span><a href="#technology">Technology Partners</a></span></li>
		</ul>

		<?php 
		foreach($termIdRef as $termKey => $termValue) {
			$termInformation = taxonomy_term_load($termKey);	?>
			<div class="panel group" style="display: block;">
				<?php /*
                                <div class="col six left">
					<p><?php print $termInformation->description; ?> </p>
				</div>
                                */?>
				<?php $breaks = array(4);//array(2,6);
				$partnerCount = 1;				
				ksort($partnersArray[$termKey]);				
									foreach($partnersArray[$termKey] as $globalPartner) { ?>
					<div class="partner three">
						<img alt="<?php print $globalPartner['partnerTitle'];?>" src="<?php print $globalPartner['partnerImage'];?>">						
					</div>
					<?php if(in_array($partnerCount, $breaks)) {?>
						<span class="clear-row"></span>
					<?php }
					$partnerCount = $partnerCount + 1;
				} ?>    
			</div>
		<?php } ?>
	<div class="clearfix"></div>
	</section>
<?php } ?>
