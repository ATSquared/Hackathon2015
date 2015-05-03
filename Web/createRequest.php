<!DOCTYPE html>
<?php
	//connect to db
	if(isset($_POST['submit'])){
		$date = $_POST['date'];
		/*
		$hours = $_POST['hours'];
		$minutes = $_POST['minutes'];
		$amPm = $_POST['amPm'];
				if($amPm == "pm"){
			$hours += 12;
		}
		else if($hours < 10){
			$hours = "0".$hours;
		}
		*/
		$time = $_POST['time'];
		$hours = substr($time, 0, strrpos($time,":"));
		$minutes = substr($time, (strrpos($time, ":")+1), 2);
		$am = substr($time, (strlen($time)-2));
		
		if($hours == 12) {
			if($am=="am")
				$hours = "00";
		}
		else if($am == "pm"){
			$hours += 12;
		}
		else if($hours < 10){
			$hours = "0".$hours;
		}
		
		$arr = explode("/", $date);
		$date = $arr[2]."-".$arr[0]."-".$arr[1];
		
		//$date = implode("-", explode("/", $date));
		$date .= "T$hours:$minutes:00";
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$duration = $_POST['duration'];
		$capacity = $_POST['capacity'];
		$comments = $_POST['comments'];

		//create codeblock
		$url = 'http://hacktest2015.azurewebsites.net/WcfDataService1.svc/PickupRequests';
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/json",
				'method'  => 'POST',
				'content' => "{\"PickupDate\":\"$date\",\"Address\":\"$address\",\"City\":\"$city\",\"State\":\"$state\",\"ZIP\":\"$zip\",\"Duration\":\"$duration\",\"PassengerCount\":$capacity}",
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);


		header('Location: register.php/');
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
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="style/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
	<script type="text/javascript" src="style/timepicker/jquery.timepicker.js"></script>
	<link rel="stylesheet" href="style/timepicker/jquery.timepicker.css">
	<link rel="stylesheet" href="style/jquery-ui-1.11.4.custom/jquery-ui.css">
	
	<script type="text/javascript">
		$(function e(){
			$("#date").datepicker();
			$('#time').timepicker();
			
			 $( "#capacity-slider" ).slider({
			  range: "min",
			  value: 2,
			  min: 1,
			  max: 20,
			  slide: function( event, ui ) {
				$( "#capacity" ).val(ui.value );
			  }
			});//end of slider
			$( "#capacity" ).val($( "#capacity-slider" ).slider( "value" ) );
			
			$( "#duration-slider" ).slider({
			  range: "min",
			  value: 2,
			  min: 1,
			  max: 5,
			  slide: function( event, ui ) {
				$( "#duration" ).val(ui.value );
			  }
			});//end of slider
			$( "#duration" ).val($( "#duration-slider" ).slider( "value" ) );
			
			/*$("input").blur(function e(){
				if(!($(this).val() != ""))	
					this.focus();
			});//end of input on blur
			*/
			/*
			$('#zip').blur(function e(){
				var pattern = /\d{6}/;
				if(!pattern.test($(this).val())){
					//$(this).value = "Please enter a six digit number";
					this.focus();
				}
			});//end of zip on blur
			*/
			
			//$('#submit').submit(function e(){
								
			//});//end of on submit
		})//end of document.ready
		

		/*
		validate(var inputValue){
			if()
		}
	*/
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
	   <form method="post" action="createRequest.php">

		   <!--date-->
		   <div class="row">
				<div class="form-group col-md-3">
					<label for="date" class="control-label" >Date</label>
							<div class="input-group">
								<input type="text" class="form-control" id="date" name="date" placeholder="Date">
								<span class="input-group-addon glyphicon glyphicon-calendar"></span>
							</div>
				</div>
				<!--end of date-->
				<div class="form-group col-md-2">
					<label for="time" class="control-label">Time</label>
						<div class="input-group">
							<input type="text" class="form-control" id="time" name="time" >
							<span class="input-group-addon glyphicon glyphicon-time"></span>
						</div>
				</div><!--end of form group-->
			</div><!--end div row-->
				<!--end of time-->
		   <!--address-->
		   <div class="row">
			  <div class="form-group col-md-5">
				<label for="address" class="control-label" >Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="Address">
				</div>
			  <!--City-->
		  </div><!--end of row-->
		  <div class="row">
				<div class="form-group col-md-2">
					<label for="city" class="control-label" >City</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="city">
				</div>
			<!--end of city-->
			  <!--State-->
				<div class="form-group col-md-2">
					<label for="state" class="control-label" >State</label>
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
				<div class="form-group col-md-2">
					<label for="zip" class="control-label" >Zip</label>
						<input type="text" class="col-md-3 form-control" id="zip" name="zip" placeholder="Zip" size="5" maxlength="5">
						<!--<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" pattern=".d{6}">-->
					</div>
					<!--end of zip-->
			</div><!--end of row-->
			<div class="row">

			  <!--Passengers-->
			  <div class="form-group col-md-2">
				  <label for="duration" class="control-label">Number of Passengers:</label>
				  <input type="text" class="form-control" id="duration" name="duration" readonly>			 
				<div id="duration-slider"></div>
			</div>		
			<div class="form-group col-md-2">
				  <label for="capacity" class="control-label">Number of Passengers:</label>
				  <input type="text" class="form-control" id="capacity" name="capacity" readonly>			 
				<div id="capacity-slider"></div>
			</div>		
		</div><!--end of row-->
			  <!--end of passengers-->
			  <div class="row">
				<!--comments-->
				<div class="form-group col-md-12">
					<label for="comments" class="control-label">Comments</label>	
						<textarea class="form-control" name="comments" rows="3" placeholder="Comments"></textarea>
				</div>
					<!--end of comments-->
			  </div><!--end of row-->
				<div class="row">
					  <!--submit-->
					<div class="form-group col-md-5">
							<input type="submit" class="btn btn-primary" id="submit" name="submit" value="submit">
					</div><!--end of submit-->
				</div><!--end of row-->
			</form>
	</div><!--end of container-->
</body>
</html>