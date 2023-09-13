
<?php 

    include 'navbar.php'; 

    if(isset($_GET['product_Id']))
      $product_Id = $_GET['product_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM product WHERE product_Id='$product_Id'");
    $info  = mysqli_fetch_array($fetch);

    // TO ADD COMMA FOR PRICE
    $price = $info['product_price'];
    $price_text = (string)$price; // convert into a string
    $price_text = strrev($price_text); // reverse string
    $arr = str_split($price_text, "3"); // break string in 3 character sets

    $price_new_text = implode(",", $arr);  // implode array with comma
    $price_new_text = strrev($price_new_text); // reverse string back
    //echo $price_new_text; // will output 1,234
?>

<body class="hold-transition sidebar-mini">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product details</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">E-commerce</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <!-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3> -->
              <div class="col-12">
                <img src="../images-product/<?php echo $info['product_image']; ?>" class="product-image" alt="product Image">
              </div>
              <!-- <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="../dist/img/prod-1.jpg" alt="product Image"></div>
                <div class="product-image-thumb" ><img src="../dist/img/prod-2.jpg" alt="product Image"></div>
                <div class="product-image-thumb" ><img src="../dist/img/prod-3.jpg" alt="product Image"></div>
                <div class="product-image-thumb" ><img src="../dist/img/prod-4.jpg" alt="product Image"></div>
                <div class="product-image-thumb" ><img src="../dist/img/prod-5.jpg" alt="product Image"></div>
              </div> -->
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $info['product_name']; ?></h3>
              <!-- <p><?php //echo $info['product_description']; ?></p> -->

              <hr>
              <h4>Available Stock</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active"><?php echo $info['product_stock']; ?></label>
              </div>

              <!-- <h4 class="mt-3">Size <small>Please select one</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">S</span>
                  <br>
                  Small
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">M</span>
                  <br>
                  Medium
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">L</span>
                  <br>
                  Large
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                  <span class="text-xl">XL</span>
                  <br>
                  Xtra-Large
                </label>
              </div> -->

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  ₱ <?php echo $price_new_text; ?>.00
                </h2>
                <!-- <h4 class="mt-0">
                  <small>Ex Tax: $80.00 </small>
                </h4> -->
              </div>

             <!--  <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Add to Wishlist
                </div>
              </div>

              <div class="mt-4 menu-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div> -->

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="menu-tab" role="tablist">
                <a class="nav-item nav-link active" id="menu-desc-tab" data-toggle="tab" href="#menu-desc" role="tab" aria-controls="menu-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="menu-comments-tab" data-toggle="tab" href="#menu-comments" role="tab" aria-controls="menu-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="menu-rating-tab" data-toggle="tab" href="#menu-rating" role="tab" aria-controls="menu-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="menu-desc" role="tabpanel" aria-labelledby="menu-desc-tab"> <?php echo $info['product_description']; ?> </div>

              <div class="tab-pane fade" id="menu-comments" role="tabpanel" aria-labelledby="menu-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              
              <div class="tab-pane fade" id="menu-rating" role="tabpanel" aria-labelledby="menu-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

<!-- jQuery -->
<?php include 'footer.php'; ?>
<script>
  $(document).ready(function() {
    $('.menu-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.menu-image').prop('src', $image_element.attr('src'))
      $('.menu-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>
</html>
