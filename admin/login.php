<?php
session_start();
include 'dbcon.php'; // Include database connection
// Check if the user is already logged in, redirect to index if true
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both Adminname and password are provided
    if (isset($_POST["Adminname"]) && isset($_POST["password"])) {
        // Retrieve the Adminname and password from the form
        $Adminname = $_POST["Adminname"];
        $password = $_POST["password"];
        // Perform some basic validation (you may want to enhance this)
        if (!empty($Adminname) && !empty($password)) {
            // SQL to check if the Adminname and password match in your database
            $sql = "SELECT * FROM admin WHERE username = '$Adminname' AND password = '$password'";
            $result = $conn->query($sql);
            // Check if the query returned any rows
            if ($result) {
                if ($result->num_rows > 0) {
                    // Admin is authenticated, redirect to index.php
                    $_SESSION["loggedin"] = true;
                    header("Location: index.php");
                    exit();
                } else {
                    // Adminname or password is incorrect
                    $login_err = "Invalid Adminname or password!";
                }
            } else {
                // Handle query execution error
                $login_err = "Error: " . $conn->error;
            }
        } else {
            // Adminname or password is empty
            $login_err = "Adminname and password are required!";
        }
    } else {
        // Adminname or password fields are not set
        $login_err = "Adminname and password fields are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Audiowide');
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("https://wallpapercave.com/wp/wp2872587.jpg");
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 50px;
        }
        .wrapper {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            display: flex;
            overflow: hidden;
        }
        .form-container {
            width: 150px;
            margin-right: 18px;
            margin-left: 18px;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45A049;
        }
        .side-image {
            width: 200px;
            height: 200px;
            padding: 20px;
            text-align: center;
        }
        .side-image img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            border-radius: 8px;
        }
        .image-content {
            color: #fff;
            text-align: center;
        }

        /* Media Query for Mobile Devices */
        @media only screen and (max-width: 600px) {
            .side-image {
                width: 100px; /* Reduce side image width for mobile view */
                height: 100px; /* Reduce side image height for mobile view */
                padding-right: 20px;
                padding-top: 60px; /* Adjusted padding for mobile view */
            }
         
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2 style="font-size: 20px;">ADMIN LOGIN</h2>
                    <?php if (isset($login_err)) echo "<p>$login_err</p>"; ?>
                    <div class="form-group">
                        <label for="Adminname">Name</label>
                        <input type="text" id="Adminname" name="Adminname" placeholder="Adminname..">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" id="pwd" name="password" placeholder="Password..">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="side-image">
                <img src="assests/dist/img/user2-160x160.png" alt="Side Image">
                <h1 style="font-family: 'Audiowide', sans-serif; font-size: 30px; color: #888888;">CARZZ</h1>
                <div class="image-content">
                    <!-- Your additional content here -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
