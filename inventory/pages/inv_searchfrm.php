<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='Staffs'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
    
// $query2 = 'SELECT NAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID where PRODUCT_CODE ='.$_GET['id'].' limit 1';
$query2="
SELECT NAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID where PRODUCT_CODE ='{$_GET['id']}' limit 1
";
        $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory for : <?php while ($row = mysqli_fetch_assoc($result2)) { echo $row['NAME']; } ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <!-- <th>On Hand</th> -->
                     <th>Category</th>
                     <th>Branch</th>
                     <th>Date Stock In</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php   
$query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, QTY_STOCK, ON_HAND, CNAME, COMPANY_NAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID JOIN branches b ON p.=b.BRANCH_ID where PRODUCT_CODE ='.$_GET['id'];
$query="SELECT p.*,c.*,b.COMPANY_NAME
FROM product as p join
category as c 
on p.CATEGORY_ID=c.CATEGORY_ID 
JOIN branches as b
ON p.BRANCH_ID=b.BRANCH_ID
where PRODUCT_CODE ='{$_GET['id']}'
";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {

              $stock = $row['QTY_STOCK'];
              $stockstatus ='<span class="badge badge-success">Good Stocks</span>';
              if($stock <20){
                
                $stockstatus ='<span class="badge badge-danger">Low Stocks</span>';
              }

                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'.  $stock .$stockstatus.'</td>';
                
                echo '<td>'. $row['CNAME'].'</td>';
                echo '<td>'. $row['COMPANY_NAME'].'</td>';
                echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                echo '<td align="right">
                      <a type="button" class="btn btn-warning bg-gradient-warning" href="inv_edit.php?action=edit & id='.$row['PRODUCT_ID']. '"><i class="fas fa-fw fa-edit"></i> Edit</a>
                      <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_add.php?action=edit & id='.$row['PRODUCT_ID']. '"><i class="fas fa-fw fa-plus"></i> Add Stocks</a>
                          </div></td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
<?php
include'../includes/footer.php';
?>
