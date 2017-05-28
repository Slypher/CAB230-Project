<?php session_start() ?>
<?php require_once __DIR__.'/includes/scripts/item.php' ?>
<?php require_once __DIR__.'/includes/scripts/review.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__.'/includes/partials/head.php' ?>
        <title><?php echo $item['Name'] ?></title>
        <link rel="stylesheet" href="public/css/item.css">
        <?php if (isset($_SESSION['user'])) echo'<script src="public/js/validate_review.js"></script>'; ?>
    </head>
    <body>
        <!-- SECTION 1: Header -->
        <header>
            <?php require_once './includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-map-marker"></span> <?php echo $item['Name'] ?></h1>
            </div>
        </header>
        <div id="page-container">
            <!-- SECTION 2: Content -->
            <div id="content">
                <div id="results-container">
                    <div class="title-container">
                        <h2><?php echo $item['Street'].', '.$item['Suburb'] ?></h2>
                        <?php if (isset($distance)) echo '<span class="subtle-text">'.$distance.' km from you</span>' ?>
                    </div>
                    <div class="reviews">
                        <div class="title-container">
                            <h3><span class="fa fa-book"></span> Reviews</h3>
                            <?php if (isset($item['Rating'])) echo '<span class="subtle-text">average rating of '.substr($item['Rating'], 0, 3).' stars</span>' ?>
                        </div>
                        <input type="hidden" name="location_lat" value="<?php echo $item['Latitude'] ?>" />
                        <input type="hidden" name="location_long" value="<?php echo $item['Longitude'] ?>" />
                        <div id="map"></div>
                        <?php
                        foreach ($reviews as $review) {
                            echo '<div class="review-container">';
                            echo '<div class="review-title">';
                            echo '<strong class="review-username"><span class="fa fa-user"></span> '.$review['username'].'</strong>';
                            echo '<span class="review-date">posted '.$review['date'].'</span>';
                            echo '<div class="review-rating">';
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < (int)$review['rating']) echo '<span class="fa fa-star"></span>';
                                else echo '<span class="fa fa-star-o"></span>';
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="review-body">';
                            echo $review['review'];
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo '<form class="review-form" method="POST" action="./item.php?id='.$item['id'];
                            if (isset($distance)) echo '&distance='.$distance;
                            echo '" onsubmit="return validate();" onchange="resetError();">';
                            echo '<h3>Leave a review</h3>';
                            echo '<div class="form-container">';
                            echo '<textarea name="review-text" class="review-textarea" rows="4" cols="36" maxlength="255" onclick="resetError();"></textarea>';
                            echo '<div class="submit-container">';
                            echo '<div class="rating-container">';
                            echo '<div class="rating">';
                            echo '<input type="radio" id="star5" class="star5" name="rating" value="5" onclick="resetError();"/><label for="star5"></label>';
                            echo '<input type="radio" id="star4" class="star4" name="rating" value="4" onclick="resetError();"/><label for="star4"></label>';
                            echo '<input type="radio" id="star3" class="star3" name="rating" value="3" onclick="resetError();"/><label for="star3"></label>';
                            echo '<input type="radio" id="star2" class="star2" name="rating" value="2" onclick="resetError();"/><label for="star2"></label>';
                            echo '<input type="radio" id="star1" class="star1" name="rating" value="1" onclick="resetError();"/><label for="star1"></label>';
                            echo '</div>';
                            echo '</div>';
                            echo '<input type="submit" name="review" class="button large-button review-button" value="Submit" />';
                            echo '</div>';
                            echo '</div>';
                            echo '</form>';
                            echo '<div class="error-message" ';
                            if (isset($_POST['review'])) if (anyErrors($errors)) echo 'style="display:inline-block;"';
                                echo '><span class="error review-error"><span class="fa fa-exclamation-triangle"></span> Please provide a <strong>review</strong><br></span>';
                                echo '<span class="error review-char-error"><span class="fa fa-exclamation-triangle"></span> Review cannot be more than <strong>255 characters</strong><br></span>';
                                echo '<span class="error rating-error"><span class="fa fa-exclamation-triangle"></span> Please choose a park rating between <strong>1 and 5</strong><br></span>';
                                if (isset($_POST['review'])) foreach ($errors as $error) if ($error) echo '<span class="error" style="display:inline;"><span class="fa fa-exclamation-triangle"></span> '.$error.'<br></span>';
                            echo '</div>';
                        } else echo '<h3><a href="login.php">Login</a> to leave a review</h3>'
                    ?>
                <script src="public/js/itemMap.js"></script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGLqT3avfEd6E22DZPezSxqAVRYk8tP6U&callback=initMap"></script>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once './includes/partials/footer.php' ?>
        </div>
    </body>
</html>