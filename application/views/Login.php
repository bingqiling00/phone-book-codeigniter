<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">

</head>

<body>
    <div class="container-wrapper">
        <div class="left-navigation-bar">
            <div class="col-flex-center navigation-bar">
                <div class="empty-space"></div>
                <a href="<?php echo base_url() ?>login" class="navigation-bar-pill">Login</a>
                <a href="<?php echo base_url() ?>register" class="navigation-bar-pill">Register</a>
            </div>
        </div>
        <div class="center-container">
            <div class="flex-center-box title-box">
                <h2 class="w-100">Phone-Book</h2>
            </div>
            <div class="flex-center-box welcome-text">
                <p>Sign in to your account</p>
            </div>
            <?php 
            $errors = validation_errors();
            if (!empty($errors)) {
                $error_messages = explode("\n", strip_tags($errors));

                echo "<div class=\"col-flex-center\">
                        <div class=\"alert-danger col-flex-start\">
                            <div class=\"flex-center-box error-title\">
                                <img src=\"" . base_url('uploads/cancel_icon.png') . "\" alt=\"\" width=\"20px\">
                                <p>Failed to add new Contact : </p>
                            </div>

                            <ul class=\"col-flex-start\">";
                foreach ($error_messages as $error) {
                    $error = trim($error); // Trim whitespace from error message
                    if (!empty($error)) { // Check if error message is not empty
                        echo '<li>' . $error . '</li>';
                    }
                }
                echo "</ul>
                    </div>
                </div>";
            }
        ?>
            <?php 
            if($this->session->flashdata('invalid_credentials')){
                echo "<div class=\"col-flex-center\">
                <div class=\"alert-danger-2\">
                    <img src=\" ". base_url('uploads/cancel_icon.png') ." \" alt=\"\" width=\"20px\">
                    <p>Login failed. Invalid combination of username and password entered.</p>
                </div>
            </div>";
            }
        ?>
            <div class="col-flex-center">
                <?php echo form_open('login', array('class' => 'login-form')); ?>

                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Username</h5>
                    <input type="text" name="username" class="w-100" />
                </div>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Password</h5>
                    <input type="password" name="password" class="w-100" />
                </div>
                <div class="col-flex-center">
                    <input type="submit" value="Sign In" class="login-button" />
                </div>

                </form>
                <div class="flex-center-box register-navigate-text">
                    <p>Need for an account? <a href="<?php echo base_url() ?>register">Register here</a></p>
                </div>
            </div>

            <?php 
        if ($this->session->flashdata('login_failed')) {
            echo '<div class="error">Invalid combination of username and passwords.</div>';
        }
        ?>
        </div>
    </div>



</body>

</html>