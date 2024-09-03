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
                        <li class="breadcrumb-item active">Gallery</li>
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
                                $name_of_image = isset($_POST["name_of_image"][$i]) ? $_POST["name_of_image"][$i] : '';
                                $date = isset($_POST["date"][$i]) ? $_POST["date"][$i] : '';
                                // File upload path
                                $targetDir = "galleryimage/";
                                $fileName = basename($_FILES["images"]["name"][$i]);
                                $targetFilePath = $targetDir . $fileName;
                                // File type and allowed types+
                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                                $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
                                // Check if file type is allowed
                                if (in_array($fileType, $allowTypes)) {
                                    // Upload file to server
                                    if (move_uploaded_file($_FILES["images"]["tmp_name"][$i], $targetFilePath)) {
                                        // Insert data into database
                                        $sql = "INSERT INTO gallery (images, date, name_of_image) VALUES ('$targetFilePath', '$date', '$name_of_image')";
                                        if ($conn->query($sql) === TRUE) {
                                            // Display success message if not already displayed
                                            if (!$uploadSuccessMessageDisplayed) {
                                                echo '<div class="alert alert-success" role="alert">';
                                                echo 'Image uploaded successfully. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                                echo '</div>';
                                                $uploadSuccessMessageDisplayed = true;
                                            }
                                        } else {
                                           // echo '<div class="alert alert-danger" role="alert">Error: ' . $conn->error . '</div>';
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
                                <label for="name">Name Of Image</label>
                                <input type="text" class="form-control" id="name_of_image" name="name_of_image[]" placeholder="image name" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" name="date[]" placeholder="Date" required>
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