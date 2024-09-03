<?php
include ("_header.php")
?>

<!DOCTYPE html>
<html lang="en" style="margin: 0; padding: 0; box-sizing: border-box; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accessories</title>
  <style>
    body {
      min-height: 1000vh;
      background: #fff;
    }
    .access{
      display: flex;
      align-items: center;
      justify-content: center;

    }
   

    .container {
      position: relative;
      display: grid;
      align-items: center;
      margin-left: 80px;
      margin-right: 80px;
      border-radius: 50%;
      width: 160px;
      height: 170px;
      margin-bottom: 100px;
      margin-top:70px;
      gap:100px;
    }

    .logo {
      width: 200px;
      height: 200px;
      cursor: pointer;
      object-fit: cover;
      filter: drop-shadow(0 0 5px #cd8585);
      transition: all 0.5s ease-in-out;
    }

    .container:hover .logo {
      scale: 0;
    }

    .container:hover {
      width: 400px;
      height: 200px;
      border-radius: 15px;
      background: #111;
      border: 1px solid red;
    }

    .text-section {
      position: absolute;
      top: 10px;
      left: 20px;
      width: 220px;
      opacity: 0;
      color: #fff;
      transition: all 0.5s ease-in-out;
    }

    .container:hover .text-section {
      opacity: 1;
    }

    .bottle {
      position: absolute;
      top: -20px;
      right: 30px;
      width: 80px;
      height: auto;
      object-fit: cover;
      opacity: 0;
      rotate: 15deg;
      transition: all 0.5s ease-in-out;
    }

    .container:hover .bottle {
      opacity: 1;
    }

    h2 {
      margin-bottom: 5px;
    }

    p {
      font-size: 12px;
      margin-bottom: 10px;
    }

    button {
      padding: 8px 16px;
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    button:hover {
      background-color: #2980b9;
    }
  </style>
</head>

<body>
  <div class="access">
  <div class="box1">
  <!-- First Line of Containers -->
  <div class="container">
    <img src="./uploads/Suzuki_logo.png" class="logo" />
    <div class="text-section">
      <h2>Suzuki</h2>
      <p>
        Suzuki is a Japanese multinational corporation known for manufacturing automobiles, motorcycles, and outboard motors. 
      </p>
      <a href="suzuki.php" class="accessories-link">
        <button class="accessories-button">View Accessories</button>
      </a>
    </div>
    <img src="./uploads/suzuki.png" alt="" class="bottle" />
  </div>

  <div class="container">
    <img src="./uploads/Tata_logo.avif" class="logo" />
    <div class="text-section">
      <h2>Tata</h2>
      <p>
        Tata Group is an Indian multinational conglomerate with diverse interests, spanning from steel and automobiles to information technology. 
      </p>
      <a href="tata.php" class="accessories-link">
        <button class="accessories-button">View Accessories</button>
      </a>
    </div>
    <img src="./uploads/Tata.png" alt="" class="bottle" />
  </div>
  </div>
  
  <div class="box2">
  <div class="container">
    <img src="./uploads/Kia_logo.jpg" class="logo" />
    <div class="text-section">
      <h2>Kia</h2>
      <p>
        Kia is a South Korean automotive manufacturer known for producing a wide range of vehicles, from compact cars to SUVs. 
      </p>
      <a href="kia.php" class="accessories-link">
        <button class="accessories-button">View Accessories</button>
      </a>
    </div>
    <img src="./uploads/Kia.jpg" alt="" class="bottle" />
  </div>
  

  <!-- Second Line of Containers -->
  
  <div class="container">
    <img src="./uploads/Totota_logo.jpg" class="logo" />
    <div class="text-section">
      <h2>Toyota</h2>
      <p>
        Toyota is a Japanese multinational automotive manufacturer renowned for its reliable and fuel-efficient vehicles. 
      </p>
      <a href="toyota.php" class="accessories-link">
        <button class="accessories-button">View Accessories</button>
      </a>
    </div>
    <img src="./uploads/Toyota.png" alt="" class="bottle" />
  </div>
  </div>
  <div class="box3">
  <div class="container">
    <img src="./uploads/Mahindra_logo.jpg" class="logo" />
    <div class="text-section">
      <h2>Mahindra</h2>
      <p>
        Mahindra is an Indian multinational conglomerate, prominent in diverse sectors such as automotive, agriculture, and technology. 
      </p>
      <a href="mahindra.php" class="accessories-link">
        <button class="accessories-button">View Accessories</button>
      </a>
    </div>
    <img src="./uploads/Mahindra.jpg" alt="" class="bottle" />
  </div>

  <div class="container">
    <img src="./uploads/honda_logo.jpg" class="logo" />
    <div class="text-section">
      <h2>Honda</h2>
      <p>
        Honda is a Japanese multinational corporation acclaimed for manufacturing motorcycles, automobiles, and power equipment. 
      </p>
      <a href="honda.php" class="accessories-link">
        <button class="accessories-button">View Accessories</button>
      </a>
    </div>
    <img src="./uploads/Honda.jpg" alt="" class="bottle" />
  </div>
  </div>
  </div>
</body>

</html>

<?php
include ("Footer_original.php")
?> 
