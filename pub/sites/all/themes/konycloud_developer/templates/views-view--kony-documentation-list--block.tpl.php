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
$docsArray = "";

foreach ($view->result as $documentListItems) {
	$documentTitle = $documentDownloadLink = "";
	if (count($documentListItems->_field_data)) {
		$documentItemLoad = $documentListItems->_field_data['nid']['entity'];
	} else {
		$documentItemLoad = node_load($documentListItems->nid);
	}
	
	if(count($documentItemLoad->field_kony_soft_doc_type)) {
		if(!in_array($documentItemLoad->field_kony_soft_doc_type['und'][0]['tid'], $docsArray)) {
			if(count($documentItemLoad->field_kony_soft_doc_html_url)) {
				$documentDownloadLink = kony_custom_link($documentItemLoad->field_kony_soft_doc_html_url);
			} else if(count($documentItemLoad->field_kony_soft_doc_down_file['und'][0]['target_id'])){
				$collection = $documentItemLoad->field_kony_soft_doc_down_file['und'][0]['target_id'];
				$donwloadCollection = entity_load('node',array($collection));
				
				foreach($donwloadCollection as $donwloadCollectionObj) {
					if(count($donwloadCollectionObj->field_kony_dwnload_file)) {
						$documentDownloadLink = file_create_url($donwloadCollectionObj->field_kony_dwnload_file['und'][0]['uri']);
					}	
				}	
			} else if(count($documentItemLoad->field_kony_soft_doc_file_url)) {
				$documentDownloadLink = kony_custom_link($documentItemLoad->field_kony_soft_doc_file_url);
			}
			
			if($documentDownloadLink != "") {
				$documentTitle = $documentItemLoad->field_kony_soft_doc_name['und'][0]['value'];
				$documentsArray[] = array(
					'title'=>$documentTitle,
					'downloadLink'=>$documentDownloadLink
				);
				$docsArray[] = $documentItemLoad->field_kony_soft_doc_type['und'][0]['tid'];
			}
		}
	}
	
}

?>
<?php if (count($documentsArray)) { ?>
<div class="col" >
	<h4><span class="api-documentation-icn ">Documentation</span></h4>
<?php
	$i=1;
	foreach ($documentsArray as $eachDocument) {
		if($i==1){ ?>
			<p class="dev-front-spacing">
		<?php }else{?>
			<p> 
		<?php }
	?>	
		<?php if($eachDocument['downloadLink']) { ?>
			<a href="<?php print $eachDocument['downloadLink']; ?>"><?php print $eachDocument['title']; ?></a> 
		<?php } ?>	
		</p>
	<?php $i++;
	} ?>
</div>
<?php } ?>
