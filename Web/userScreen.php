<?php
	//connect to db
	if(isset($_POST['submit'])){
		var_dump($_POST);
		$date = $_POST['date'];
		$hours = $_POST['hours'];
		$minutes = $_POST['minutes'];
		$amPm = $_POST['amPm'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$capactiy = $_POST['capacity'];
		$comments = $_POST['comments'];
	}//end of if submit pressed
	?>
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
			//$("select").selectmenu();
		})//end of document.ready
	</script>	
    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  </head>
  <body>
  	<div class="jumbotron">
  		<div class="container">
  			<h1>Hackathon 2015</h1>
			<h2>Request a Ride</h2>
  		</div><!--end of container-->  	
  	</div><!--end of jumbotron-->
  	<div class="container">
	<!--change action to next screen later-->
	   <form class="form-horizontal" method="post" action="userScreen.php">
	   <h2>Date</h2>
	   <!--date-->
		<div class="form-group">
			<label for="date" class="col-md-2 control-label" >Date</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="date" name="date" placeholder="Date">
			</div>
	  </div><!--end of date-->
	  <!--time-->
		<div class="form-group">
			<label for="hours" class="col-md-2 control-label">Time</label>
			<div class="col-md-2">
				<select id="hours" name="hours" class="form-control">
					<?php
						for($i = 1; $i <= 12; $i++)
							echo "<option>$i<//option>";
					?>
				</select>
			</div><!--hours-->
			<div class="col-md-2">
				<select name="minutes" class="form-control">
					<option value = "00">00</option>
					<option value= "15">15</option>
					<option value= "30">30</option>
					<option value= "45">45</option>
				</select>
			</div><!--minutes-->
			<div class="col-md-2">
				<select name="amPm" class="form-control">
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
				<input type="text" class="form-control" id="address" name="address" placeholder="Address">
			</div>
		  </div><!--end of address-->
		  <!--City-->
		    <div class="form-group">
				<label for="city" class="col-md-2 control-label" >City</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="city" name="city" placeholder="city">
				</div>
			</div><!--end of city-->
		  <!--State-->
			<div class="form-group">
				<label for="state" class="col-md-2 control-label" >State</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="state" name="state" placeholder="State">
				</div>
			</div><!--end of state-->
		  <!--zip-->
			<div class="form-group">
				<label for="zip" class="col-md-2 control-label" >Zip</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip">
				</div>
			</div><!--end of zip-->
		  <!--Passengers-->
		  <div class="form-group">
		    <label for="capacity" class="col-md-2 control-label">Number of Passengers</label>
		    <div class="col-md-2">
		    	<input type="text" class="form-control" id="capacity" name="capacity" placeholder="Number of Passengers">
		    </div>
		  </div><!--end of passengers-->
		  <!--submit-->
		  <div class="form-group">
			<label for="submit" class="col-md-2 control-label">Submit Request</label>
			<div class="col-md-2">
				<input type="submit" class="btn btn-primary" id="submit" name="submit" placeholder="submit">
			</div><!--end of submit-->
			<!--comments-->
			<div class="form-group">
			<label for="comments" class="col-md-2 control-label">Comments</label>
			<div class="col-md-2">				
				<textarea class="form-control" name="comments" rows="3" placeholder="Comments"></textarea>
			</div><!--end of comments-->
		</form>
	</div><!--end of container-->
</body>
</html>