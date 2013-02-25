 <?php 
  /** 
  * 
  *  This is the dynamic code for the footer links.  Since the links will not pass a param or hashtag, 
  *  I am hard coding the links, but we need to solve this later
  *
**/ 
 ?> 
<footer>
	<div class="container">
		<?php if(count($page['footer']['menu_menu-footer-connect-with-us-menu'])) {?>
			<div id="connect">
				<h4>Connect with us</h4>
				<ul>
					<?php 
					foreach($page['footer']['menu_menu-footer-connect-with-us-menu'] as $eachConnectKey => $eachConnectItem) {
						if(substr($eachConnectKey,0,1) == '#'): 
							continue; 
						endif; 
						$itemTitle = $eachConnectItem['#title'];
						$itemPath = $eachConnectItem['#href'];?>
						<li>
							<a class="hide-text" id="<?php print strtolower($itemTitle);?>" href="<?php echo $itemPath == '<front>' ? '/' : $itemPath; ?>" target="_blank">
								<?php print $itemTitle; ?>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>	  
       
      
		<?php if(isset($page['footer']['menu_menu-kony-www-footer-menu'])): ?>
			<ul id="footer-links">
				<?php 
				foreach($page['footer']['menu_menu-kony-www-footer-menu'] as $key=>$item): 
					if(substr($key,0,1) == '#'):
						continue;
					endif; ?>
					<li><?php echo $item['#title']; ?>
						<?php if(isset($item['#below']) && count($item['#below']) > 0):?>
							<ul>
								<?php foreach($item['#below'] as $subkey=>$subItem): 
									if(substr($subkey,0,1) == '#'): 
										 continue; 
									endif; 
									$subItemTitle = $subItem['#title'];
									if(substr($subItem['#href'],0,4) == 'node'){
										$aliasPath = drupal_lookup_path('alias',$subItem['#href']);
										$subItemPath ='/'.$aliasPath.trim($subItem['#localized_options']['attributes']['title']);
										if($aliasPath=='about-us'){
											$addAttr = "onClick=\"reload('$subItemPath');return false;\"";
										}else{
											 $addAttr='';
										}
									}else{
										$subItemPath = $subItem['#href'].trim($subItem['#localized_options']['attributes']['title']);
									}
									?>
									<li>
										<a href="<?php echo $subItemPath == '<front>' ? '' : $subItemPath; ?>" title="<?php echo $subItemTitle; ?>" <?php print $addAttr; ?>>
											<?php echo $subItemTitle; ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li> 
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>      
		<?php //print render($page['footer']); ?>
		<h4><a class="hide-text" id="footer-logo" href="/">Kony</a></h4>
    </div><!-- close container -->
</footer>
<script>
function reload(path){

window.location=path;
if(document.URL.match('about-us')){
	location.reload();
	}

}
</script>
