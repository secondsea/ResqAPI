<?php



 if( $_GET["fileName"]  ) {
      $logfile=$_GET['fileName'];
	  
 }
 else die('no file name passed');



$project_path = realpath(dirname(__FILE__) . '/..');
//var_dump ($project_path);
$is_test = stripos($project_path, '/web/') == 0; 
define('IS_TEST', $is_test);
 
// var_dump($is_test);
 
//$job_name = empty($_GET['job']) ? 'avalaraq' : $_GET['job'];
$job_name = substr($logfile, 0, strpos($logfile, '-'));

//var_dump($job_name);

//	echo "blah";
$log_path = $project_path . '/../logs';
//	echo $log_path;

$default_paths=array(
'avalaraq' => 'mary'
,'ccq'=>'chris'
,'impexq'=>'chris'
,'emailq'=>'chris'
);


$project_name = empty($_GET['user']) ? $default_paths[$job_name]: $_GET['user'];
//   echo $project_name;
$is_test = stripos($project_path, '/web/') === 0;

//var_dump($is_test);


// using regex we tweak the current project path and replace the dev's name
// /web/USER/thisproject/../logs turns into /web/NEWUSER/logs
$log_pattern = '/(\/web\/)([^\/]+)(\/[^\/]+\/..)(\/logs)/i';
$log_replace = "$1{$project_name}$4";

$new_log_path = preg_replace($log_pattern, $log_replace, $log_path);
	





	  


//$logfile="avalaraq-2016-06-22.log";




header("Content-disposition: attachment; filename=" . $logfile );
header("Content-type: application/txt");
//readfile("../../logs/avalaraq-2016-06-21.log");
//readfile("../../logs/". $logfile);

$actual_log_file = $new_log_path . '/' . $logfile;
//var_dump($actual_log_file);

readfile($actual_log_file);


/**
 * display a search field for existing retail/wholesale customers
 *	other filters?
 *		date added
 *		card info? last4?
 * 
 * display a button to create a new customer
 *	 just link to /newcustomer
 */
 
 
 
//try
//{
	// run a PDO query here, but eventually moe this to a storedproc
	//$pdo = resq::connect();

	//$query = "
//		select sizechart, html
//		from web_pch..sizechart_html
//	";

//	$sizechartsq = $pdo->prepare($query);
//	$sizechartsq->execute();
	
	
	
//	$sizecharts = $sizechartsq->fetchAll(PDO::FETCH_ASSOC);
	
//}
//catch(PDOException $e)
//{
//	die($e->getMessage());
//}

?>

