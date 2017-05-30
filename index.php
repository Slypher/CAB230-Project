<?php session_start() ?>
<?php parse_str($_SERVER['QUERY_STRING'], $query); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__.'/includes/partials/head.php' ?>
        <title>CAB230 Project</title>
        <meta name="description" content="This website is an assessment piece for the CAB230 Unit.">
        <link rel="stylesheet" href="public/css/index.css">
    </head>
    <body>
        <!-- SECTION 1: Header -->
        <header>
            <?php require_once __DIR__.'/includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-graduation-cap"></span> CAB230 Project</h1>
            </div>
        </header>
        <div id="page-container">
            <!-- display success message if query string has login/register inside -->
            <?php if (isset($query['login'])) echo '<div class="success-message" style="display:block;"><span class="fa fa-check"></span> Login successful</div>'; ?>
            <?php if (isset($query['register'])) echo '<div class="success-message" style="display:block;"><span class="fa fa-check"></span> Registration successful</div>'; ?>
            <!-- SECTION 2: Content -->
            <div id="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pulvinar, libero in pellentesque tempor, risus velit molestie arcu, sit amet blandit sapien ante eget mi. Aliquam est nulla, maximus vitae mattis a, aliquam in eros. Pellentesque massa odio, bibendum vel justo id, volutpat dapibus ex. Morbi ut rhoncus ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In nec mollis sem. Morbi interdum lorem a est vulputate elementum. Pellentesque nec vestibulum urna. Curabitur fringilla luctus maximus. Suspendisse nec ante sed mi faucibus pharetra id ac neque. Sed elit metus, pulvinar sit amet turpis sed, gravida malesuada ipsum. Proin et risus ac diam bibendum molestie. Nulla sed ultricies elit, eget mollis lacus.</p>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once __DIR__.'/includes/partials/footer.php' ?>
        </div>
    </body>
</html>