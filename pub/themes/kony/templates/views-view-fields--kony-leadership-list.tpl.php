<?php
/**
* @file
* Default simple view template to all the fields as a row.
*
* - $view: The view in use.
* - $fields: an array of $field objects. Each one contains:
* - $field->content: The output of the field.
* - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
* - $field->class: The safe class id to use.
* - $field->handler: The Views field handler object controlling this field. Do not use
* var_export to dump this object, as it can't handle the recursion.
* - $field->inline: Whether or not the field should be inline.
* - $field->inline_html: either div or span based on the above flag.
* - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
* - $field->wrapper_suffix: The closing tag for the wrapper.
* - $field->separator: an optional separator that may appear before a field.
* - $field->label: The wrap label text to use.
* - $field->label_html: The full HTML of the label to use including
* configured element type.
* - $row: The raw result object from the query, with all data it fetched.
*
* @ingroup views_templates
*/
$rowCount = $view->row_index + 1;

$eachLeader = $row->_field_data['nid']['entity'];
$leaderName = $eachLeader->field_kony_leader_name['und'][0]['value'];
$leaderImage = file_create_url($eachLeader->field_kony_leader_image['und'][0]['uri']);
$leaderDesc = $eachLeader->body['und'][0]['value'];
$leaderDesigId = $eachLeader->field_kony_leader_designation['und'][0]['tid'];
$leaderDesigObj = taxonomy_term_load($leaderDesigId);
?>
<article class="leader">
	<img alt="<?php print $leaderName;?>" src="<?php print $leaderImage;?>">
	<h5><?php print $leaderName;?></h5>
	<p><?php print $leaderDesigObj->name;?></p>
	<?php print $leaderDesc; ?>
</article>
<?php if($rowCount % 2 == 0) {?>
<span class="clear-row"></span>
<?php } ?>
