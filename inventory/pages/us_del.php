<?php
include'../includes/connection.php';

if (isset($_GET['delete_id'])) {
    ?>
    <script type="text/javascript">
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "us_del.php?id=<?php echo $_GET['delete_id']; ?>&confirmed=1";
        } else {
            window.location.href = "user.php";
        }
    </script>
    <?php
} elseif (isset($_GET['confirmed']) && $_GET['confirmed'] == 1 && isset($_GET['id'])) {
    $query = "DELETE FROM users WHERE ID = '{$_GET['id']}'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>
    <script type="text/javascript">
        alert("User Successfully Deleted.");
        window.location = "user.php";
    </script>
    <?php
} else {
    header("Location: user.php");
    exit();
}
?>

