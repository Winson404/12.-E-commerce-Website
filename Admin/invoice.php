<?php 
    include 'navbar.php'; 
    if(isset($_GET['user_Id']))
      $id = $_GET['user_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
    $row = mysqli_fetch_array($fetch);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> E-Commerce
                    <small class="float-right"><?php echo date("M d, Y"); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>E-Commerce</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo ' '.$row['fname'].' '.$row['mname'].' '.$row['lname'].' '.$row['suffix'].' '; ?></strong><br>
                    <!-- 795 Folsom Ave, Suite 600<br> -->
                    <?php echo $row['address']; ?><br>
                    Phone: <?php echo $row['contact']; ?><br>
                    Email: <?php echo $row['email']; ?>
                  </address>
                </div>
                <!-- /.col -->
               <!--  <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div> -->
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                      <th>Item Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                // FETCH GRAND TOTAL ************************************************************************************************************
                              $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) AS total_price FROM cart JOIN users ON cart.cart_user_Id=users.user_Id WHERE cart_user_Id='$id' AND cart_status='Confirmed' AND checkout='Confirmed'");
                              $row_total = mysqli_fetch_array($fetch_total);

                              $price = $row_total['total_price'];
                              $grand_price = $price;
                              $grand_price_text = (string)$grand_price; // convert into a string
                              $grand_price_text = strrev($grand_price_text); // reverse string
                              $arr = str_split($grand_price_text, "3"); // break string in 3 character sets

                              $grand_price_new_text = implode(",", $arr);  // implode array with comma
                              $grand_price_new_text = strrev($grand_price_new_text); // reverse string back
                              //echo $grand_price_new_text; // will output 1,234
                              //
                              // END FETCH GRAND TOTAL ********************************************************************************************************
                           

                $a = mysqli_query($conn, "SELECT * FROM cart JOIN users ON cart.cart_user_Id=users.user_Id JOIN product ON cart.cart_product_Id=product.product_Id WHERE cart_user_Id='$id' AND cart_status='Confirmed' AND checkout='Confirmed' ORDER BY cart_Id DESC");
                if(mysqli_num_rows($a) > 0) {

                while ($b = mysqli_fetch_array($a)) {

                // TO ADD COMMA FOR PRICE
                              $price = $b['product_price'];
                              $price_text = (string)$price; // convert into a string
                              $price_text = strrev($price_text); // reverse string
                              $arr = str_split($price_text, "3"); // break string in 3 character sets

                              $price_new_text = implode(",", $arr);  // implode array with comma
                              $price_new_text = strrev($price_new_text); // reverse string back
                              //echo $price_new_text; // will output 1,234
                              



                              $qty = $b['cart_quantity'];
                              $total = $price * $qty;

                              // TO ADD COMMA FOR PRICE
                              $total_price = $total;
                              $price_texts = (string)$total_price; // convert into a string
                              $price_texts = strrev($price_texts); // reverse string
                              $arrs = str_split($price_texts, "3"); // break string in 3 character sets

                              $price_new_texts = implode(",", $arrs);  // implode array with comma
                              $price_new_texts = strrev($price_new_texts); // reverse string back
                              //echo $price_new_text; // will output 1,234
              ?>
                    <tr>
                      <td><?php echo $b['cart_quantity']; ?></td>
                      <td><?php echo $b['product_name']; ?></td>
                      <td><?php echo $b['product_description']; ?></td>
                      <td>₱ <?php echo $price_new_text; ?>.00</td>
                      <td>₱ <?php echo $price_new_texts; ?>.00</td>
                      <td><?php if($b['receivingStatus'] == 'On process') { echo '<span class="badge bg-warning">On process</span>'; } else { echo '<span class="badge bg-success">Received</span>'; } ?></td>
                    </tr>
                    <?php } } else { ?>
                      <tr>

                        <td colspan="100%" class="text-center">No checkouts yet</td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods: <b>COD</b></p>
                  <!-- <img src="../dist/img/credit/visa.png" alt="Visa">
                  <img src="../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p> -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <!-- <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr> -->
                      <tr>
                        <th>Total:</th>
                        <td>
                          <?php 
                            $checkedOUT = mysqli_query($conn, "SELECT * FROM cart JOIN users ON cart.cart_user_Id=users.user_Id WHERE cart_user_Id='$id' AND cart_status='Confirmed' AND checkout='Confirmed'");
                            if(mysqli_num_rows($checkedOUT) > 0) {
                              echo '₱'.$grand_price_new_text.'.00';
                            } else {
                              echo 'No checkouts yet';
                            }
                          ?>
                          </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="product_invoice_print.php?user_Id=<?php echo $id; ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                 <!--  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF -->
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php include 'footer.php'; ?>
