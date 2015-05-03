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
		var_dump($result);
	}//end of if submit pressed
?><!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Screen</title>

	<!--jquery-->
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="style/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
	<script src="style/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="style/jquery-ui-1.11.4.custom/jquery-ui.css">
	<link rel="stylesheet" href="style/jquery-ui-1.11.4.custom/jquery-ui.min.css">	
    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  
  <script type="text/css">
	table {
		border: 1px solid black;
	}
  </script>
  </head>

  <body>
	
	
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="jumbotron">
		<div class="container">
			<h1>Hackathon 2015</h1>
		</div><!--end of container--> 
	</div>
	<!--end of jumbotron-->
	
	<div class="container">
		<h2>Pickup Requests</h2>
			<div>
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
			
				/*
				for (i = 1; i <= maximumRows; i++) {
					echo "<tr>";
					for (i = 1; i <= numberOfColumns; i++) {
						echo "<td>value[i]</td>"
					} 
					echo "</tr>"
				}
				*/
				foreach($xml->entry as $entry)
				{
					$xml = $entry->content->children("m", true)->children("d",true);
					echo "<tr>";
					echo "<td>";
					echo $xml->PickupDate;
					echo "</td>";
					echo "<td>";
					echo $xml->Duration;
					echo "</td>";
					echo "<td>";
					echo $xml->Address;
					echo "</td>";
					echo "<td>";
					echo $xml->City;
					echo "</td>";
					echo "<td>";
					echo $xml->State;
					echo "</td>";
					echo "<td>";
					echo $xml->ZIP;
					echo "</td>";
					echo "<td>";
					echo $xml->PassengerCount;
					echo "</td>";
					echo '<td><a class="btn btn-default" href="drivers.php?id='.$xml->ID.'">Register</a></td>';
					echo "</td>";
					echo "</tr>";
				}
			?>
	  </table>
	</div>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>



