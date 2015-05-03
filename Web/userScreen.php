<!DOCTYPE html>
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
	<script type="text/javascript">
		$(function e(){
			$("#date").datepicker();
		})//end of document.ready
	</script>	
    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  </head>
  <body>
  	<div class="jumbotron">
  		<div class="container">
  			<h1>Hackathon 2015</h1>
  		</div><!--end of container-->  	
  	</div><!--end of jumbotron-->
  	<div class="container">
	   <form class="form-horizontal">
	   <h2>Date</h2>
	   <!--date-->
		<div class="form-group">
			<label for="date" class="col-md-2 control-label" >Date</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="date" placeholder="Date">
			</div>
	  </div><!--end of date-->
	  <!--time-->
		<div class="form-group">
			<label for="time" class="col-md-2 control-label">Time</label>
			<div class="col-md-2">
				<select id="time" class="form-control">
					<?php
						for($i = 1; $i <= 12; $i++)
							echo "<option>$i<//option>";
					?>
				</select>
			</div><!--hours-->
			<div class="col-md-2">
				<select class="form-control">
					<option value = "00">00</option>
					<option value= "15">15</option>
					<option value= "30">30</option>
					<option value= "45">45</option>
				</select>
			</div><!--minutes-->
			<div class="col-md-2">
				<select class="form-control">
					<option value="am">AM</option>
					<option value="pm">PM</option>
				</select>
			</div><!--am, pm-->
		</div><!--end of time-->
	   <h2>Location</h2>
	   <!--address-->
		  <div class="form-group">
			<label for="address" class="col-md-2 control-label" >Address</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="address" placeholder="Address">
			</div>
		  </div><!--end of address-->
		  <!--City-->
		    <div class="form-group">
				<label for="city" class="col-md-2 control-label" >City</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="city" placeholder="city">
				</div>
			</div><!--end of city-->
		  <!--State-->
			<div class="form-group">
				<label for="state" class="col-md-2 control-label" >State</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="state" placeholder="State">
				</div>
			</div><!--end of state-->
		  <!--zip-->
			<div class="form-group">
				<label for="zip" class="col-md-2 control-label" >Zip</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="zip" placeholder="Zip">
				</div>
			</div><!--end of zip-->
		  <!--Passengers-->
		  <div class="form-group">
		    <label for="numOfPass" class="col-md-2 control-label">Number of Passengers</label>
		    <div class="col-md-2">
		    	<input type="text" class="form-control" id="numOfPass" placeholder="Number of Passengers">
		    </div>
		  </div><!--end of passengers-->
		</form>
	</div><!--end of container-->
</body>
</html>