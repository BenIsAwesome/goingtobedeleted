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
            <div class="story-branch">
                <section class="kony-feature-resources master">			
                    <div class="group">
                        <?php
                        $videosCount = 1;
                        foreach ($view->result as $videosItem) {
                            if (count($videosItem->_field_data)) {
                                $videoLoad = $videosItem->_field_data['nid']['entity'];
                            } else {
                                $videoLoad = node_load($videosItem->nid);
                            }
                            $videosImage = "";
                            if (count($videoLoad->field_kony_video_image)) {
                                $videosImage = file_create_url($videoLoad->field_kony_video_image['und'][0]['uri']);
                            }
                            $videosLink = "";
		  	    if(count($videoLoad->field_kony_video_video_link)) {
				$videosLink = kony_custom_link($videoLoad->field_kony_video_video_link);
			    }
                            if (count($videoLoad->field_kony_video_headline)) {
                                $videoTitle = $videoLoad->field_kony_video_headline['und'][0]['value'];
                            } else {
                                $videoTitle = str_replace('_', ' ', $videoLoad->title);
                                $videoTitle = str_replace('RES ', '', $videoTitle);
                            }
                            ?>
                            <div class="resource three">
                                <?php if (!empty($videosImage)) { ?>
                                    <img alt="<?php print $videoTitle; ?>" src="<?php print $videosImage; ?>">
                                <?php } ?>
                                <h4><?php print $videoTitle; ?></h4>
                                <?php
                                if (count($videoLoad->body)) {
                                     if(!empty($videoLoad->body['und'][0]['summary'])) {
                                      print $videoDesc = $videoLoad->body['und'][0]['summary'];
                                      } /*else { 
                                    $videoDesc = field_view_field('node', $videoLoad, 'body', 'teaser');
                                    print render($videoDesc);
                                    }*/
                                }
                                ?>
                                <a class="button video-placeholder fancybox-video right" href="<?php print $videosLink; ?>">Watch <i class="icon-play-circle"></i></a>
                            </div>
                            <?php if ($videosCount % 4 == 0) { ?>
                                <span class="clear-row"></span>
        <?php
        }
        $videosCount = $videosCount + 1;
    }
    ?>
                    </div>
                </section>
            </div>
        </div>
            <?php if ($pager): ?>
            <?php print $pager; ?>
        <?php endif; ?>
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

</div><?php /* class view */ ?>
