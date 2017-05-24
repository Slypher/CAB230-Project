<!DOCTYPE html>
<html>
    <head>
        <?php require_once './includes/partials/head.php' ?>
        <title>Sample Item</title>
	    <meta name="description" content="placeholder">
        <link rel="stylesheet" href="./public/css/sample-item.css">
        <script src="./public/js/slider.js"></script>
    </head>
    <body>
        <!-- SECTION 1: Header -->
        <header>
            <?php require_once './includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-map-marker"></span> Sample Item</h1>
            </div>
        </header>
        <div id="page-container">
            <!-- SECTION 2: Content -->
            <div id="content">
                <div id="results-container">
                    <h1>7th Brigade Park</h1>
                    <h2>Chermside</h2>
                    <div class="slider-container">
                        <img class="slides" id="slide1" src="./public/img/sample-item-1-img.jpg" alt="sample-image01">
                        <img class="slides" id="slide2" src="./public/img/sample-item-3-img.jpg" alt="sample-image02">
                        <img class="slides" id="slide3" src="./public/img/sample-item-4-img.jpg" alt="sample-image03">
                        
                        <button class="button-left" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="button-right" onclick="plusDivs(1)">&#10095;</button>
                        <!--description under image-->
                        <i>While this park boasts one of the northside's largest fort-like playgrounds (known as Kidspace), an exploration of the expansive 7th Brigade Park reveals it has much more to offer</i>
                    </div>
                    <div id="description">
                        <div class="description-text">
                            <h3><span class="fa fa-book"></span> DESCRIPTION</h3>
                            <p>The Downfall Creek Bikeway runs through the park making this one a very popular track for runners and bike riders. The park also has a rebound wall, half-court basketball court, and a couple of cricket pitches on the ovals for those looking for some organised sport. There are many great spots for a picnic or BBQ throughout the park, and also a dog off-leash area which is popular with the locals.</p>
                        </div>
                        <div class="description-text">    
                            <h3><span class="fa fa-wheelchair"></span> FACILITIES</h3>
                            <ul>
                                <li>Toilets with a disabled facility</li>
                                <li>Basketball Half Court</li>
                                <li>Tennis court with rebound wall</li>
                                <li>Parking at both ends (6am - 9pm)</li>
                                <li>Bike Paths</li>
                                <li>Dogs are allowed</li>
                                <li>Electric Barbecues</li>
                                <li>Lots of shaded areas</li>
                                <li>Unfenced Playground</li>
                            </ul>
                        </div>
                        <div class="description-text"> 
                            <h3><span class="fa fa-file"></span> VENUE INFORMATION</h3>
                            <strong>7th Brigade Park</strong>
                            <p>Phone: 07 3403 8888</p>
                            <p>Website:<a href="https://www.brisbane.qld.gov.au/facilities-recreation/parks-venues/parks/parks-suburb/chermside-parks" target="_blank" > www.brisbane.qld.gov.au/</a></p>
                            </div>    
                        <div class="description-text">    
                            <h3><span class="fa fa-map-marker"></span> LOCATION</h3>
                            <p>Address: Corner Murphy Road and Newman Road</p>
                            <p>City: Chermside 4032</p>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once './includes/partials/footer.php' ?>
        </div>
    </body>
</html>