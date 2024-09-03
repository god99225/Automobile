<?php
include('include/header.php');
include('include/topbar.php');
include('include/sidebar.php');
?>
<style>
    .update-button {
        padding: 5px 10px;
        font-size: 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .update-button:hover {
        background-color: #0056b3; /* Hover background color */
    }  
</style>

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
              <li class="breadcrumb-item active">Slotbooking</li>
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
                    <h3 class="card-title">Slot Booking</h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive"> <!-- Add responsive wrapper -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>E-Mail</th>
                                    <th>Date</th>
                                    <th>Timeslot</th>
                                    <th>Services</th>
                                    <th>Special Request</th>
                                    <th>Work Status</th>
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

                            // Function to get status color
                            function getStatusColor($status) {
                                switch ($status) {
                                    case 'completed':
                                        return 'green'; // Green color for completed status
                                    case 'in_progress':
                                        return 'yellow'; // Yellow color for in progress status
                                    case 'incomplete':
                                        return 'red'; // Red color for incomplete status
                                    default:
                                        return 'black'; // Default color for any other status
                                }
                            }

                            // Fetch data from database
                            $sql = "SELECT * FROM bookings";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['contact_no'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['timeslot'] . "</td>";
                                    echo "<td>" . $row['services'] . "</td>";
                                    echo "<td>" . $row['special_request'] . "</td>";
                                    echo "<td style='color: " . getStatusColor($row['status']) . "; font-weight: bold;'>" . $row['status'] . "</td>"; // Display status column with color and bold text
                                    echo "<td>";
                                    // Status update form
                                    echo "<form action='' method='post'>";
                                    echo "<input type='hidden' name='booking_id' value='" . $row['id'] . "'>";
                                    echo "<select name='new_status'>";
                                    echo "<option value='completed'>Completed</option>";
                                    echo "<option value='in_progress'>In Progress</option>";
                                    echo "<option value='incomplete'>Incomplete</option>";
                                    echo "</select>";
                                    echo "<button type='submit' class='update-button'>Update</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "<td>";
                                    // Action icons wrapped in a div
                                    echo "<div class='action-icons'>";
                                    // WhatsApp icon with link
                                    echo "<a href='https://wa.me/{$row['contact_no']}' target='_blank'><i class='fab fa-whatsapp' style='color: green;'></i></a>&nbsp;";
                                    // Email icon with mailto link
                                    echo "<a href='mailto:{$row['email']}'><i class='fas fa-envelope'></i></a>&nbsp;";
                                    // Delete icon with delete functionality
                                    echo "<a href='Slotbooking.php?action=delete&id={$row['id']}'><i class='fas fa-trash'style='color: red;'></i></a>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>No bookings found</td></tr>";
                            }
                            $conn->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.content-wrapper -->

<?php
// Backend code for updating status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve booking ID and new status from the form
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['new_status'];

    // Update the status in the database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Prepare and execute the SQL update statement
    $sql = "UPDATE bookings SET status='$new_status' WHERE id=$booking_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Status updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating status');</script>";
    }
    $conn->close();
}

include('include/footer.php');
?>
