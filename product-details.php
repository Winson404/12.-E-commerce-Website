<?php 
  include 'topbar.php';
  include 'sweetalert_messages.php';
  if(isset($_GET['product_Id'])) {
    $product_Id = $_GET['product_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM product WHERE product_Id = '$product_Id'");
    $row = mysqli_fetch_array($fetch);
    // TO ADD COMMA FOR PRICE
    $price = $row['product_price'];
    $price_text = (string)$price; // convert into a string
    $price_text = strrev($price_text); // reverse string
    $arr = str_split($price_text, "3"); // break string in 3 character sets

    $price_new_text = implode(",", $arr);  // implode array with comma
    $price_new_text = strrev($price_new_text); // reverse string back
    //echo $price_new_text; // will output 1,234
?>



  <main id="main" class="mb-3">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Product Details</h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="images-product/<?php echo $row['product_image']; ?>" class="img-fluid mt-3" alt="">
            <h3 class="mt-3">Product description</h3>
            <p><?php echo $row['product_description']; ?></p>
          </div>
          <div class="col-lg-4">

            <div class="d-flex bg-light p-3 m-3  justify-content-between align-items-center">
              <h5>Price</h5>
              <p><a href="#">₱ <?php echo $price_new_text; ?>.00</a></p>
            </div>

            <div class="d-flex bg-light p-3 m-3  justify-content-between align-items-center">
              <h5>Stock</h5>
              <p><?php echo $row['product_stock']; ?></p>
            </div>

            <!-- <div class="d-flex bg-light p-3 m-3  justify-content-between align-items-center">
              <h5>Available Seats</h5>
              <p>30</p>
            </div>

            <div class="d-flex bg-light p-3 m-3  justify-content-between align-items-center">
              <h5>Schedule</h5>
              <p>5.00 pm - 7.00 pm</p>
            </div> -->

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->

   

  </main><!-- End #main -->
<?php } ?>

 <?php include 'footer.php'; ?>