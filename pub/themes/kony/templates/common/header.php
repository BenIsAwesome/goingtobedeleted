  
  <header id="header" role="banner">
	<nav id="utility-bar">
		<div class="container group">
			<ul class="group">
				<li><i class="icon-phone"></i> 1-888-323-9630</li>
				<li id="location-list"><i class="icon-globe"></i>
                                	<?php print render($page['headerloclist']);?>
                                </li>
				<li><a href="/about">About</a></li>
				<li><a href="/support">Support</a></li>
			</ul>
		</div>
	</nav>
    <div class="container group">
      <?php if ($logo): ?>
        <h1 id="logo"><a class="hide-text" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">Kony</a></h1>
      <?php endif; ?>
      <nav>
        <?php print render($page['header']); ?>
      </nav>    
    </div>
  </header>
  <div id="messages">
  <?php print $messages; ?>
  </div>
  <a id="main-content"></a>
