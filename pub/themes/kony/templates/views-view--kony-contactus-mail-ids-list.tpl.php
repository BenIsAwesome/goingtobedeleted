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
$mailsArray = array();
foreach ($view->result as $mailsItems) {
	$mailTitle = $mailAddress = "";
    if (count($mailsItems->_field_data)) {
        $mailLoad = $mailsItems->_field_data['nid']['entity'];
    } else {
        $mailLoad = node_load($mailsItems->nid);
    }

	$mailTitle = $mailLoad->title;
	$mailDescription = $mailLoad->field_kony_contact_description['und'][0]['value'];	
	if (count($mailLoad->field_kony_contact_mail_id)) {
		$mailAddress = $mailLoad->field_kony_contact_mail_id['und'][0]['value'];
	}
	
    $mailsArray[] = array(
        'mailTitle' => $mailTitle,
		'mailDescription' => $mailDescription,
        'mailAddress' => $mailAddress
    );
}
?>

<div class="col five right" id="contact_div" style="position:relative">
	<h4 >Contact Us</h4>  
	<table>
		<tbody>
			<tr>
				<td>
					<p>
						<?php foreach($mailsArray as $mailsList) { ?>
							<strong><?php print $mailsList['mailDescription'];?>:&nbsp;</strong>
							<a href="mailto:<?php print $mailsList['mailAddress'];?>"><?php print $mailsList['mailAddress'];?></a>
							<br>
						<?php } ?>
					</p>
					<br>
					<a href="/contact" class="tour-button button left" id="" >Contact Kony<i class="icon-arrow-right"></i></a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
