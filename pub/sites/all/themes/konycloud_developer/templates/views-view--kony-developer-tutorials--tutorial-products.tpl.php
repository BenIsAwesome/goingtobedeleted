<?php
/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
 global $base_path;
 $productsArray = "";
 /* Products Arrray Looping */
 foreach($view->result as $softwareProducts) {
	$softwarePrdId = "";
	
	/* Product Object Node Loading */
	if(count($softwareProducts->_field_data)) {
		$softwareProdutLoad = $softwareProducts->_field_data['nid']['entity'];
	} else {
		$softwareProdutLoad = node_load($softwareProducts->nid);
	}
	/* Product Object Node Loading */
	
	/* Software Product Existance Condition */
	if(count($softwareProdutLoad->field_kony_dev_tut_soft_type)) {
		$softwarePrdId = $softwareProdutLoad->field_kony_dev_tut_soft_type['und']['0']['tid'];
		/* Product Repeatness Checking */
		if(!in_array($softwarePrdId, $productsArray)) {
			$softwareProductObj = taxonomy_term_load($softwarePrdId);
			$productName = strtolower($softwareProductObj->name);
			/* Product Name Existance Checking */
			if($productName != "") {
				$productImage = file_create_url($softwareProductObj->field_kony_product_image['und'][0]['uri']);
				$productDesc = $softwareProductObj->description;
				$productPath = $base_path."tutorials/".$productName; 
				$softwareProductsArray[] = array(
					'productName'=>$productName,
					'productImage'=>$productImage,
					'productDesc'=>$productDesc,
					'productPath'=>$productPath
				);
				$productsArray[] = $softwarePrdId;
			}
			/* Product Name Existance Checking */
		}
		/* Product Repeatness Checking */
	}
	/* Software Product Existance Condition */
}
/* Products Arrray Looping */
 ?>
 
 <!-- Kony Software Products Display -->
 <article id="pri-content" class="container group">
	<section class="kony-feature-next-steps">
		<div class="group" id="tutorials-front">
			<?php foreach($softwareProductsArray as $eachProduct) {?>
				<div class="col">
					<a href="<?php print $eachProduct['productPath'];?>" alt="<?php print $eachProduct['productName'];?>">
						<img src="<?php print $eachProduct['productImage'];?>" alt="<?php print $eachProduct['productName'];?>">
					</a>
					<?php print $eachProduct['productDesc'];?>
					<a href="<?php print $eachProduct['productPath'];?>" alt="<?php print $eachProduct['productName'];?>">   
						View tutorials >
					</a>
				</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</section> 
	<div align="center" class="product_detail_konycloud_content"></div>
</article>
<!-- Kony Software Products Display -->
