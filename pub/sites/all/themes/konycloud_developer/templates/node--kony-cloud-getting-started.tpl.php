<?php
 global $base_path, $theme_path;
 $path = $base_path.$theme_path;

$headLine = $node->field_kony_cld_get_srt_headline['und'][0]['value'];
$description = $node->body['und']['0']['value'];
$bgImage = file_create_url($node->field_kony_cld_get_srt_bg_img['und']['0']['uri']);
$bgColor = $node->field_kony_cld_get_srt_bg_color['und']['0']['value'];
if($bgColor){
 $class = "flexslider";
?>
 <div id="billboard" class="spacing getting-started-billboard" style="background-image:none !important; background-color:#<?php print $bgColor ?> !important">
<?php }else {
 $class = "flexslider panel"; ?>
 <div id="billboard" class="spacing getting-started-billboard">
<?php
}
?>
	<div class="master-billboard-homepage group banner-height">
		<div id="intro-slider" class="<?php print $class;?>">
			<ul class="slides">
				<li>
					<div class="container group"  >
						<div id="get-header-text" class="group txt-align header-margin-left">
						<h2 class="heading-align"><?php print $headLine;?></h2>
						<?php if(count($node->body)) { ?>
						<?php print $description; ?>
						<?php } ?>
						</div>
					</div>
					<?php if(count($node->field_kony_cld_get_srt_bg_img)) { ?>
					<img class="bg-img" src="<?php print $bgImage?>" alt="">
					<?php } ?>
				</li>
			</ul>
		</div>
							<!--Banner Image ends here-->
	</div>
</div>


<article id="pri-content" class="container group">

                <section style="padding-bottom:10px">

                        <div id="getting-started-tab">
                <ul id="tabs" class="tabs getting-started-tabs group five-tabs style_tabs">

<?php
$temp=1;
foreach ($content['field_kony_cld_get_srt_cnt_info']['#items'] as $entity_uri):
                $conInfoCollection = entity_load('field_collection_item', $entity_uri);
                foreach ($conInfoCollection as $conInfoCollectionObj):
                        $tabHeadline = $conInfoCollectionObj->field_kony_cnt_inf_section_title['und'][0]['value'];
		if($temp==1){	
                ?>                              
                 <li class="active">
                        <span><a class="current" itemNo="<?php print $temp?>"  id="data_<?php print $temp;?>"  style="width:100%" href="#tabs-<?php print $temp;?>"><?php print $tabHeadline;?></a>
		               <img id="active_<?php print $temp?>" src="<?php print $path ?>/images/gettingstarted-tab-active.png">
			</span>
	         </li>
                 <?php }else{?>
		  <li>
                        <span><a style="width:100%" itemNo="<?php print $temp?>" id="data_<?php print $temp;?>" href="#tabs-<?php print $temp;?>"><?php print $tabHeadline;?></a>
			 <img id="active_<?php print $temp?>" src="<?php print $path ?>/images/gettingstarted-tab-active.png" style="display:none">

			</span>
	         </li>
		 <?php }
		 ?>

<?php
		   $temp++;
               endforeach;
?>
<?php
endforeach;
?>
         </ul>
<span id="ctab" items="<?php print $temp-1?>"></span>

        </div>
