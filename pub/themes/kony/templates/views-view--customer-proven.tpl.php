<?php
/**
* @file
* Main view template.
*
* Variables available:
* - $classes_array: An array of classes determined in
* template_preprocess_views_view(). Default classes are:
* .view
* .view-[css_name]
* .view-id-[view_name]
* .view-display-id-[display_name]
* .view-dom-id-[dom_id]
* - $classes: A string version of $classes_array for use in the class attribute
* - $css_name: A css-safe version of the view name.
* - $css_class: The user-specified classes names, if any
* - $header: The view header
* - $footer: The view footer
* - $rows: The results of the view query, if any
* - $empty: The empty text to display if the view is empty
* - $pager: The pager next/prev links to display, if any
* - $exposed: Exposed widget form/info to display
* - $feed_icon: Feed icon to display, if any
* - $more: A link to view more, if any
*
* @ingroup views_templates
*/
$customersListArray = array();
$current_date = strtotime('now');
$index = 1;
foreach($view->result as $customerListItem) { 
	$customerIconImage = $customerTitle = $customerItemDesc = $customerCountry = $industryName = $customerSince = $webinarPath = $genericContenPath = $webinarText = $genericContenText = "";
	$caseStudiesArray = array();
	$customerPlatforms = array();
	if(count($customerListItem->_field_data)) {
		$customerLoad = $customerListItem->_field_data['nid']['entity'];
	} else {
		$customerLoad = node_load($customerListItem->nid);
	}
	
	if(count($customerLoad->field_kony_company_profile_img)) {
		$customerIconImage = file_create_url($customerLoad->field_kony_company_profile_img['und'][0]['uri']);
	}
	
	if(count($customerLoad->field_company_profile_name)) {
		$customerTitle = $customerLoad->field_company_profile_name['und'][0]['value'];
	}
	
	if(count($customerLoad->field_company_profile_country)) {
		$customerCountry = $customerLoad->field_company_profile_country['und'][0]['value'];
	}
	
	if(count($customerLoad->field_company_profile_industry)) {
		$industryLoad = taxonomy_term_load($customerLoad->field_company_profile_industry['und'][0]['tid']);
		$industryName = $industryLoad->name;
	}
	
	if(count($customerLoad->field_company_profile_memb)) {
		$customerSince = $customerLoad->field_company_profile_memb['und'][0]['value'];
	}
	
	if(!empty($customerLoad->body['und'][0]['value'])) {
		$customerItemDesc = $customerLoad->body['und'][0]['value'];
	}
	
	if(count($customerLoad->field_company_profile_webinar)) {
		$webinarContentLoad = node_load($customerLoad->field_company_profile_webinar['und'][0]['target_id']);
		$webinarPath = drupal_lookup_path('alias', 'node/'.$webinarContentLoad->nid);
		if(count($webinarContentLoad->field_kony_webinar_date)) {
			$timestamp = $webinarContentLoad->field_kony_webinar_date['und'][0]['value'];
		}
		if($current_date > $timestamp) {
			$webinarText = "Watch";
		} else {
			$webinarText = "Register";
		}
	}
	
	if(count($customerLoad->field_company_profile_value_prop)) {
		$genericContenLoad = node_load($customerLoad->field_company_profile_value_prop['und'][0]['target_id']);
		$genericContenPath = drupal_lookup_path('alias', 'node/'.$genericContenLoad->nid);
		if(empty($genericContenPath)) {
			$genericContenPath = 'node/'.$genericContenLoad->nid;
			$genericContenText = "Learn More"; //$genericContenLoad->title;
		}
	}
	
	if(count($customerLoad->field_company_profile_case_study)) {
		foreach ($customerLoad->field_company_profile_case_study['und'] as $eachCaseStudy):
			$caseStudyLoad = node_load($eachCaseStudy['target_id']);
			if(count($caseStudyLoad->field_kony_case_study_cdn_url)) {
				$caseStudiesArray[]['linkURL'] = kony_custom_link($caseStudyLoad->field_kony_case_study_cdn_url);
			} else {
				$caseStudiesArray[]['linkURL'] = file_create_url($caseStudyLoad->field_kony_case_study_file['und'][0]['uri']);
			}
		endforeach;
	}
				
	
	$customerLinkPath = drupal_lookup_path('alias', 'node/'.$customerLoad->nid);
	if(empty($customerLinkPath)) {
		$customerLinkPath = 'node/'.$customerLoad->nid;
	}
	
	$customersListArray[$index] = array(
		'customerTitle' => $customerTitle,
		'customerItemDesc' => $customerItemDesc,
		'customerIconImage' => $customerIconImage,
		'customerSince' => $customerSince,
		'customerLinkPath' => $customerLinkPath,
		'industryName' => $industryName,
		'customerCountry' => $customerCountry,
		'webinarPath' => $webinarPath,
		'genericContenPath' => $genericContenPath,
		'webinarText' => $webinarText,
		'genericContenText' => $genericContenText,
		'caseStudies' => $caseStudiesArray,
	);
	$index = $index + 1;
}
?>
<div class="<?php print $classes; ?>">
	<?php print render($title_prefix); ?>
	<?php if ($title): ?>
		<?php print $title; ?>
	<?php endif; ?>
	<?php print render($title_suffix); ?>

	<?php if ($header): ?>
		<div class="view-header">
			<?php print $header; ?>
		</div>
	<?php endif; ?>

	<?php if ($exposed): ?>
		<div class="view-filters">
			<?php print $exposed; ?>
		</div>
	<?php endif; ?>

	<?php if ($attachment_before): ?>
		<div class="attachment attachment-before">
			<?php print $attachment_before; ?>
		</div>
	<?php endif; ?>

	<?php if ($rows): ?>
		<div class="view-content">
			<section class="kony-feature-customer-grid master arrows">
				<h3>Kony Customers</h3>
			<?php 
			$customerscount = count($customersListArray);
			$halfcustomers = $customerscount/6;
			if(strstr($halfcustomers,".")) {
				$actualVal = explode(".",$halfcustomers);
				$halfcustomers = $actualVal[0] + 1;
			}
			$start = 1;
			if($customerscount) {
				for($i=1; $i<=$halfcustomers; $i++) {
				$end = $start+5;?>
					<ul class="customer-tabs six-tabs group">
						<?php
						for($j=$start; $j<=$end; $j++) {
							if(isset($customersListArray[$j])) { ?>
								<li>
									<a href="#tab-<?php print $j; ?>"> 
										<?php
										if(!empty($customersListArray[$j]['customerIconImage'])) {	?>
											<img alt="<?php print $customersListArray[$j]['customerTitle']; ?>" src="<?php print $customersListArray[$j]['customerIconImage']; ?>">
										<?php } ?>
									</a>
								</li>
							<?php 
							}
						}	?>
					</ul>
					
					<?php
					for($j=$start; $j<=$end; $j++) {
						if(isset($customersListArray[$j])) { ?>
							<div id="tab-<?php print $j; ?>" class="customer-panel group"> 
								<h4>
									<?php print $customersListArray[$j]['customerTitle']; ?>
								</h4>
								<dl class="four right">
									<?php if(!empty($customersListArray[$j]['industryName'])) {?>
										<dt>Industry:</dt>
										<dd><?php print $customersListArray[$j]['industryName'];?></dd>
									<?php } ?>
									
									<?php if(!empty($customersListArray[$j]['customerCountry'])) {?>
										<dt>Country:</dt>
										<dd><?php print $customersListArray[$j]['customerCountry'];?></dd>
									<?php } ?>
									
									<?php if(!empty($customersListArray[$j]['customerSince'])) {?>
										<dt>Customer Since:</dt>
										<dd><?php print date("Y", $customersListArray[$j]['customerSince']);?></dd>
									<?php } ?>
									
									<?php if(!empty($customersListArray[$j]['webinarPath'])) {?>
										<dt>Webinar:</dt>
										<dd>
											<a href="<?php print $webinarPath;?>">
												<?php print $customersListArray[$j]['webinarText'];?>
											</a>
										</dd>
									<?php } ?>
									
									<?php if(!empty($customersListArray[$j]['genericContenPath'])) {?>
										<dt>Generic Content:</dt>
										<dd>
											<a href="/<?php print $genericContenPath;?>">
												<?php print "Learn More";//$customersListArray[$j]['genericContenText'];?>
											</a>
										</dd>
									<?php } ?>
									<?php if(count($customersListArray[$j]['caseStudies'])) {?>
										<dt>Case Study:</dt>
										<dd style="margin: 0;">
										<?php
										foreach($customersListArray[$j]['caseStudies'] as $caseStudyInfo) {?>
											<a class="button" href="<?php print $caseStudyInfo['linkURL'];?>">
												Download <i class="icon-download-alt"></i>
											</a>
											<br>
										<?php }	?>
										</dd>
									<?php } ?>
								</dl>
								<?php print render($customersListArray[$j]['customerItemDesc']);?>
							</div>
						<?php 
						}
					} ?>
					<?php 
					$start = $end + 1;
				}
			}
			?>
			<?php if ($pager): ?>
				<?php print $pager; ?>
			<?php endif; ?>
            	<div class="clearfix"></div>
			</section>
		</div>
	<?php elseif ($empty): ?>
		<div class="view-empty">
			<?php print $empty; ?>
		</div>
	<?php endif; ?>

	<?php if ($attachment_after): ?>
		<div class="attachment attachment-after">
			<?php print $attachment_after; ?>
		</div>
	<?php endif; ?>

	<?php if ($more): ?>
		<?php print $more; ?>
	<?php endif; ?>

	<?php if ($footer): ?>
		<div class="view-footer">
			<?php print $footer; ?>
		</div>
	<?php endif; ?>

	<?php if ($feed_icon): ?>
		<div class="feed-icon">
			<?php print $feed_icon; ?>
		</div>
	<?php endif; ?>
</div>




