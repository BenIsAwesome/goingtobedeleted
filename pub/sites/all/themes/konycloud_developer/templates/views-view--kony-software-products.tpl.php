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
 global $base_path, $user;
 foreach($view->result as $softwareProducts) {
	$softwareProductObj = $softwareProducts->_field_data['tid']['entity'];
	$productName = $softwareProductObj->name;
	$productImage = file_create_url($softwareProductObj->field_kony_product_front_icon['und'][0]['uri']);
	$productPath = $base_path.$softwareProductObj->field_kony_product_url['und'][0]['url']; 
	$productsArray[] = array(
		'productName'=>$productName,
		'productImage'=>$productImage,
		'productPath'=>$productPath
	);
 }
?>
<!-- Software Products Display Start -->
<div class="dev-front-col right group">
	<h2>WELCOME BACK, USER</h2>
	<p>Choose a product:</p>
	<section id="user">
		<div class="group">
			<?php foreach($productsArray as $eachProduct) { ?>
				<div class="four left">
					<a href="<?php print $eachProduct['productPath'];?>" style="text-decoration:none; cursor:pointer;">
						<img src="<?php print $eachProduct['productImage']; ?>" alt="<?php print $eachProduct['productName']; ?>">
						<p><?php print $eachProduct['productName']; ?></p>
					</a>
				</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</section>
</div>
