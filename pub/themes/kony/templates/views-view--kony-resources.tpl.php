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
 
$videosView = 'kony_videos_list';
$videosViewRes = views_get_view_result($videosView);

$whitepaperView = 'kony_downloads';
$whitepaperViewRes = views_get_view_result($whitepaperView);
 
$tutorialView = 'kony_resources';
$tutorialViewRes = views_get_view_result($tutorialView);

$postsView = 'blog_posts';
$postsViewRes = views_get_view_result($postsView);

//$webinarsView = 'kony_webinar_list';
$webinarsView = 'all_webinars';
$webinarsViewRes = views_get_view_result($webinarsView, 'kony_webinar_resources');

/* Data Sheets View */
$datasheetView = 'data_sheets_list';
$datasheetViewRes = views_get_view_result($datasheetView);
$dataSheetsArray = array();
$dataMinHeight = 1;
foreach ($datasheetViewRes as $dataSheetsItems) {
    $datasheetTitle = $datasheetFile = $datasheetImage = "";
    if (count($dataSheetsItems->_field_data)) {
        $datasheetItemLoad = $dataSheetsItems->_field_data['nid']['entity'];
    } else {
        $datasheetItemLoad = node_load($dataSheetsItems->nid);
    }
	
	if(count($datasheetItemLoad->field_kony_data_sheet_image)) {
		$datasheetImage = file_create_url($datasheetItemLoad->field_kony_data_sheet_image['und'][0]['uri']);
	}
	if(count($datasheetItemLoad->field_kony_data_sheet_cdn_url)) {
		$datasheetFile = kony_custom_link($datasheetItemLoad->field_kony_data_sheet_cdn_url);
	} else {
		$datasheetFile = file_create_url($datasheetItemLoad->field_kony_data_sheet_file['und'][0]['uri']);
	}

	if(count($datasheetItemLoad->field_kony_data_sheet_headline)) {
		$datasheetTitle = $datasheetItemLoad->field_kony_data_sheet_headline['und'][0]['value'];
	} else {
		$datasheetTitle = str_replace('_', ' ', $datasheetItemLoad->title);
		$datasheetTitle = str_replace('RES ', '', $datasheetTitle);
	}
    $dataSheetsArray[] = array(
        'datasheetTitle' => $datasheetTitle,
		'datasheetFile' => $datasheetFile,
		'buttonText' => 'Download',
		'datasheetImage' => $datasheetImage,
    );
}
/* Data Sheets View */

/* Case Study View */
$casestudyView = 'case_studies_list';
$casestudyViewRes = views_get_view_result($casestudyView);
$caseStudysArray = array();
$caseMinHeight = 1;
foreach ($casestudyViewRes as $caseStudysItems) {
    $caseStudyTitle = $caseStudyFile = $caseStudyImage = "";
    if (count($caseStudysItems->_field_data)) {
        $caseStudyItemLoad = $caseStudysItems->_field_data['nid']['entity'];
    } else {
        $caseStudyItemLoad = node_load($caseStudysItems->nid);
    }
	
	if(count($caseStudyItemLoad->field_kony_case_study_image)) {
		$caseStudyImage = file_create_url($caseStudyItemLoad->field_kony_case_study_image['und'][0]['uri']);
	}
	if(count($caseStudyItemLoad->field_kony_case_study_cdn_url)) {
		$caseStudyFile = kony_custom_link($caseStudyItemLoad->field_kony_case_study_cdn_url);
	} else {
		$caseStudyFile = file_create_url($caseStudyItemLoad->field_kony_case_study_file['und'][0]['uri']);
	}

	if(count($caseStudyItemLoad->field_kony_case_study_headline)) {
		$caseStudyTitle = $caseStudyItemLoad->field_kony_case_study_headline['und'][0]['value'];
	} else {
		$caseStudyTitle = str_replace('_', ' ', $caseStudyItemLoad->title);
		$caseStudyTitle = str_replace('RES ', '', $caseStudyTitle);
	}
    $caseStudysArray[] = array(
        'caseStudyTitle' => $caseStudyTitle,
		'caseStudyFile' => $caseStudyFile,
		'buttonText' => 'Download',
		'caseStudyImage' => $caseStudyImage,
    );
}
/* Case Study View */

