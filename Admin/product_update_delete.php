<!-- ****************************************************UPDATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="update<?php echo $row['product_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header alert-info">
        <h5 class="modal-title" id="exampleModalLabel">Update product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <input type="hidden" class="form-control" name="product_Id" required value="<?php echo $row['product_Id']; ?>">


          <div class="col-lg-12 mb-2">
            <?php                           
                  $category  = mysqli_query($conn, "SELECT * FROM category");
                  $id = $row['product_cat_Id'];
                  $all_gender = mysqli_query($conn, "SELECT * FROM product where product_cat_Id = '$id' ");
                  $rowe = mysqli_fetch_array($all_gender);
              ?>
              <label>Category name</label>
              <select class="form-control" name="cat_Id" required id="category2">
                  <?php foreach($category as $rows):?>
                        <option value="<?php echo $rows['cat_Id']; ?>"  
                            <?php if($rowe['product_cat_Id'] == $rows['cat_Id']) echo 'selected="selected"'; ?> 
                             > <!--/////   CLOSING OPTION TAG  -->
                            <?php echo $rows['cat_name']; ?>                                           
                        </option>

                 <?php endforeach;?>
               </select>
          </div>


          <div class="col-lg-12">
            <div class="form-group">
                <label>Product name</label>
                <input type="text" class="form-control"  placeholder="Product Name" name="name" required value="<?php echo $row['product_name']; ?>">
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
                <label>Product description</label>
                <input type="text" class="form-control"  placeholder="Product description" name="description" required value="<?php echo $row['product_description']; ?>">
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control"  placeholder="Price" name="price" required value="<?php echo $row['product_price']; ?>">
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
                <b>Stock</b>
                <input type="number" class="form-control"  placeholder="Stock" name="stock" value="<?php echo $row['product_stock']; ?>"required>
            </div>
          </div>


          <div class="col-lg-12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" name="fileToUpload">
              </div>
          </div>
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info" name="update_product">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END UPDATE*********************************************************************** -->







<!-- ****************************************************DELETE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $row['product_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header alert-info">
        <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['product_Id']; ?>" name="product_Id">
          <h6 class="text-center">Delete record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info" name="delete_product">Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- ****************************************************END DELETE*********************************************************************** -->






<!-- ****************************************************ADD AS HOT ITEM************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="hot<?php echo $row['product_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header alert-info">
        <h5 class="modal-title" id="exampleModalLabel">Hot item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['product_Id']; ?>" name="product_Id">
          <h6 class="text-center">Add as <b>hot item?</b></h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info" name="hot_item_product">Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- ****************************************************END ADD AS HOT ITEM************************************************************** -->



