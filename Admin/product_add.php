<!-- ****************************************************CREATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header alert-info">
        <h5 class="modal-title" id="exampleModalLabel">New product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">


          <!-- LOAD IMAGE PREVIEW -->
          <div class="col-lg-12 mb-2">
              <div class="form-group" id="preview">
              </div>
          </div>


          <div class="col-lg-12">
              <div class="form-group">
                <b>Category name</b>
                <select class="form-control" name="cat_Id" required id="category">
                  <option selected disabled>Select category</option>
                  <?php 
                    $fetch = mysqli_query($conn, "SELECT * FROM category");
                    while ($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <option value="<?php echo $row['cat_Id']; ?>"><?php echo $row['cat_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
          </div>


          <div class="col-lg-12">
            <div class="form-group">
                <b>Product name</b>
                <input type="text" class="form-control"  placeholder="Product name" name="name" required>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
                <b>Product description</b>
                <input type="text" class="form-control"  placeholder="Product description" name="description" required>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
                <b>Price</b>
                <input type="number" class="form-control"  placeholder="Price" name="price" required>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
                <b>Stock</b>
                <input type="number" class="form-control"  placeholder="Stock" name="stock" required>
            </div>
          </div>


          <div class="col-lg-12">
              <div class="form-group">
                <b>Image</b>
                <input type="file" class="form-control-file" name="fileToUpload" onchange="getImagePreview(event)" required>
              </div>
          </div>
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info" name="create_product">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END CREATE*********************************************************************** -->




<script>
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var remove= document.getElementById('remove');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }

</script>