$demosView = 'kony_demos_list';
$demosViewRes = views_get_view_result($demosView);

global $base_path;
$webinarImage = $webinarImage = $webinar_watch_Path = $webinar_register_Path = "";
$current_date = strtotime('now');
?>
<article class="container group" id="pri-content">		
	<div class="story-branch">
	
		<section class="kony-feature-resources master">
			<h3>Latest Videos</h3>
			<div class="group">
				<?php $videosCount = 1;
				foreach($videosViewRes as $videosItem) { 
					if(count($videosItem->_field_data)) {
						$videoLoad = $videosItem->_field_data['nid']['entity'];
					} else {
						$videoLoad = node_load($videosItem->nid);
					}
					$videosImage = "";
					if(count($videoLoad->field_kony_video_image)) {
						$videosImage = file_create_url($videoLoad->field_kony_video_image['und'][0]['uri']);
					}
                                        $videosLink = kony_custom_link($videoLoad->field_kony_video_video_link);
                                        if(empty($videosLink)){
					    $videosLink = '/'.drupal_lookup_path('alias', 'node/'.$videoLoad->nid);
                                        }
					if(count($videoLoad->field_kony_video_headline)) {
						$videoTitle = $videoLoad->field_kony_video_headline['und'][0]['value'];
					} else {
						$videoTitle = str_replace('_', ' ', $videoLoad->title);
                                                $videoTitle = str_replace('RES ', '', $videoTitle);
					} if($videosCount > 8) {
                                            break;
                                        }?>
					<div class="resource three">
						<?php if(!empty($videosImage)) {?>
							<img alt="<?php print $videoTitle; ?>" src="<?php print $videosImage; ?>">
						<?php } ?>
						<h4><?php print $videoTitle; ?></h4>
						<?php if(count($videoLoad->body)) {
							if(!empty($videoLoad->body['und'][0]['summary'])) {
								print $videoDesc = $videoLoad->body['und'][0]['summary'];
							} /* else {
								$videoDesc = field_view_field('node', $videoLoad, 'body', 'teaser');
								print render($videoDesc);
							} */
						} ?>
						<a class="button video-placeholder fancybox-video" href="<?php print $videosLink; ?>">Watch <i class="icon-play-circle"></i></a>
					</div>
				<?php 
					if($videosCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }                                        
					$videosCount = $videosCount + 1;                                        
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/videos">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>
	
		<section class="kony-feature-resources master">
			<h3>Latest White Papers</h3>
			<div class="group">
				<?php 
				$whitepaperCount = 1;
				foreach($whitepaperViewRes as $whitepaperItem) { 
					if(count($whitepaperItem->_field_data)) {
						$whitePaperLoad = $whitepaperItem->_field_data['nid']['entity'];
					} else {
						$whitePaperLoad = node_load($whitepaperItem->nid);
					}
					$whitePaperLink = $whitepaperImage = "";
					if(count($whitePaperLoad->field_kony_white_paper_image)) {
						$whitepaperImage = file_create_url($whitePaperLoad->field_kony_white_paper_image['und'][0]['uri']);
					}
					if(count($whitePaperLoad->field_kony_white_paper_lnk)) {
						$whitePaperLink = kony_custom_link($whitePaperLoad->field_kony_white_paper_lnk);
					} 
					if(count($whitePaperLoad->field_kony_white_paper_headline)) {
						$whitepaperHeadline = $whitePaperLoad->field_kony_white_paper_headline['und'][0]['value'];
					} else {
						$whitepaperHeadline = str_replace('_', ' ', $whitePaperLoad->title);
                                                 $whitepaperHeadline = str_replace('RES ', '', $whitepaperHeadline);
					}
                                        if($whitepaperCount > 8) {
                                            break;
                                        }
					?>
					<div class="resource three">
						<?php if(!empty($whitepaperImage)) {?>
							<img alt="<?php print $whitepaperHeadline; ?>" src="<?php print $whitepaperImage; ?>">
						<?php } ?>
						<h4><?php print $whitepaperHeadline; ?></h4>
						<?php if(count($whitePaperLoad->body)) {
							if(!empty($whitePaperLoad->body['und'][0]['summary'])) {
								print $whitePaperDesc = $whitePaperLoad->body['und'][0]['summary'];
							} else {
								$whitePaperDesc = field_view_field('node', $whitePaperLoad, 'body', 'teaser');
								print render($whitePaperDesc);
							}
						} ?>
						<?php if(!empty($whitePaperLink)) {?>
							<a class="button" href="<?php print $whitePaperLink; ?>">Download <i class="icon-download-alt"></i></a>
						<?php } ?>
					</div>
				<?php 
					if($whitepaperCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$whitepaperCount = $whitepaperCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/white-papers">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>	
	
		<section class="kony-feature-resources master">
			<h3>Latest Webinars</h3>
			<div class="group">
				<?php 
				$webinarsCount = 1;
				foreach($webinarsViewRes as $webinarsViewItem) {                                    
					if(isset($webinarsViewItem->_field_data)) {
						$webinarItemSingle = $webinarsViewItem->_field_data['nid']['entity'];
					} else {
						$webinarItemSingle = node_load($webinarsViewItem->nid);
					}
					if(count($webinarItemSingle->field_kony_webinar_video_link)) {
						$webinar_watch_Path = kony_custom_link($webinarItemSingle->field_kony_webinar_video_link);
					}
					if(count($webinarItemSingle->field_kony_webinar_reg_link)) {
						$webinar_register_Path = kony_custom_link($webinarItemSingle->field_kony_webinar_reg_link);
					}
					if(count($webinarItemSingle->field_kony_webinar_date)) {
						$timestamp = $webinarItemSingle->field_kony_webinar_date['und'][0]['value'];
					}
					if(count($webinarItemSingle->field_kony_webinar_image)) {
						$webinarImage = file_create_url($webinarItemSingle->field_kony_webinar_image['und'][0]['uri']);
					}
					if((count($webinarItemSingle->field_kony_webinar_headline)) && (isset($webinarItemSingle->field_kony_webinar_headline))) {
						$webinarTitle = $webinarItemSingle->field_kony_webinar_headline['und'][0]['value'];
					} else {						
                                                $webinarTitle = str_replace('_', ' ', $webinarItemSingle->title);
                                                 $webinarTitle = str_replace('RES ', '', $webinarTitle);
					}
                                         if($webinarsCount > 8) {
                                            break;
                                        }
                                         $webinarLink = drupal_lookup_path('alias', 'node/'.$webinarItemSingle->nid);
					?>
					<div class="resource three">
						<?php if($webinarImage) {?>
							<img alt="<?php print $webinarTitle; ?>" src="<?php print $webinarImage; ?>">
						<?php } ?>
						<h4><?php print $webinarTitle; ?></h4>
						<?php if(count($webinarItemSingle->body)) {
							if(!empty($webinarItemSingle->body['und'][0]['summary'])) {
								print $webinarItemDesc = $webinarItemSingle->body['und'][0]['summary'];
							} else {
								$webinarItemDesc = field_view_field('node', $webinarItemSingle, 'body', 'teaser');
								print render($webinarItemDesc);
                                                                
							}
						} ?>                                                  
						<?php if($current_date > $timestamp) { ?>
							<a class="button" href="/<?php print $webinarLink;?>">Watch <i class="icon-play-circle"></i></a>
						<?php } else {?>
							<a class="button" href="/<?php print $webinarLink;?>">Register <i class="icon-arrow-right"></i></a>
						<?php } ?>
					</div>
				<?php 
					if($webinarsCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$webinarsCount = $webinarsCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/webinars">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>
		
		<section class="kony-feature-resources master">
			<h3>Latest Demos</h3>
			<div class="group">
				<?php $demosCount = 1;
				foreach($demosViewRes as $demosItem) { 
					if(count($demosItem->_field_data)) {
						$demosItemLoad = $demosItem->_field_data['nid']['entity'];
					} else {
						$demosItemLoad = node_load($demosItem->nid);
					}
					$demosLink = "";
					$demosLink = $demosItemLoad->field_kony_app_vid_lnk['und'][0]['url'];
                                        if(empty($demosLink)){
                                            $demosLink = '/'.drupal_lookup_path('alias', 'node/'.$demosItemLoad->nid);
                                        }
					if(empty($demosLink)) {
						$demosLink = '/'.'node/'.$demosItemLoad->nid;
					}
					if(count($demosItemLoad->field_kony_app_demo_headline)) {
						$demoTitle = $demosItemLoad->field_kony_app_demo_headline['und'][0]['value'];
					} else {
						$demoTitle = str_replace('_', ' ', $demosItemLoad->title);
                                                $demoTitle = str_replace('RES ', '', $demoTitle);
					}
                                         if($demosCount > 8) {
                                            break;
                                        }
					?>
					<div class="resource three">
						<h4><?php print $demoTitle; ?></h4>
						<?php if(count($demosItemLoad->body)) {
							if(!empty($demosItemLoad->body['und'][0]['summary'])) {
								print $demosItemDesc = $demosItemLoad->body['und'][0]['summary'];
							} /* else {
								$demosItemDesc = field_view_field('node', $demosItemLoad, 'body', 'teaser');
								print render($demosItemDesc);
							} */
						} ?>
						<a class="button video-placeholder fancybox-video" href="<?php print $demosLink; ?>">Watch <i class="icon-play-circle"></i></a>
					</div>
					<?php if($demosCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$demosCount = $demosCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/demos">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>
		
		<section class="kony-feature-resources master">
			<h3>Latest Case Studies</h3>
			<div class="group">
				<?php 
				$caseStudyCount = 1;
				foreach($caseStudysArray as $eachcaseStudy) { ?>
					<div class="resource three">
						<h4><?php print $eachcaseStudy['caseStudyTitle']; ?></h4>
						<a class="button" href="<?php print $eachcaseStudy['caseStudyFile']; ?>">
							<?php print $eachcaseStudy['buttonText']; ?> <i class="icon-download-alt"></i>
						</a>
					</div>
					<?php 
					if($caseStudyCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					if($caseStudyCount == 8) {
						break;
					}
					$caseStudyCount = $caseStudyCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/case-studies">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>
		
		<section class="kony-feature-resources master">
			<h3>Latest Data Sheets</h3>
			<div class="group">
				<?php 
				$datasheetCount = 1;
				foreach($dataSheetsArray as $eachDataSheet) { ?>
					<div class="resource three">
						<h4><?php print $eachDataSheet['datasheetTitle']; ?></h4>
						<a class="button" href="<?php print $eachDataSheet['datasheetFile']; ?>">
							<?php print $eachDataSheet['buttonText']; ?> <i class="icon-download-alt"></i>
						</a>
					</div>
					<?php 
					if($datasheetCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					if($datasheetCount == 8) {
						break;
					}
					$datasheetCount = $datasheetCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/data-sheets">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>
		
		<section class="kony-feature-resources master">
			<h3>Latest Tutorials</h3>
			<div class="group">
				<?php 
				$tutorialCount = 1;
				foreach($tutorialViewRes as $tutorialItem) {
					if(count($tutorialItem->_field_data)) {
						$tutorialItemLoad = $tutorialItem->_field_data['nid']['entity'];
					} else {
						$tutorialItemLoad = node_load($tutorialItem->nid);
					}
					$tutorialImage = file_create_url($tutorialItemLoad->field_kony_tutorial_image['und'][0]['uri']);
					if(count($tutorialItemLoad->field_kony_tutorial_headline)) {
						$tutorialTitle = $tutorialItemLoad->field_kony_tutorial_headline['und'][0]['value'];
					} else {
						$tutorialTitle = str_replace('_', ' ', $tutorialItemLoad->title);
                                                $tutorialTitle = str_replace('RES ', '', $tutorialTitle);
					} 
                                        if($tutorialCount > 8) {
                                            break;
                                        } ?>
					<div class="resource three">
						<?php if(count($tutorialItemLoad->field_kony_tutorial_image)): ?>
						<img alt="<?php print $tutorialTitle; ?>" src="<?php print $tutorialImage; ?>">
						<?php endif; ?>
						<h4><?php print $tutorialTitle; ?> </h4>
						<?php if(count($tutorialItemLoad->body)) {
							if(!empty($tutorialItemLoad->body['und'][0]['summary'])) {
								print $tutorialItemDesc = $tutorialItemLoad->body['und'][0]['summary'];
							} else {
								$tutorialItemDesc = field_view_field('node', $tutorialItemLoad, 'body', 'teaser');
								print render($tutorialItemDesc);
							}
						}
                                                  $tutorialLink = kony_custom_link($tutorialItemLoad->field_kony_tutorial_video_link);
                                                  if(empty($tutorialLink)) 
                                                      $tutorialLink = '/'.drupal_lookup_path('alias','node/'.$tutorialItemLoad->nid);
                                                ?>
						<a class="button video-placeholder fancybox-video" href="<?php print $tutorialLink; ?>">Watch <i class="icon-play-circle"></i></a>
					</div>
				<?php 
					if($tutorialCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$tutorialCount = $tutorialCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/tutorials">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>	
		
		<section class="kony-feature-resources master">
			<h3>Latest Blog Posts</h3>
			<div class="group">
				<?php 
				$postsCount = 1;
				foreach($postsViewRes as $postsItem) { 
					if(count($postsItem->_field_data)) {
						$postsItemLoad = $postsItem->_field_data['nid']['entity'];
					} else {
						$postsItemLoad = node_load($postsItem->nid);
					}
					$postsItemImage = "";
					if(count($postsItemLoad->field_kony_blog_post_image)) {
						$postsItemImage = file_create_url($postsItemLoad->field_kony_blog_post_image['und'][0]['uri']);
					}
					if(count($postsItemLoad->field_kony_blog_headline)) {
						$postsItemTitle = $postsItemLoad->field_kony_blog_headline['und'][0]['value'];
					} else {
						$postsItemTitle = str_replace('_', ' ', $postsItemLoad->title);
                                                $postsItemTitle = str_replace('RES ', '', $postsItemTitle);
					} 
                                        if($postsCount > 8) {
                                            break;
                                        } ?>
					<div class="resource three">						
						<h4><?php print $postsItemTitle; ?> </h4>
						<?php if(count($postsItemLoad->body)) {
							if(!empty($postsItemLoad->body['und'][0]['summary'])) {
								print $postsItemDesc = $postsItemLoad->body['und'][0]['summary'];
							} else {
								$postsItemDesc = field_view_field('node', $postsItemLoad, 'body', 'teaser');
								print render($postsItemDesc);
							}
						} ?>
						<?php $postsPath = drupal_lookup_path('alias', 'node/'.$postsItemLoad->nid);?>
						<a class="button" href="/<?php print $postsPath; ?>">More<i class="icon-arrow-right"></i></a>
					</div>
				<?php 
					if($postsCount%4 == 0) {?>
						<span class="clear-row"></span>
					<?php }
					$postsCount = $postsCount + 1;
				} ?>
			</div>

			<div class="additional-info">
				<a href="/resources/blogs">View More <i class="icon-arrow-right"></i></a>
			</div>
		</section>	

		
    </div>
</article>


