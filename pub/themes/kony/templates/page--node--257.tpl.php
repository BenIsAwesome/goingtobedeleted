<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
  *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
  * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

      <?php include_once('common/header.php'); ?>
	<!-- Print Meta tags -->
	<?php print render($page['content']['metatags']); ?>
	<!-- Print Meta tags -->
      <?php //print render($title_prefix); ?>
      <?php if ($title): ?>
        <div id="billboard">
          <div class="story-form container group">
            <?php
              $displayTitle = $title;
              if(isset($node->field_kony_landing_page_headline) && !empty($node->field_kony_landing_page_headline)){
                      $displayTitle = $node->field_kony_landing_page_headline[$node->language][0]['value'];
              }
            ?>
            <h2 class="title" id="page-title"><?php print $displayTitle; ?></h2>
          </div>
        </div>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <article id="pri-content" class="container group">
          <section class="kony-feature-content-box-about master">
           		<h1 id="logo"><a href="/" class="hide-text">Kony-SAP</a> </h1>
                <!-- Left Side --> 
                <div class="col seven left">
    
                         <table cellpadding="10">
                				<tr>
                					<td>
                            			<img src="http://kony.com/sites/default/files/devices.png" width="274" height="176"/>
                					</td>
                					<td>
                						<h3>Want a fast, easy, and proven way to mobilize SAP?</h3>
                            		</td>
                      			 </tr>
               			 </table>
                    <p>
                     	If you've been waiting for a better way to mobilize SAP, look no further. Kony and Sky Technologies have come together to take the headache out of formulating effective SAP mobile strategy - bypassing time, cost, and complexity roadblocks with a smart, scalable, and proven SAP mobile infrastructure solution.</p>
                        
                        <h2>It's proven...... Just Ask Our Customers</h2>
                        
                        <p>
                             Kony has an impressive roster of over 150 live deployed SAP mobile solutions customers with exemplarily efficient SAP mobile strategy. Ask us for customer references!
                        </p>
                        
                        
                              <h2>It's Fast (and Costs Less)</h2>
                        
                        <p>
                            We bypass middleware and integration nightmares by mobilizing from within SAP. Using a SAP-certified add-in instead of complex architecture, you're up, running, and mobilized in a fraction of the time…and cost.
                        </p>
                        
                           <h2>It's Scalable</h2>
                        
                        <p>Our multi-channel, and multi-modal SAP mobility platform with specialized throughput controls and throttling means one solution for all your mobility needs. No scalability bottlenecks. No rewriting SAP mobile applications for each device type. One SAP mobility platform to handle all your Business-to-Consumer (B2C), Business-to-Business (B2B), and Business-to-Employee (B2E) apps.
                        </p>
                
                        
<table border="1" style="border-collapse: collapse;" width="500px">
	<tbody>
		<tr>
			<td align="left" height="15px" width="350px">&nbsp;
				</td>
			<td align="center" style="background-color: #17487d;" width="75px;">
				<p style="color:#FFF;">
					Kony</p>
			</td>
			<td align="center" style="background-color: #17487d" width="75px;">
				<p style="color:#FFF;">
					SAP</p>
			</td>
		</tr>
		<tr style="background-color: #a6a7a7;">
			<td align="left" style="padding-left:20px;" width="350px">
				<b>Build</b></td>
			<td align="center" width="75px">&nbsp;
				</td>
			<td align="center" width="75px">&nbsp;
				</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Enterprise Explorer to discover SAP objects</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCorrect.png" style="border:none;"/></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Build SAP - Optimized Apps</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCross.png" style="border:none;"  /></p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Bind SAP - objects at design time</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				SAP - optimized Sync API(inside SAP)</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCross.png" style="border:none;"/></p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Cross-platform offline support</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
			<td align="center" style="padding-left:20px;" width="75px">
				<p style="color:#ed1518">
					Partial</p>
			</td>
		</tr>
		<tr style="background-color: #a6a7a7;">
			<td align="left" style="padding-left:20px;" width="350px">
				<b>Integrate</b></td>
			<td align="center" width="75px">
				<p>&nbsp;
					</p>
			</td>
			<td align="center" width="75px">
				<p>&nbsp;
					</p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Connecting to SAP with no Midddleware</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCross.png" style="border:none;" /></p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Interface manager w/throttling, routing,queueing, load balancing capabilities</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCross.png" style="border:none;" /></p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Integration with SAP security infrastructure</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCorrect.png" style="border:none;" /></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCross.png" style="border:none;" /></p>
			</td>
		</tr>
		<tr style="background-color: #a6a7a7;">
			<td align="left" style="padding-left:20px;" width="350px">
				<b>Manage</b></td>
			<td align="center" width="75px">
				<p>&nbsp;
					</p>
			</td>
			<td align="center" width="75px">
				<p>&nbsp;
					</p>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding-left:20px;" width="350px">
				Deploy,manage and secure SAP Apps in a BYOD environment,seamlessly.</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCorrect.png" style="border:none;"/></p>
			</td>
			<td align="center" width="75px">
				<p>
					<img alt="" src="http://www.kony.com/sites/default/files/imgCross.png" style="border:none;" /></p>
			</td>
		</tr>
	</tbody>
</table>
                </div>
                <!-- End Left Side -->
                
                <!-- Right Side -->
                <div class="col five left"  style="margin-top:0px;">
                
                
                        <div style="background-color:#559A3C;margin-bottom:0.3cm; padding:10px 10px 17px 20px; width:96%; height:100px;">
                            
                            <h2 style="color:white;font-size:20px;float:left;">Let's Talk<br>We've got real TCO data and benchmarks.</h2>
    					</div>
                        
                        <h3>Find out how Kony helps you:</h3>
                        <br>
                        <p>
                           <iframe frameborder="0"  height="385"  width="500" name="iframeContents" scrolling="no" src="http://info.konysolutions.com/SAP-Kevin-Benedict.html" style="border:  0;margin-left: 40px;margin-top: -37px;" type="text/html" ></iframe></p>
                        
                        <hr>
                        <div style="width:318px;background-color:#559A3C;margin-bottom:0.3cm; padding:10px 10px 17px 20px; width:96%;">
                             <table>
                             	<tbody>
                                	<tr>
                                    	<td>
                             <img alt="" src="http://kony.com/sites/default/files/Analyst_kevin_1.jpg" style="border:none;" />  
                             </td>
                             <td>
                            <h2 style="color:white;font-size:20px;width: 208px;float:left">
                                New Report<br>
                                    From Analyst Kevin Benedict Latest Enterprise Mobility Trends and Challenges
                                </h2>
                        
                       </td></tr></tbody></table>
                        </div>
    					</div>
                <!-- End Right Side -->
         <span class="clear-row"></span>
	<div class="clearfix"></div>
  	   </section>
         
    
    
    
    
      </article>
     <?php print $feed_icons; ?>
    </div><!-- /#content -->


  </div><!-- /#main -->
  <?php include_once('common/footer.php'); ?>
  
  <?php //print render($page['bottom']); ?>  
