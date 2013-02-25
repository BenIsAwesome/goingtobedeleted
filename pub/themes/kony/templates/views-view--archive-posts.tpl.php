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
$blogPostsArray = array();
$taxonomyId = "";
foreach ($view->result as $blogPostsItems) {
    $postAuthors = array();
    $postsItemAuthor = "";
    $blogPostImagePath = $postsItemTitle = $postsItemDesc = $learnMorePath = "";
    if (count($blogPostsItems->_field_data)) {
        $blogPostLoad = $blogPostsItems->_field_data['nid']['entity'];
    } else {
        $blogPostLoad = node_load($blogPostsItems->nid);
    }

    if (empty($taxonomyId)) {
        if (count($blogPostLoad->field_kony_blog_category)) {
            $taxonomyId = $blogPostLoad->field_kony_blog_category['und'][0]['tid'];
        }
    }

    if (count($blogPostLoad->field_kony_blog_headline)) {
        $postsItemTitle = $blogPostLoad->field_kony_blog_headline['und'][0]['value'];
    } else {
        $postsItemTitle = str_replace('_', ' ', $blogPostLoad->title);
        $postsItemTitle = str_replace('RES ', '', $postsItemTitle);
    }
    if (count($blogPostLoad->field_kony_blog_authors)) {
        foreach ($blogPostLoad->field_kony_blog_authors['und'] as $eachPostEntity):
            $postsItemAuthorOjects = entity_load('field_collection_item', array($eachPostEntity['value']));
            foreach ($postsItemAuthorOjects as $eachAuthorObject):
                $postAuthors[] = $eachAuthorObject->field_kony_blog_author['und'][0]['value'] . ", " . $eachAuthorObject->field_kony_blog_author_title['und'][0]['value'];
            endforeach;
        endforeach;
        if (count($postAuthors)) {
            $postsItemAuthor = implode(",<br/>", $postAuthors);
        }
    }
    $postsItemCreated = date("M d, Y", $blogPostLoad->created); //Oct 11, 2012

    if (count($blogPostLoad->field_kony_blog_post_image)) {
        $blogPostImagePath = file_create_url($blogPostLoad->field_kony_blog_post_image['und'][0]['uri']);
    }
    $postsItemDesc = field_view_field('node', $blogPostLoad, 'body', 'teaser');
    $learnMorePath = '/' . drupal_lookup_path('alias', 'node/' . $blogPostLoad->nid);
    if (empty($learnMorePath)) {
        $learnMorePath = "node/" . $blogPostLoad->nid;
    }

    $blogPostsArray[] = array(
        'postsItemTitle' => $postsItemTitle,
        'postsItemAuthor' => $postsItemAuthor,
        'postsItemCreated' => $postsItemCreated,
        'blogPostImagePath' => $blogPostImagePath,
        'postsItemDesc' => $postsItemDesc,
        'learnMorePath' => $learnMorePath
    );
}
if (!count($blogPostsArray)) {
    drupal_goto('/resources/blogs');
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
            <div class="container group" id="pri-content">
                <div id="posts">


                    <?php foreach ($blogPostsArray as $eachBlogPost) { ?>
                        <article class="kony-feature-blog-tease">
                            <?php if (!empty($eachBlogPost['learnMorePath'])) { ?>
                                <?php $blogPostReadMore = $eachBlogPost['learnMorePath']; ?>
                            <?php } else { ?>
                                <?php $blogPostReadMore = "javascript:void(0)"; ?>
                            <?php } ?>
                            <h3><a href="<?php print $blogPostReadMore; ?>"><?php print $eachBlogPost['postsItemTitle']; ?></a></h3>

                            <?php if (!empty($eachBlogPost['blogPostImagePath'])) { ?>
                                <img class="right" alt="<?php print $eachBlogPost['postsItemTitle']; ?>" src="<?php print $eachBlogPost['blogPostImagePath']; ?>">
                            <?php } ?>
                            <?php if (!empty($eachBlogPost['postsItemAuthor'])) { ?>
                                <p class="byline">By <?php print $eachBlogPost['postsItemAuthor']; ?>
                                    <span>on <?php print $eachBlogPost['postsItemCreated']; ?></span></p>
                            <?php } ?>
                            <?php if (!empty($eachBlogPost['postsItemDesc'])) { ?>
                                <?php print render($eachBlogPost['postsItemDesc']); ?>
                            <?php } ?>

                            <?php if (!empty($eachBlogPost['learnMorePath'])) { ?>
                                <div class="additional-info">
                                    <a href="<?php print $eachBlogPost['learnMorePath']; ?>">Read More<i class="icon-arrow-right"></i></a>
                                </div>
                            <?php } ?>
                        </article>
                    <?php } ?>	


                    <?php if ($pager): ?>
                        <?php print $pager; ?>
                    <?php endif; ?>
                </div>
                <?php include_once('blogpost_sidebar.php'); ?>
            </div>	
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

</div><?php /* class view */ ?>




