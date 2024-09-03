<?php
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
   
    // Check if mobile number is exactly 10 digits long
    if(strlen($mobile) != 10){
        echo '<script>
            alert("Mobile number must be exactly 10 digits long");
            window.location.href = "signup.php";
        </script>';
        exit(); // Stop further execution
    }

    // Check if email already exists
    $sql="select * from signup where email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    // Check if mobile number already exists
    $sql="select * from signup where mobile='$mobile'";
    $result = mysqli_query($conn, $sql);
    $count_mobile = mysqli_num_rows($result);

    if($count_email == 0 && $count_mobile == 0){
        // Hash the password before saving
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO signup(name, email, mobile, password) VALUES('$name', '$email', '$mobile','$hash')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script>
            alert("Registration successful!!");
            window.location.href ="_header.php";
        </script>';
            exit(); // Stop further execution
        }
    }
    else{
        if($count_email > 0){
            echo '<script>
                window.location.href="_header.php";
                alert("Email already exists!!");
            </script>';
            exit(); // Stop further execution
        }
        if($count_mobile > 0){
            echo '<script>
                window.location.href="_header.php";
                alert("Mobile number already exists!!");
            </script>';
            exit(); // Stop further execution
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  background: #333;
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

.container .form {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 25px;
}

.container .form.signin,
.container.signinForm .form.signup {
  display: none;
}

.container.signinForm .form.signin {
  display: flex;
}

.container .form h2 {
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.1em;
}

.container .form .inputBox {
  position: relative;
  width: 300px;
}

.container .form .inputBox input {
  padding: 12px 10px 12px 48px;
  border: none;
  width: 100%;
  background: #333;
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

.container .form .inputBox span {
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

.container .form .inputBox input:valid ~ span,
.container .form .inputBox input:focus ~ span {
  color: #00dfc4;
  border: 1px solid #00dfc4;
  background: #223243;
  transform: translateX(25px) translateY(-7px);
  font-size: 0.6em;
  padding: 0 8px;
  border-radius: 10px;
  letter-spacing: 0.1em;
}

.container .form .inputBox input:valid,
.container .form .inputBox input:focus {
  border: 1px solid #00dfc4;
}

.container .form .inputBox i {
  position: absolute;
  top: 15px;
  left: 16px;
  width: 25px;
  padding: 2px 0;
  padding-right: 8px;
  color: #00dfc4;
  border-right: 1px solid #00dfc4;
}

.container .form .inputBox input[type="submit"] {
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

.container .form p {
  color: rgba(255, 255, 255, 0.5);
  font-size: 0.75em;
  font-weight: 300;
}

.container .form p a {
  font-weight: 500;
  color: #fff;
}
    </style>
</head>
<body>
<form  action="" method="POST">
	<div class="container">
		<div class="form signup">
        <!-- <img src="./images/fire-png-703.png" alt="logo-image" width="50" height="30" > -->
        <div class="logo-container">
    <img src="fire-png-703.png" alt="logo" width="40px" height="40px">
    <span style="font-family: 'Audiowide', sans-serif; font-size: 25px; text-align: center; color: #ffff;">CARZZ</span>
</div>
			<h2>Sign Up</h2>
			<div class="inputBox">
				<i class="fas fa-user fa"></i>
				<input type="text" id="name" name="name"  required="required">
				<span>Name</span>
			</div>
			<div class="inputBox">
				<i class="fa-regular fa-envelope"></i>
				<input type="text"  id="email" name="email" required="required">
				<span>Email address</span>
			</div>
			<div class="inputBox">
				<i class="fas fa-phone fa"></i>
				<input type="text" id="mobile" name="mobile" required="required">
				<span>Mobile Number</span>
			</div>
			<div class="inputBox">
				<i class="fa-solid fa-lock"></i>
				<input type="password" id="password" name="pass" required="required">
				<span>Password</span>
			</div>
			<div class="inputBox">
				<input type="submit" value="Create Account">
			</div>
			<p>Already a member ? <a href="index.php" >Log in</a></p>

		</div>
		</form>
		
		
</body>
</html>
