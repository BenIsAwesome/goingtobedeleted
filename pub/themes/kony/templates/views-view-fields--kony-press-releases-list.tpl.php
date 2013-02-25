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
$eachPressRelease = $row->_field_data['nid']['entity']; 
$pressReleaseLink = drupal_lookup_path('alias', 'node/'.$eachPressRelease->nid);
if(!empty($eachPressRelease->field_kony_press_rel_headline['und'][0]['value']))
{
		$pressReleaseTitle = $eachPressRelease->field_kony_press_rel_headline['und'][0]['value'];
}
else
{
		$pressReleaseTitle =$eachPressRelease->title;
}
$pressReleaseDate = $eachPressRelease->field_kony_press_release_date['und'][0]['value'];
 if(!empty($eachPressRelease->body['und'][0]['summary'])) {
		$pressReleaseDesc = $eachPressRelease->body['und'][0]['summary'];
 } else {
		$pressReleaseDesc = substr($eachPressRelease->body['und'][0]['value'],0,300)."...";
 }
?>
<article class="post press-release-about">
	  <h5><a href="<?php print $pressReleaseLink; ?>"><?php print $pressReleaseTitle; ?></a></h5>
	   <p><?php print date('M d, Y',$pressReleaseDate);?></p>
	  <?php print $pressReleaseDesc; ?>
	   <a href="<?php print $pressReleaseLink; ?>">Read More  <i class="icon-arrow-right"></i></a>
      	   </article>
