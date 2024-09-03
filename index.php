<?php
include ("_header.php")
?>
<style>
  @import url('https://fonts.googleapis.com/css?family=Audiowide');
  @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&family=Permanent+Marker&family=Tilt+Neon&display=swap");
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  /* Your existing CSS code here */

/* Adjustments for smaller screens */
@media screen and (max-width: 768px) {
  /* Adjustments for the carousel */
  .carousel .list .item .content {
    width: 90%; /* Adjust width to fit smaller screens */
    max-width: 100%;
    padding-right: 10px; /* Adjust padding */
  }

  .carousel .thumbnail {
    bottom: 10px; /* Adjust thumbnail position */
  }

  .arrows {
    top: 60%; /* Adjust arrows position */
    right: 2%; /* Adjust arrows position */
    width: 150px; /* Adjust arrow buttons size */
  }

  .time {
    top: 0; /* Adjust time position */
  }

  /* Adjust card styles */
  .container {
    width:50%;
    flex-direction: column; /* Stack cards vertically */
    gap: 20px; /* Add gap between cards */
  }

  .card-1, .card-2 {
    width: 10%;
    width: calc(100% - 20px); /* Adjust card width */
  }

  /* Additional mobile styling */
  .carousel .list .item .content {
    font-size: 14px; /* Adjust font size for smaller screens */
  }
  .heading {
                font-size: 40px; /* Reduce font size for smaller screens */
            }

            .testimonial-slide {
                padding: 0; /* Remove padding on smaller screens */
            }
}

  body{ 
    background-color: #000;
    color: #eee;
    font-family: Poppins;
    font-size: 12px;
	  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

a{
    text-decoration: none;
}
.carousel{
    height: 100vh;
    overflow: hidden;
    position: relative;
}
.carousel .list .item{
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0 0 0 0;
}
.carousel .list .item img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.carousel .list .item .content{
    position: absolute;
    top: 20%;
    width: 1400px;
    max-width: 80%;
    left: 50%;
    transform: translateX(-50%);
    padding-right: 30%;
    box-sizing: border-box;
    color: #fff;
    text-shadow: 0 5px 10px #0004;
}
.carousel .list .item .author{
    font-weight: bold;
    letter-spacing: 10px;
}
.carousel .list .item .title,
.carousel .list .item .topic{
    font-size: 5em;
    font-weight: bold;
    line-height: 1.3em;
}
.carousel .list .item .topic{
    color: #f1683a;
}
/* thumbail */
.thumbnail{
    position: absolute;
    bottom: 50px;
    left: 50%;
    width: max-content;
    z-index: 100;
    display: flex;
    gap: 20px;
}
.thumbnail .item{
    width: 150px;
    height: 220px;
    flex-shrink: 0;
    position: relative;
}
.thumbnail .item img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
}
.thumbnail .item .content{
    color: #fff;
    position: absolute;
    bottom: 10px;
    left: 10px;
    right: 10px;
}
.thumbnail .item .content .title{
    font-weight: 500;
}
.thumbnail .item .content .description{
    font-weight: 300;
}
/* arrows */
.arrows{
    position: absolute;
    top: 80%;
    right: 52%;
    z-index: 100;
    width: 300px;
    max-width: 30%;
    display: flex;
    gap: 10px;
    align-items: center;
}
.arrows button{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #eee4;
    border: none;
    color: #fff;
    font-family: monospace;
    font-weight: bold;
    transition: .2s;
}
.arrows button:hover{
    background-color: #fff;
    color: #000;
}

/* animation */
.carousel .list .item:nth-child(1){
    z-index: 1;
}

/* animation text in first item */

