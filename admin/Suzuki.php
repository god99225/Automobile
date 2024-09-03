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
                        <li class="breadcrumb-item active"> Accessories</li>
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
                        <?php
                        include 'dbcon.php'; // Include database connection

                        // Check if form is submitted and files are uploaded
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["images"])) {
                            $totalImages = count($_FILES['images']['name']);
                            $uploadSuccessMessageDisplayed = false; // Flag to track if success message is displayed
                            for ($i = 0; $i < $totalImages; $i++) {
                                // Retrieve form data
                                $company_name = $_POST["company"];
                                $name = $_POST["name"];
                                $status = $_POST["status"][$i];

                                // File upload path
                                $targetDir = "uploads/";
                                $fileName = basename($_FILES["images"]["name"][$i]);
                                $targetFilePath = $targetDir . $fileName;

                                // File type and allowed types
                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                                $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

                                // Check if file type is allowed
                                if (in_array($fileType, $allowTypes)) {
                                    // Upload file to server
                                    if (move_uploaded_file($_FILES["images"]["tmp_name"][$i], $targetFilePath)) {
                                        // Insert data into database
                                        $sql = "INSERT INTO suzuki (company, name, status, image_path) VALUES ('$company_name', '$name', '$status', '$targetFilePath')";
                                        if ($conn->query($sql) === TRUE) {
                                            // Display success message if not already displayed
                                            if (!$uploadSuccessMessageDisplayed) {
                                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                                echo 'Image uploaded successfully.';
                                                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                                                echo '<span aria-hidden="true">&times;</span>';
                                                echo '</button>';
                                                echo '</div>';
                                                $uploadSuccessMessageDisplayed = true; // Set flag to true
                                            }
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Error: ' . $conn->error . '</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">Sorry, there was an error uploading your file.</div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">File type not allowed.</div>';
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="images">Select Images:</label>
                                <input type="file" class="form-control-file" id="images" name="images[]" multiple accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name:</label>
                                <select class="form-control" id="company_name" name="company" required>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="KIA">KIA</option>
                                    <option value="Mahindra">Mahindra</option>
                                    <option value="TATA">TATA</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Honda">Honda</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status[]" required>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Images</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>
