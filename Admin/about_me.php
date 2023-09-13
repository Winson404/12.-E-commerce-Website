<title>Profile | SC E-commerce</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <!-- left column -->
          <div class="col-md-10">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
              </div>
                <?php if(isset($_SESSION['success'])) { ?> 
                    <p class="alert alert-success position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['success']; ?></p> 
                <?php unset($_SESSION['success']); } ?>

                <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                <?php  if(isset($_SESSION['exists'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['exists']; ?></p>
                <?php unset($_SESSION['exists']); } ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="process_save.php" method="POST" enctype="multipart/form-data">
                     <div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label>First name</label>
                                  <input type="text" class="form-control form-control-sm" value="<?php echo $row['firstname']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                  <label>Middle name</label>
                                  <input type="text" class="form-control form-control-sm" value="<?php echo $row['middlename']; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Last name</label>
                                  <input type="text" class="form-control form-control-sm" value="<?php echo $row['lastname']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label>suffixname</label>
                                <input type="text" class="form-control form-control-sm" value="<?php echo $row['suffix']; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Gender</label>
                                <input type="text" class="form-control form-control-sm" value="<?php echo $row['gender']?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                  <label>Date of Birth</label>
                                  <input type="date" class="form-control form-control-sm" value="<?php echo $row['dob']?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label>Age</label>
                                  <input type="number" class="form-control form-control-sm" value="<?php echo $row['age']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Contact</label>
                                    <input type="number" class="form-control form-control-sm" value="<?php echo $row['contact']; ?>" readonly>
                                 </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Email address</label>
                                  <input type="email" class="form-control form-control-sm" value="<?php echo $row['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="email" class="form-control form-control-sm" value="<?php echo $row['address']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                   </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="about_me_update.php" class="btn btn-info">Update</a>
                  <a href="changepassword.php" class="btn btn-info">Change password</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
         </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 


  <?php include 'footer.php'; ?>
 
</body>
</html>
