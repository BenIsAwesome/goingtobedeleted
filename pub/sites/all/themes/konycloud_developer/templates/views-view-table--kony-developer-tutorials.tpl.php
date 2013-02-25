<?php

/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
 global $theme_path, $base_path;
     foreach($view->result as $eachRow) {
	if(count($eachRow->_field_data)) {
		$nodeLoad = $eachRow->_field_data['nid']['entity'];
	} else {
		$nodeLoad = node_load($eachRow->nid);
	}
	$tutorial_link = drupal_lookup_path('alias','node/'.$eachRow->nid);
	if(count($nodeLoad->field_kony_dev_tut_headline)) {
		$title = $nodeLoad->field_kony_dev_tut_headline['und'][0]['value'];
	}
	if(count($nodeLoad->field_kony_dev_tut_image)) {
		$image = file_create_url($nodeLoad->field_kony_dev_tut_image['und'][0]['uri']);
	}
	if(count($nodeLoad->field_kony_dev_tut_video_link)) {
		$link = file_create_url($nodeLoad->field_kony_dev_tut_video_link['und'][0]['url']);
		$tutorialVideoTitle = $nodeLoad->field_kony_dev_tut_video_link['und'][0]['value'];
	}
	if(count($nodeLoad->field_kony_dev_tut_app_pre_link)) {
		$preferred_VideoLink = file_create_url($nodeLoad->field_kony_dev_tut_app_pre_link['und'][0]['url']);
		$preferred_VideoTitle = $nodeLoad->field_kony_dev_tut_app_pre_link['und'][0]['value'];
	}
	$date = date_format_change($nodeLoad->created);
	if(count($nodeLoad->body)) {
		 $tutorialItemDesc = field_view_field('node', $nodeLoad, 'body', 'teaser');                                                   
	}	
	if(count($nodeLoad->field_kony_dev_tut_level)) {
		$level = taxonomy_term_load($nodeLoad->field_kony_dev_tut_level['und'][0]['tid']);
		$color = $level->field_kony_dev_level_color_class['und'][0]['value'];
			}	
	if(count($nodeLoad->field_kony_dev_tut_soft_type)) {
			$softwareProduct = taxonomy_term_load($nodeLoad->field_kony_dev_tut_soft_type['und'][0]['tid']);
	}
	if(count($nodeLoad->field_kony_dev_tut_rel_downloads['und']))
	{
	  $tutorialDownloads = $nodeLoad->field_kony_dev_tut_rel_downloads['und'];
	}	
	$tutorialsArray[] = array(
		'tutorialTitle' => $title,
		'tutorialImage' => $image,
		'tutorialVideoLink' =>$link,
		'preferredVideoLink' => $preferred_VideoLink,
		'preferredVideoTitle' => $preferred_VideoTitle,
		'tutorialDate' => $date,
		'tutorialDesc' => $tutorialItemDesc,
		'tutorialLevel' => $level->name,
		'tutorialLink' => $tutorial_link,
		'tutorialVideoTitle' => $tutorialVideoTitle,
		'levelColor' => $color,
		'downloads' =>$tutorialDownloads,
	);
 }
?>
<div class="<?php print $classes; ?>">
<div class="spacing">
	<div class="tutorial-billboard-bgcolor">
								<p class="billboard"><i class="icon-arrow-left"></i><a href="<?php print $base_path."tutorials";?>"> Back to Tutorials</a> </p>
								</div>
	<div class="master-billboard-homepage group banner-height">
 			<div id="intro-slider" class="flexslider panel" >
				<ul class="slides">
			    	<li>
			    	
			    		<div class="container group tutorial-margin-header" id="header-text" >	
					    	<div class="left group tutorial-header-text header-top-margin">
					    		<h2><?php print $softwareProduct->name;?> Tutorials</h2>					    						    		
					    	</div>
							<div class="right header-top-margin">
							<form name="exposed_search" action="/tutorials/<?php print $softwareProduct->name;?>" method="get" accept-charset="UTF-8"><div class="right">						
							<div class="left"><input type="text" class="searchinput" name="keyword" value="Search Studio tutorials" onfocus="this.value=='Search Studio tutorials'?this.value='':this.value" onblur="this.value==''?this.value='Search Studio tutorials':''"  ></div>
							<div class="right tutorial-button"><a class="button right tutorial-inputbox"  onclick="document.exposed_search.submit();">Go</a></div>
							</form>
							</div>
			    		</div>
						</div>
						<img class="bg-img" src="<?php print $base_path.$theme_path;?>/images/tutorials-banner-image.jpg" alt="">
						
			    	</li>
			    </ul>
			<!--Banner Image ends here-->
</div>	
</div>
	<!--end .container div-->
	 <?php if ($attachment_before): ?>
        <div class="attachment attachment-before">
            <?php print $attachment_before; ?>
        </div>
    <?php endif; ?>
	<?php if ($rows): ?>
 <div class="view-content">
<div class="feature" style="padding-top:23px;"></div>

<article id="pri-content" class="container group">
	
	<section class="kony-feature-next-steps">
					
