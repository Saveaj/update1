<?php
include'../includes/connection.php';

	if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
    	switch ($_GET['action']) {
    		case 'branches':
    			$query = 'DELETE FROM branches WHERE BRANCH_ID = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">window.location = "branches.php";</script>					
            <?php
    			break;
            }
	}
?>