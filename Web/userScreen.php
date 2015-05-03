<?php
	//connect to db
	if(isset($_POST['submit'])){
		//var_dump($_POST);
		$date = $_POST['date'];
		$hours = $_POST['hours'];
		$minutes = $_POST['minutes'];
		$amPm = $_POST['amPm'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$capactiy = $_POST['capacity'];
		$comments = $_POST['comments'];
		
		$url = 'http://hacktest2015.azurewebsites.net/WcfDataService1.svc/PickupRequests';
		//$data = array('key1' => 'value1', 'key2' => 'value2');

		//create codeblock
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/json",
				'method'  => 'POST',
				'content' => "{ 'PickupDate':'2015-05-02T15:00:00','Address':'1647 S. Blue Island Ave.','City':'Chicago','State':'Illinois','ZIP':'60608','Duration':'3.50','PassengerCount':0}",
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		var_dump($result);
		//end of create
		
		//read codeblock
		$test = file_get_contents('http://hacktest2015.azurewebsites.net/WcfDataService1.svc/PickupRequests');
		$xml = simplexml_load_string($test);
		foreach($xml->entry as $entry)
		var_dump($entry->content->children("m", true)->children("d",true) );
		//end of read
		/*
		$sxe = new SimpleXMLElement($test);
		$namespaces = $sxe->getNamespaces(true);
		var_dump($namespaces);
		
		$json = json_encode($xml, JSON_PRETTY_PRINT, 100);
		$array = json_decode($json,TRUE);
		//var_dump($json);
		
		//var_dump(array_keys($array['entry'][0]['id']));
		var_dump($array['entry'][0]['content']);
		
		*/
		
		//$r = new HttpRequest('http://hacktest2015.azurewebsites.net/WcfDataService1.svc/PickupRequests', HttpRequest::METH_POST);
		//$r->setOptions(array('cookies' => array('lang' => 'de')));
		//$r->addPostFields(array('user' => 'mike', 'pass' => 's3c|r3t'));
		//$r->addPostFile('image', 'profile.jpg', 'image/jpeg');
		/*
		try {
			echo $r->send()->getBody();
		} catch (HttpException $ex) {
			echo $ex;
		}
		*/
		
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
	
	<!--chosen-->
	<!--<link rel="stylesheet" href="style/chosen_v1.4.2/chosen.css">-->
	<!--<script src="style/chosen_v1.4.2/chosen.jquery.js"></script>-->
	<!--<script src="style/chose_v1.4.2/chosen.jquery.min.js"></script>-->
	
	
	<script type="text/javascript">
		$(function e(){
			$("#date").datepicker();
			//$("select").chosen();
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
			  <!--hours-->
				<div class="form-group col-md-3">
					<label for="hours" class="control-label">Time</label>
						<select id="hours" name="hours" class="form-control">
							<?php
								for($i = 1; $i <= 12; $i++)
									echo "<option>$i<//option>";
							?>
						</select>
					</div>
					<!--end of hours-->
					<div class="form-group col-md-3">
					<label for="hours" class="control-label">&nbsp;</label>
						<select name="minutes" class="form-control">
							<option value = "00">00</option>
							<option value= "15">15</option>
							<option value= "30">30</option>
							<option value= "45">45</option>
						</select>
					</div>
					<!--end of minutes-->
					<div class="form-group col-md-3">
					<label for="hours" class="control-label">&nbsp;</label>
						<select name="amPm" class="form-control">
							<option value="am">AM</option>
							<option value="pm">PM</option>
						</select>
					</div>
					<!--am, pm-->
				</div><!--end div row-->
				<!--end of time-->
		   <!--address-->
		   <div class="row">
			  <div class="form-group col-md-3">
				<label for="address" class="col-md-2 control-label" >Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="Address">
				</div>
			  <!--City-->
				<div class="form-group col-md-3">
					<label for="city" class="col-md-2 control-label" >City</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="city">
				</div>
			<!--end of city-->
			  <!--State-->
				<div class="form-group col-md-3">
					<label for="state" class="col-md-2 control-label" >State</label>
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
				<div class="form-group col-md-3">
					<label for="zip" class="col-md-2 control-label" >Zip</label>
						<input type="text" class="col-md-3 form-control" id="zip" name="zip" placeholder="Zip" size="6" maxlength="6">
						<!--<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" pattern=".d{6}">-->
					</div>
					<!--end of zip-->
			</div><!--end of row-->
			  <!--Passengers-->
			  <div class="row">
				  <div class="form-group col-md-5">
					<label for="capacity" class="col-md-5 control-label"># of Passengers</label>
								<select id="capacity" name="capacity" class="form-control">
							<?php
								for($i = 1; $i <= 20; $i++)
									echo "<option>$i<//option>";
							?>
						</select>
					</div>
			</div><!--end of row-->
			  <!--end of passengers-->
			  <div class="row">
				<!--comments-->
				<div class="form-group col-md-12">
					<label for="comments" class="col-md-5 control-label">Comments</label>	
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