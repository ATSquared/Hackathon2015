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
<div class="col-md-6">
  <table class="table">
	<thead>
	  <tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone Number</th>
		<th>Car Person Capacity</th>
	  </tr>
	</thead>
	<tbody>
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
		?>
	</tbody>
  </table>
</div>