<table id="tutorial-list" cellpadding="0" cellspacing="0">
		<thead> 
		<?php if(count($tutorialsArray)==0) {?>
		<tr>
		<td align="center"><p><?php print "No Developer Tutorials Found ";?></p></td>		
		</tr>
		<tr>
		<td colspan="5" class="tutorials-gry-line"></td>
	</tr>
		<?php } ?>
	<tr> <?php if(count($tutorialsArray)) {?>
		<th></th>
		<th>
		<?php if($_GET['sort_order']=='ASC'){ $order = 'DESC'; $order_by='asc';} else {$order='ASC'; $order_by='desc';}?>
							 
							 <a href="?field_kony_dev_tut_headline_value=&sort_by=field_kony_dev_tut_headline_value_format&sort_order=<?php echo $order; ?>&order=field_kony_dev_tut_headline&sort=<?php echo $order_by;?>" style="text-decoration:none;">
							<?php if($_GET['sort_by']=='field_kony_dev_tut_headline_value_format' && $_GET['sort_order']=='ASC'){?>
							 <h4>Title<img src="<?php print $base_path.$theme_path;?>/images/downarrowicon.png" alt="" /></h4>
							 <?php } else{?>
							  <h4>Title<img src="<?php print $base_path.$theme_path;?>/images/uparrowicon.png" alt="" /></h4>
							 <?php } ?>							 
							 </a>
		</th> 
		<th>
		<?php if($_GET['sort_order']=='ASC'){ $order = 'DESC'; $order_by='asc';} else {$order='ASC'; $order_by='desc';}?>
							 <a href="?sort_order=<?php echo $order; ?>&order=created&sort=<?php echo $order_by;?>" style="text-decoration:none;">
				<?php if($_GET['order']=='created' && $_GET['sort_order']=='ASC'){?>
							 <h4>Date<img src="<?php print $base_path.$theme_path;?>/images/downarrowicon.png" alt="" /></h4>
							 
							 <?php }
						else	 {?>
							 <h4>Date<img src="<?php print $base_path.$theme_path;?>/images/uparrowicon.png" alt="" /></h4>
							 
						<?php }?>
							 </a>
		</th> 
		<th>
		<?php if($_GET['sort_order']=='ASC'){ $order = 'DESC'; $order_by='asc';} else {$order='ASC'; $order_by='desc';}?>
							 <a href="?field_kony_dev_tut_level=&sort_by=field_kony_level_value_format&sort_order=<?php echo $order; ?>&order=field_kony_dev_tut_level&sort=<?php echo $order_by;?>" style="text-decoration:none;">
							 <?php if($_GET['sort_by']=='field_kony_level_value_format' && $_GET['sort_order']=='ASC'){?> 
							 <h4>Level<img src="<?php print $base_path.$theme_path;?>/images/downarrowicon.png" alt="" /></h4>
							 <?php }
							 else{?>
							 <h4>Level<img src="<?php print $base_path.$theme_path;?>/images/uparrowicon.png" alt="" /></h4>
							 <?php }?>
							 </a>
		</th> 
		<th><h4>Resources</h4></th> 
		<?php }?>		
	</tr> 
	</thead> 
	<tbody> 
	<?php 
	 $i =1;
	if(count($tutorialsArray)) { 
							foreach($tutorialsArray as $eachTutorial) { ?>
	<tr> 
		<td class="img-td-width">
		<a href="<?php if($eachTutorial['preferredVideoLink']){ print $eachTutorial['preferredVideoLink']; }else{ print $eachTutorial['tutorialVideoLink'];}?>" class="lightbox feature_img fancybox-video"><img style="margin-left:10px;" src="<?php print $eachTutorial['tutorialImage'];?>" alt="<?php if($eachTutorial['preferredVideoTitle']){ print $eachTutorial['preferredVideoTitle'];} else if($eachTutorial['tutorialVideoTitle']){ print $eachTutorial['tutorialVideoTitle'];} ?>">
									</a>
		</td> 
		<td class="title-td-width"><a href="<?php print $base_path.$eachTutorial['tutorialLink'];?>"><h4><?php print $eachTutorial['tutorialTitle'];?></h4></a><?php print render($eachTutorial['tutorialDesc']);?></td> 
		<td class="tutorial-DL-td-width"><?php print $eachTutorial['tutorialDate'];?></td> 
		<td class="tutorial-DL-td-width"><span class="<?php print $eachTutorial['levelColor'];?>"><?php print $eachTutorial['tutorialLevel'];?></span></td> 
		<td class="tutorial-res-td-width">
		<?php foreach($eachTutorial['downloads'] as $tutDownload){
		$reObj = node_load($tutDownload['target_id']);
		if($reObj->field_kony_dwnload_file['und'][0]['uri']){
			$path = file_create_url($reObj->field_kony_dwnload_file['und'][0]['uri']);
		}?>
               																			<i class="icon-download-alt">&nbsp</i><a href="<?php print $path;?>"><?php print $reObj->field_kony_dwnload_file_headline['und'][0]['value'];?></a><br/>
		<?php }  ?>
		<?php if($eachTutorial['preferredVideoLink']){?>
		<p><i class="icon-play-circle"></i>
		<a href="<?php print $eachTutorial['preferredVideoLink']; ?>" class="lightbox feature_img fancybox-video"><?php if($eachTutorial['preferredVideoTitle']){ print $eachTutorial['preferredVideoTitle'];} else{ print "App Preview";}?></a></p>
		<?php }?>
		</td> 
	</tr> 
	<tr>
	<?php if($i != count($tutorialsArray)){
	$class ="tutorials-gry-line";
	} else 
	{
	$class="";
	}
	?>
			<td colspan="5" class="<?php print $class;?>"></td>	
	</tr>
	
		<?php
  $i++;		
		} // end foreach loop
		} // end if loop
		?>
	
	</tbody> 
</table> 
				
					
	</section>

	<p></p>
	

</article> 
</div>
<?php endif;?>
