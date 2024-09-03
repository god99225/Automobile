<?php
// Start session
session_start();

include('include/header.php');
include('include/topbar.php');
include('include/sidebar.php');

// Function to sanitize user inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to update the status of an accessory
function update_status($conn, $accessory_id, $new_status) {
    $accessory_id = sanitize_input($accessory_id);
    $new_status = sanitize_input($new_status);

    $sql = "UPDATE suzuki SET status='$new_status' WHERE id=$accessory_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Status updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating status: " . $conn->error . "');</script>";
    }
}

// Function to delete an accessory
function delete_accessory($conn, $accessory_id) {
    $accessory_id = sanitize_input($accessory_id);

    $sql = "DELETE FROM suzuki WHERE id=$accessory_id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['delete_status'] = true;
    } else {
        $_SESSION['delete_status'] = false;
    }
}

// Check if ID is provided in the URL for status update or delete
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $accessory_id = $_GET['id'];
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "autoservice";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update status action
    if($action === 'update_status') {
        $new_status = isset($_GET['status']) ? $_GET['status'] : '';
        update_status($conn, $accessory_id, $new_status);
    }

    // Delete action (modified to only execute when the delete button is clicked)
    if($action === 'delete' && isset($_GET['delete']) && $_GET['delete'] === 'true') {
        delete_accessory($conn, $accessory_id);
    }

    $conn->close();
}

// Display accessories
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Accessories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View Accessories</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        // Check if delete action was performed
                        if(isset($_SESSION['delete_status'])) {
                            if($_SESSION['delete_status'] === true) {
                                echo "<div id='deleteMessage' class='alert alert-success' role='alert'>Accessory deleted successfully <span id='closeMessage' style='cursor:pointer; float:right;'>&times;</span></div>";
                            } else {
                                echo "<div id='deleteMessage' class='alert alert-danger' role='alert'>Error deleting accessory <span id='closeMessage' style='cursor:pointer; float:right;'>&times;</span></div>";
                            }
                            // Unset delete status to prevent repeated display
                            unset($_SESSION['delete_status']);
                        }
                        ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch data from database
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "autoservice";
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT * FROM suzuki";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['company'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td><img src='{$row['image_path']}' alt='Accessory Image' style='max-width:100px;'></td>";
                                        echo "<td>";
                                        // Delete button (modified to include confirmation)
                                        echo "<a href='?action=delete&id={$row['id']}&delete=true' onclick='return confirm(\"Are you sure you want to delete this accessory?\")'><i class='fas fa-trash' style='color: red;'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                                        // Update status button
                                        if ($row['status'] == 'available') {
                                            echo "<a href='?id={$row['id']}&action=update_status&status=unavailable'><i class='fas fa-toggle-on' style='color: green;'></i></a>";
                                        } else {
                                            echo "<a href='?id={$row['id']}&action=update_status&status=available'><i class='fas fa-toggle-off' style='color: red;'></i></a>";
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No accessories found</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>

<script>
// JavaScript to close the delete message when the 'close' icon is clicked
document.getElementById('closeMessage').addEventListener('click', function() {
    document.getElementById('deleteMessage').style.display = 'none';
});
</script>
