<table id="dataTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP Snippets for Products -->
            <?php  
                $query = 'SELECT * FROM product';
                $result = mysqli_query($db, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $product['NAME']; ?></td>
                <td><?php echo $product['PRODUCT_CODE']; ?></td>
                <td><?php echo $product['DESCRIPTION']; ?></td>
                <td><?php echo $product['PRICE']; ?></td>
                <td><?php echo $product['QTY_STOCK']; ?></td>
                <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                <td>
                    
                        <input type="number" name="quantity" class="form-control" value="1" min="1" max="<?php echo $product['QTY_STOCK']; ?>" />
                        <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                        <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                        <input type="hidden" name="prod_qty" value="<?php echo $product['QTY_STOCK']; ?>" readonly/>
                        
                  

                </td>
                <td>
                <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Add" />
                </td>
                </form>
            </tr>
            <?php 
                    }
                } else {
                    // Handle no products found
                }
            ?>
        </tbody>
    </table>