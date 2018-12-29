<?php
// this is the controller for the cybersource api portal
// here we'll load up our library files, load the session (ulogin?)

// if a user is not logged in, we include login.php
// if a user is logged in, include new_card.php

// TODO: lock down permissions on /pages directory. we include() them from here, but want to prevent direct access


set_time_limit(0);
ini_set('memory_limit', '512M');

// include all our lib files
$includes = array
	(
		'daemon.class.php'
	,	'resq.class.php'
	,	'resqDb/Core.php'
	,	'resqDb.php'
	,	'pch_db.php'
	,	'pch.class.php'
	,	'pchArray.class.php'
	);

foreach($includes as $inc)
{
	include('../lib/' . $inc);
}



/*
$https_status = $_SERVER['HTTPS'];
if (empty($https_status) || $https_status != 'on')
{
	$host = $_SERVER['HTTP_HOST'];
	$uri = $_SERVER['REQUEST_URI'];
	
	$secure_url = "https://{$host}{$uri}";
	header('Location:' . $secure_url);
	exit();
}
*/

// determine if this is a test or live version of this site
$project_path = realpath(dirname(__FILE__) . '/..');
$is_test = stripos($project_path, '/web/chris') !== false; // sfContext::getInstance()->getUser()->is_test();
define('IS_TEST', $is_test);

set_time_limit(0);
date_default_timezone_set('America/New_York');
clearstatcache(); // clear cached results of file_exists();

// build up urls for reference/linking in sub-pages
$host = $_SERVER['HTTP_HOST'];
$_uri = $_SERVER['REQUEST_URI'];
$uri_prefix = '';
$_uriparts = explode('?', $_uri);
$uri = $_uriparts[0];
$_uri_params = false;

$actual_link = "http://{$host}{$uri}";


?>

<html>
	<head>
		<title>ASC Resq Portal</title>
		
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
	
	<script>
	
	
	
	</script>
	
	
	
	</head>
	
	<body>

	<?php include('../pages/header.php'); ?>

		
	<?php

//echo $uri;
	try
	{

		switch($uri)
		{
			case '/':
				include('../pages/landing.php');
			break;
			
			case '/sleepwear-sizecharts':
				include('../pages/sizecharts.php');
			break;
		
			case '/impexq-stream':
				include('../pages/impexq_stream.php');
			break;
		
			case '/ccq-stream':
				include('../pages/ccq_stream.php');
			break;
		
			case '/emailq-stream':
				include('../pages/emailq_stream.php');
			break;
		
			case '/avalaraq-stream':
				include('../pages/avalaraq_stream.php');
			break;
	        case '/triple-stream':
				include('../pages/triple_stream.php');
			break;
			case'/list-logs':
				include('../pages/list-logs.php');
			break;
			
			

		}
	} 
	catch (Exception $e) 
	{
		var_dump($e->getMessage());
		die();
	}
	catch (SoapFault $e) 
	{
		var_dump($e->getMessage());
		die();
	}
  include('../pages/footer.php'); 
	?>

	</body>
	
</html>
		
<?php

die();

?>