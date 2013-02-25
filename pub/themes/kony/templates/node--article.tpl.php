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
			<h3><?php print $node->title; ?></h3>
			<?php $postImgPath = file_create_url($node->field_image['und'][0]['uri']); ?>
			<img class="seven right" alt="<?php print $node->title; ?>" src="<?php print $postImgPath; ?>">
			<p class="byline">By <?php print $node->name; ?> <span>on <?php print date("M d", $node->created); //Oct 11, 2012?></span></p>
			<?php print render($content['body']);?>
		</article>		  
	</div>
	
	
    <!-- aside for categories and archives -->
    <aside id="sidebar-blog">
		<?php 
		$postCategories = taxonomy_get_tree(2);
		if(count($postCategories)) { ?>
			<div class="kony-feature-blog-categories">
				<h3><i class="icon-th-list"></i> Categories</h3>
				<ul>
				<?php foreach($postCategories as $postCategory) {?>
					<li><a href="/related-posts/<?php print $postCategory->tid;?>"><i class="icon-chevron-right"></i> <?php print $postCategory->name;?></a></li>
				<?php } ?>
				</ul>
			</div>	
		<?php } ?>
			
			
		<div class="kony-feature-blog-archives">
			<h3><i class="icon-list-alt"></i> Archives</h3>
			<?php
			 $view_name = 'blog_posts_archives';
			 $view_result = views_get_view_result($view_name);
			 $yearsList = array();
			foreach($view_result as $yearsListObj) {
				if(!in_array(substr($yearsListObj->created_year_month,0,4),$yearsList) && strlen($yearsListObj->created_year_month) >3) {
					$yearsList[] = substr($yearsListObj->created_year_month,0,4);
				}
			}
			?>
			<ul>
				<?php 
				foreach($yearsList as $yearVal) {?>
					<li><a href="/archive-posts/<?php print $yearVal;?>"><i class="icon-chevron-right"></i><?php print $yearVal; ?></a></li>
				<?php } ?>
			</ul>
		</div>    
	</aside>
 </div>

