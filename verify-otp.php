<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $entered_otp = $_POST['otp'];

    // Get the stored OTP from the session
    $stored_otp = $_SESSION['otp'];

    // Check if the entered OTP matches the stored OTP
    if ($entered_otp == $stored_otp) {
        // OTP matched, redirect the user to the reset password form
        header("Location: reset-password.php");
        exit();
    } else {
        // OTP did not match, display error message
        $error_msg = "Invalid OTP. Please enter the correct OTP.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <style>
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
  width: 100vh;
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
  gap: 5px;
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
                    <h2>Verify OTP</h2>
                    <?php 
                    if (isset($error_msg)) {
                        echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                    }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="otp"></label>
                            <input type="text" class="form-control" id="otp" name="otp" required placeholder="Enter OTP">
                        </div>
                        <p class="text-muted mb-4" style="color: white !important; font-size: 15px !important; padding-left:20px; padding-top:5px;">Enter your mobile number as the OTP</p>
                        <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

