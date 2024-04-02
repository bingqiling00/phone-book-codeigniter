<html>

<head>
    <title>Add new contact</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
</head>

<body>
    <div class="container-wrapper">
        <div class="left-navigation-bar">
            <div class="col-flex-center navigation-bar">
                <img src="<?php echo base_url('uploads/blank-profile-pic.png') ?>" alt="" width="100px">
                <a href="<?php echo base_url() ?>user" class="navigation-bar-pill">Home page</a>
                <a href="<?php echo base_url() ?>addcontact" class="navigation-bar-pill">Add new contact</a>
                <a href="<?php echo base_url() ?>contactlist" class="navigation-bar-pill">Contact list</a>
                <a href="<?php echo base_url() ?>user/logout" class="navigation-bar-pill">Logout</a>
            </div>
        </div>
        <div class="center-container">
            <div class="flex-center-box title-box">
                <a href="<?php echo base_url()?>user" class="home-navigate top-logo">
                    <h2 class="w-100">Phone-Book</h2>
                </a>
            </div>
            <div class="flex-center-box welcome-text">
                <p>Add new contact</p>
            </div>
            <!-- Succeed -->
            <?php 
                if($this->session->flashdata('display_success')){
                    echo 
                    "<div class=\"col-flex-center\">
                    <div class=\"alert-success\">
                        <img src=\"".base_url('uploads/success_icon.png')."\" alt=\"\" width=\"20px\">
                        <p>Successfully added new contact</p>
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
                if($this->session->flashdata('database_model_failure')){
                    echo "<div class=\"col-flex-center\">
                    <div class=\"alert-danger-2\">
                        <img src=\" ". base_url('uploads/cancel_icon.png') ." \" alt=\"\" width=\"20px\">
                        <p>Error occured to database. Please try again later.</p>
                    </div>
                </div>";
                }
            ?>
            <!-- image file upload error, run this block of codes -->
            <?php 
                if ($errors = $this->session->flashdata('image_file_error')) {
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

            <div class="col-flex-center">
                <?php echo form_open_multipart('addcontact', array('class' => 'add-contact-form')); ?>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Contact name</h5>
                    <input type="text" name="name" placeholder="John" class="w-100" />
                </div>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Contact number</h5>
                    <input type="number" name="number" placeholder="0123456789" class="w-100" />
                </div>
                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Upload an images (Optional)</h5>
                    <input type="file" name="image" accept="image/*" />
                </div>
                <input type=" text" value="<?php echo $userdata['id'] ?>" name="uid" hidden>

                <div class="flex-center-box">
                    <input type="submit" value="Create new contact" class="add-contact-submit-button" />
                </div>

                </form>
            </div>
        </div>
    </div>

</body>


</html>