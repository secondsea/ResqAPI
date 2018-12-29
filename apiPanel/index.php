<html>
	<head>

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
?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="../includes/jquery-2.2.1.min.js" type="text/javascript" ></script>
		<script>
			var stream = new Array();
			var db ='<?php echo$dbtype;?>';
			console.log(db);
			if(db='test')
				{
					//console.log('this is test');
					 queques = {67:"avalaraq",68:"consume_impexq",69:"dump_impexq",57:"process_impexq",60:"repair_impexq",72:"csccq",73:"emailq",70:"process_impexq",71:"repair_impexq",72:"csccq",73:"emailq"};
				}
				else
				{
					queques = {1:"emailq",3:"ccq",66:"avalaraq",68:"consume_impexq",65:"dump_impexq",70:"process_impexq",71:"repair_impexq",56:"csccq",73:"emailq",70:"process_impexq",71:"repair_impexq",72:"csccq",73:"emailq",62:"graffiti_consume",63:"resq_import_graffiti",64:"scene7_assets"}	
					
				};
				
//document.getElementById("demo").innerHTML = person.lastName;
//		<a  id="checkStats" onclick="checkStats(<?php echo  $rs[0]['id'] ?>)"  href="#"><?php echo  $rs[0]['id'] ?></a>//
			$(document).ready(function(){
				
				$('[id^=cloneform]').hide(); 

			
				
				window.order ='';
				window.unstick = function(id)
				{
					console.log(id);		
					$.ajax
					({
						type: 'POST',
						url: 'unstick.php',
						dataType: "json",
						data:({"uniId":id}),
						success: function(response) 
						{
						console.log (response.msg  + response.value );
						console.log (response.value);
						var procno=response.value;
						console.log (queques[response.value]);
						$('#'+ queques[response.value] + ' #actionLink').html("unstuck");
		
	//	document.getElementById(queques[response.value]).getElementById('actionLink') = "I done unstuck this";
						 console.log(response);
						}
					});			//return false;
							   
			//				stream[streamId] = setInterval( function() {		$(subTag).load('back_stream.php?job=' + proc  +   '&noLines=' + nolines )	},5000);		   
				} // end unstick
				
				window.checkStats = function(id)
				{
			
		//	console.log('sending id now');
		//	console.log(id);
			//    function send_value() {
					console.log("check stats");
					console.log(id);
					$("#" +queques[id]).load('checkstream.php?object=' + queques[id]  );
							//		$("#feed").load('back_stream.php?job=' +jobstream +   '&noLines=' + nolines);
											
				}   // end check Stats
			
				window.startChecks=function()
				{
					$("#streamStats").load('refreshqs.php');
						$("#pending").load('refreshpending.php');
					stream= setInterval( function()
					{	
						$("#streamStats").load('refreshqs.php');
							$("#pending").load('refreshpending.php');

					},500000);
				} // end start checks
			
				window.copyToClipboard =function(element) 
				{
					var $temp = $("<input>");
					$("body").append($temp);
					$temp.val($(element).text()).select();
					document.execCommand("copy");
					$temp.remove();
				}  // copy to clipboard
			
				window.getDiscount = function(order)
				{
					console.log("the order is ");
					console.log(order);		
					$.ajax
					({
						type: 'POST',
						url: 'getDiscount.php',
						dataType: "json",
						data:({"orderNO":order}),
						success: function(response) 
						{
						console.log (response.msg  + response.value );
						console.log (response.value);
						$('#vbutton'+order).html('subtotal: ' + response.subtotal + '  discount: ' + response.discount + '  percent  ' + response.percent + '%    <button onclick="fetchMatchingVouchers(\' '+ response.percent + '\',\'' +order +'\' )">fetch possible vouchers</button>' );
				//$('#'+ queques[response.value] + ' #actionLink').html("I don unstuck it");
		//$('#obj1 #obj1_Meta meta').html()
	//	document.getElementById(queques[response.value]).getElementById('actionLink') = "I done unstuck this";
     //    alert(obj.tour);
		 //document.getElementById("demo").innerHTML = person.lastName;
     //    alert(obj.tour);
						}
					});
//return false;
			//				stream[streamId] = setInterval( function() {		$(subTag).load('back_stream.php?job=' + proc  +   '&noLines=' + nolines )	},5000);		   
				}  // end get Discount
				
			
				window.fetchMatchingVouchers=function(percentage,order)
				{
					console.log(percentage);
					$.ajax
					({
						type: 'POST',
						url: 'getvouchers.php',
						dataType: "json",
						data:({"disPercent":percentage}),
						success: function(response)
						{	
							console.log(response);
      //response is json you need to parse it
							//var json = response;
      // var obj = JSON.parse(json);
						//	console.log (response.msg  + response.value );
							var  voucherstring='';
							response.value.forEach(function(voucher)
							{
			// voucherstring='';
								voucherstring=voucherstring + 'voucher: '+  voucher.code   +'  Start Date" ' + voucher.StartDate + ' percentage" ' + voucher.percentage + '<br>'           ; 
 						//	console.log(voucher.code);
						    });   //end foreach
							$('#vouchers'+order).html(voucherstring);	
						}  //end success
					});  // end ajax to get vouchers

				

	 
      //$('#vbutton'+order).html('subtotal: ' + response.subtotal + '  discount: ' + response.discount + '  percent  ' + response.percent + '%    <button onclick="fetchMatchingVouchers(\' '+ response.percent + '\' )">fetch possible vouchers</button>' );
		// var procno=response.value;
		// console.log (queques[response.value]);
		// <span id="subtotal"></span><span id="discount"></span><span id="percent"></span>

		//$('#'+ queques[response.value] + ' #actionLink').html("I don unstuck it");
		//$('#obj1 #obj1_Meta meta').html()
	//	document.getElementById(queques[response.value]).getElementById('actionLink') = "I done unstuck this";
     //    alert(obj.tour);
		 //document.getElementById("demo").innerHTML = person.lastName;
     //    alert(obj.tour);
	
    }  // end fetch matchign vouchers
//});
						   
						   
			window.getSerial=function(order)
			{
			//select {vi.code}from {voucherinvalidation as vi join order as o on {o.pk} = {vi.order}} where {o.code} = '[ORDER #]'
				$('#vouchers'+order).html("select {vi.code}from {voucherinvalidation as vi join order as o on {o.pk} = {vi.order}} where {o.code} = '" + order + "'");	
			}
			
			window.clonePrep=function(order)
			{

				$('#cloneform'+order).show();

			//		$('#cloneform'+order).html('enter a voucher code for ' + order + '   <input class="textBox" type="text" id="vcode' +order+ '" placeholder="voucher code here" /><button class="btn //cloneprep" onclick="cloneVoucher' +order+'">Begin voucher clone</button>' );
			}
			
			window.cloneVoucher=function()
			{
				
				//console.log(order);
				
				
				
				
			}
			
			
			
			
			
			
			
			
			
			
			
			$("#pending").load('refreshpending.php');
			 
			$("#streamStats").load('refreshqs.php');
				
			//startChecks();
			
			
			
			
		});   // end document load
				</script>
	</head>
	<body>
		<div id="content">
		
		
			<h1>Pending Orders</h1>
			<div id="pending">
			<?php 
			// $panel->pending_orders();
			?>
			</div>
		
		
			<h1>Api Panel</h1>
			<div id="streamStats">
<?php 
		//	$panel->cycle_checks();
			 
			
 ?>

			</div>
		
		</div>
	</body>	
</html>