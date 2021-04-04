<?php
    require('authentication.php');
    require('includes/header.php');
    require('includes/topbar.php');    
    require('includes/sidebar.php'); 
    include('config/dbcon.php');
?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
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
                <h3 class="card-title">Registered User</h3>
                <a href="manage-user.php" class="btn btn-danger float-right">Back</a>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="code.php" method="POST">
                            <div class="modal-body">
                                <?php
                                if(isset($_GET['user_id']))
                                {
                                    $user_id = $_GET['user_id'];
                                    $query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input name="phone" class="form-control"
                                                value="<?php echo $row['phone'] ?>" placeholder="Phone number"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email"
                                                value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password"
                                                value="<?php echo $row['password'] ?>" class="form-control" placeholder="Password"/>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h4> No Record Found.!</h4>";
                                    }
                                }
                                    
                                ?>
                            
                            </div>
                            <div class="modal-footer">

                            <button type="submit" name="updateuser" 
                            class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
    
<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>