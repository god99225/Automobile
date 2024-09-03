<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive footer</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  width: 100%;
}
footer {
  background: #333;
  width: 100%;
  bottom: 0;
  left: 0;
}
footer::before {

  position: absolute;
  left: 0;
  top: 100px;
  height: 1px;
  width: 100%;
  background: #afafb6;
}
footer .content {
  max-width: 1250px;
  margin: auto;
  padding: 30px 40px 40px 40px;
}
footer .content .top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 50px;
}
.content .top .logo-details {
  color: #fff;
  font-size: 30px;
}
.content .top .media-icons {
  display: flex;
}
.content .top .media-icons a {
  height: 40px;
  width: 40px;
  margin: 0 8px;
  border-radius: 50%;
  text-align: center;
  line-height: 40px;
  color: #fff;
  font-size: 17px;
  text-decoration: none;
  transition: all 0.4s ease;
}
.top .media-icons a:nth-child(1) {
  background: #4267b2;
}
.top .media-icons a:nth-child(1):hover {
  color: #4267b2;
  background: #fff;
}
.top .media-icons a:nth-child(2) {
  background: #1da1f2;
}
.top .media-icons a:nth-child(2):hover {
  color: #1da1f2;
  background: #fff;
}
.top .media-icons a:nth-child(3) {
  background: #e1306c;
}
.top .media-icons a:nth-child(3):hover {
  color: #e1306c;
  background: #fff;
}
.top .media-icons a:nth-child(4) {
  background: #0077b5;
}
.top .media-icons a:nth-child(4):hover {
  color: #0077b5;
  background: #fff;
}
.top .media-icons a:nth-child(5) {
  background: #ff0000;
}
.top .media-icons a:nth-child(5):hover {
  color: #ff0000;
  background: #fff;
}
footer .content .link-boxes {
  width: 100%;
  display: flex;
  justify-content: space-between;
}
footer .content .link-boxes .box {
  width: calc(100% / 5 - 10px);
}
.content .link-boxes .box .link_name {
  color: #fff;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 10px;
  position: relative;
}
.link-boxes .box .link_name::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -2px;
  height: 2px;
  width: 35px;
  background: #fff;
}
.content .link-boxes .box li {
  margin: 6px 0;
  list-style: none;
}
.content .link-boxes .box li a {
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  text-decoration: none;
  opacity: 0.8;
  transition: all 0.4s ease;
}
.content .link-boxes .box li a:hover {
  opacity: 1;
  text-decoration: underline;
}
.content .link-boxes .input-box {
  margin-right: 55px;
}
.link-boxes .input-box input {
  height: 40px;
  width: calc(100% + 55px);
  outline: none;
  border: 2px solid #afafb6;
  background: #eaeaea;
  border-radius: 4px;
  padding: 0 15px;
  font-size: 15px;
  color: #000000;
  margin-top: 5px;
}
.link-boxes .input-box input::placeholder {
  color: #afafb6;
  font-size: 16px;
}
.link-boxes .input-box input[type="button"] {
  background: #fff;
  color: #3824d2;
  border: none;
  font-size: 18px;
  font-weight: 500;
  margin: 4px 0;
  opacity: 0.8;
  cursor: pointer;
  transition: all 0.4s ease;
}
.input-box input[type="button"]:hover {
  opacity: 1;
}
footer .bottom-details {
  width: 100%;
  background: #2e2748;
}
footer .bottom-details .bottom_text {
  max-width: 1250px;
  margin: auto;
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
}
.bottom-details .bottom_text span,
.bottom-details .bottom_text a {
  font-size: 14px;
  font-weight: 300;
  color: #fff;
  opacity: 0.8;
  text-decoration: none;
}
.bottom-details .bottom_text a:hover {
  opacity: 1;
  text-decoration: underline;
}
.bottom-details .bottom_text a {
  margin-right: 10px;
}
@media (max-width: 900px) {
  footer .content .link-boxes {
    flex-wrap: wrap;
  }
  footer .content .link-boxes .input-box {
    width: 40%;
    margin-top: 10px;
  }
}
@media (max-width: 700px) {
  footer {
    position: relative;
  }
  .content .top .logo-details {
    font-size: 26px;
  }
  .content .top .media-icons a {
    height: 35px;
    width: 35px;
    font-size: 14px;
    line-height: 35px;
  }
  footer .content .link-boxes .box {
    width: calc(100% / 3 - 10px);
  }
  footer .content .link-boxes .input-box {
    width: 60%;
  }
  .bottom-details .bottom_text span,
  .bottom-details .bottom_text a {
    font-size: 12px;
  }
}
@media (max-width: 520px) {
  footer::before {
    top: 145px;
  }
  footer .content .top {
    flex-direction: column;
  }
  .content .top .media-icons {
    margin-top: 16px;
  }
  footer .content .link-boxes .box {
    width: calc(100% / 2 - 10px);
  }
  footer .content .link-boxes .input-box {
    width: 100%;
  }
}

