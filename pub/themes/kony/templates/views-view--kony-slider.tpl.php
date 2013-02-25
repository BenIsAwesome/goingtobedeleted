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
$slidersArray = array();
foreach ($view->result as $slidersItems) {
    $taxonomyId = $sliderClass = $taxonomyName = "";
    $slides = $containerGroup2 = $group1Array = $group2Array = $colDivArray = array();
    if (count($slidersItems->_field_data)) {
        $sliderLoad = $slidersItems->_field_data['nid']['entity'];
    } else {
        $sliderLoad = node_load($slidersItems->nid);
    }

    if (empty($taxonomyId)) {
        if (count($sliderLoad->field_kony_slider_id)) {
            $taxonomyId = $sliderLoad->field_kony_slider_id['und'][0]['tid'];
            $taxonomyInfo = taxonomy_term_load($taxonomyId);
            $taxonomyName = $taxonomyInfo->name;
        }
    }

    if (count($sliderLoad->field_kony_slider_class)) {
        $sliderClass = $sliderLoad->field_kony_slider_class['und'][0]['value'];
    }
    
    if (count($sliderLoad->field_kony_slider_bg_image_class)) {
        $sliderBgImageClass = $sliderLoad->field_kony_slider_bg_image_class['und'][0]['value'];
    }
    
     if (count($sliderLoad->field_kony_slider_bg_image)) {
        $sliderBgImage = file_create_url($sliderLoad->field_kony_slider_bg_image['und'][0]['uri']);
    }
    
    

    if (count($sliderLoad->field_kony_container_group1)) {
        $slideId = $sliderLoad->field_kony_container_group1['und'][0]['value'];
        $slidesCollection = entity_load('field_collection_item', array($slideId));
        foreach ($slidesCollection as $eachSlideCollection) {
            $group1Id = $eachSlideCollection->field_kony_slider_group1['und'][0]['value'];
            $group1Collection = entity_load('field_collection_item', array($group1Id));
            foreach ($group1Collection as $eachGroup1Collection) {
                $group1Array['sliderClass'] = $eachGroup1Collection->field_kony_container_slider_cls['und'][0]['value'];
                $group1Array['sliderImageClass'] = $eachGroup1Collection->field_kony_slider_group_img_cls['und'][0]['value'];
                $group1Array['sliderImage'] = (isset($eachGroup1Collection->field_kony_slider_group1_image['und'][0]['uri']) && !empty($eachGroup1Collection->field_kony_slider_group1_image['und'][0]['uri'])) ? file_create_url($eachGroup1Collection->field_kony_slider_group1_image['und'][0]['uri']) : false;
                $groupDetailsId = $eachGroup1Collection->field_kony_slider_group_details['und'][0]['value'];
                $group1DetCollection = entity_load('field_collection_item', array($groupDetailsId));
                foreach ($group1DetCollection as $eachGroupDetCollection) {
                    $eachGroupDetArry = array(
                        'groupClass' => $eachGroupDetCollection->field_kony_slider_group_class['und'][0]['value'],
                        'heading' => $eachGroupDetCollection->field_kony_slider_group_hline['und'][0]['value'],
                        'description' => $eachGroupDetCollection->field_kony_slider_group_desc['und'][0]['value'],
                        'linkClass' => $eachGroupDetCollection->field_kony_slider_gp_link_class['und'][0]['value'],
                        'linkText' => $eachGroupDetCollection->field_kony_slider_group_link['und'][0]['title'],
                        'linkUrl' => $eachGroupDetCollection->field_kony_slider_group_link['und'][0]['url'],
                    );
                }
                $group1Array['eachGroupInfo'] = $eachGroupDetArry;
            }

            $group2Id = $eachSlideCollection->field_kony_slider_group2['und'][0]['value'];
            $group2Collection = entity_load('field_collection_item', array($group2Id));
            foreach ($group2Collection as $eachGroup2Collection) {
                $group2Array['sliderClass'] = $eachGroup2Collection->field_kony_slider_group2_class['und'][0]['value'];
                $group2Array['sliderHeadline'] = $eachGroup2Collection->field_kony_slider_group2_hline['und'][0]['value'];
                $group2Array['sliderDesc'] = $eachGroup2Collection->field_kony_slider_group2_desc['und'][0]['value'];
                $group2Array['ulClass'] = $eachGroup2Collection->field_kony_slider_group2_ulcls['und'][0]['value'];
                $group2Array['liClass'] = $eachGroup2Collection->field_kony_slider_group2_licls['und'][0]['value'];

                foreach ($eachGroup2Collection->field_kony_contain1_slider_links['und'] as $eachGroup2Links) {
                $group2LinkDetailsId = $eachGroup2Links['value'];
                $group2LinkDetCollection = entity_load('field_collection_item', array($group2LinkDetailsId));
                foreach ($group2LinkDetCollection as $eachGroup2LinkDetCollection) {
                    $eachGroupLinkDetArry = array(
                        'linkClass' => $eachGroup2LinkDetCollection->field_kony_slider_cont1_link_cls['und'][0]['value'],
                        'linkTitle' => $eachGroup2LinkDetCollection->field_kony_slider_cont1_link['und'][0]['title'],
                        'link' => $eachGroup2LinkDetCollection->field_kony_slider_cont1_link['und'][0]['url'],
                     );
                }
                $group2Array['eachGroupLinkInfo'][] = $eachGroupLinkDetArry;
                
                }
                /*foreach ($eachGroup2Collection->field_kony_slider_group2_links['und'] as $eachGroup2Link) {
                    $group2Array['group2Sliderlinks'][] = array(
                        "text" => $eachGroup2Link['title'],
                        "link" => $eachGroup2Link['url'],
                    );
                }*/
            }

            $colDivId = $eachSlideCollection->field_kony_col_div['und'][0]['value'];
            $colDivCollection = entity_load('field_collection_item', array($colDivId));
            foreach ($colDivCollection as $eachColDivCollection) {
                $colDivArray['colDivClass'] = $eachColDivCollection->field_kony_col_div_class['und'][0]['value'];
                $colDivArray['colDivHeadline'] = $eachColDivCollection->field_kony_slider_col_div_hline['und'][0]['value'];
                $colDivArray['colDivDesc'] = $eachColDivCollection->field_kony_slider_col_div_desc['und'][0]['value'];
                $colDivArray['colDivImageClass'] = $eachColDivCollection->field_kony_col_div_image_class['und'][0]['value'];
                $colDivArray['colDivImage'] = file_create_url($eachColDivCollection->field_kony_col_div_image['und'][0]['uri']);
            }
        }
    }

    if (count($sliderLoad->field_kony_container_group2)) {
        $slide2Id = $sliderLoad->field_kony_container_group2['und'][0]['value'];
        $slides2Collection = entity_load('field_collection_item', array($slide2Id));
        foreach ($slides2Collection as $eachSlide2Collection) {

            $containerGroup2['sliderHeadline'] = $eachSlide2Collection->field_kony_slider_contain2_hline['und'][0]['value'];
            $containerGroup2['sliderDesc'] = $eachSlide2Collection->field_kony_slider_contain2_desc['und'][0]['value'];
            $containerGroup2['ulClass'] = $eachSlide2Collection->field_kony_slider_contain2_ulcls['und'][0]['value'];
            $containerGroup2['liClass'] = $eachSlide2Collection->field_kony_slider_contain2_licls['und'][0]['value'];
            
            foreach($eachSlide2Collection->field_kony_slider_contain2_links['und'] as $eachSlide2Links) {
            $containerGroup2LinkDetailsId = $eachSlide2Links['value'];
                $group2LinkDetCollection = entity_load('field_collection_item', array($containerGroup2LinkDetailsId));
                //echo "testhere.......";
                //print_r($group2LinkDetCollection);

                foreach ($group2LinkDetCollection as $eachGroup2LinkDetCollection) {
                      $eachGroup2LinkDetArry = array(
                        'linkClass' => $eachGroup2LinkDetCollection->field_kony_container2_link_class['und'][0]['value'],
                        'linkTitle' => $eachGroup2LinkDetCollection->field_kony_container2_link['und'][0]['title'],
                        'link' => $eachGroup2LinkDetCollection->field_kony_container2_link['und'][0]['url'],
                     );
                }
                $containerGroup2['eachGroup2LinkDetArry'][] = $eachGroup2LinkDetArry;
                
            }
                
            /*foreach ($eachSlide2Collection->field_kony_container_group2_link['und'] as $eachSlider2Link) {
                $containerGroup2['sliderlinks'][] = array(
                    "text" => $eachSlider2Link['title'],
                    "link" => $eachSlider2Link['url'],
                );
            }*/
        }
    }


    $slides = array(
        'group1' => $group1Array,
        'group2' => $group2Array,
        'colDiv' => $colDivArray,
        'containerGroup2' => $containerGroup2,
		'sliderBgImageClass' => $sliderBgImageClass,
		'sliderBgImage' => $sliderBgImage,
    );

    $slidersArray[$taxonomyName]['sliderClass'] = $sliderClass;
    $slidersArray[$taxonomyName]['slidesData'][] = $slides;
}
//echo "<pre>";
//print_r($slidersArray);
?>
<div id="billboard">
    <div class="master-billboard-homepage group">
        <?php 
        foreach ($slidersArray as $sliderKey => $eachSlider) { ?>
            <div id="<?php print $sliderKey; ?>" class="<?php print $eachSlider['sliderClass']; ?>">
                <ul class="slides">
                    <?php $slidesArray = $eachSlider['slidesData']; ?>
                    <?php 
                    foreach($slidesArray as $eachSlide) { ?>
                        <li>
                            <!-- Group1 Display -->
                            <div class="container group">
                                <?php if(!empty($eachSlide['group1']['sliderClass'])) {?>
                                    <div class="<?php print $eachSlide['group1']['sliderClass']; ?>">
                                <?php } ?>
                                        <?php $groupInfo = $eachSlide['group1']['eachGroupInfo']; ?>
                                        <?php if(!empty($groupInfo['groupClass'])) {?>
                                            <div class="<?php print $groupInfo['groupClass']; ?>">
                                        <?php } ?>

                                               <?php if(!empty($groupInfo['heading'])) { ?>
                                                    <h2><?php print $groupInfo['heading']; ?></h2>
                                               <?php } ?>

                                               <?php if(!empty($groupInfo['description'])) { ?>
                                                    <p><?php print $groupInfo['description']; ?></p>
                                               <?php } ?>

                                               <?php if(!empty($groupInfo['linkUrl'])) { 
                                                    $linkURLIs = str_replace('hash', '#', $groupInfo['linkUrl']); 
                                                    if($groupInfo['linkClass'] == "restart") {
                                                        $begining = '<i class="icon-refresh"></i>';
                                                        $end = "";
                                                    } else {
                                                        $end = '<i class="icon-arrow-right"></i>';
                                                        $begining = "";
                                                    } ?>
                                                    <a id="" class="<?php print $groupInfo['linkClass']; ?>" href="<?php print $linkURLIs; ?>">
                                                        <?php print $begining; ?> <?php print $groupInfo['linkText']; ?> <?php print $end; ?>
                                                    </a> 
                                               <?php } ?>

                                        <?php if(!empty($groupInfo['groupClass'])) {?>
                                            </div>
                                        <?php } ?>

                                        <?php if(!empty($eachSlide['group1']['sliderImage'])) { ?>
                                            <img class="<?php print $eachSlide['group1']['sliderImageClass'];?>" alt="" src="<?php print $eachSlide['group1']['sliderImage'];?>">
                                        <?php } ?>

                                <?php if(!empty($eachSlide['group1']['sliderClass'])) {?>
                                    </div>
                                <?php } ?>
                                
                                <!-- Column Div Display -->
                                <?php if(count($eachSlide['colDiv'])) {
                                    $columnDiv = $eachSlide['colDiv']; ?>
                                    <div class="<?php print $columnDiv['colDivClass'];?>">
                                        <?php if(!empty($columnDiv['colDivHeadline'])) { ?>
                                             <h2><?php print $columnDiv['colDivHeadline']; ?></h2>
                                        <?php } ?>

                                        <?php if(!empty($columnDiv['colDivDesc'])) { ?>
                                             <p><?php print $columnDiv['colDivDesc']; ?></p>
                                        <?php } ?>
                                    </div>

                                    <?php if(!empty($columnDiv['colDivImage'])) { ?>
                                        <img alt="" class="<?php print $columnDiv['colDivImageClass']; ?>" src="<?php print $columnDiv['colDivImage']; ?>">
                                   <?php } ?>

                                <?php } ?>
                                <!-- Column Div Display -->
                                
                                <!-- Group2 Display -->
                                <?php if(count($eachSlide['group2'])) {?>
                                        <?php if(!empty($eachSlide['group2']['sliderClass'])) {?>
                                            <div class="<?php print $eachSlide['group2']['sliderClass']; ?>">
                                        <?php } ?>
                                                <?php $contGroupInfo = $eachSlide['group2']; ?>
                                                <?php if(!empty($contGroupInfo['sliderHeadline'])) { ?>
                                                     <h2><?php print $contGroupInfo['sliderHeadline']; ?></h2>
                                                <?php } ?>

                                                <?php if(!empty($contGroupInfo['sliderDesc'])) { ?>
                                                     <p><?php print $contGroupInfo['sliderDesc']; ?></p>
                                                <?php } ?>

                                                <?php if(count($contGroupInfo['eachGroupLinkInfo'])) { ?>
                                                     <ul class="<?php print $contGroupInfo['ulClass']; ?>">
                                                         <?php foreach($contGroupInfo['eachGroupLinkInfo'] as $conGrp2Links) {
                                                             $linkURLIs = str_replace('hash', '#', $conGrp2Links['link']);?>
                                                             <li class="<?php print $contGroupInfo['liClass'];?>">
                                                                     <a class="<?php print $conGrp2Links['linkClass'];?>" href="<?php print $linkURLIs; ?>">
                                                                         <?php print $conGrp2Links['linkTitle'];?> <i class="icon-arrow-right"></i>
                                                                     </a>
                                                             </li>
                                                         <?php } ?>
                                                     </ul>
                                                <?php } ?>
                                          <?php if(!empty($eachSlide['group2']['sliderClass'])) {?>
                                            </div>
                                        <?php } ?>
                                <?php } ?>
                                <!-- Group2 Display -->
                            </div>
                            <!-- Group1 Display -->

                            

                            

                            <!-- Container Group2 Display -->
                            <?php if(count($eachSlide['containerGroup2'])) {?>
                                <div class="container group">
                                    <?php if(!empty($eachSlide['group1']['sliderClass'])) { ?>
                                        <div class="<?php print $eachSlide['group1']['sliderClass']; ?> hide">
                                    <?php } ?>
                                            <?php $contGroupInfo = $eachSlide['containerGroup2']; ?>
                                            <div class="persona-col group">

                                                   <?php if(!empty($contGroupInfo['sliderHeadline'])) { ?>
                                                        <h2><?php print $contGroupInfo['sliderHeadline']; ?></h2>
                                                   <?php } ?>

                                                   <?php if(!empty($contGroupInfo['sliderDesc'])) { ?>
                                                        <p><?php print $contGroupInfo['sliderDesc']; ?></p>
                                                   <?php } ?>

                                                   <?php if(count($contGroupInfo['eachGroup2LinkDetArry'])) { ?>
                                                        <ul class="<?php print $contGroupInfo['ulClass']; ?>">
                                                            <?php foreach($contGroupInfo['eachGroup2LinkDetArry'] as $conGrp2Links) {
                                                                $linkURLIs = str_replace('hash', '#', $conGrp2Links['link']);?>
                                                                <li class="<?php print $contGroupInfo['liClass'];?>">
                                                                        <a class="<?php print $conGrp2Links['linkClass'];?>" href="<?php print $linkURLIs; ?>">
                                                                            <?php print $conGrp2Links['linkTitle'];?> <i class="icon-arrow-right"></i>
                                                                        </a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                   <?php } ?>
                                              </div>
                                      <?php if(!empty($eachSlide['group1']['sliderClass'])) {?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <!-- Container Group2 Display -->

                            <!-- Background Image Display -->
                            <img class="<?php print $eachSlide['sliderBgImageClass'];?>" alt="" src="<?php print $eachSlide['sliderBgImage'];?>">
                            <!-- Background Image Display -->
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>
        

