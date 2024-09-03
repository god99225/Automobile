<?php
include('include/header.php');
include('include/topbar.php');
include('include/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

   
 <!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

  <div class="container">
    <div class="row"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Users</h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone No</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "autoservice";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        // Fetch data from database
                        $sql = "SELECT * FROM signup";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['mobile'] . "</td>";
                                // Add action icons
                                echo "<td>";
                                // WhatsApp icon with link
                                echo "<a href='https://wa.me/{$row['mobile']}' target='_blank'><i class='fab fa-whatsapp' style='color: green;'></i></a>&nbsp;&nbsp;&nbsp;";
                                echo "<a href='mailto:{$row['email']}'><i class='fas fa-envelope'></i></a>&nbsp;&nbsp;&nbsp;";
                                echo "<a href='registered.php?action=delete&id={$row['id']}'><i class='fas fa-trash' style='color: red;'></i></a>";
                                
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No users found</td></tr>";
                        }
                        $conn->close();
                        ?>

                        <?php
                        // Check if delete action is triggered
                        if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
                            $delete_id = $_GET['id'];
                            // Connect to the database
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            // Prepare and execute delete query
                            $sql = "DELETE FROM signup WHERE id = $delete_id";
                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert('Record deleted successfully');</script>";
                                echo "<script>window.location.href='registered.php';</script>";
                            } else {
                                echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
                            }
                            $conn->close();
                        }
                        ?>
                        </tbody>
                    </table>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container -->

<?php
include('include/footer.php');
?>
