<?php include "pages/header.php";

?>

<link rel="stylesheet" href="style/index.css">

<div class="indexwrapper">


    <div id="imgCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#imgCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#imgCarousel" data-slide-to="2"></li>
            <li data-target="#imgCarousel" data-slide-to="3"></li>
            <li data-target="#imgCarousel" data-slide-to="4"></li>
        </ol>



        <div class="carousel-inner">

        
            <div class="carousel-item active">
                <img class="d-block w-100 comp" src="assets/slider/1.jpeg" alt="1">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Nouveauté</h3>
                    <p>Découvrez notre large choix de plats traditionnaux!</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="assets/slider/2.jpeg" alt="2">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Pizza artisanales</h3>
                    <p>Découvrez notre large sélection de pizza et goûtez au savoir-faire de nos Pizzaïolo</p>
                </div>
            </div>


            <div class="carousel-item">
                <img class="d-block w-100" src="assets/slider/3.jpeg" alt="3">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Burger ? Sandwich ? Panini ?</h3>
                    <p>En solo ou pour six personnes, on a ce qu'il vous faut !</p>
                </div>
            </div>




           





        </div>


        <a class="carousel-control-prev" href="#imgCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imgCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
   
    <div id="imgCarouselMobile" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#imgCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#imgCarousel" data-slide-to="2"></li>
            <li data-target="#imgCarousel" data-slide-to="3"></li>
        </ol>



        <div class="carousel-inner">

        
            <div class="carousel-item active">
                <img class="d-block w-100 comp" src="assets/slider/mobile1.jpeg" alt="1">
                <div class="carousel-caption d-md-block carouselitemtext">
                    <h3>Nouveauté</h3>
                    <p>Découvrez notre large choix de plats traditionnaux!</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="assets/slider/mobile2.jpeg" alt="2">
                <div class="carousel-caption d-md-block carouselitemtext">
                    <h3>Pizza artisanales</h3>
                    <p>Découvrez notre large sélection de pizza et goûtez au savoir-faire de nos Pizzaïolo</p>
                </div>
            </div>


            <div class="carousel-item">
                <img class="d-block w-100" src="assets/slider/mobile3.jpeg" alt="3">
                <div class="carousel-caption d-md-block carouselitemtext">
                    <h3>Burger ? Sandwich ? Panini ?</h3>
                    <p>En solo ou pour six personnes, on a ce qu'il vous faut !</p>
                </div>
            </div>




           





        </div>


        <a class="carousel-control-prev" href="#imgCarouselMobile" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imgCarouselMobile" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>














</div>


<?php include "pages/footer.php";


