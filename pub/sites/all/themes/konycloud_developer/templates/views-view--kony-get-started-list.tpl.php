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
global $base_path,$theme_path;

//echo "<pre>";
//print_r($view->result);

?>
<div class="col" id="get-started" >
	
		<h4><span class="get-started-icn">Get Started</h4>
		
<?php
$i=1;
foreach ($view->result as $getStartedItems) {
	if (count($getStartedItems->_field_data)) {
		$getStartedItemLoad = $getStartedItems->_field_data['nid']['entity'];
	} else {
		$getStartedItemLoad = node_load($getStartedItems->nid);
	}
	//print_r($getStartedItemLoad);
	$getStartedTitle = $getStartedItemLoad->title;
	$getStartedUrl = $getStartedItemLoad->field_kony_external_link_url['und'][0]['url'];
	
	$target = "_blank";
    $position = strpos($getStartedUrl, 'kony.com');
    if(!$position) {
        $position = strpos($getStartedUrl, 'konycloud.com');
        if($position) {
            $target = '';
        }
    } else {
        $target = '';
    }
	/*$domainMatch = preg_match('@^(?:http://)?([^/]+)@i',$getStartedUrl,$matches);
	$domain = $matches[1];
	if(!preg_match('/.kony.com/i',$domain) && !preg_match('/.konycloud.com/i',$domain))
	{	//strpos($domain,'.kony.com') == false && strpos($domain,'.konycloud.com') == false
		$target = 'target="_blank"';
	}
	else {
		$target = '';
	}*/
	if($i==1){ ?>
		<p class="dev-front-spacing">
	<?php }else{?>
	  <p> 
	<?php }
?>	
		<a href="<?php print $getStartedUrl; ?>" target="<?php print $target; ?>"><?php print $getStartedTitle; ?></a></p>
	<?php 
		$i++; 
	   }
	 ?>
					
</div>
