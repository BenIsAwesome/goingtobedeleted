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
?>
<div class="spacing" id="billboard">
	<div style="height:204px;" class="master-billboard-homepage group">
			<div class="flexslider panel" id="intro-slider">
				<ul class="slides">
			    	<li>
			    	
			    		<div style="padding-top:20px" class="container group">	
							<p id="product" style="padding-bottom:40px;">&lt; Back to tutorials home </p>
					    	<div style="width:500px;" class="left group">
					    		<h2>Kony Studio Tutorials</h2>
					    		<p id="product">Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus.</p>
					    		
					    	</div>
							<div class="right">
							<div class="left"><input type="text" value="Search Studio tutorials">&nbsp;&nbsp;&nbsp;</div>
							<div style="margin-top:7px" class="right"><a href="/apps" style="padding-right:20px;width:60px; height:30px;line-height:7px" class="button right">Go</a></div>
							</div>
			    		</div>
						<img alt="" src="themes/kony/images/tutorials-banner-image.jpg" class="bg-img">
						
			    	</li>
			    </ul>
			</div>
			<!--Banner Image ends here-->
</div>	
</div>
<article id="pri-content" class="container group">
	
	<section class="kony-feature-next-steps master-tutorials">
	<div class="group" style="width:100%" >
			<?php if (!empty($header)) : ?>    
            <?php foreach ($header as $field => $label): ?>        
          <div class ="cols">
		   <?php print $label; ?>
          </div>
        <?php endforeach; ?>
    
      <?php endif; ?>
   
				<?php foreach($view->result as $featuredTutorialItem)
				{
				$title = $featuredTutorialItem->_field_data['nid']['entity']->field_kony_dev_tut_headline['und'][0]['value'];
				$image = $featuredTutorialItem->_field_data['nid']['entity']->field_kony_dev_tut_image['und'][0]['uri'];
				$date = date('d-m-y',$featuredTutorialItem->_field_data['nid']['entity']->created);
				$body = $featuredTutorialItem->_field_data['nid']['entity']->body['und'][0]['value'];
				$level = taxonomy_term_load($featuredTutorialItem->_field_data['nid']['entity']->field_kony_level['und'][0]['tid']);
						?>									
					<div class="feature">
																																												   <a href="#" class="lightbox feature_img"><img style="margin-left:20px;" src="<?php print $image;?>" alt="<?php print $title;?>"></a>																																	
                                 <div class="feature_desc">
									<h4><?php print $title;?></h4>
									<p><?php print $body;?> </p>
									</div> <!-- close feature desc -->								
								<div class="feature_desc" style="width:16%; padding-left:16px"">								
								<p><?php print $date;?></p></div> 								
								<div class="feature_desc" style="width:10%">								
								<p id="beginner"><?php print $level->name;?></p>
								</div> 								
								<div class="feature_desc" style="width:18%;float:left">								
								<div class="feature_desc" width="70px"  style="padding-left:30px">
								<p id="icntxt" style="width:70px"><img width="25px" src="/themes/kony/images/pdficon.png" alt="">PDF</p>
								</div>
								<div class="feature_desc" width="70px"  style="padding-left:30px">
								<p id="icntxt" style="width:70px"><img width="33px" alt="" src="/themes/kony/images/downloadicon.png">other</p>
								</div>
								</div> 
						</div>		
				<?php } ?>
					
				</div>
				
					
	</section>

	<p></p>
	

</article> 
