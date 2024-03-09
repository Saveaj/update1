<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $name = $_POST['companyname'];
              $prov = $_POST['province'];
              $bra = $_POST['barangay'];
              $cit = $_POST['city'];
              $phone = $_POST['phonenumber'];
        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO location
                              (LOCATION_ID, PROVINCE, BARANGAY, CITY)
                              VALUES (Null,'{$prov}','{$bra}','{$cit}')";
                    mysqli_query($db,$query)or die ('Error in updating location in Database');

                    $query2 = "INSERT INTO branches
                              (BRANCH_ID, COMPANY_NAME, LOCATION_ID, PHONE_NUMBER)
                              VALUES (Null,'{$name}',(SELECT MAX(LOCATION_ID) FROM location),'".$phone."')";
                    mysqli_query($db,$query2)or die ('Error in updating branches in Database');
                break;
              }
            ?>
              <script type="text/javascript">window.location = "branches.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>