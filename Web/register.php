<!DOCTYPE html>
<?php
	//connect to db
	$test = file_get_contents('http://hacktest2015.azurewebsites.net/WcfDataService1.svc/PickupRequests');
	$xml = simplexml_load_string($test);

	
	if(isset($_GET["id"])){
		$pickups = "http://hacktest2015.azurewebsites.net/WcfDataService1.svc/Pickups(".$_GET["id"].")";
		$options = array(
			'http' => array(
				'header'  => "Content-Type: application/json",
				'method'  => 'PATCH',
				'content' => "{\"DriverId\":1,\"CustomerId\":1,\"PickupRequestId\":1,\"DateAccepted\":\"2015-05-03T20:15\"}",
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($pickups, false, $context);
	}//end of if submit pressed
?>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Screen</title>

		<!--jquery-->
	<script type="type/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Bootstrap -->
   <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  </head>

  <body>
	
	<div class="jumbotron">
		<div class="container">
			<h1>Hackathon 2015</h1>
			<h2>Pickup Requests</h2>
		</div><!--end of container--> 
	</div><!--end of jumbotron-->
	
	<div class="container">
	<div class="form-group">
	  <table class="table table-striped">
		  <tr>
			<th>Pickup Date</th>
			<th>Expected Duration</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>ZIP</th>
			<th>Passenger Count</th>
			<th></th>
		  </tr>
			<?php
				foreach($xml->entry as $entry)
				{
					$xml = $entry->content->children("m", true)->children("d",true);
					
					echo "<tr>";
					$date = (string)$xml->PickupDate;
					$year = substr($date, 0, 4);
					$month = substr($date, 5, 2);
					$day = substr($date, 8, 2);
					$time = substr($date, strpos($date, "T") +1, 5);
					echo "<td>$month/$day/$year $time</td>";
						 
					echo "	 <td>$xml->Duration</td>
						 <td>$xml->Address</td>
						 <td>$xml->City</td>
						 <td>$xml->State</td>
						 <td>$xml->ZIP</td>
						 <td>$xml->PassengerCount</td>";
					echo  '<td><a class="btn btn-default" href=register.php?id='.$xml->ID.'>Register</a></td></td></tr>';
				}
			?>
	  </table>
		</div><!--end of form group-->
	</div><!--end of container-->
  </body>
</html>



