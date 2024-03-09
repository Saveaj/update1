<?php
include'../includes/connection.php';

if (isset($_GET['delete_id'])) {
    ?>
    <script type="text/javascript">
        if (confirm("Are you sure you want to delete this product?")) {
            window.location.href = "pro_del.php?id=<?php echo $_GET['delete_id']; ?>&confirmed=1";
        } else {
            window.location.href = "product.php";
        }
    </script>
    <?php
} elseif (isset($_GET['confirmed']) && $_GET['confirmed'] == 1 && isset($_GET['id'])) {
    $query = "DELETE FROM product WHERE PRODUCT_ID = '{$_GET['id']}'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>
    <script type="text/javascript">
        alert("Product Successfully Deleted.");
        window.location = "product.php";
    </script>
    <?php
} else {
    header("Location: product.php");
    exit();
}
?>
