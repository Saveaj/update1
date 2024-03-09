<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$name = $_POST['name'];
            $prov = $_POST['province'];
			$bra = $_POST['barangay'];
            $cit = $_POST['city'];
            $phone = $_POST['phone'];
		
	 			$query = 'UPDATE branches e join location l on l.LOCATION_ID=e.LOCATION_ID set COMPANY_NAME="'.$name.'", l.PROVINCE ="'.$prov.'", l.BARANGAY ="'.$bra.'", l.CITY ="'.$cit.'", PHONE_NUMBER="'.$phone.'" WHERE
					BRANCH_ID ="'.$zz.'"'; 
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Updated the Branches Successfully.");
			window.location = "branches.php";
		</script>