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
 echo "why wont this work????"
 
 
try
{
	// run a PDO query here, but eventually moe this to a storedproc
	$pdo = resq::connect();

	$query = "
		select sizechart, html
		from web_pch..sizechart_html
	";

	$sizechartsq = $pdo->prepare($query);
	$sizechartsq->execute();
	
	
	
	$sizecharts = $sizechartsq->fetchAll(PDO::FETCH_ASSOC);
	
}
catch(PDOException $e)
{
	die($e->getMessage());
}



$output ="got to get something outputted";


 echo $output;


echo "what is this";
?>



 

 



 







<div id="sizechart_container">

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Chart</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($sizecharts as $s): ?>
				<tr>
					<td><?php echo $s['sizechart']; ?></td>
					<td><?php echo $s['html']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
</div>