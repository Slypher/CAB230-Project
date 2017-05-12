<!DOCTYPE html>
<html>
    <head>
        <?php include 'head.php' ?>
        <title>Sample Results</title>
	    <meta name="description" content="A sample results page on parks taken from the Brisbane City Council.">
        <link rel="stylesheet" href="../resources/css/sample-results.css">
    </head>
    <body>
        <!--Section 1 HEADER-->
        <header>
            <?php include 'navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-list"></span> Sample Results</h1>  
            </div>
        </header>
        <div id="page-container">
        <!--Section 2 CONTENT-->
            <div id="content">
                <!--ROW 1--><!--The Top Trending Tile-->
                <div id="top-row">
                    <a href="../views/sample-item.php" id="results-container">  
                        <img src="../resources/img/park-table.jpg" alt="stock-image01">
                        <div id="description">
                            <h1> Featured Parks</h1>
                            <p> The most popular parks in town </p>
                            <p> 9 Places</p>
                        </div>
                    </a>
                </div>
                <!-- ROW 2--><!--The first row of sample parks with 3 tiles-->
                <div class="row">
                    <!--Tile Example 1a-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                            <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 1a</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                    <!--Tile Example 1b-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                            <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 1b</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                    <!--Tile Example 1c-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                            <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 1c</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                </div> <!-- row 1 ends here-->   
                <!-- ROW 2--><!--The second row of sample parks with 3 tiles-->
                <div class="row">
                    <!--Tile Example 2a-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                        <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 2a</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                    <!--Tile Example 2b-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                        <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 2b</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                    <!--Tile Example 2c-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                            <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 2c</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                </div> <!-- row 2 ends here--> 
                <!-- ROW 3--><!--Sample results tiles of 3-->
                <div id="bottom-row">
                    <!--Tile Example 3a-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                            <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 3a</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                    <!--Tile Example 3b-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                            <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 3b</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                    <!--Tile Example 3c-->
                    <div class="results-container-small">
                        <a href="../views/sample-item.php" class="results-url-small"> 
                            <img src="../resources/img/park-table.jpg" alt="stock-image01">
                            <div class="results-description-small">
                                <h1>Example Park 3c</h1>
                                <p> Park Name </p>
                                <p> 4.5 STARS</p>
                            </div>
                        </a>
                    </div>
                </div> <!-- row 3 ends here--> 
            </div> <!-- div content ends here-->
            <!-- SECTION 3: Footer -->
            <?php include 'footer.php' ?>
        </div>     
    </body>
</html>
