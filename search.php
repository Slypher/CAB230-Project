<?php require_once __DIR__.'/includes/scripts/validateSearch.php' ?>
<?php require_once __DIR__.'/includes/functions.php' ?>
<?php require_once __DIR__.'/lib/database.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__.'/includes/partials/head.php' ?>
        <title>Search</title>
	    <meta name="description" content="placeholder">
        <link rel="stylesheet" href="public/css/search.css">
        <script src="public/js/geolocation.js"></script>
        <script src="public/js/validate_search.js"></script>
    </head>
    <body>
        <!-- SECTION 1: Header -->
        <header>
            <?php require_once __DIR__.'/includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-search"></span> Search</h1>
            </div>
        </header>
        <div id="page-container">
            <!-- SECTION 2: Content -->
            <div id="content">
                <form action="./search.php" method="POST" id="search-form" onsubmit="return validate();">
                    <input type="text" class="input-field name-field" name="name" placeholder="Name of Park" onchange="resetError();"><br>
                    <select class="input-field select suburb-picker" name="suburb" onchange="resetError();">
                        <option value="default" id="default" disabled selected>Select a Suburb</option>
                        <?php echoSuburbs($pdo) ?>
                    </select><br>
                    <input type="text" name="distance" class="input-field distance-field" placeholder="Distance (km)" onchange="resetError();" disabled>
                    <input type="number" name="rating" class="input-field rating-picker" placeholder="Rating" step="0.5" min="1" max="5" onchange="resetError();"><br>
                    <input type="hidden" name="location-lat" class="location-lat">
                    <input type="hidden" name="location-long" class="location-long">
                    <button type="button" class="button" onclick="getLocation()">Get my Location</button>
                    <input type="submit" name="search" class="button" value="Search" />
                </form>
                <div class="error-message" <?php if (isset($_POST['search'])) if (anyErrors($errors)) echo 'style="display:inline-block;"'; ?>>
                    <span class="error distance-numeric-error"><span class="fa fa-exclamation-triangle"></span> Distance must be a <strong>number</strong><br></span>
                    <span class="error location-lat-numeric-error"><span class="fa fa-exclamation-triangle"></span> Location latitude must be a <strong>number</strong><br></span>
                    <span class="error location-long-numeric-error"><span class="fa fa-exclamation-triangle"></span> Location longitude must be a <strong>number</strong><br></span>
                    <span class="error rating-num-error"><span class="fa fa-exclamation-triangle"></span> Please choose a park rating between <strong>1 and 5</strong><br></span>
                    <?php if (isset($_POST['search'])) foreach ($errors as $error) if ($error) echo '<span class="error" style="display:inline;"><span class="fa fa-exclamation-triangle"></span> '.$error.'<br></span>'; ?>
                </div>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once __DIR__.'/includes/partials/footer.php' ?>
        </div>
    </body>
</html>