</style>
<body>
 
<!-- partial:index.partial.html -->
<footer>
<?php
// Include database connection
include 'connection.php';
// Check if the 'Email' key exists in the $_POST array
if(isset($_POST['Email'])) {
    // Get the submitted email address from the form
    $email = $_POST['Email'];
    // Validate the email address (optional - you can add validation here)
    // Check if the email is not empty and ends with '@gmail.com'
    if (!empty($email) && substr($email, -10) === '@gmail.com') {
        // Insert the email address into the database
        $sql = "INSERT INTO newsletter (Email) VALUES ('$email')";
        if ($conn->query($sql) === TRUE) {
            // Successful insertion
            echo '<script>
            alert("Thank You For Subscribing!!");
            window.location.href = "index.php";
            </script>';
            exit();
        } else {
            // Error inserting into the database
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Invalid email address
        echo '<script>
            alert("Please enter a Gmail address!!");
            window.location.href = "index.php";
            </script>';
        exit();
    }
}
// Close the database connection
$conn->close();
?>
<form method="post" action=" ">
  <div class="content">
    <div class="top">
      <div class="logo-details">
        <img src="fire-png-703.png" alt="logo" style="width: 50px; height: 50px;">
        <span class="logo_name" style="font-family: 'Audiowide', sans-serif;">CARZZ</span>
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="link-boxes">
      <ul class="box">
        <li class="link_name">Company</li>
        <li><a href="index.php">Home</a></li>
        <li><a href="Contact.php">Contact us</a></li>
        <li><a href="Gallary11.php">Gallary</a></li>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
      <ul class="box">
        <li class="link_name">Accesseries</li>
        <li><a href="suzuki.php">SUZUKI</a></li>
        <li><a href="kia.php">KIA</a></li>
        <li><a href="mahindra.php">MAHINDRA</a></li>
        <li><a href="toyota.php">TOYOTA</a></li>
      </ul>
      <ul class="box">
        <li class="link_name">Services</li>
        <li><a href="service.php">Diagonstic</a></li>
        <li><a href="service.php">Engine Testing</a></li>
        <li><a href="service.php">Servicing</a></li>
        <li><a href="service.php">Cleaning and Washing</a></li>
      </ul>
      <ul class="box">
        <li class="link_name">Updates</li>
        <li><a href="Blog.php">Blogs</a></li>
        <li><a href="Gallary11.php">Photo</a></li>
      </ul>
        <ul class="box input-box">
          <li class="link_name">Subscribe</li>
          <li><input type="text" name="Email" placeholder="Enter your Email" required="required"></li>
          <li><input type="submit" value="Subscribe"></li>
        </ul>
    </div>
  </div>
  <div class="bottom-details">
    <div class="bottom_text">
      <span class="copyright_text">Copyright © 2024 <a href="#">Carzz.Pvt.Ltd </a>All rights reserved</span>
      <span class="policy_terms">
        <a href="#">Privacy policy</a>
        <a href="#">Terms & condition</a>
      </span>
    </div>
  </div>
</form>
</footer>

</body>
</html>




