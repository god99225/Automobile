<?php
include ("_header.php")
?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Car Blog</title>
<style>
  .container{
    padding-top:70px;
  }
.blog-post {
  position: relative;
  overflow: hidden; 
}

.blog-post img {
  transition: transform 0.5s;
}

.blog-post:hover img {
  transform: scale(1.1);
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: 0.5s ease;
}

.blog-post:hover .overlay {
  height: 100%;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.read-more {
  background-color: #333;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
}
</style>
</head>
<body >

<div class="container">
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="blog-post">
        <img src="./team/one.png" class="img-fluid" alt="Car 1">
        <div class="overlay"></div>
        <div class="text">Honda Accord</div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="mt-3">
        <h2>Honda Accord</h2>
        <p>This is a fantastic car with excellent fuel efficiency and a comfortable ride. The interior is spacious, and the infotainment system is user-friendly. Overall, highly recommended!</p>
        <a href="car-details.php?id=1" class="read-more">Read More</a> <!-- Link to second page with car ID as parameter -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 order-md-2 mb-4">
      <div class="blog-post">
        <img src="./team/two.png" class="img-fluid" alt="Car 2">
        <div class="overlay"></div>
        <div class="text">Ford Mustang</div>
      </div>
    </div>
    <div class="col-md-6 order-md-1 mb-4">
      <div class="mt-3">
        <h2>Ford Mustang</h2>
        <p>The Ford Mustang is an iconic American muscle car known for its powerful performance and sleek design. It offers thrilling acceleration and handles well on the road. However, the back seats are cramped, and fuel economy may not be the best. Nevertheless, it's a fun and exciting car to drive..</p>
        <a href="car-details.php?id=2" class="read-more">Read More</a> <!-- Link to second page with car ID as parameter -->
      </div>
    </div>
  </div>
</div>

</body>
</html>

<?php
include ("Footer_original.php")
?> 


