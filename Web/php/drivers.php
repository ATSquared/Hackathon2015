<?php
	//connect to db
	if(isset($_POST['submit'])){
		var_dump($_POST);
		$id = $_POST['id'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$phoneNumber = $_POST['phoneNumber'];
		$passengerCapacity = $_POST['passengerCapacity'];
	}//end of if submit pressed
?>
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
				for ($num = 0; $num < 1; $num++) { //populate each row from db
					echo "<tr>";
					for ($num = 0; $num < 6; $num++) {	//populate each column from db
						echo "<td>";
						//db column value goes here
						echo "</td>";
					}
					echo "<td>";
					echo "<input type='button' id='registerButton' name='registerButton' class='btn btn-default' value='Register' onclick='register()'>";
					echo "</td>";
					echo "</tr>";
				}
			?>
	  </table>
	</div>
</div>

