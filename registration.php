<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__.'/includes/partials/head.php' ?>
        <title>Registration</title>
	    <meta name="description" content="placeholder">
        <link rel="stylesheet" href="public/css/registration.css">
        <script src="public/js/validate_registration.js"></script>
    </head>
    <body>
        <!-- SECTION 1: Header -->
        <header>
            <?php require_once __DIR__.'/includes/partials/navbar.php' ?>
            <div id="page-header">
                <h1><span class="fa fa-user-plus"></span> Registration</h1>
            </div>
        </header>
        <div id="page-container">
            <!-- SECTION 2: Content -->
            <div id="content">
                <form action="./includes/scripts/register.php" method="POST" id="registration-form" onsubmit="return validate();" onchange="resetError();">
                    <div id="form-float-container">
                        <div id="form-label-column">
                            <label for="email-field"><strong>Email Address: </strong></label><br>
                            <label for="username-field"><strong>Username: </strong></label><br>
                            <label for="password-field"><strong>Password: </strong></label><br>
                            <label for="birth-picker"><strong>Date of Birth: </strong></label><br>
                            <label><strong>Gender: </strong></label>
                        </div>
                        <div id="form-input-column">
                            <input type="text" class="input-field email-field" id="email-field" name="email" onclick="resetError();"><br>
                            <input type="text" class="input-field username-field" id="username-field" name="username" onclick="resetError();"><br>
                            <input type="password" class="input-field password-field" id="password-field" name="password" onclick="resetError();"><br>
                            <input type="date" class="date birth-picker" id="birth-picker" name="birth" onclick="resetError();"><br>
                            <div id="radio-container">
                                <input type="radio" class="gender-radio male-radio" id="male-radio" name="gender" value="male" onclick="resetError();"><label for="male-radio">Male</label>
                                <input type="radio" class="gender-radio female-radio" id="female-radio" name="gender" value="female" onclick="resetError();"><label for="female-radio">Female</label>
                                <input type="radio" class="gender-radio other-radio" id="other-radio" name="gender" value="other" onclick="resetError();"><label for="other-radio">Other</label><br>
                            </div>
                        </div>
                    </div>
                    <div id="form-submit-container">
                        <input type="checkbox" class="agree-checkbox" id="agree-checkbox" name="agree" value="true" onclick="resetError();"><label for="agree-checkbox"> I agree to the <a href="#">Terms and Conditions</a></label><br>
                        <input type="submit" class="button large-button" value="Register" />
                    </div>
                    <div class="error-message">
                        <span class="error email-error"><span class="fa fa-exclamation-triangle"></span> Please <strong>enter an email address</strong><br></span>
                        <span class="error email-invalid-error"><span class="fa fa-exclamation-triangle"></span> Please enter a <strong> valid email address</strong><br></span>
                        <span class="error username-short-error"><span class="fa fa-exclamation-triangle"></span> Please choose a username with <strong>5 or more</strong> characters<br></span>
                        <span class="error username-long-error"><span class="fa fa-exclamation-triangle"></span> Please choose a username with <strong>16 or fewer</strong> characters<br></span>
                        <span class="error password-short-error"><span class="fa fa-exclamation-triangle"></span> Please choose a password with <strong>5 or more</strong> characters<br></span>
                        <span class="error password-long-error"><span class="fa fa-exclamation-triangle"></span> Please choose a password with <strong>22 or fewer</strong> characters<br></span>
                        <span class="error password-number-error"><span class="fa fa-exclamation-triangle"></span> Please choose a password with <strong>2 or more</strong> numbers<br></span>
                        <span class="error gender-error"><span class="fa fa-exclamation-triangle"></span> Please <strong>select a gender</strong><br></span>
                        <span class="error age-error"><span class="fa fa-exclamation-triangle"></span> Please <strong>select a date of birth</strong><br></span>
                        <span class="error age-young-error"><span class="fa fa-exclamation-triangle"></span> Please select a date of birth <strong>before 2010</strong><br></span>
                        <span class="error age-old-error"><span class="fa fa-exclamation-triangle"></span> Please select a date of birth <strong>after 1917</strong><br></span>
                        <span class="error agree-error"><span class="fa fa-exclamation-triangle"></span> You must agree to our <strong>Terms and Conditions</strong><br></span>
                    </div>
                </form>
            </div>
            <!-- SECTION 3: Footer -->
            <?php require_once __DIR__.'/includes/partials/footer.php' ?>
        </div>
    </body>
</html>