<?php
/**
 * @file
 * Zen theme's implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   - view-mode-[mode]: The view mode, e.g. 'full', 'teaser'...
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $pubdate: Formatted date and time for when the node was published wrapped
 *   in a HTML5 time element.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content. Currently broken; see http://drupal.org/node/823380
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess_node()
 * @see template_process()
 */
?>

<div class="container group" id="pri-content">
    <div id="posts">
        <article class="kony-feature-blog-article master">
            <?php
            if (count($node->field_kony_blog_post_image)) {
                $postImgPath = file_create_url($node->field_kony_blog_post_image['und'][0]['uri']);
                ?>
                <img class="seven right" alt="<?php print $node->title; ?>" src="<?php print $postImgPath; ?>">
            <?php } ?>
            <?php
            if (count($node->field_kony_blog_authors)) {
                foreach ($node->field_kony_blog_authors['und'] as $eachPostEntity):
                    $postsItemAuthorOjects = entity_load('field_collection_item', array($eachPostEntity['value']));
                    foreach ($postsItemAuthorOjects as $eachAuthorObject):
                        $postAuthors[] = $eachAuthorObject->field_kony_blog_author['und'][0]['value'] . ", " . $eachAuthorObject->field_kony_blog_author_title['und'][0]['value'];
                    endforeach;
                endforeach;
                if (count($postAuthors)) {
                    $postsItemAuthor = implode(",<br/>", $postAuthors);
                }
            }
            ?>
            <?php if (!empty($postsItemAuthor)) { ?>
                <p class="byline">By <?php print $postsItemAuthor; ?> <span>on <?php print date("M d, Y", $node->created); //Oct 11, 2012?></span></p>
            <?php } ?>
            <?php
            if (count($node->body['und'][0]['value'])) {
                print render($content['body']);
            }
            ?>
	</article>
	<article class="kony-feature-blog-article master">
		<?php print render($content['comments']); ?>

        </article>		  

<?php if (count($node->field_kony_blog_related_blogs)): ?>
            <div class="kony-feature-blog-related-posts master">
                <h3>Related Posts</h3>
                <?php
                foreach ($content['field_kony_blog_related_blogs']['#items'] as $entity_uri):
                    $relatedPostCollection = entity_load('node', $entity_uri);
                    foreach ($relatedPostCollection as $relatedPostObject):
                        ?>
                        <article class="related-post">
                            <h4><?php print $relatedPostObject->title; ?></h4>
                            <p><?php print date("M d", $relatedPostObject->created); //Oct 11, 2012?></p>
                            <?php
                            if (!empty($relatedPostObject->body['und'][0]['summary'])) {
                                print "<p>" . $relatedPostObject->body['und'][0]['summary'] . "</p>";
                            } else {
                                print "<p>" . substr($relatedPostObject->body['und'][0]['value'], 0, 300) . "...</p>";
                            }
                            $postPath = drupal_lookup_path('alias', 'node/' . $relatedPostObject->nid);
                            if (empty($postPath)) {
                                $postPath = "node/" . $relatedPostObject->nid;
                            }
                            ?>
                            <a class="button" href="/<?php print $postPath; ?>">Read more <i class="icon-arrow-right"></i></a>
                        </article>
                    <?php
                    endforeach;
                endforeach;
                ?>
                <div class="additional-info">
                    <a href="/related-posts/<?php print $node->field_kony_blog_category['und'][0]['tid']; ?>">
                        See more related posts <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div>  
    <?php endif; ?>		
    </div>

    <?php
    $taxonomyId = "";
    if (count($node->field_kony_blog_category)) {
        $taxonomyId = $node->field_kony_blog_category['und'][0]['tid'];
    }
    include_once('blogpost_sidebar.php');
    ?>
</div>
