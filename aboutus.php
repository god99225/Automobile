<?php
include("_header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #F0F0F0;
            padding: 0px;
        }
        .bigContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 20px;
        }
        .ultimateImg {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .mainImg {
            max-width: 50%;
            height: auto;
            border-radius: 10px;
        }
        .allText {
            max-width: 45%;
            padding: 20px;
        }
        .headingText {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .subHeadingText {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .description {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .explore {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        @media (max-width: 768px) {
            .ultimateImg {
                flex-direction: column;
                align-items: center;
            }
            .mainImg {
                max-width: 100%;
                margin-bottom: 20px;
            }
            .allText {
                max-width: 100%;
                text-align: center;
            }
        }
        .team-section {
            margin-top: 40px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .team-member {
            width: calc(25% - 20px);
            max-width: calc(25% - 20px);
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }
        .team-member img {
            width: 100%;
            height: 100%; /* Ensure the image covers the entire card */
            object-fit: cover; /* Maintain aspect ratio and cover entire space */
        }
        .team-member .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .team-member:hover .overlay {
            opacity: 1;
        }
        .team-member .overlay h3 {
            font-size: 18px;
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }
        @media screen and (max-width: 768px) {
            .team-member {
                width: calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }
    </style>
</head>
<body>
    <div class="bigContainer">
        <div class="Container bottomContainer">
            <div class="ultimateImg">
                <img class="mainImg" src="1111.jpg" alt="About Us Image">
                <div class="allText bottomText">
                    <p class="text-blk headingText">
                        About Us
                    </p>
                    <p class="text-blk subHeadingText">
                        Revitalize Your Ride: Premier Car Services Tailored to Your Needs!
                    </p>
                    <p class="text-blk description">
                        Welcome to our premier car services website, where we specialize in
                        revitalizing your ride to perfection. With a dedication to excellence
                        and a commitment to exceeding your expectations, we offer a comprehensive
                        range of services tailored to meet your specific needs. Whether you're
                        seeking routine maintenance, repairs, or customization, our team of skilled
                        professionals is here to deliver unparalleled quality and reliability. Experience
                        the ultimate in automotive care as we go above and beyond to ensure your vehicle
                        not only looks its best but performs flawlessly on the road. Trust us to elevate
                        your driving experience and make every journey unforgettable
                    </p>
                    <a class="explore" href="aboutus.php">
                        View Services
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 style="text-align: center;">Our Team</h1>
        <div class="team-section">
            <div class="team-member">
                <img src="./team/ashwarya.jpg" alt="Ashwarya">
                <div class="overlay">
                    <h3>Aishwarya</h3>
                </div>
            </div>
            <div class="team-member">
                <img src="./team/dipali.jpg" alt="Dipali">
                <div class="overlay">
                    <h3>Dipali</h3>
                </div>
            </div>
            <div class="team-member">
                <img src="./team/vaishnavi.jpg" alt="Vaishnavi">
                <div class="overlay">
                    <h3>Vaishnavi</h3>
                </div>
            </div>
            <div class="team-member">
                <img src="./team/prem.jpg" alt="Prem">
                <div class="overlay">
                    <h3>Prem</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("Footer_original.php") ?>
