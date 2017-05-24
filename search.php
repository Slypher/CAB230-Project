<!DOCTYPE html>
<html>
    <head>
        <?php require_once './includes/partials/head.php' ?>
        <title>Search</title>
	    <meta name="description" content="placeholder">
        <link rel="stylesheet" href="./public/css/search.css">
        <script src="./public/js/geolocation.js"></script>
        <script src="./public/js/validate_search.js"></script>
    </head>
    <body>
        <!-- SECTION 1: Header -->
        <header>
            <?php require_once './includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-search"></span> Search</h1>
            </div>
        </header>
        <div id="page-container">
            <!-- SECTION 2: Content -->
            <div id="content">
                <form action="./sample-results.php" id="search-form" onsubmit="return validate();">
                    <input type="text" class="name-field" name="name" placeholder="Name of Park" onchange="resetError();"><br>
                    <select class="suburb-picker" name="suburb" onchange="resetError();">
                        <option value="default" id="default" disabled selected>Select a Suburb</option>
                        <option value="1">Example Suburb</option>
                        <option value="2">Example Suburb</option>
                        <option value="3">Example Suburb</option>
                    </select>
                    <input type="number" name="rating" class="rating-picker" placeholder="Rating" step="0.5" min="1" max="5" onchange="resetError();"><br>
                    <button type="button" onclick="getLocation()">Get my Location</button>
                    <input type="submit" value="Search" />
                </form>
                <div class="error-message">
                    <span class="error name-error"><span class="fa fa-exclamation-triangle"></span> Please provide a <strong>park name</strong><br></span>
                    <span class="error suburb-error"><span class="fa fa-exclamation-triangle"></span> Please select a <strong>suburb</strong><br></span>
                    <span class="error rating-error"><span class="fa fa-exclamation-triangle"></span> Please choose a <strong>park rating</strong><br></span>
                    <span class="error rating-num-error"><span class="fa fa-exclamation-triangle"></span> Please choose a park rating between <strong>1 and 5</strong><br></span>
                </div>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once './includes/partials/footer.php' ?>
        </div>
    </body>
</html>