<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Car Details </title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
.car-details {
  padding: 50px;
}

.car-details img {
  max-width: 100%;
  opacity: 0;
  animation: fadeIn 1s forwards;
  transition: transform 0.3s ease-in-out; /* Added transition for hover effect */
}

.car-details img:hover {
  transform: scale(1.1); /* Added hover effect to scale the image */
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.car-details h2 {
  margin-top: 20px;
  opacity: 0;
  animation: slideInLeft 1s forwards;
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.car-details p {
  font-size: 18px;
  opacity: 0;
  animation: slideInRight 1s forwards;
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.footer {
  background-color: #343a40;
  color: #fff;
  text-align: center;
  padding: 20px 0;
}
</style>
</head>
<body>

<header class="bg-dark text-white py-4">
  <div class="container text-center">
    <h2>  Car Details </h2>
    <h2 class="car-title">Car Title</h2> <!-- Title placed here -->
  </div>
</header>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 d-flex align-items-center justify-content-center"> <!-- Centering the image -->
      <img src="./team/one.png" class="img-fluid car-image" alt="Car Image">
    </div>
    <div class="col-md-6 car-details">
      <p class="car-description">Honda Accord Car Description</p> <!-- Description updated here -->
    </div>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <p>@@@@@@@@@@</p>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Retrieve car details from URL parameter
$(document).ready(function() {
  const params = new URLSearchParams(window.location.search);
  const carId = params.get('id');
  
  // Example data (replace with your actual data)
  const carData = {
    1: {
      title: ' ',
      image: './team/one.png',
      description: 'The Honda Accord is a great car because it is reliable, comfortable, and packed with cool features. You can count on it to get you where you need to go without any trouble. Inside, there is plenty of space for everyone, and it is got all the latest safety gadgets to keep you safe on the road. Whether you are driving in the city or on the highway, the Accord feels smooth and easy to handle. Plus, its got all the tech stuff you want, like a touchscreen and smartphone connectivity. And if you want to treat yourself, you can get fancy upgrades like leather seats and a fancy sound system. Overall, the Honda Accord is a solid choice for anyone looking for a reliable, comfortable, and feature-packed car.'
    },
    2: {
      title: '  ',
      image: './team/two.png',
      description: 'The Ford Mustang stands as an enduring icon of American automotive prowess, blending formidable performance with timeless design. Renowned for its muscular presence on the road, the Mustang boasts a range of potent engines, including turbocharged four-cylinders and potent V8s, ensuring exhilarating acceleration and thrilling drives. Its sleek exterior, characterized by a long hood and short rear decklid, pays homage to its legendary heritage while commanding attention with its aggressive stance. Inside, modern technology features prominently, with touchscreen infotainment systems, smartphone integration, and advanced driver-assist technologies enhancing both convenience and safety.'
    }
  };

  // Display car details based on car ID
  $('.car-title').text(carData[carId].title);
  $('.car-image').attr('src', carData[carId].image);
  $('.car-description').text(carData[carId].description);
});
</script>

</body>
</html>