</section>
	<?php 	
	$temp = 1;
	foreach ($content['field_kony_cld_get_srt_cnt_info']['#items'] as $entity_uri):
                $conInfoCollection = entity_load('field_collection_item', $entity_uri);
		if($temp==1){?>
		<div id="data_div_<?php print $temp;?>" class="panel group">
			<div></div>
                <?php }else{?>
			 <div id="data_div_<?php print $temp;?>" class="panel group" style="display:none">
			<div></div>
		<?php	}
					
			foreach ($conInfoCollection as $conInfoCollectionObj):
                        //$infoContentDetails = node_load($conInfoCollectionObj->field_kony_cnt_info_content['und'][0]['target_id']);
			 foreach($conInfoCollectionObj->field_kony_cnt_inf_cta_ref['und'] as $ctaObj){
			  $ctaRef = node_load($ctaObj['target_id']);
                          $ctaView = node_view($ctaRef);
			   print render($ctaView);
			 }
			  foreach($conInfoCollectionObj->field_kony_cnt_inf_box_ref['und'] as $boxObj){
			  $boxRef = node_load($boxObj['target_id']);
                          $boxView = node_view($boxRef);
			   print render($boxView);
			 }
			  foreach($conInfoCollectionObj->field_kony_cnt_inf_dev_tu_ref['und'] as $tutObj){
			    $tutRef = node_load($tutObj['target_id']);
				$tutUrl = drupal_lookup_path('alias',"node/".$tutObj['target_id']);
			    //print_r($tutRef);
			    $headLine = $tutRef->field_kony_dev_tut_headline['und']['0']['value'];
			    $desc = $tutRef->body['und']['0']['value'];
			    $image = file_create_url($tutRef->field_kony_dev_tut_image['und']['0']['uri']);
			    $videoUrl = kony_custom_link($tutRef->field_kony_dev_tut_video_link);
				
			    ?>
			    <section class="kony-feature-value-prop master" >
			    <figure class="right figPadd">
					<a class="fancybox-video" target="" href="<?php print $videoUrl?>">
						<img class="right" alt="" src="<?php print $image ?>">
					</a>
                </figure>
			    <h3 style="max-width:50%"><?php print $headLine?></h3>
			    <?php print substr($desc,0,200);?>
			    <br/> 
			    <?php
			    if(count($tutRef->field_kony_dev_tut_rel_downloads)!=0){
				?>
				<h5>Resources</h5>
			    <ul>
			    <?php
				foreach($tutRef->field_kony_dev_tut_rel_downloads['und'] as $key=>$tutObj){
			        $downloadId = node_load($tutObj['target_id']);
					
					$downLoadheadLine = $downloadId->field_kony_dwnload_file_headline['und'][0]['value'];
					$fileLink = file_create_url($downloadId->field_kony_dwnload_file['und']['0']['uri']);
					
					if(count($downloadId->field_kony_dwnload_file)) {
				?>
					<li><a href="<?php print $fileLink ?>"><?php print $downLoadheadLine;?></a></li>
				<?php
					}//end-if
			     } ?>
				 
				</ul>
				<?php
			    }
                           ?>
			     <div class="clearfix"></div>
				 <div class="additional-info">
            <a target="" href="<?php print $base_path.$tutUrl; ?>">Read More <i class="icon-arrow-right"></i></a>
        </div>
			  </section>
			  <?php
			    
			 }
			 foreach($conInfoCollectionObj->field_kony_cnt_inf_nxt_stp_ref['und'] as $nxtObj){
			  $nxtRef = node_load($nxtObj['target_id']);
                          $nxtView = node_view($nxtRef);
			   print render($nxtView);
			 }
                endforeach;
		?>
		<?php
	$temp++;?>
	</div>
<?php
        endforeach;	
       ?>
         
</article> 
<div class="avoidlogn-box right">
	<input type="checkbox" id="checkbox-1-1" class="regular-checkbox" /><label for="checkbox-1-1"  class="left" ></label><p class="left"><a href="#">Got it. Don’t show this page on login.</a></p>
</div>
<script>
$("#tabs>li>span>a").click(function () {
      var id = $(this).attr('itemNo');
      var numItems = $('#ctab').attr('items');	
      for(var i=1;i<=numItems;i++){
	 if(id==i){
		$('a#data_'+i).addClass('current');
		$("div#data_div_"+i).show();
		$("#active_"+i).show();
	  }else{
		$('a#data_'+i).removeClass('current');
		$("div#data_div_"+i).hide();
		$("#active_"+i).hide();
	 }	
	}
 });
</script>


