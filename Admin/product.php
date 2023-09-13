<title>Product list | SC E-commerce</title>

<?php 
  include 'navbar.php'; 
  include 'sweetalert_messages.php';
?>
<?php 

  function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Product list</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Product list</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="bi bi-plus-circle"></i> Add</button>

                  <?php if(isset($_SESSION['success'])) { ?> 
                      <h3 class="alert card-title position-absolute py-2 alert-success rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['success']; ?></h3>
                  <?php unset($_SESSION['success']); } ?>


                  <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                      <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></h3>
                  <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                  <?php  if(isset($_SESSION['exists'])) { ?>
                      <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['exists']; ?></h3>
                  <?php unset($_SESSION['exists']); } ?>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Category name</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM product JOIN category ON product.product_cat_Id=category.cat_Id ORDER BY cat_name ASC");
                        while ($row = mysqli_fetch_array($sql)) {

                            // TO ADD COMMA FOR PRICE
                            $price = $row['product_price'];
                            $price_text = (string)$price; // convert into a string
                            $price_text = strrev($price_text); // reverse string
                            $arr = str_split($price_text, "3"); // break string in 3 character sets

                            $price_new_text = implode(",", $arr);  // implode array with comma
                            $price_new_text = strrev($price_new_text); // reverse string back
                            //echo $price_new_text; // will output 1,234
                      ?>
                        <td>
                            <img src="../images-product/<?php echo $row['product_image']; ?>" alt="" width="50">
                        </td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo custom_echo($row['product_name'], 30); ?></td>
                        <td><b>₱ <?php echo $price_new_text; ?>.00</b></td>
                        <td><?php echo $row['product_stock']; ?></td>
                        <td>
                            <div class="dropdown dropleft">
                                  <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownmenuButton" data-toggle="dropdown" aria-expanded="false"> Actions </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownmenuButton">
                                      <a href="product_view.php?product_Id=<?php echo $row['product_Id']; ?>" type="button" class="btn btn-primary dropdown-item">View</a>
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#update<?php echo $row['product_Id']; ?>">Update</button>
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#hot<?php echo $row['product_Id']; ?>">Add as Hot Item</button>
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#delete<?php echo $row['product_Id']; ?>">Delete</button>
                                </div>
                            </div>
                        </td> 
                    </tr>

                    <?php include 'product_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Image</th>
                        <th>Category name</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Tools</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 <?php include 'product_add.php'; ?>
 <?php include 'footer.php'; ?>

 <script>
   //-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,5000);
  }
  );
//-----------------------------END ALERT TIMEOUT---------------------//
 </script>




