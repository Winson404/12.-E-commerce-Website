<!-- ****************************************************CREATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header alert-info">
        <h5 class="modal-title" id="exampleModalLabel">New category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">

          <div class="col-lg-12">
              <div class="form-group">
                <label>Category name</label>
                <input type="text" class="form-control"  placeholder="Category name" name="categoryname" required>
              </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
                <label>Category description</label>
                <input type="text" class="form-control"  placeholder="Category description" name="categorydescription" required>
            </div>
          </div>
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info" name="create_category">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END CREATE*********************************************************************** -->







