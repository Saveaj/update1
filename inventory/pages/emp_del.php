<?php
include '../includes/connection.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Perform the deletion query
    $query = "DELETE FROM employee WHERE EMPLOYEE_ID = $employee_id";
    $result = mysqli_query($db, $query);

    // Check if deletion was successful
    if ($result) {
        ?>
        <script type="text/javascript">
            alert("Employee Successfully Deleted.");
            window.location = "employee.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Failed to delete employee.");
            window.location = "employee.php";
        </script>
        <?php
    }
}
?>