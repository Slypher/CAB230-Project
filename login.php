<?php require_once __DIR__.'/includes/scripts/login.php' ?>
<?php require_once __DIR__.'/includes/functions.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__.'/includes/partials/head.php' ?>
        <title>Login</title>
	    <meta name="description" content="placeholder">
        <link rel="stylesheet" href="public/css/login.css">
        <script src="public/js/validate_registration.js"></script>
    </head>
    <body>
        <!-- SECTION 1: Header -->
        <header>
            <?php require_once __DIR__.'/includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-user-circle-o"></span> Login</h1>
            </div>
        </header>
        <div id="page-container">
            <!-- SECTION 2: Content -->
            <div id="content">
                <form action="./login.php" method="POST" id="login-form" onchange="resetError();">
                    <div id="form-float-container">
                        <div id="form-label-column">
                            <label for="email-field"><strong>Email Address: </strong></label><br>
                            <label for="password-field"><strong>Password: </strong></label><br>
                        </div>
                        <div id="form-input-column">
                            <input type="text" class="input-field email-field" id="email-field" name="email" onclick="resetError();"><br>
                            <input type="password" class="input-field password-field" id="password-field" name="password" onclick="resetError();"><br>
                        </div>
                    </div>
                    <div id="form-submit-container">
                        <input type="submit" class="button large-button" name="login" value="Login" />
                    </div>
                    <div class="error-message" <?php if (isset($_POST['login'])) if (anyErrors($errors)) echo 'style="display:inline-block;"'; ?>>
                        <?php if (isset($_POST['login'])) foreach ($errors as $error) if ($error) echo '<span class="error" style="display:inline;"><span class="fa fa-exclamation-triangle"></span> '.$error.'<br></span>'; ?>
                   </div>
                </form>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once __DIR__.'/includes/partials/footer.php' ?>
        </div>
    </body>
</html>