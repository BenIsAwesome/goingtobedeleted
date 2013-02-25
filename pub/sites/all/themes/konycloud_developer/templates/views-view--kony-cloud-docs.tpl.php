<?php
/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
//echo "<pre>";print_r($view->result);
global $base_path, $theme_path;
$imgpath = $base_path.$theme_path;
foreach ($view->result as $cloudDocsItem) {
    $productPDFUrl = $productHTMLUrl = "";
    if (count($cloudDocsItem->_field_data)) {
        $cloudDocsItemLoad = $cloudDocsItem->_field_data['nid']['entity'];
    } else {
        $cloudDocsItemLoad = node_load($cloudDocsItem->nid);
    }
    $productId = $cloudDocsItemLoad->field_kony_soft_doc_product['und'][0]['tid'];
    $docTypeId = $cloudDocsItemLoad->field_kony_soft_doc_type['und'][0]['tid'];
 
 if (count($cloudDocsItemLoad->field_kony_soft_doc_html_url)) {

        $productHTMLUrl = kony_custom_link($cloudDocsItemLoad->field_kony_soft_doc_html_url);
    }
    if (count($cloudDocsItemLoad->field_kony_soft_doc_file_url)) {
        $productPDFUrl = kony_custom_link($cloudDocsItemLoad->field_kony_soft_doc_file_url);
    }
    $productLoad = taxonomy_term_load($productId);
    $productLoad->field_kony_product_icon['und'][0]['uri'];
    $productIcon = file_create_url($productLoad->field_kony_product_icon['und'][0]['uri']);
    $productName = $productLoad->name;
	
	$docTypeLoad = taxonomy_term_load($docTypeId);
	$docTypeName =  $docTypeLoad->name;
    $cloudDocTitle = $cloudDocsItemLoad->field_kony_soft_doc_name['und'][0]['value'];
    $cloudDocLink = $base_path . drupal_lookup_path('alias', 'node/' . $cloudDocsItemLoad->nid);
    if (!empty($productHTMLUrl) || !empty($productPDFUrl)) {
        $cloudDocArray[$productName][$docTypeName] = array(
            'producticon' => $productIcon,
            'title' => $cloudDocTitle,
            'clouddocurl' => $cloudDocLink,
            'htmlUrl' => $productHTMLUrl,
            'pdfUrl' => $productPDFUrl,
        );
    }
}

?>
<article class="container group article-docs" id="pri-content">
    <section class="cloud-doc">
        <!--Kony Studio starts here-->
        <?php
        $sideDataCount = 1;
        foreach ($cloudDocArray as $key => $documentArray) {
		
            if ($sideDataCount == 3) {
                $sideDataCount = 1;
                ?>
            </section>
            <section class="cloud-doc">
                <?php
            }
            if ($sideDataCount == 1) {
                $styleData = "left-cloud-doc";
            } else {
                $styleData = "right-cloud-doc";
            }
            ?>
            <div class="left padding-top <?php print $styleData; ?>">
                <div class="padding-left">
                    <h4>
                        <img src="<?php print $documentArray[0]['producticon']; ?>">
                        <?php print $key; ?>
                    </h4>
                </div>
                <?php foreach ($documentArray as $eachDocument) { ?>
                    <div class="feature_desc left individual-doc-item">
                        <div class="left doc-item-title">
                            <ul>
                                <li>
                                    <?php if (!empty($eachDocument['htmlUrl'])) { ?>                               
                                        <a href="<?php print $eachDocument['htmlUrl']; ?>"><?php print $eachDocument['title']; ?></a>
                                    <?php } else { ?>
                                        <?php print $eachDocument['title']; ?>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>

                        <div class="right">
                            <div class="left doc-item-html">
                                <p id="icntxt">
                                    <?php if (!empty($eachDocument['htmlUrl'])) { ?>
                                        <a href="<?php print $eachDocument['htmlUrl']; ?>">HTML</a>

                                        <img alt="" src="<?php print $imgpath; ?>/images/htmlicn.png">
                                    <?php } ?>

                                </p>
                            </div>
							
                            <div class="left doc-item-pdf">
                                <p id="icntxt">
                                    <?php if (!empty($eachDocument['pdfUrl'])) { ?>                                  
                                        <a href="<?php print $eachDocument['pdfUrl']; ?>">PDF</a>
                                        <img src="<?php print $imgpath; ?>/images/downloadicn-small.png" alt="">

                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            $sideDataCount = $sideDataCount + 1;
        }
        ?>
    </section>        
</article>


