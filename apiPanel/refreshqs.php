<?php 
$includes = array
	(
		'panel.class.php'
	,	'resq.class.php'
	,	'resqDb/Core.php'
	,	'resqDb.php'
	,	'pch_db.php'
	,	'pch.class.php'
	,	'pchArray.class.php'
	);
	


 foreach($includes as $inc)
{
	include('../../lib/' . $inc);
}

$project_path = realpath(dirname(__FILE__) . '/..');
$is_test = stripos($project_path, '/web/') === 0;
define('IS_TEST', $is_test);
set_time_limit(0);
date_default_timezone_set('America/New_York');
clearstatcache(); // clear cached results of file_exists();
$host = $_SERVER['HTTP_HOST'];
$_uri = $_SERVER['REQUEST_URI'];
$uri_prefix = '';
$_uriparts = explode('?', $_uri);
$uri = $_uriparts[0];
$_uri_params = false;
$actual_link = "http://{$host}{$uri}";
$dbtype = $is_test ? 'test' : 'live';
$panel = new panel($dbtype);  

$panel->cycle_checks();


?>