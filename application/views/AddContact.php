<html>

<head>
    <title>Home page</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
</head>

<body>
    <div class="center-container">
        <div class="flex-center-box title-box">
            <a href="<?php echo base_url()?>user" class="home-navigate">
                <h2 class="w-100">Phone-Book</h2>
            </a>
        </div>
        <div class="flex-center-box welcome-text">
            <p>Add new contact</p>
        </div>
        <div class="col-flex-center">
            <?php echo validation_errors(); ?>

            <?php echo form_open('addcontact', array('class' => 'add-contact-form')); ?>
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
                <input type="file" name="image" />
            </div>

            <div><input type="submit" value="Submit" /></div>

            </form>
        </div>
    </div>
</body>


</html>