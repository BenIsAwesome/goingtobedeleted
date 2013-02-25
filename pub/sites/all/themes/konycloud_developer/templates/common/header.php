  
  <header id="header" role="banner">

    <div class="container group">
      <?php if ($logo): ?>
        <h1 id="logo"><a class="headerTitle " href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">| KONYCLOUD</a></h1> 
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
