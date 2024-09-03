<?php
// Establish database connection
$mysqli = new mysqli('localhost', 'root', '', 'autoservice');
// Check if connection was successful
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
// Default date value
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
if(isset($_POST['submit'])){
    // Check if time slot is provided
    if(isset($_POST['time_slot'])){
        $time_slot = $_POST['time_slot'];
        // Check if the email is already associated with a booking for the given date
        $stmt_email_check = $mysqli->prepare("SELECT * FROM bookings WHERE date = ? AND email = ?");
        $stmt_email_check->bind_param('ss', $date, $_POST['email']);
        $stmt_email_check->execute();
        $result_email_check = $stmt_email_check->get_result();
        if($result_email_check->num_rows === 0){
            // Prepare the SQL statement to check if the time slot is already booked
            $stmt_check = $mysqli->prepare("SELECT * FROM bookings WHERE date = ? AND timeslot = ?");
            $stmt_check->bind_param('ss', $date, $time_slot);
            $stmt_check->execute();
            $result = $stmt_check->get_result();
            // If the time slot is not already booked, proceed with booking
            if($result->num_rows === 0){
                // Prepare the SQL statement to insert the booking
                $stmt = $mysqli->prepare("INSERT INTO bookings (date, timeslot, name, email, contact_no, special_request, services) VALUES (?, ?, ?, ?, ?, ?, ?)");
                // Check if the prepare() method failed
                if ($stmt === false) {
                    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                } else {
                    // Bind parameters
                    $stmt->bind_param('sssssss', $date, $time_slot, $_POST['name'], $_POST['email'], $_POST['contact_no'], $_POST['special_request'], $_POST['services']);
                    // Execute the query
                    if($stmt->execute()){
                        echo '<script>
            alert("bOOKING successful!!");
            window.location.href ="service.php";
        </script>';
            exit();
                    } else {
                        $msg = "<div class='alert alert-danger'>Booking Failed: " . $stmt->error . "</div>";
                    }
                    // Close the statement
                    $stmt->close();
                }
            } else {
                // Time slot is already booked
                $msg = "<div class='alert alert-danger'>Booking Failed: Time Slot already booked</div>";
            }
            // Close the statement for checking existing bookings
            $stmt_check->close();
        } else {
            // Email is already associated with a booking for the given date
            $msg = "<div class='alert alert-danger'>Booking Failed: Email already booked for the selected date</div>";
        }
        // Close the statement for checking email uniqueness
        $stmt_email_check->close();
    } else {
        $msg = "<div class='alert alert-danger'>Booking Failed: Time Slot not provided</div>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
<style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('book.jpg'); /* Replace 'background-image.png' with your image path */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: #fff; /* Set text color to white */
        }
        /* Add styles for the appointment form container */
        .container {
            padding: 50px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
        }
        /* Add styles for form elements */
        .form-control {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
        }
        /* Add styles for buttons */
        .btn {
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056B3;
        }
    /* ... (unchanged styles above) */
    /* Add style for booked time slots */
    .booked {
        background-color: #FF0000; /* Red color for booked time slots */
        color: #FFFFFF; /* White text color for better visibility */
    }
    </style>
<body>
    <div class="container">
        <h1 class="text-center">Book Appointment for <?php echo date('F j, Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg) ? $msg : ''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No</label>
                        <input type="tel" class="form-control" name="contact_no" required>
                    </div>
                    <!-- ... Existing PHP code ... -->
<div class="form-group">
    <label for="time_slot">Time Slot</label>
    <select class="form-control" name="time_slot" required>
        <?php
        // Loop through time slots and check if each is booked
        $timeSlots = ["9:00 AM", "10:00 AM", "11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", "3:00 PM", "4:00 PM", "5:00 PM"];
        foreach ($timeSlots as $slot) {
            // Prepare the SQL statement to check if the time slot is already booked
            $stmt_check = $mysqli->prepare("SELECT * FROM bookings WHERE date = ? AND timeslot = ?");
            $stmt_check->bind_param('ss', $date, $slot);
            $stmt_check->execute();
            $result = $stmt_check->get_result();
            // Check if the time slot is booked
            $isBooked = $result->num_rows > 0;
            // Set background color based on booking status
            $backgroundColor = $isBooked ? 'background-color: red;' : '';
            // Output option with styling
            echo "<option value='$slot' style='$backgroundColor'>$slot</option>";
            // Close the statement for each iteration
            $stmt_check->close();
        }
        ?>
    </select>
</div>
<!-- ... Remaining HTML and JavaScript code ... -->
                    <div class="form-group">
                        <label for="services">Services</label>
                        <select class="form-control" name="services" required>
                            <option value="Diagnostic Test">Diagnostic Test</option>
                            <option value="Engine Servicing">Engine Servicing</option>
                            <option value="Tire Replacement">Tire Replacement</option>
                            <option value="Oil Changing">Oil Changing</option>
                            <option value="Cleaning and Washing">Cleaning and Washing</option>
                            <!-- Add more services as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="special_request">Special Request</label>
                        <textarea class="form-control" name="special_request"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>