      <?php
/**
 * display a search field for existing retail/wholesale customers
 *	other filters?
 *		date added
 *		card info? last4?
 * 
 * display a button to create a new customer
 *	 just link to /newcustomer
 */
 
 
 
  
 
$project_path = realpath(dirname(__FILE__) . '/..');
var_dump ($project_path);
$is_test = stripos($project_path, '/web/') == 0; 
define('IS_TEST', $is_test);
 
 var_dump($is_test);
 
	$job_name = empty($_GET['job']) ? 'avalaraq' : $_GET['job'];
	
	
	
	var_dump($job_name);
	
 if ( ! empty($job_name))
{
	
	echo "blah";
	$log_path = $project_path . '/../logs';
	echo $log_path;
    $default_paths=array(
	  'avalaraq' => 'mary'
	  ,'ccq'=>'chris'
	  ,'impexq'=>'chris'
	  ,'emailq'=>'chris'
	);
	
	
	$project_name = empty($_GET['user']) ? $default_paths[$job_name]: $_GET['user'];
    echo $project_name;
	$is_test = stripos($project_path, '/web/') === 0;
	
	var_dump($is_test);
	
	
	
		if ( ! empty($project_name) && $is_test)
	{
		// using regex we tweak the current project path and replace the dev's name
		// /web/USER/thisproject/../logs turns into /web/NEWUSER/logs
		$log_pattern = '/(\/web\/)([^\/]+)(\/[^\/]+\/..)(\/logs)/i';
		$log_replace = "$1{$project_name}$4";

		$new_log_path = preg_replace($log_pattern, $log_replace, $log_path);
var_dump($new_log_path);
		//if ( file_exists($new_log_path) !== false)
		//	$log_path = $new_log_path;
	//	else echo "Log file not found for user: <strong>{$project_name}</strong> under <strong>{$new_log_path}</strong>; using default of <strong>{$log_path}</strong>";
	}
	
	
	
} // end if job name not empty
	
	
//	$full_dump = isset($_GET['full']);

//	$full_toggle_url = $uri;
//	if ( $full_dump === false)
//		$full_toggle_url .= '?full';

//	$full_toggle_text = $full_dump !== false ? 'View Live Feed' : 'View Full Log';


	
	// if we pass a user param, we can force this to use a different dev folder than the oen used for resqapi
//	$is_test = stripos($project_path, '/web/') === 0;
	//if ( ! empty($project_name) && $is_test)
//	{
		// using regex we tweak the current project path and replace the dev's name
		// /web/USER/thisproject/../logs turns into /web/NEWUSER/logs
		//$log_pattern = '/(\/web\/)([^\/]+)(\/[^\/]+\/..)(\/logs)/i';
		//$log_replace = "$1{$project_name}$4";

		//$new_log_path = preg_replace($log_pattern, $log_replace, $log_path);

	//	if ( file_exists($new_log_path) !== false)
		//	$log_path = $new_log_path;
	//	else echo "Log file not found for user: <strong>{$project_name}</strong> under <strong>{$new_log_path}</strong>; using default of <strong>{$log_path}</strong>";
//	}
 
	
//var_dump($log_path);	
	
 $dir='../../logs';
 
 
 //$fileList = glob("../../logs/impexq*.{*}", GLOB_BRACE);
  //$fileList = glob($dir . "/avalaraq*-05-*.*");
 
 //$files = glob("/path/to/directory/*.{jpg,gif,png}", GLOB_BRACE);
    $fileList=glob($new_log_path . "/avalaraq*-05-*.*");
 
//$files = glob("/path/to/directory/*.{jpg,gif,png}", GLOB_BRACE);
 //$fileList=scandir($dir);
 //$files = array_diff( scandir("/path/to/directory"), array(".", "..") );
// var_dump($fileList);
 
 
 
     foreach(glob($new_log_path . "/avalaraq*-05-*.*", GLOB_NOSORT) as $filePath)   
    {  
	
	     //$path = '/www/public_html/index.html';
		 $filename = substr(strrchr($filePath, "/"), 1);
        //echo $filename; // "index.html"
	
	
	 
 	echo '<a href="/listlog.php?fileName='.$filename.'">Download my huge document (PDF)</a>';
	
        echo "Filename: " . $filename . "<br />";      
    }  

 
 

 
 
 
// echo '<a href="'. $dir .'/avalaraq-2016-06-21.log" download="logFile.txt">Download</a>'; 
 
//try
//{
	// run a PDO query here, but eventually moe this to a storedproc
//	$pdo = resq::connect();

	//$query = "
	//	select sizechart, html
	//	from web_pch..sizechart_html
	//";

	//$sizechartsq = $pdo->prepare($query);
	//$sizechartsq->execute();
	
	
	
	//$sizecharts = $sizechartsq->fetchAll(PDO::FETCH_ASSOC);
	
//}
//catch(PDOException $e)
//{
	//die($e->getMessage());


	
	
	

	
	
	
?>

Tips:


	<script src="includes/jquery-2.2.1.min.js" type="text/javascript" ></script>

<link rel="stylesheet" type="text/css" href="includes/style.css">



<style>
	#sizechart_container table tr th,
	#sizechart_container table tr td
	{
		border-bottom: 1px solid #aaa;
	}
</style>


<script>
		var jobstream='<?php echo $job_name ?>';
		
		$(document).ready(function(){

		    window.switchJob = function(currentJob,requestedJob) {
			//	sw
				
				console.log("current job is " + currentJob);
				console.log("requested job is " + requestedJob)
				
				switch (requestedJob){
					case "CCQ":
						console.log("ccq requested");
						break;
					case "ImpexQ":
						console.log("impexq requested");
						break;
					case "EmailQ":
						console.log("email requested");
						break;
					case "AvalaraQ":
						console.log("avalaraq requested");
						break;
					case "sizecharts":
						console.log("sizecharts requested");
						break;			
					
					
					default:
					break;
				}
				
				
				
				
				
				
				
				
			}   // end switch job
   });   // end document load
</script>


blah blah blah try to list a directory here test output

<div id="sizechart_container">

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Chart</th>
			</tr>
		</thead>
		<tbody>
			<?php //foreach($sizecharts as $s): ?>
				<tr>
					<td><?php //echo $s['sizechart']; ?></td>
					<td><?php //echo $s['html']; ?></td>
				</tr>
			<?php// endforeach; ?>
		</tbody>
</div>