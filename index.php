<?php
if (isset($_SERVER['HTTPS'])) {
	$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header("Location: ".$url);
	exit();
} 
session_start();
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
date_default_timezone_set('Asia/Ho_Chi_Minh');
	define('app_path',__DIR__);
	define('base_path', '/lab/shopbanhang');
	
	require_once app_path.'/Core/App.php';
	require_once app_path.'/Core/DB.php';
	require_once app_path.'/Core/ControllerBase.php';
	
	$app = new App();
	
	$app->run();
?>	
