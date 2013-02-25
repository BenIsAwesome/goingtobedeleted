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
if(isset($row->_field_data)) {
	$webinarItemObj = $row->_field_data['nid']['entity']; 
} else {
	$webinarItemObj = node_load($row->nid);
}
if(!empty($webinarItemObj->field_kony_webinar_headline['und'][0]['value']))
{
		$webinarTitle = $webinarItemObj->field_kony_webinar_headline['und'][0]['value'];
}
else
{
		$webinarTitle =$webinarItemObj->title;
}
$webinarDate = date('M d, Y',$webinarItemObj->field_kony_webinar_date['und'][0]['value']);
$web_date = $webinarItemObj->field_kony_webinar_date['und'][0]['value'];
$current_date = strtotime('now');
 if(!empty($webinarItemObj->body['und'][0]['summary']))
 {
	$webinarDesc = $webinarItemObj->body['und'][0]['summary'];
}
else 
{
	$webinarDesc = substr($webinarItemObj->body['und'][0]['value'],0,300)."...";
}
?>
<?php  $path = drupal_lookup_path('alias', 'node/'.$webinarItemObj->nid); ?>
<?php if($current_date <= $web_date) {?>
<article class="post">
  <h5><a href="/<?php print $path;?>"><?php print $webinarTitle;?></a></h5>
  <p><?php print $webinarDate;?></p>
  <p><?php print $webinarDesc; ?></p>
</article>	
<?php } ?>
