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
                        $demosCount = 1;
                        foreach ($view->result as $demosItem) {
                            if (count($demosItem->_field_data)) {
                                $demosItemLoad = $demosItem->_field_data['nid']['entity'];
                            } else {
                                $demosItemLoad = node_load($demosItem->nid);
                            }
                            $demosLink = "";
                            $demosLink = kony_custom_link($demosItemLoad->field_kony_app_vid_lnk);
							if (empty($demosLink)) {
                                $demosLink = 'node/' . $demosItemLoad->nid;
                            }
                            if (count($demosItemLoad->field_kony_app_demo_headline)) {
                                $demoTitle = $demosItemLoad->field_kony_app_demo_headline['und'][0]['value'];
                            } else {
                                $demoTitle = str_replace('_', ' ', $demosItemLoad->title);
                                $demoTitle = str_replace('RES ', '', $demoTitle);
                            }
                            ?>
                            <div class="resource three">
                                <h4><?php print $demoTitle; ?></h4>
                                <?php
                                if (count($demosItemLoad->body)) {
                                     if(!empty($demosItemLoad->body['und'][0]['summary'])) {
                                      print $demosItemDesc = $demosItemLoad->body['und'][0]['summary'];
                                      } /*else { 
                                    $demosItemDesc = field_view_field('node', $demosItemLoad, 'body', 'teaser');
                                    print render($demosItemDesc);
                                    }*/
                                }
                                ?>
                                <a class="button video-placeholder fancybox-video right" href="<?php print $demosLink; ?>">Watch <i class="icon-play-circle"></i></a>
                            </div>
                            <?php if ($demosCount % 4 == 0) { ?>
                                <span class="clear-row"></span>
        <?php
        }
        $demosCount = $demosCount + 1;
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

