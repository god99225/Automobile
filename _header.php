<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Audiowide');

        .navbar-brand img {
            margin-right: 5px; /* Adjust spacing between logo and text */
        }

        .navbar-brand span {
            font-family: 'Audiowide', sans-serif;
        }

        .nav-link {
            font-family: 'Audiowide', sans-serif;
        }
    
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="fire-png-703.png" alt="logo-image" width="40" height="40" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto" style="font-size:15px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accessories.php">ACCESSORIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="service.php">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Blog.php">BLOGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="calender.php">BOOKING</a>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-end">
                        <?php
                        // Check if the user is logged in
                        if(isset($_SESSION['email_mobile'])){
                            // If logged in, display logout button
                            echo '<a href="logout.php" class="btn btn-outline-light mr-2">Logout</a>';
                        } else {
                            // If not logged in, display login button
                            echo '<button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#loginModal">Login</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="block1">
                        <img class="logo" src="fire-png-703.png" alt="Logo" style="display: block; margin: auto; text-align: center; width: 100px; height: 100px;">
                        <h1 style="font-family: 'Audiowide', sans-serif; font-size: 50px; text-align: center; color: #888888;">CARZZ</h1>
                        <form  action="" method="POST">
                            <input type="text" id="username"  name="email_mobile" class="form-control mb-3" placeholder="Email">
                            <input type="password" id="password" name="password" class="form-control mb-3" placeholder=" Password">
                            <button type="submit" id="login-button" name="login" class="btn btn-primary btn-block" style="background: #333;">LOGIN</button>
                            <div class="actions mt-3" style="display: block; margin: auto; text-align: center;">
                                <!-- <button id="create-account" class="btn btn-secondary me-2">Create Account</button> -->
                            </div>
                            <p style="color: black; font-size:15px;">New User? <a href="signup.php" class="create" style="color: black; font-size:15px;">Create an account</a></p>
                        </form>
                    </div> 
                    <!-- <button id="forgot-password" class="btn btn-secondary">Forgot Password</button> -->
                    <a href="forgot-password.php" class="btn btn-secondary" style="background: #333;">Forgot Password</a>'
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
