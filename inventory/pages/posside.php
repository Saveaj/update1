<!-- SIDE PART NA SUMMARY -->
        <div class="card-body col-md-3">
        <?php   
        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);
                  $lessvat = ($total / 1.12) * 0.12;
                  $netvat = ($total / 1.12);
                  $addvat = ($total / 1.12) * 0.12;

             endforeach;

//DROPDOWN FOR CUSTOMER
$sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME
        FROM customer
        order by FIRST_NAME asc";
$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$opt = "<select class='form-control'  style='border-radius: 0px;' name='customer' readonly>";
 
    $opt .= "<option value='11' selected> A Walk in Customer</option>";
 
$opt .= "</select>";
// END OF DROP DOWN
        ?>  
<?php 
          echo "Today's date is : "; 
          $today = date("Y-m-d H:i a"); 
          echo $today; 
?> 
          <input type="hidden" name="date" value="<?php echo $today; ?>">
          <div class="form-group row text-left mb-3">
            <div class="col-sm-12 text-primary btn-group">
            <?php echo $opt; ?>
            <a  href="#" hidden data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Subtotal
              </h6>
            </div>
            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>" readonly name="subtotal">
              </div>
            </div>
            //

          

          </div>
<?php endif; ?>       
          <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">SUBMIT</button>

        <!-- Modal -->
        <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group row text-left mb-2">

                    <div class="col-sm-12 text-center">
                      <h3 class="py-0">
                        GRAND TOTAL
                      </h3>
                      <h3 class="font-weight-bold py-3 bg-light">
                        ₱ <?php echo number_format($total, 2); ?>
                      </h3>
                    </div>

                  </div>

                    <div class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">₱</span>
                        </div>
                          <input class="form-control text-right" id="txtNumber" onkeypress="return isNumberKey(event)" type="text" name="cash" placeholder="ENTER EXACT AMOUNT" name="cash" required>
                    </div>
                  </div>
              </div>
              <script>
function validateCashPayment() {
  var cash = document.getElementById("txtNumber").value;
  var total = <?php echo $total; ?>;
  if (cash < total) {
    alert("Error: Cash payment is lower than the required value.");
    return false;
  }
  return true;
}
</script>
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-block" onclick="return validateCashPayment();">PROCEED TO STOCKOUT</button>
              </div>
            </div>
          </div>
        </div>
        <!-- END OF Modal -->

        </form>
      </div> <!-- END OF CARD BODY -->

     </div>
