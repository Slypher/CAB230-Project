<?php require_once __DIR__.'/includes/scripts/item.php' ?>
<?php require_once __DIR__.'/includes/scripts/review.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once './includes/partials/head.php' ?>
        <title>Sample Item</title>
	    <meta name="description" content="placeholder">
        <link rel="stylesheet" href="./public/css/item.css">
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
                            <span class="subtle-text">average rating of <?php echo $item['Rating'] ?> stars</span>
                        </div>
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
                <form class="review-form" method="POST" action=
                <?php
                    echo '"./item.php?id='.$item['id'];
                    if (isset($distance)) echo '&distance='.$distance;
                    echo '">';
                ?>
                    <h3>Leave a review</h3>
                    <div class="form-container">
                        <textarea name="review-text" class="review-textarea" rows="4" cols="36" maxlength="255"></textarea>
                        <div class="submit-container">
                            <div class="rating-container">
                                <div class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                </div>
                            </div>
                            <input type="submit" name="review" class="button large-button review-button" value="Submit" />
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo '1'?>" />
                </form>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once './includes/partials/footer.php' ?>
        </div>
    </body>
</html>