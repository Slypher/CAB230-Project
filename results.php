<?php session_start() ?>
<?php require_once __DIR__.'/includes/scripts/performSearch.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__.'/includes/partials/head.php' ?>
        <title>Search Results</title>
        <link rel="stylesheet" href="public/css/results.css">
    </head>
    <body>
        <!--Section 1 HEADER-->
        <header>
            <?php require_once __DIR__.'/includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-list"></span> Search Results</h1>  
            </div>
        </header>
        <div id="page-container">
        <!--Section 2 CONTENT-->
            <div id="content">
                <!-- the div below will contain the google maps map -->
                <div id="map"></div>
                <!-- the results table -->
                <table>
                    <tbody id="results-table">
                        <tr>
                            <th><strong>Name</strong></th>
                            <th><strong>Street</strong></th>
                            <th><strong>Suburb</strong></th>
                            <th><strong>Distance</strong></th>
                            <th><strong>Rating</strong></th>
                        </tr>
                        <?php
                            // iterate through each result, generating HTML and populating it
                            // with the details of the result
                            foreach ($results as $result) {
                                echo '<tr id="'.$result["id"].'">';
                                echo '<td><a href="item.php?id='.$result["id"].'&distance='.$result["Distance"].'">'.$result["Name"].'</a></td>';
                                echo '<td><a href="item.php?id='.$result["id"].'&distance='.$result["Distance"].'">'.$result["Street"].'</a></td>';
                                echo '<td><a href="item.php?id='.$result["id"].'&distance='.$result["Distance"].'">'.$result["Suburb"].'</a></td>';
                                echo '<td><a href="item.php?id='.$result["id"].'&distance='.$result["Distance"].'">'.$result["Distance"].'</a></td>';
                                echo '<td><a href="item.php?id='.$result["id"].'&distance='.$result["Distance"].'">'.$result["Rating"].'</a></td>';
                               
                                // hidden inputs containing data for google maps javascript resultsMap.js
                                echo '<input type="hidden" name="url" value="http://'.$_SERVER['HTTP_HOST'].'/item.php?id='.$result["id"].'&distance='.$result["Distance"].'" />';
                                echo '<input type="hidden" name="location_lat" value="'.$result['Latitude'].'" />';
                                echo '<input type="hidden" name="location_long" value="'.$result['Longitude'].'" />';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <!-- script to make the google maps map -->
                <script src="public/js/resultsMap.js"></script>
                <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGLqT3avfEd6E22DZPezSxqAVRYk8tP6U&callback=initMap"></script>
            </div> <!-- div content ends here-->
            <!-- SECTION 3: Footer -->
            <?php require_once __DIR__.'/includes/partials/footer.php' ?>
        </div>     
    </body>
</html>
