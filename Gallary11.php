<?php
include ("_header.php")
?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallary</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap");

.blog-container {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
}

* {
	margin: 0;
	padding: 0;
}

article {
	height: 40vh;
	background: #fff;
	font-family: "Oswald", sans-serif;
}

article:nth-child(5) {
	grid-column: span 2;
}

article:nth-child(7) {
	grid-row: span 2;
	height: 100%;
}

article:nth-child(11) {
	grid-column: span 2;
}

article:nth-child(14) {
	grid-row: span 2;
	height: 100%;
}

figure img {
	height: 100%;
	width: 100%;
	object-fit: cover;
	position: relative;
}

figure {
	position: relative;
	height: 100%;
}

figcaption span:last-child {
	font-size: 14px;
	text-transform: none;
	font-weight: 300;
}

figcaption {
	position: absolute;
	bottom: 0;
	background: linear-gradient(transparent, rgb(0 0 0 / 40%));
	width: 100%;
	padding: 20px;
	left: 0;
	height: 90px;
	box-sizing: border-box;
	text-align: center;
	font-size: 24px;
	text-transform: uppercase;
	color: #fff;
	text-shadow: 0px 1px 1px rgb(0 0 0 / 50%);
	transition: height 0.2s;
	display: flex;
	flex-direction: column;
}

figure:hover {
	cursor: pointer;
}

figure:hover img {
	filter: brightness(0.8);
	transition: filter 0.5s;
}

figure:hover figcaption {
	height: 110px;
	transition: height 0.2s;
}

.date-and-time {
	display: grid;
	position: absolute;
	z-index: 9;
	background: #f5f5f5;
	padding: 10px 16px;
	box-sizing: border-box;
	color: #222;
	text-align: center;
}

.date-and-time span:nth-child(2) {
	font-size: 24px;
	font-weight: 600;
}

.date-and-time span:nth-child(3) {
	color: #ff5722;
}

.date-and-time span {
	font-size: 14px;
	font-weight: 300;
}

figure:hover .date-and-time {
	background: #ff5722;
}

figure:hover .date-and-time span {
	color: #fff;
}

blockquote {
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 24px;
	padding: 20px;
	box-sizing: border-box;
}

article:hover blockquote {
	background: #ff5722;
	cursor: pointer;
	color: #fff;
}

.popup {
	display: none;
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 80%;
	max-width: 500px;
	padding: 20px;
	background-color: #fff;
	box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
	z-index: 1000;
	transition: top 0.3s, left 0.3s;
}

.overlay {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.7);
	z-index: 999;
}

.popup img {
	max-width: 100%;
	height: 362px;
	margin-bottom: 20px;
	margin-left: auto;
	margin-right: auto;
	display: flex;
	object-fit: cover;
}

.popup p {
	font-family: "Roboto", sans-serif;
	font-weight: 300;
	font-size: 14px;
	line-height: 22px;
	margin-top: 14px;
}

.popup > div {
	font-size: 24px;
	font-family: "Oswald";
	display: inline-block;
}

div#popup span#close-btn {
	position: absolute;
	right: -5px;
	top: -38px;
	color: #fff;
	font-size: 30px;
	cursor: pointer;
}

.dt-popup {
	font-size: 14px;
	color: #777;
}

.flex {
	display: flex;
	gap: 16px;
}

.flex div {
	font-size: 14px;
	color: #777;
}

.flex div:last-child {
	font-weight: 300;
}

@media screen and (max-width: 1023px) {
	.blog-container {
		grid-template-columns: repeat(1, 1fr);
	}
	article:nth-child(5),
	article:nth-child(7),
	article:nth-child(11),
	article:nth-child(14) {
		grid-column: auto;
		height: 400px;
	}
}

    
  </style>
</head>
<body>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<div class="blog-container">
<?php
    include 'connection.php'; // Include database connection
    // Query to fetch images from the database
    $sql = "SELECT * FROM gallery";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Loop through each row of the result set
        while ($row = $result->fetch_assoc()) {
            // Output HTML for each image
            echo '<article>';
            echo '<figure>';
            echo '<div class="date-and-time">';
            // Adjust the date display according to your database structure
            echo '<span>' . date('M', strtotime($row["date"])) . '</span>';
            echo '<span>' . date('d', strtotime($row["date"])) . '</span>';
            echo '<span>' . date('Y', strtotime($row["date"])) . '</span>';
            echo '</div>';
            echo '<img src="' . $row["images"] . '" alt="' . $row["name_of_image"] . '" loading="lazy" />';
            echo '<figcaption>';
            echo '<span>' . $row["name_of_image"] . '</span>';
            // If you have additional information to display, modify the line below accordingly
            echo '<span>By Admin</span>';
            echo '</figcaption>';
            echo '</figure>';
            echo '</article>';
        }
    } else {
        // If no images found in the database
        echo '<div class="alert alert-warning" role="alert">No images found.</div>';
    }
    ?>
</div>
     

<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
	<span id="close-btn" class="material-symbols-outlined">
		close
	</span>
	<div id="popup-content">
	</div>
</div>
<script src="Gallary1.js"></script>
</body>
</html>



<?php
include ("Footer_original.php")
?> 