.carousel .list .item:nth-child(1) .content .author,
.carousel .list .item:nth-child(1) .content .title,
.carousel .list .item:nth-child(1) .content .topic,
.carousel .list .item:nth-child(1) .content .des,
.carousel .list .item:nth-child(1) .content .buttons
{
    transform: translateY(50px);
    filter: blur(20px);
    opacity: 0;
    animation: showContent .5s 1s linear 1 forwards;
}
@keyframes showContent{
    to{
        transform: translateY(0px);
        filter: blur(0px);
        opacity: 1;
    }
}
.carousel .list .item:nth-child(1) .content .title{
    animation-delay: 1.2s!important;
}
.carousel .list .item:nth-child(1) .content .topic{
    animation-delay: 1.4s!important;
}
.carousel .list .item:nth-child(1) .content .des{
    animation-delay: 1.6s!important;
}
.carousel .list .item:nth-child(1) .content .buttons{
    animation-delay: 1.8s!important;
}
/* create animation when next click */
.carousel.next .list .item:nth-child(1) img{
    width: 150px;
    height: 220px;
    position: absolute;
    bottom: 50px;
    left: 50%;
    border-radius: 30px;
    animation: showImage .5s linear 1 forwards;
}
@keyframes showImage{
    to{
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 0;
    }
}

.carousel.next .thumbnail .item:nth-last-child(1){
    overflow: hidden;
    animation: showThumbnail .5s linear 1 forwards;
}
.carousel.prev .list .item img{
    z-index: 100;
}
@keyframes showThumbnail{
    from{
        width: 0;
        opacity: 0;
    }
}
.carousel.next .thumbnail{
    animation: effectNext .5s linear 1 forwards;
}

@keyframes effectNext{
    from{
        transform: translateX(150px);
    }
}

/* running time */
.carousel .time{
    position: absolute;
    z-index: 1000;
    width: 0%;
    height: 3px;
    background-color: #f1683a;
    left: 0;
    top: 0;
}

.carousel.next .time,
.carousel.prev .time{
    animation: runningTime 2s linear 1 forwards;
}
@keyframes runningTime{
    from{ width: 100%}
    to{width: 0}
}
/* prev click */
.carousel.prev .list .item:nth-child(2){
    z-index: 2;
}

.carousel.prev .list .item:nth-child(2) img{
    animation: outFrame 0.5s linear 1 forwards;
    position: absolute;
    bottom: 0;
    left: 0;
}
@keyframes outFrame{
    to{
        width: 150px;
        height: 220px;
        bottom: 50px;
        left: 50%;
        border-radius: 20px;
    }
}

.carousel.prev .thumbnail .item:nth-child(1){
    overflow: hidden;
    opacity: 0;
    animation: showThumbnail .5s linear 1 forwards;
}
.carousel.next .arrows button,
.carousel.prev .arrows button{
    pointer-events: none;
}
.carousel.prev .list .item:nth-child(2) .content .author,
.carousel.prev .list .item:nth-child(2) .content .title,
.carousel.prev .list .item:nth-child(2) .content .topic,
.carousel.prev .list .item:nth-child(2) .content .des,
.carousel.prev .list .item:nth-child(2) .content .buttons
{
    animation: contentOut 1.5s linear 1 forwards!important;
}

@keyframes contentOut{
    to{
        transform: translateY(-150px);
        filter: blur(20px);
        opacity: 0;
    }
}
@media screen and (max-width: 678px) {
    .carousel .list .item .content{
        padding-right: 0;
    }
    .carousel .list .item .content .title{
        font-size: 30px;
    }
}

.page2 h2{
    margin-top: 3rem;
    text-align: center;
    font-weight: 400;
    font-size: 40px;
    color: #212529;
}
.page2 h1{
    margin-top: 7rem;
    text-align: center;
    font-weight: 8;
    font-size: 6px;
    color: #fff;
}
/*cards*/
body{
    
    font-size: 62.5%;
    font-family: 'Ubuntu', sans-serif;
}

