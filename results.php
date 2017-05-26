<?php require_once __DIR__.'/includes/scripts/performSearch.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__.'/includes/partials/head.php' ?>
        <title>Sample Results</title>
	    <meta name="description" content="A sample results page on parks taken from the Brisbane City Council.">
        <link rel="stylesheet" href="public/css/sample-results.css">
    </head>
    <body>
        <!--Section 1 HEADER-->
        <header>
            <?php require_once __DIR__.'/includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-list"></span> Sample Results</h1>  
            </div>
        </header>
        <div id="page-container">
        <!--Section 2 CONTENT-->
            <div id="content">
                <?php
                    echo '<div id="top-row">';
                    echo '<a href="sample-item.php?id='.$toprow["id"].'" id="results-container">';
                    echo '<img src="public/img/park-table.jpg" alt="stock-image01">';
                    echo '<div id="description">';
                    echo '<h1> '.$toprow["Name"].'</h1>';
                    echo '<p> '.$toprow["Suburb"].'</p>';
                    echo '<p> '.$toprow["Rating"].'</p>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';

                    foreach ($rows as $row) {
                        echo '<div class="row">';
                        foreach ($row as $result) {
                            echo '<div class="results-container-small">';
                            echo '<a href="sample-item.php?id='.$result["id"].'" class="results-url-small">';
                            echo '<img src="public/img/park-table.jpg" alt="stock-image01">';
                            echo '<div class="results-description-small">';
                            echo '<h1> '.$result["Name"].'</h1>';
                            echo '<p> '.$result["Suburb"].'</p>';
                            echo '<p> '.$result["Rating"].'</p>';
                            echo '</div>';
                            echo '</a>';
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                ?>
            </div> <!-- div content ends here-->
            <!-- SECTION 3: Footer -->
            <?php require_once __DIR__.'/includes/partials/footer.php' ?>
        </div>     
    </body>
</html>
