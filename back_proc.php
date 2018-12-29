	<?php
//echo 'this is back stream';
//echo 'this is get job ' . $_GET['job'] .'</br>'; 

//echo "      this is supposed to be full" . $_GET['full']     ."this was supposed to be full";

 // determine if this is a test or live version of this site
 
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

// determine if this is a test or live version of this site
$project_path = realpath(dirname(__FILE__) . '/..');
$is_test = stripos($project_path, '/web/') === 0;
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
$dbtype = $is_test ? 'test' : 'live';
$daemon = new daemon('impexq', $dbtype);   //  ('csccq', $dbtype)
//$daemon->cycle_checks();

 
 
 
$project_path = realpath(dirname(__FILE__) . '/..');
$is_test = stripos($project_path, '/web/chris') !== false; // sfContext::getInstance()->getUser()->is_test();
define('IS_TEST', $is_test);

 

//	$job_name = empty($_GET['job']) ? 'avalaraq' : $_GET['job'];
	
 
	
//	$lines = empty($_GET['noLines']) ? '100' : $_GET['noLines'];
	
//	echo $lines;
	
//i/f ( ! empty($job_name))
{
	//$full_dump = isset($_GET['full']);

	//$full_toggle_url = $uri;
	//if ( $full_dump === false)
		//$full_toggle_url .= '?full';

//	$full_toggle_text = $full_dump !== false ? 'View Live Feed' : 'View Full Log';

	//$log_path = $project_path . '/../logs';
    //$default_paths=array(
	 // 'avalaraq' => 'mary'
	 // ,'ccq'=>'chris'
	 // ,'impexq'=>'chris'
	 // ,'emailq'=>'chris'
	 
	  
	//);
	
	// if we pass a user param, we can force this to use a different dev folder than the oen used for resqapi
//	$project_name = empty($_GET['user']) ? $default_paths[$job_name]: $_GET['user'];
//echo $project_name;
	$is_test = stripos($project_path, '/web/') === 0;
	if ( ! empty($project_name) && $is_test)
	{
		// using regex we tweak the current project path and replace the dev's name
		// /web/USER/thisproject/../logs turns into /web/NEWUSER/logs
		//$log_pattern = '/(\/web\/)([^\/]+)(\/[^\/]+\/..)(\/logs)/i';
		//$log_replace = "$1{$project_name}$4";

	//	$new_log_path = preg_replace($log_pattern, $log_replace, $log_path);

//		if ( file_exists($new_log_path) !== false)
//			$log_path = $new_log_path;
//		else echo "Log file not found for user: <strong>{$project_name}</strong> under <strong>{$new_log_path}</strong>; using default of <strong>{$log_path}</strong>";
	}


	//$params = array('lines','refresh');

 
	//$date = date('Y-m-d');

	//$log_file = "{$log_path}/{$job_name}-{$date}.log";



//	if ( file_exists($log_file) !== false)
//	{
//		$tail_command = "tail -n {$lines} {$log_file}";

		//if ($full_dump !== false)
			//$tail_command = "cat {$log_file}";


//		$_output = `$tail_command`;

//		$output = nl2br($_output);
//	}
//	else $output = "No log file found at {$log_file}";
//}
//else $output = "No Feed name passed";



 //echo $output;

 ?>
 
 
 
