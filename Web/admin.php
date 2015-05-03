<!DOCTYPE html>
<?php
	//returns pickupRequest
	$xml = file_get_contents('http://hacktest2015.azurewebsites.net/WcfDataService1.svc/PickupRequests');
	$pickupRequests = simplexml_load_string($xml);
	
	$xml = file_get_contents('http://hacktest2015.azurewebsites.net/WcfDataService1.svc/Pickups');
	$pickups = simplexml_load_string($xml);
	
	$xml = file_get_contents('http://hacktest2015.azurewebsites.net/WcfDataService1.svc/Drivers');
	$drivers = simplexml_load_string($xml);
	
	$xml = file_get_contents('http://hacktest2015.azurewebsites.net/WcfDataService1.svc/Customers');
	$customers = simplexml_load_string($xml);
	
	//for every pickupRequest in db, must check for driver, customer, and pickup
	
		foreach($pickupRequests->entry as $pickupRequest){
			//echo "Entered pickupRequest loop<br />";
			$rowPR = $pickupRequest->content->children("m", true)->children("d",true);
			
			foreach($pickups->entry as $pickup){
				//echo "Entered pickup loop<br />";
				$rowPickup = $pickup->content->children("m", true)->children("d",true);
				//var_dump($rowPickup->DateAccepted);
				//echo "PickupRequestID: ".$rowPR->ID." Pickup :".$rowPickup->PickupRequestId."<br />";
				
				if((string)$rowPR->ID == (string)$rowPickup->PickupRequestId){
					//echo "pickupId's match";
					
					if((string)$rowPickup->DriverId != null){
						//echo "Driver is not null!<br />";						
						foreach($drivers->entry as $driver){
							$rowDriver = $driver->content->children("m", true)->children("d",true);
							if((string)$rowDriver->ID == (string)$rowPickup->DriverId){
								echo "Driver".((string)$rowDriver->FirstName)."<br />";
							}//end of if driver ID in pickup == current driver
						}//end of driver for each
					}//end of if driver field is not null
					foreach($customers->entry as $customer){
						$rowCustomer = $customer->content->children("m", true)->children("d",true);
						if((string)$rowCustomer->ID == (string)$rowPickup->CustomerId){
							echo"Customer".((string)$rowCustomer->FirstName)."<br />";
						}//if customerID in customer matches current customerID in pickup
					}//end of for each customer
				}//end if pickuprequest ID matches current row in pickup
			}//end of pickup for each
		}//end of pickupRequest for each
?>