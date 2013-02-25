<!-- Header section -->
<?php include_once('common/header.php'); ?>
<!-- Header section -->

<!-- Global Variables -->
<?php global $base_path, $theme_path;
$path = $base_path.$theme_path;
?>
<!-- Global Variables -->

<!-- Only one billboard master -->
<div id="billboard" class="spacing">
	<div class="master-billboard-homepage group dev-banner-height">
		<div id="dintro-slider" class="dflexslider panel">
			<ul class="slides">
			   	<li>
					<div class="container group dev-homeslider" id="dev-slider">
						<!-- Software Products Region -->
						<?php print render($page['devfrontproducts']);?>
						<!-- Software Products Region -->
						<div class="left home_dev_master">
							<!-- Home Page Slider -->
							<?php print render($page['homeslider']); ?>
							<!-- Home Page Slider -->
						</div>
					</div>
					<img class="bg-img" src="<?php print $path; ?>/images/dev_frontpage_banner.jpg" alt="">
			    </li>
			</ul>
		</div>
	</div>	
</div>
	
<div align="center" class="product_detail_konycloud_content">
	<article class="container group" id="pri-content">
		<section class="kony-feature-next-steps padding-section">
			<div class="group dev-front-margin">			
				<!-- Latest Tutorial Start here -->
				<?php print render($page['latesttutorial']); ?>
				<!-- Latest Tutorial End here -->
			
				<!-- Documentation Start Here -->
				<?php print render($page['documentation']); ?>
				<!-- Documentation Ends Here -->
		
				<!-- Get Started List Start here -->
				<?php print render($page['getstarted']); ?>
				<!-- Get Started List End here -->
			</div>
			<div class="clearfix"></div>
		</section>      
	</article>
</div>

<article id="pri-content" class="container group kony-feature-resources">
	<div class="group dev-front-margin">
		<!-- Recent Blog Posts Start here -->
		<?php print render($page['recentblogposts']); ?>
		<!-- Recent Blog Posts End here -->
		
		<!-- Recent Tutorials Start here -->
		<?php print render($page['recenttutorials']); ?>
		<!-- Recent Tutorials End here -->
	</div>
</article>

<!-- Footer Section -->
<?php include_once('common/footer.php'); ?>
<!-- Footer Section -->
