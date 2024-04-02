<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
</head>

<body>
    <div class="container-wrapper">
        <div class="left-navigation-bar">
            <div class="col-flex-center navigation-bar">
                <div class="empty-space"></div>
                <a href="<?php echo base_url() ?>user" class="navigation-bar-pill">Login</a>
                <a href="<?php echo base_url() ?>addcontact" class="navigation-bar-pill">Register</a>
            </div>
        </div>
        <div class="center-container">
            <div class="flex-center-box title-box">
                <h2 class="w-100">Phone-Book</h2>
            </div>
            <div class="flex-center-box welcome-text">
                <p>Register an account</p>
            </div>
            <!-- Succeed -->
            <?php 
                if($this->session->flashdata('register_success')){
                    echo 
                    "<div class=\"col-flex-center\">
                    <div class=\"alert-success\">
                        <img src=\"".base_url('uploads/success_icon.png')."\" alt=\"\" width=\"20px\">
                        <p>Successfully registered, click <a href=\"".base_url()."login\">here</a> back to login page.</p>
                    </div>
                </div>";
                }
            ?>
            <!-- Validation error -->
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
            <!-- validation sucess, database/model error, run this block of codes -->
            <?php 
                if($this->session->flashdata('register_failed')){
                    echo "<div class=\"col-flex-center\">
                    <div class=\"alert-danger-2\">
                        <img src=\" ". base_url('uploads/cancel_icon.png') ." \" alt=\"\" width=\"20px\">
                        <p>Register failed due to error occured in server. Please try again later.</p>
                    </div>
                </div>";
                }
            ?>
            <div class="col-flex-center">
                <?php echo form_open('register', array('class' => 'register-form')); ?>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Username</h5>
                    <input type="text" name="username" class="w-100" />
                </div>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Password</h5>
                    <input type="password" name="password" class="w-100" />
                </div>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Password Confirm</h5>
                    <input type="password" name="passconf" class="w-100" />
                </div>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Email Address</h5>
                    <input type="text" name="email" class="w-100" />
                </div>
                <div class="col-flex-center">
                    <input type="submit" value="Register" class="register-button" />
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>