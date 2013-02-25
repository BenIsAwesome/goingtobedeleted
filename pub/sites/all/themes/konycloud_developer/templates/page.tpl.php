<?php 

	include_once('common/header.php');

	global $base_path, $theme_path;
	$path = $base_path.$theme_path;
	print render($page['content']);

	include_once('common/footer.php'); 
?>
