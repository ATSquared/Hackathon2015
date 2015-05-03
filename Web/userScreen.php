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
		
		   <form method="post" action="userScreen.php">
		   <h2>Date</h2>
		   <!--date-->
		   <div class="row">
				<div class="form-group col-md-3">
					<label for="date" class="control-label" >Date</label>
							<div class="input-group">
								<input type="text" class="form-control" id="date" name="date" placeholder="Date">
								<span class="input-group-addon glyphicon glyphicon-calendar"></span>
							</div>
				</div><!--end of date-->
			  <!--time-->
				<div class="form-group col-md-3">
					<label for="hours" class="control-label">Time</label>
						<select id="hours" name="hours" class="form-control">
							<?php
								for($i = 1; $i <= 12; $i++)
									echo "<option>$i<//option>";
							?>
						</select>
					</div><!--end of hours-->
					<div class="form-group col-md-3">
						<select name="minutes" class="form-control">
							<option value = "00">00</option>
							<option value= "15">15</option>
							<option value= "30">30</option>
							<option value= "45">45</option>
						</select>
					</div><!--end of minutes-->
					<div class="form-group col-md-3">
						<select name="amPm" class="form-control">
							<option value="am">AM</option>
							<option value="pm">PM</option>
						</select>
					</div><!--am, pm-->
				</div><!--end div row-->
				<!--end of time-->
		   <h2>Location</h2>
		   <!--address-->
			  <div class="form-group">
				<label for="address" class="col-md-2 control-label" >Address</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="address" name="address" placeholder="Address">
				</div>
			  <!--City-->
					<label for="city" class="col-md-2 control-label" >City</label>
					<div class="col-md-2">
						<input type="text" class="form-control" id="city" name="city" placeholder="city">
					</div>
				<!--</div><!--end of city-->
			  <!--State-->
				<!--<div class="form-group">-->
					<label for="state" class="col-md-2 control-label" >State</label>
					<div class="col-md-2">
							<select id="state" name="state" class="form-control" >
								<option value="">Select a State</option>
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
						</select>
					</div>
				<!--end of state-->
			  <!--zip-->
				<!--<div class="form-group">-->
					<label for="zip" class="col-md-2 control-label" >Zip</label>
					<div class="col-md-2">
						<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" size="6" maxlength="6">
						<!--<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" pattern=".d{6}">-->
					</div>
				</div>
				<!--</div><!--end of zip-->
			  <!--Passengers-->
			  <div class="form-group">
				<label for="capacity" class="col-md-2 control-label">Number of Passengers</label>
				<div class="col-md-2">
							<select id="capacity" name="capacity" class="form-control">
						<?php
							for($i = 1; $i <= 20; $i++)
								echo "<option>$i<//option>";
						?>
					</select>
				</div>
			  </div><!--end of passengers-->
				<!--comments-->
				<div class="form-group">
					<label for="comments" class="col-md-2 control-label">Comments</label>	
					<div class="col-md-10">
						<textarea class="form-control" name="comments" rows="3" placeholder="Comments"></textarea>
					</div>
				</div>
					<!--end of comments-->
					
					  <!--submit-->
				<div class="form-group">
					<label for="submit" class="col-md-2 control-label">Submit Request</label>
					<div class="col-md-2">
						<input type="submit" class="btn btn-primary" id="submit" name="submit" placeholder="submit">
					</div><!--end of submit-->
				</div>
			</form>
	</div><!--end of container-->
</body>
</html>