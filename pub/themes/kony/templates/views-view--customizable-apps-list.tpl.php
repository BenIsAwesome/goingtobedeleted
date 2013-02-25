<?php
/*
*@file
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
$appsArray = array();

foreach($view->result as $appListItem) { 
	$appIconImage = $appTitle = $appItemDesc = "";
	$appPlatforms = array();
	if(count($appListItem->_field_data)) {
		$appLoad = $appListItem->_field_data['nid']['entity'];
	} else {
		$appLoad = node_load($appListItem->nid);
	}
	
	if(count($appLoad->field_kony_app_icon_image)) {
		$appIconImage = file_create_url($appLoad->field_kony_app_icon_image['und'][0]['uri']);
	}
	
	if(count($appLoad->field_kony_app_title)) {
		$appTitle = $appLoad->field_kony_app_title['und'][0]['value'];
	}
	
	if(!empty($appLoad->field_kony_app_intro_text['und'][0]['value'])) {
		$appItemDesc = $appLoad->field_kony_app_intro_text['und'][0]['value'];
	}
	
	if(count($appLoad->field_kony_app_platform)) {
		foreach($appLoad->field_kony_app_platform['und'] as $platformList) {
			$platformTData = taxonomy_term_load($platformList['tid']);
			$appPlatforms[] = array(
				'platformName' => $platformTData->name
			);
		}
	}
	$appLinkPath = drupal_lookup_path('alias', 'node/'.$appLoad->nid);
	if(empty($appLinkPath)) {
		$appLinkPath = 'node/'.$appLoad->nid;
	}
	
	if(count($appLoad->field_kony_app_vertical)) {
		if(count($appLoad->field_kony_app_type)) {
			$appTypeId = $appLoad->field_kony_app_type['und'][0]['tid'];
			$appTermLoad = taxonomy_term_load($appTypeId);
			$appTermName = $appTermLoad->name;
		}
		
		//adds the app to corresponding vertical & type for presentation later
		foreach($appLoad->field_kony_app_vertical['und'] as $vertical){
			$verticalTerm = taxonomy_term_load($vertical['tid'])->name;
			if(!isset($appsArray[$verticalTerm])){
				$appsArray[$verticalTerm] = array();
			}
			if(!isset($appsArray[$verticalTerm][$appTermName])){
				$appsArray[$verticalTerm][$appTermName] = array();
			}
			$appsArray[$verticalTerm][$appTermName][$appTitle] = array(
				'appId' => $appLoad->nid,
				'appTitle' => $appTitle,
				'appIconImage' => $appIconImage,
				'appLinkPath' => $appLinkPath
			);
		}
	}
}

//sort the arrays by alphabet key
ksort($appsArray);
foreach($appsArray as $key=>$value){
	ksort($appsArray[$key]['Enterprise']);
	ksort($appsArray[$key]['Consumer']);
	if(count($appsArray[$key]['Consumer'])){//reorder the array so that enterprise prints first
		$temp = $appsArray[$key]['Consumer'];
		unset($appsArray[$key]['Consumer']);
		$appsArray[$key]['Consumer'] = $temp;
	}	
}
//move all to the end of the array for visual display order
$temp = $appsArray['All'];
unset($appsArray['All']);
$appsArray['All'] = $temp;

/*
dsm($appsArray);
echo "<pre>";
print_r($appsArray);
echo "</pre>";
*/
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
			<article class="container group" id="pri-content">		
				<div class="story-branch">
					<section class="kony-feature-tabbed-apps master app-grid">
						<h3>Browse Apps By Industry</h3>
						<?php
							//how many of each type go on a row
							$vertRowBreak = 10;
							$enterpriseAppRowBreak = 4;
							$consumerAppRowBreak = 2;
							
							//splice the arrays into something that will work for the output
							$splices = array_chunk($appsArray,$vertRowBreak,TRUE);
							$rows = count($splices);
						?>
						
						<?php for($i=0;$i<$rows;$i++): ?>
							<ul class="app-tabs ten-tabs group">
							<?php foreach($splices[$i] as $vertName=>$trash): 
								$tabCnt++;
							?>
								<li>
									<a class="app-click" href="#vert-<?php echo $tabCnt; ?>-tab">
										<img src="/themes/kony/images/icon_app_folder.jpg" alt="<?php echo $vertName; ?>" />
									</a>
									<a class="app-click" href="#vert-<?php echo $tabCnt; ?>-tab">
										<h5><?php echo $vertName; ?></h5>
									</a>
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endfor; ?>
						
						<?php for($i=0;$i<$rows;$i++): //loops over splices
							$cntVerts = count($splices[$i]);
							$tabCnt = $i * $vertRowBreak;
						?>
							<?php 
								reset($splices[$i]); 
								$tabCnt = $i * $vertRowBreak;
							?>
							
							<?php foreach($splices[$i] as $vertName=>$vertArray):
									$consumerAppRowBreak = 2;
                                    $enterpriseAppRowBreak =4;							
									$tabCnt++;
							?>
								
								<div id="vert-<?php echo $tabCnt; ?>-tab" class="app-panel group" style="display: none">
								<?php 
								     if(isset($vertArray['Enterprise'])&&count($vertArray['Enterprise'])>0):
										if(count($vertArray['Consumer'])==0){
											$enterpriseAppRowBreak = 6;
										} 
										$apps = array_chunk($vertArray['Enterprise'], $enterpriseAppRowBreak, TRUE);
										$cntAppGrps = count($apps);
										$entBorderClass = "";
										if(ceil(count($vertArray['Enterprise']) / $enterpriseAppRowBreak) >= ceil(count($vertArray['Consumer']) / $consumerAppRowBreak)){
											if($enterpriseAppRowBreak==4)
												$entBorderClass = "border-right";
											else if($enterpriseAppRowBreak==6)
												$entBorderClass ="border-right enter-tabs";
											else
 											   $entBorderClass = "";
											$cmrBorderClass = "";
										}else{
											$entBorderClass = "";
											$cmrBorderClass = "border-left";
										}
								?>
									<div class="col left <?php echo $entBorderClass; ?>">
										<h3>Enterprise</h3>
										<?php for($j=0;$j<$cntAppGrps;$j++): ?>
											<ul class="app-icons four-tabs group">
												<?php foreach($apps[$j] as $appInfo): ?>
													<li>
														<a href="/<?php echo $appInfo['appLinkPath']; ?>">
															<img src="<?php echo $appInfo['appIconImage'] ;?>" alt="<?php echo $appInfo['appTitle']; ?>"/>
															<h5><?php echo $appInfo['appTitle'];?></h5>
														</a>
													</li>
												<?php endforeach; ?>		
											</ul>
										<?php endfor; ?>
									</div>
								<?php endif; //close enterprise ?>
								<?php if(isset($vertArray['Consumer'])): 
										 if(count($vertArray['Enterprise'])==0){
				                              				  $consumerAppRowBreak = 6;
											  $cmrBorderClass .= " left enter-tabs";
                                            					  }else{
											  $cmrBorderClass .= " right";
										  }
										$apps = array_chunk($vertArray['Consumer'], $consumerAppRowBreak, TRUE);
										$cntAppGrps = count($apps);
								?>
									<div class="col <?php echo $cmrBorderClass; ?>">
										<h3>Consumer</h3>
										<?php for($j=0;$j<$cntAppGrps;$j++): ?>
											<ul class="app-icons two-tabs group">
												<?php foreach($apps[$j] as $appInfo): ?>
													<li>
														<a href="/<?php echo $appInfo['appLinkPath']; ?>">
															<img src="<?php echo $appInfo['appIconImage'] ;?>" alt="<?php echo $appInfo['appTitle']; ?>"/>
															<h5><?php echo $appInfo['appTitle'];?></h5>
														</a>
													</li>
												<?php endforeach; ?>		
											</ul>
										<?php endfor; ?>
									</div>
								<?php endif; //close Consumer ?>											
								</div><!-- close vert grouping -->
							<?php endforeach; //end vert splices?>
						<?php endfor; //end rows splices?>
						
						
						<?php if ($pager): ?>
							<?php print $pager; ?>
						<?php endif; ?>
                                                <div class="clearfix"></div>                
					</section>
					<!--Begin app phone accordian -->
					<section class="kony-feature-tabbed-apps master app-accordian">
						<h3 style="color: #333;">Browse Apps By Industry</h3>
						<div id="app-accordian">
							<?php foreach($appsArray as $vertName => $vertApps): ?>
								<h3 class="app-vert-name"><?php echo $vertName; ?></h3>
								<div style="display:none;">
									<?php foreach($vertApps as $market=>$apps): 
										if(count($apps) == 0){
											continue;
										}
									?>
									<h4><?php echo $market; ?></h4>
									<ul>
										<?php foreach($apps as $name=>$value): ?>
											<li class="app">
												<a href="/<?php echo $value['appLinkPath']; ?>">
													<img src="<?php echo $value['appIconImage'] ;?>" alt="<?php echo $value['appTitle']; ?>"/>
													<h5><?php echo $value['appTitle'];?></h5>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
									<?php endforeach; ?>
								</div>
							<?php endforeach; ?>
						</div>
						
						<?php if ($pager): ?>
							<?php print $pager; ?>
						<?php endif; ?>
                        <div class="clearfix"></div>                
					</section>
				</div>
			</article>
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

