<?php
include('../includes/connection.php');
			$zz = $_POST['idd'];
            $a = $_POST['qty'];
		
	 			$query = "UPDATE product set QTY_STOCK=QTY_STOCK + '$a' WHERE
					PRODUCT_ID ='$zz'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));


					$query2 = "INSERT INTO `stocklogs` (`id`, `product_id`, `type`, `qty`, `datetime`) VALUES (NULL, '$zz', 'stock_in', '$a', current_timestamp())
					";
					$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));


?>	
	<script type="text/javascript">
			alert("Stocks Added Successfully.");
			window.location = "inventory.php";
		</script>