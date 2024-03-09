<?php
include '../includes/connection.php';
session_start();

$date = $_POST['date'];
$customer = $_POST['customer'];
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];
$cash = $_POST['cash'];
$emp = $_POST['employee'];
$rol = $_POST['role'];
$today = date("mdGis"); 
$checker = 0;
$countID = count($_POST['name']);

switch ($_GET['action']) {
    case 'add':
        for ($i = 1; $i <= $countID; $i++) {
            if ($_POST['prod_qty'][$i - 1] < (int)$_POST['quantity'][$i - 1]) {
                $checker += 1;
            }
        }  

        if ($checker == 0) {
            for ($i = 1; $i <= $countID; $i++) {
                $newVal = (int)$_POST['prod_qty'][$i - 1] - (int)$_POST['quantity'][$i - 1];
                $sql = "UPDATE `product` SET `QTY_STOCK` = '$newVal' WHERE NAME = '{$_POST['name'][$i - 1]}'";
                mysqli_query($db, $sql) or die (mysqli_error($db)); 

                $query = "INSERT INTO `transaction_details`
                            ( `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                            VALUES ( '{$today}', '".$_POST['name'][$i - 1]."', '".$_POST['quantity'][$i - 1]."', '".$_POST['price'][$i - 1]."', '{$emp}', '{$rol}')";

                mysqli_query($db, $query) or die (mysqli_error($db));

                $query2 = "INSERT INTO `stocklogs` (`id`, `product_id`, `type`, `qty`, `datetime`) VALUES (NULL, '{$_POST['productID'][$i - 1]}', 'stock_out', '{$_POST['quantity'][$i - 1]}', current_timestamp())";
                $result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
            }

            $query111 = "INSERT INTO `transaction`
                        ( `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
                        VALUES ('{$customer}','{$countID}','{$subtotal}','{$total}','{$cash}','{$date}','{$today}')";
            mysqli_query($db, $query111) or die (mysqli_error($db));

          
           
        } else {
            unset($_SESSION['pointofsale']);
            ?>
            <script type="text/javascript">
                alert("Insufficient Inventory");
                window.location = "pos.php";
            </script>
            <?php
            exit();
        }
    break;
}

unset($_SESSION['pointofsale']);
?>
<script type="text/javascript">
    alert("Transaction Success");
    window.location = "pos.php";
</script>


          