.container{
   justify-content: center;
   gap: 100px;
}
/* ***************************** CARD 1 STYLING ***************************** */
.card-1{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 270px;
    min-width: 250px;
    width: 470px;
    background: #fff;
    position: relative;
    background: linear-gradient(to right, #000000, #434343);
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.card-1 .content{
    margin-top: 5px;
    position: absolute;
    left: 0;
    top: 0;
}
.card-1 .heading{
    font-size: 2.0rem;
    transition: 0.4s;
    color: #8796a4b8;
}

.card-1:hover .heading{
    font-size: 2.8rem;
    color: #6f7a85;
}

.card-1 .para{
    margin-top: 15px;
    width: 235px;
    font-size: 1.2rem;
    transition: 0.4s;
    opacity: 0;
    color: #88919b;
}

.card-1 .btn{
    margin-top: 15px;
    padding: 0.2rem 1rem;
    border: 2px solid #6f7a85;
    transition: 0.4s;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    color: #6f7a85;
    font-size: 1.2rem;
    text-align: center;
    border-radius: 10px;
    font-weight: 500;
    opacity: 0;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.card-1 .btn:hover{
    background: #6f7a85;
    color: #ffffffaf;
}

.card-1:hover .para,
.card-1:hover .btn{
    opacity: 1;
}

.card-1 img{
    position: absolute;
    top: -55%;
    left: 28%;
    width: 400px;
    height: auto;
    transition: 0.4s;
}

.card-1:hover img{
    top: -62%;
    left: 49%;
    scale: 110%;
}

/* ***************************** CARD 2 STYLING ***************************** */

.card-2{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 270px;
    min-width: 250px;
    width: 470px;
    background: #fff;
    position: relative;
    background: linear-gradient(to right, #030a1c, #532c2c);
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.card-2 .content{
    margin-top: 5px;
    position: absolute;
    left: 0;
    top: 0;
    padding-left: 10px;
    
}
.card-2 .heading{
    font-size: 2.2rem;
    transition: 0.4s;
    color: #8796a4b8;
    pointer-events: none;
}

.card-2:hover .heading{
    font-size: 2.8rem;
    color: #8796a4;
}

.card-2 .para{
    margin-top: 15px;
    width: 235px;
    font-size: 1.2rem;
    transition: 0.4s;
    opacity: 0;
    color: #88919b;
}

.card-2 .btn{
    margin-top: 15px;
    padding: 0.2rem 1rem;
    border: 2px solid #6f7a85;
    transition: 0.4s;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    color: #6f7a85;
    font-size: 1.2rem;
    text-align: center;
    border-radius: 10px;
    font-weight: 500;
    opacity: 0;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.card-2 .btn:hover{
    background: #6f7a85;
    color: #ffffffaf;
}

.card-2:hover .para,
.card-2:hover .btn{
    opacity: 1;
}

.card-2 img{
    position: absolute;
    top: -65%;
    left: 46%;
    width: 400px;
    height: auto;
    transition: 0.4s;
}

.card-2:hover img{
    top: -60%;
    left: 49%;
    scale: 110%;
}
/* Original CSS */

/* Your original CSS here... */

/* Responsive CSS */

@media only screen and (max-width: 768px) {
    .container {
        flex-direction: column; /* Stack cards vertically on smaller screens */
        align-items: center; /* Center cards horizontally */
    }

    .card-1,
    .card-2 {
        width: 150%; /* Adjust width for smaller screens */
        min-width: auto; /* Remove minimum width */
    }

    .card-1 img,
    .card-2 img {
        top: -15%; /* Adjust image position */
        left: 10%; /* Adjust image position */
        transform: translateX(-40%); /* Center image horizontally */
        width: 140%; /* Adjust image width */
    }

    .card-1 .content,
    .card-2 .content {
        width: 90%; /* Adjust content width */
    }
}

/* //////////////////// */
/* Default styles */
.regal {
    text-align: center; /* Center align content */
    padding: 20px; /* Add padding for spacing */
}

.heading {
    font-family: 'Audiowide', sans-serif;
    font-size: 3rem; /* Adjust heading font size */
    margin-bottom: 20px; /* Add some space below the heading */
}

.regal img {
    width: 100%; /* Make the image responsive */
    max-width: 1000px; /* Set maximum width for the image */
    height: auto; /* Maintain aspect ratio */
    margin: 0 auto; /* Center the image */
}

/* Responsive styles */
@media only screen and (max-width: 768px) {
    .heading {
        font-size: 2rem; /* Reduce heading font size for smaller screens */
    }
  
    .regal img {
        max-width: 300px; /* Adjust maximum width of the image for smaller screens */
    }
}



.ms--images {
  position: relative;
  overflow: hidden;
}
.ms--images.ms-container--horizontal {
  width: 100%;
  height: 400px;
  max-width: 100%;
}
.ms--images.ms-container--horizontal .ms-track {
  left: calc(50% - 350px);
}
.ms--images.ms-container--horizontal .ms-slide {
  display: inline-flex;
}
.ms--images .ms-track {
  display: flex;
  position: absolute;
  white-space: nowrap;
  padding: 0;
  margin: 0;
  list-style: none;
}
.ms--images .ms-slide {
  align-items: center;
  justify-content: center;
  width: 700px;
  height: 400px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.ms--images {
  left: calc(50% - 170px);
}
.ms--images.ms-container--horizontal .ms-track {
  left: -70px;
}
.ms--images .ms-slide:nth-child(1) .ms-slide__image {
  background-image: url("11.jpg");
}
.ms--images .ms-slide:nth-child(2) .ms-slide__image {
  background-image: url("12.jpg");
}
.ms--images .ms-slide:nth-child(3) .ms-slide__image {
  background-image: url("13.jpg");
}
.ms--images .ms-slide:nth-child(4) .ms-slide__image {
  background-image: url("14.jpg");
}
.ms--images .ms-slide__image-container {
  width: 80%;
  height: 80%;
  background-color: rgba(0, 0, 0, 0.3);
  overflow: hidden;
}
.ms--images .ms-slide__image {
  width: 100%;
  height: 100%;
  background-size: cover;
}

.ms--numbers {
  position: relative;
  overflow: hidden;
}
.ms--numbers.ms-container--horizontal {
  width: 240px;
  height: 240px;
  max-width: 100%;
}
.ms--numbers.ms-container--horizontal .ms-track {
  left: calc(50% - 120px);
}
.ms--numbers.ms-container--horizontal .ms-slide {
  display: inline-flex;
}
.ms--numbers .ms-track {
  display: flex;
  position: absolute;
  white-space: nowrap;
  padding: 0;
  margin: 0;
  list-style: none;
}
.ms--numbers .ms-slide {
  align-items: center;
  justify-content: center;
  width: 240px;
  height: 240px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.ms--numbers {
  position: absolute;
  left: calc(50% - 380px);
  top: calc(50% - 190px);
  z-index: -1;
  pointer-events: none;
}
.ms--numbers .ms-slide {
  font-size: 9em;
  font-weight: 900;
  color: rgba(255, 255, 255, 0.2);
}

.ms--titles {
  position: relative;
  overflow: hidden;
}
.ms--titles.ms-container--vertical {
  width: 400px;
  height: 170px;
  max-height: 100%;
}
.ms--titles.ms-container--vertical .ms-track {
  flex-direction: column;
  top: calc(50% - 85px);
}
.ms--titles.ms-container--vertical.ms-container--reverse .ms-track {
  flex-direction: column-reverse;
  top: auto;
  bottom: calc(50% - 45px);
}
.ms--titles.ms-container--vertical .ms-slide {
  display: flex;
}
.ms--titles .ms-track {
  display: flex;
  position: absolute;
  white-space: nowrap;
  padding: 0;
  margin: 0;
  list-style: none;
}
.ms--titles .ms-slide {
  align-items: center;
  justify-content: center;
  width: 400px;
  height: 170px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.ms--titles {
  position: absolute;
  left: calc(50% - 420px);
  top: calc(55% - 10px);
  z-index: 1;
  pointer-events: none;
}
.ms--titles .ms-track {
  white-space: normal;
}
.ms--titles .ms-slide {
  font-size: 3.3em;
  font-weight: 600;
}
.ms--titles .ms-slide h3 {
  margin: 0;
  text-shadow: 1px 1px 2px black;
}

.ms--links {
  position: relative;
  overflow: hidden;
}
.ms--links.ms-container--vertical {
  width: 120px;
  height: 60px;
  max-height: 100%;
}
.ms--links.ms-container--vertical .ms-track {
  flex-direction: column;
  top: calc(50% - 30px);
}
.ms--links.ms-container--vertical .ms-slide {
  display: flex;
}
.ms--links .ms-track {
  display: flex;
  position: absolute;
  white-space: nowrap;
  padding: 0;
  margin: 0;
  list-style: none;
}
.ms--links .ms-slide {
  align-items: center;
  justify-content: center;
  width: 120px;
  height: 60px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}


.ms--links .ms-track {
  white-space: normal;
}
.ms--links .ms-slide__link {
  font-weight: 600;
  padding: 5px 0 8px;
  border-bottom: 2px solid white;
  cursor: pointer;
}

.pagination {
  display: flex;
  position: absolute;
  left: calc(50% - 420px);
  top: calc(75%);
  list-style: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  z-index: 1;
}
.pagination__button {
  display: inline-block;
  position: relative;
  width: 36px;
  height: 20px;
  margin: 0 5px;
  cursor: pointer;
}
.pagination__button:before, .pagination__button:after {
  content: "";
  position: absolute;
  left: 0;
  top: calc(50% - 1px);
  width: 100%;
  box-shadow: 0 1px 0 #0B0D14;
}
.pagination__button:before {
  height: 2px;
  background-color: #6A3836;
}
.pagination__button:after {
  height: 3px;
  background-color: #DC4540;
  opacity: 0;
  transition: 0.5s opacity;
}

.pagination__item--active .pagination__button:after {
  opacity: 1;
}

@media screen and (max-width: 860px) {
  .ms--numbers {
    left: calc(50% - 120px);
  }

  .ms--titles {
    left: calc(50% - 200px);
    top: calc(50% - 135px);
    text-align: center;
  }

  .ms--links {
    left: calc(50% - 60px);
    top: calc(50% + 80px);
  }

  .pagination {
    left: 50%;
    top: calc(100% - 50px);
    transform: translateX(-50%);
  }
}
@media screen and (max-width: 600px) {
  .ms--images {
    overflow: visible;
  }
}
@media screen and (max-width: 400px) {
  .ms--titles .ms-slide {
    transform: scale(0.8);
  }
}
*, *:before, *:after {
  box-sizing: border-box;
}

a {
  color: white;
  text-decoration: none;
  cursor: pointer;
}

.my_gallary {
  position: relative;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: rgba(0, 0, 0, 0.1);
}
.my_gallary:before {
  content: "";
  position: absolute;
  left: -150%;
  top: 0;
  width: 300%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.3);
  transform: rotate(45deg);
  z-index: -1;
}

.sliders-my_gallary {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 1;
}

@media screen and (max-width: 700px) {
  .header__menu, .my_info {
    display: none;
  }
}

/* Default styles */
.outer {
    display: flex;
    justify-content: center;
}

.inner {
    max-width: 1200px; /* Limit maximum width of content */
    width: 100%; /* Ensure content takes full width */
    padding: 0 20px; /* Add padding for spacing */
}

.bg {
    text-align: center; /* Center align content */
}

.images-repair {
    width: 100%; /* Make the image responsive */
    max-width: 600px; /* Set maximum width for the image */
    height: auto; /* Maintain aspect ratio */
    margin: 0 auto; /* Center the image */
}

.home-content {
    margin-top: 20px; /* Add space between image and content */
}

/* Responsive styles */
@media only screen and (max-width: 768px) {
    .images-repair {
        max-width: 400px; /* Adjust maximum width of the image for smaller screens */
    }

    .home-content {
        padding: 0 10px; /* Adjust padding for smaller screens */
    }

    h1 {
        font-size: 24px; /* Reduce heading font size for smaller screens */
    }

    p {
        font-size: 14px; /* Reduce paragraph font size for smaller screens */
    }
}

        .des{
          font-size: 15px;
        }
        
</style>
<body>

<!-- carousel -->
    <div class="carousel" >
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="tyler-clemmensen-d1Jum1vVLew-unsplash.jpg">
                <div class="content">
                    <div class="title">SERVO</div>
                    <div class="topic">R129</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        The fastest car in the world boasts
                        an incredible top speed exceeding 
                        300 mph, achieved through advanced
                        engineering and aerodynamics. 
                        Powered by a formidable engine,
                        this vehicle generates an astounding
                        amount of horsepower, propelling it 
                        unmatched velocities. 
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="serjan-midili-8iZdhhP5bwg-unsplash.jpg">
                <div class="content">
                    <div class="title">MORIS</div>
                    <div class="topic">V786</div>
                    <div class="des">
                    The epitome of luxury in the automotive world combines 
                    unparalleled comfort, exquisite craftsmanship, and state-of-the-art technology.
                     These luxury cars offer opulent interiors with premium materials such as fine 
                     leather, wood accents, and advanced entertainment systems.
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="wes-tindel-UBioK0WEOvA-unsplash.jpg">
                <div class="content">
                    <div class="title">LEGENDER</div>
                    <div class="topic">G89B</div>
                    <div class="des">
                    The global car market encompasses a diverse range of vehicles, each offering 
                    unique features and capabilities tailored to different needs and preferences.
                     From compact city cars to rugged SUVs and luxurious sedans, the global car 
                     market caters to a wide spectrum of consumers. 
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="2023-Maserati-MC20-Notte-Edition-001-2000.jpg">
                <div class="content">
                    <div class="title">HYPER</div>
                    <div class="topic">ELECTRA67</div>
                    <div class="des">
                    The fastest production car in the world currently achieves an astounding 
                    top speed exceeding 300 mph, a remarkable feat of engineering and aerodynamics. 
                    Propelled by a formidable engine, it generates an extraordinary amount of horsepower, 
                    enabling it to reach unmatched velocities. 
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="tyler-clemmensen-d1Jum1vVLew-unsplash.jpg">
                <div class="content">
                    <div class="title">
                    SERVO
                    </div>
                    <div class="description">
                        IR129
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="serjan-midili-8iZdhhP5bwg-unsplash.jpg">
                <div class="content">
                    <div class="title">
                        MORIS
                    </div>
                    <div class="description">
                    V786
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="wes-tindel-UBioK0WEOvA-unsplash.jpg">
                <div class="content">
                    <div class="title">
                    LEGENDER
                    </div>
                    <div class="description">
                       G89B
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="2023-Maserati-MC20-Notte-Edition-001-2000.jpg">
                <div class="content">
                    <div class="title">
                    HYPER
                    </div>
                    <div class="description">
                    ELECTRA67
                    </div>
                </div>
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"></button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>

    <script src="app.js"></script>
<!-- page 2 -->
    <div class="page2">
            <h2 style="font-family: 'Audiowide', sans-serif; font-size: 50px;">Underappreciated Vehicles</h2>
            <h1>.</h1>
    </div>
<!-- page 3 -->
    <div class="container" style="display: flex;">
        <div class="card-1">
            <div class="content">
                <h1 class="heading" style="font-family: 'Audiowide', sans-serif;">FURIES P91</h1>
                <p class="para">Super Sport 300+ holds the title as the fastest car in the world, achieving a staggering. </p>
            </div>
            <img src="pngwing.com (3).png" alt="">
        </div>

        <div class="card-2">
            <div class="content">
                <h1 class="heading" style="font-family: 'Audiowide', sans-serif;">CHERVO U678</h1>
                <p class="para">This hypercar is powered by an 8.0-liter quad-turbocharged W16 engine.</p>
            </div>
            <img src="pngwing.com (1).png" alt="">
        </div>
    </div>       

    <!-- page 4 -->
    <div class=regal>
        <h2 class="heading" style="font-family: 'Audiowide', sans-serif; font-size: 50px;">Valuable <span style="font-family: 'Audiowide', sans-serif; font-size: 50px;">Automobile</span></h2>

                      <img src="aboutus2.png" alt="car">
                        <h3 style="font-size: 30px;">REGAL SUV89</h3>
                        <p style="font-size: 20px;">The fastest SUV in India exemplifies remarkable 
                            speed and power, showcasing advanced engineering
                             and aerodynamics tailored for the demands 
                             of an SUV. Equipped with a robust engine,
                              this vehicle delivers formidable horsepower,
                               enabling impressive acceleration and 
                               performance on Indian roads. Its sleek 
                               design and innovative features reflect a 
                               blend of luxury and functionality, catering
                              to the discerning tastes of SUV enthusiasts. 
                            </p>
                    </div>
      </div>
                  

<!-- partial:index.partial.html -->
<div class="my_gallary" style="display: flex; overflow: hidden; padding: 48px 0px;">
<h1 style="font-family: 'Audiowide', sans-serif; font-size: 50px;">CRAZE OF DESTROYERS</h1>
    <!-- my_gallary for all sliders, and pagination -->
    <main class="sliders-container">
        <!-- Here will be injected sliders for images, numbers, titles and links -->

        <!-- Simple pagination for the slider -->
        <ul class="pagination">
            <li class="pagination__item"><a class="pagination__button"></a></li>
            <li class="pagination__item"><a class="pagination__button"></a></li>
            <li class="pagination__item"><a class="pagination__button"></a></li>
            <li class="pagination__item"><a class="pagination__button"></a></li>
        </ul>
    </main>
</div>
<!-- partial -->
  <script src='https://rawgit.com/lmgonzalves/momentum-slider/master/dist/momentum-slider.min.js'></script><script  src="script11.js"></script>


  <h2 style="font-family: 'Audiowide', sans-serif; font-size: 50px;">OUR APPROACH</h2>
  <h1 Style="font-size: 5px;">.</h1>
  <section>
      <div class="outer">
        <div class="inner">
          <div class="bg home" style="margin-left: auto; margin-right: auto; display: block;">
            <img class="images-repair" src="repair.png" alt="" style="margin-left: auto; margin-right: auto; display: block;"/>
            <div class="home-content">
              <h1>
              "Customer Happiness is Our Happiness"
                <ion-icon
                  class="music-note-icon"
                  name="musical-note-outline"></ion-icon>
              </h1>
              <p style="font-size: 15px;">
              At CARZZ, we firmly believe that the happiness of our customers is 
              paramount. Our entire operation revolves around ensuring that every 
              customer who walks through our doors leaves completely satisfied. 
              From the moment you arrive, our friendly and knowledgeable staff 
              are here to address your needs and exceed your expectations.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section> 
      <script>
        function init(e) {
    if (!e.target.closest('.item')) return;
    let hero = document.querySelector('div[data-pos="0"]');
    let target = e.target.parentElement;
    [target.dataset.pos,hero.dataset.pos] = [hero.dataset.pos,target.dataset.pos];
  }
  
  window.addEventListener('click',init,false);
      </script>

  </body>         

<?php
include ("Footer_original.php")
?> 
