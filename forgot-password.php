<?php 
session_start();
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $query = "SELECT * FROM signup WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Fetch the user's details including the mobile number
        $user = mysqli_fetch_assoc($result);
        
        // Retrieve the mobile number
        $mobile = $user['mobile'];

        // Store the mobile number in the session
        $_SESSION['otp'] = $mobile;
        $_SESSION['email'] = $email;

        // Redirect to OTP verification page
        header("Location: verify-otp.php");
        exit();
    } else {
        $error_msg = "Email address not found. Please enter a valid email address.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #223243;
}

.container {
  padding: 40px;
  border-radius: 20px;
  border: 8px solid #223243;
  box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.35),
    inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    inset 5px 5px 15px rgba(0, 0, 0, 0.35);
}

.container .login_form {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 25px;
}

.container .login_form h2 {
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.1em;
}

.container .login_form .form-group {
  position: relative;
  width: 300px;
}

.container .login_form .form-group input {
  padding: 12px 10px 12px 48px;
  border: none;
  width: 100%;
  background: #223243;
  border: 1px solid rgba(0, 0, 0, 0.1);
  color: #fff;
  font-weight: 300;
  border-radius: 25px;
  font-size: 1em;
  box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.35);
  transition: 0.5s;
  outline: none;
}

.container .login_form .form-group label {
  position: absolute;
  left: 0;
  padding: 12px 10px 12px 48px;
  pointer-events: none;
  font-size: 1em;
  font-weight: 300;
  transition: 0.5s;
  letter-spacing: 0.05em;
  color: rgba(255, 255, 255, 0.5);
}

.container .login_form .form-group input:valid ~ label,
.container .login_form .form-group input:focus ~ label {
  color: #00dfc4;
  border: 1px solid #00dfc4;
  background: #223243;
  transform: translateX(25px) translateY(-7px);
  font-size: 0.6em;
  padding: 0 8px;
  border-radius: 10px;
  letter-spacing: 0.1em;
}

.container .login_form .form-group input:valid,
.container .login_form .form-group input:focus {
  border: 1px solid #00dfc4;
}

.container .login_form .form-group .icon {
  position: absolute;
  top: 15px;
  left: 16px;
  width: 25px;
  padding: 2px 0;
  padding-right: 8px;
  color: #00dfc4;
  border-right: 1px solid #00dfc4;
}

.container .login_form .form-group input[type="submit"] {
  background: #00dfc4;
  color: #223243;
  padding: 10px 0;
  font-weight: 500;
  cursor: pointer;
  box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.35),
    inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    inset 5px 5px 15px rgba(0, 0, 0, 0.35);
}

.container .login_form p {
  color: rgba(255, 255, 255, 0.5);
  font-size: 0.75em;
  font-weight: 300;
}

.container .login_form p a {
  font-weight: 500;
  color: #fff;
}
.btn.btn-primary.btn-block {
  background: #00dfc4;
  color: #223243;
  padding: 15px 60px;
  font-weight: 500;
  align-items: center;
  cursor: pointer;
  border: none; /* Added to match input styles */
  border-radius: 25px; /* Added to match input styles */
  font-size: 1em; /* Added to match input styles */
  box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.35),
    inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    inset 5px 5px 15px rgba(0, 0, 0, 0.35);
  transition: 0.3s; /* Added for smoother transition */
}

.btn.btn-primary.btn-block:hover {
  background: #00b8a9; /* Changed color on hover */
}

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login_form">
                    <h2>Forgot Password</h2>
                    <?php 
                    if (isset($error_msg)) {
                        echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                    }
                    ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="email Address";>
                        </div>
                        <div style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary btn-block" style="margin-left: 60px;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
