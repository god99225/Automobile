<?php
include ("_header.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        .header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 0 15px; /* Equal padding on left and right sides */
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .card {
            width: 250px;
            margin: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .card-body {
            padding: 15px;
        }

        /* Responsive styles */
        @media (min-width: 768px) {
            .gallery-container {
                padding: 0 30px; /* Increase padding on medium-sized screens and above */
            }
        }

        /* Status colors */
        .status-available {
            color: white;
            background-color: green;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-unavailable {
            color: white;
            background-color: red;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    

    <!-- Gallery Container -->
    <div class="gallery-container">
        <?php
        // Include database connection
        include 'dbcon.php';

        // Fetch images from the database based on company name
        $company_name = "TATA"; // You can change this dynamically based on user selection
        $sql = "SELECT * FROM suzuki WHERE company='$company_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Determine the CSS class based on status
                $statusClass = ($row['status'] == 'available') ? 'status-available' : 'status-unavailable';

                echo '<div class="card">';
                echo '<img src="' . $row['image_path'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-text">Status: <span class="' . $statusClass . '">' . ucfirst($row['status']) . '</span></p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-info" role="alert">No images found for ' . $company_name . '</div>';
        }
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
include ("Footer_original.php")
?> 
