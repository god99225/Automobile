<?php
include ("_header.php")
?>


<?php
$insert=false;
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "autoservice"; 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    //SQL Query to be executed
    $sql = "INSERT INTO contactus_form (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    $result=mysqli_query($conn, $sql);
    if($result){
        $insert=true;
    }
    else{
      echo" The Record was not inserted successfully beacuse of this error --->".mysqli_error($conn);
    }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Car Automobile Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body {
            color: white;
            animation: backgroundAnimation 10s infinite;
            background-size: cover;
        }

        .container {
            padding: 20px;
        }

        .contact-us-name {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .contact-for-query {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .contact-info {
            background-color: #f8f9fa; /* Gray background */
            border-radius: 10px;
            padding: 20px;
            color: black; /* Black font color */
        }

        .contact-info h2 {
            margin-bottom: 10px;
        }

        .contact-info p {
            margin: 10px 0;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black; /* Set font color for form inputs */
        }

        .map-container {
            
            border-radius: 10px 10px 10px 10px;
            overflow: hidden;
            padding-bottom: 20px
        }

        .btn-primary {
            background-color: black;
            color: white;
            border-color: black;
        }

        /* Define keyframe animation */
        @keyframes backgroundAnimation {
            0% { background-image: url('./contact1/23.jpg'); }
            50% { background-image: url('./contact1/24.jpg'); }
            100% { background-image: url('./contact1/25.jpg'); }
        }
        
    </style>
</head>
<body> 

<?php 
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Form submitted successfully!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
    
    }
    
    ?>
         
    <!-- Contact Information -->
    <div class="container text-center">
        <h3 class="contact-us-name">Contact Us</h3>
        <h1 class="contact-for-query">Contact for any Query</h1>
        <div class="contact-info">
        <!-- <div class="container text-center"> -->
   
        <!-- <h2>Contact Information</h2> -->
        <div class="row">
            <div class="col">
                <p><i class="fas fa-map-marker-alt"></i> Address: </p>
                <p>Address: Baner, Pune</p>
            </div>
            <div class="col">
            <p><i class="fas fa-phone-square-alt"></i> Call Us: </p>
                <p>+919021450861</p>
            </div>
            <div class="col">
                <p><i class="fas fa-envelope"></i> Email Us:</p>
                <p>Automobileservice@gmail.com</p>
            </div>
            <div class="col">
                <p><i class="fas fa-arrow-right"></i> Follow Us: </p>
                <p><i class="fab fa-facebook"></i> <i class="fab fa-twitter"></i> <i class="fab fa-youtube"></i> <i class="fab fa-instagram"></i></p>
            </div>
        </div>
    </div>
</div>


    <!-- Google Map and Contact Form -->
<div class="container">
    <div class="row">
        <!-- Google Map Column -->
        <div class="col-md-6">
            <div class="map-container">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24123.274682429708!2d73.82783751293947!3d18.533132980775815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2ba8028f77fd3%3A0x8ddc6bdac3ee8b9a!2sBaner%2C%20Pune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1644952981080!5m2!1sen!2sin" width="100%" height="515" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7564.386603893642!2d73.773707!3d18.565322!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf21b1c6d7c9%3A0x6d87707c8f707a4c!2sASDR%20Infotech!5e0!3m2!1sen!2sin!4v1707719884296!5m2!1sen!2sin" width="100%" height="515" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30258.495477440258!2d73.76320121518697!3d18.559970432608374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2becff05dd3cb%3A0xa1911297fb7fab7d!2sBaner%2C%20Pune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1707721341485!5m2!1sen!2sin" width="100%" height="520"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!-- Contact Form Column -->
        <div class="col-md-6">
            <div class="form-container">
                <form id="contactForm" method="post" action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>   
                </div>
            </div>
        </div>
</div>

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include ("Footer_original.php")
?> 