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

if (isset($row->_field_data)) {
    $eachPressRelease = $row->_field_data['nid']['entity'];
} else {
    $eachPressRelease = node_load($row->nid);
}

if (count($eachPressRelease->field_kony_press_rel_headline)) {
    $pressReleaseTitle = $eachPressRelease->field_kony_press_rel_headline['und'][0]['value'];
} else {
    $pressReleaseTitle = str_replace('_', ' ', $eachPressRelease->title);
}
$pressReleaseDate = date('d M, Y', $eachPressRelease->field_kony_press_release_date['und'][0]['value']);

if (count($eachPressRelease->body)) {
    if (!empty($eachPressRelease->body['und'][0]['summary'])) {
        $leaderDesc = $eachPressRelease->body['und'][0]['summary'] . "</p>";
    } else {
    $leaderDesc = field_view_field('node', $eachPressRelease, 'body', 'teaser');
    }
}

$linkPressRelease = drupal_lookup_path('alias', 'node/' . $eachPressRelease->nid);
?>

<section class="master-1 master">
    <h3><?php print $pressReleaseTitle; ?></h3>
    <p><?php print $pressReleaseDate; ?></p>
    <p><?php print render($leaderDesc); ?></p>
    <?php if (!empty($linkPressRelease)) { ?>
        <div class="additional-info">
            <a href="<?php print $linkPressRelease; ?>">Learn More <i class="icon-arrow-right"></i></a>
        </div>
    <?php } ?>
<div class="clearfix"></div>
</section>

