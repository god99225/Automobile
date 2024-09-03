<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<?php
include('include/header.php');
include('include/topbar.php');
include('include/sidebar.php');
include 'dbcon.php'; // Include database connection

// Function to fetch counts from the database
function getCount($conn, $table, $column) {
    $query = "SELECT COUNT(*) as count FROM $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

// Fetch counts
$totalServices = getCount($conn, 'services', 'id');
$totalBookings = getCount($conn, 'bookings', 'id');
$totalRegistrations = getCount($conn, 'signup', 'id');
$totalAccessories = getCount($conn, 'suzuki', 'id');
$totalContactUs = getCount($conn, 'contactus_form', 'id'); // Add this line to fetch Contact Us submissions count
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
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- First row -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalServices; ?></h3>
                            <p>Available Services</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $totalBookings; ?></h3>
                            <p>Total Slot Booking</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $totalRegistrations; ?></h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            
            <!-- Second row -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $totalAccessories; ?></h3>
                            <p>Total Accessories</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $totalContactUs; ?></h3>
                            <p>Contact Us Submissions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    
    

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Slot Bookings Histogram</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom styling for the chart container */
        .chart-container {
            width: 60%; /* Adjust the width as needed */
            margin: auto; /* Center the container horizontally */
            margin-top: 20px; /* Add top margin */
            margin-bottom: 20px; /* Add bottom margin */
            padding: 10px; /* Add padding for inner content */
            background-color: #f9f9f9; /* Background color */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }
        /* Custom styling for the chart canvas */
        #dailyBookingHistogram {
            background: linear-gradient(to bottom, #ffffff, #f0f0f0); /* Gradient background */
            border-radius: 8px; /* Rounded corners */
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <canvas id="dailyBookingHistogram"></canvas>
    </div>

    <?php
    // Include database connection file
    include 'dbcon.php';

    // Fetch daily slot booking data from the database
    $dailyBookingData = array();
    $sql = "SELECT DATE(date) AS day, COUNT(*) AS bookings FROM bookings GROUP BY DATE(date)";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dailyBookingData[$row['day']] = $row['bookings'];
        }
    }

    // Close database connection
    $conn->close();
    ?>

    <script>
        let dailyData = <?php echo json_encode($dailyBookingData); ?>;
        let labels = Object.keys(dailyData);
        let data = Object.values(dailyData);

        let ctx = document.getElementById('dailyBookingHistogram').getContext('2d');
        let dailyBookingHistogram = new Chart(ctx, {
            type: 'bar', // Use 'bar' type for histogram
            data: {
                labels: labels,
                datasets: [{
                    label: 'Daily Slot Bookings',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Light blue color with transparency
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                barPercentage: 0.6, // Adjust the width of the bars (60% of available space)
                categoryPercentage: 0.4 // Adjust the space between the bars (40% of available space)
            }
        });
    </script>
</body>
</html>

<?php
include('include/footer.php');
?>