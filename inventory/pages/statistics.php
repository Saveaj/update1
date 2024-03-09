<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

// Query for line graph
$sql = $db->query("
    SELECT *, MONTH(DATE) AS MONTH, SUM(QTY) AS TOTAL_QTY
    FROM `transaction_details`
    WHERE YEAR(DATE) = YEAR(CURRENT_TIMESTAMP())
    GROUP BY MONTH(DATE)
");

// Query for categories
$categories_query = $db->query("
    SELECT CNAME
    FROM category
");

// Pie Chart data array
$pie_data = [];

// Loop through each category to get top selling products
if ($categories_query) {
    while ($category_row = $categories_query->fetch_assoc()) {
        $category_name = $category_row['CNAME'];
        $sql2 = $db->query("
            SELECT b.NAME, SUM(a.QTY) AS TOTAL_QTY 
            FROM transaction_details AS a
            LEFT JOIN product AS b ON a.PRODUCTS = b.NAME
            LEFT JOIN category AS c ON b.CATEGORY_ID = c.CATEGORY_ID
            WHERE c.CNAME = '$category_name'
            GROUP BY a.PRODUCTS
        ");
        $pie_data[$category_name] = [];
        while ($row2 = $sql2->fetch_assoc()) {
            array_push($pie_data[$category_name], [$row2['NAME'], $row2['TOTAL_QTY']]);
        }
    }
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
if ($sql->num_rows != 0) { ?>
    <div class="container">
        <div class="row">
            <!-- Line Graph 
            <div class="col-sm-6 mt-3">
                <div class="card">
                    <h5 class="text-center pt-2">Monthly Profits</h5>
                    <canvas id="myChart"></canvas>
                </div>
            </div> -->
           <!-- Pie Charts -->
<div class="col-md-12 mt-3">
    <div class="row justify-content-center">
        <?php foreach ($pie_data as $category_name => $data) { ?>
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <h5 class="text-center pt-2">Top Selling Products - <?php echo $category_name; ?></h5>
                    <div style="width: 100%; margin: 0 auto;">
                        <canvas id="<?php echo str_replace(' ', '', $category_name) . 'PieChart'; ?>" style="width: 100%; height: 100px;"></canvas>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

        </div>
        <!-- Recent Sales -->
        <div class="col-sm mt-3">
            <h3 class="text-center font-weight-light">Recent Sales this <?php echo date('F') ?></h3>
            <table class="table table-hover">
                <tr class="table-danger">
                    <th>PRODUCTS</th>
                    <th>QUANTITY SOLD</th>
                    <th>PRICE PER UNIT</th>
                    <th>TOTAL SALES</th>
                </tr>
                <?php
                $sql3 = $db->query("
                    SELECT *, SUM(QTY) AS total_qty, SUM(QTY * PRICE) AS total_price
                    FROM `transaction_details`
                    WHERE MONTH(DATE) = MONTH(CURRENT_TIMESTAMP())
                    GROUP BY PRODUCTS
                ");
                while ($row3 = $sql3->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row3['PRODUCTS'] ?></td>
                        <td><?php echo $row3['total_qty'] ?></td>
                        <td><?php echo $row3['PRICE'] ?></td>
                        <td><?php echo $row3['total_price'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } else { ?>
    <h1 class="text-center text-danger">NO STATISTICS YET</h1>
<?php } ?>

<!-- Line Graph -->
<script>
    var datas = <?php echo json_encode($data); ?>;
</script>
<script src="../js/lineGraph.js"></script>

<!-- Pie Graph -->
<?php foreach ($pie_data as $category_name => $data) { ?>
    <script>
        var pieData_<?php echo str_replace(' ', '', $category_name); ?> = <?php echo json_encode($data); ?>;
        var pieLabels_<?php echo str_replace(' ', '', $category_name); ?> = pieData_<?php echo str_replace(' ', '', $category_name); ?>.map(item => item[0]);
        var pieValues_<?php echo str_replace(' ', '', $category_name); ?> = pieData_<?php echo str_replace(' ', '', $category_name); ?>.map(item => item[1]);
        var pieConfig_<?php echo str_replace(' ', '', $category_name); ?> = {
            type: 'pie',
            data: {
                labels: pieLabels_<?php echo str_replace(' ', '', $category_name); ?>,
                datasets: [{
                    data: pieValues_<?php echo str_replace(' ', '', $category_name); ?>,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(399, 25, 26)',
                        'rgb(5, 1, 2)',
                        'rgb(190, 23, 66)',
                        'rgb(55, 205, 42)',
                        'rgb(98, 205, 16)',
                    ],
                    hoverOffset: 4
                }]
            },
        };
        var ctx_<?php echo str_replace(' ', '', $category_name); ?> = document.getElementById('<?php echo str_replace(' ', '', $category_name) . 'PieChart'; ?>').getContext('2d');
        new Chart(ctx_<?php echo str_replace(' ', '', $category_name); ?>, pieConfig_<?php echo str_replace(' ', '', $category_name); ?>);
    </script>
<?php } ?>

<h4> Generate Reports </h4>
<form action="Generate Reports.php" method="post">
    <div class="form-group">
        <label for="start_date">Start Date:</label>
        <input type="date" class="form-control" id="start_date" name="start_date" required>
    </div>
    <div class="form-group">
        <label for="end_date">End Date:</label>
        <input type="date" class="form-control" id="end_date" name="end_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
</form>

<?php include '../includes/footer.php'; ?>
