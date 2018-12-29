	<?php
//echo 'this is back stream';
//echo 'this is get job ' . $_GET['uniId'] .'</br>'; 
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
		
	
	//var_dump ($project_path);
	$daemon = new daemon('impexq', $dbtype);   //  ('impex', $dbtype)
	$daemon->procNO=$_POST['uniId'];

//echo "      this is supposed to be full" . $_GET['full']     ."this was supposed to be full";
//$msg = "this is what I got in back proc    ";

$msg = 	$daemon->unstick(); 
//  . $_POST['uniId'];





$postback =array('msg' => $msg, 'value'=>$_POST['uniId']);

//var_dump($postback);
echo json_encode($postback);




 ?>
 
 
 
