<?php require_once __DIR__.'/includes/scripts/item.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once './includes/partials/head.php' ?>
        <title>Sample Item</title>
	    <meta name="description" content="placeholder">
        <link rel="stylesheet" href="./public/css/sample-item.css">
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
                    
                </div>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once './includes/partials/footer.php' ?>
        </div>
    </body>
</html>