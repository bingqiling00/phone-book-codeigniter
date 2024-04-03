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
                <p>Delete contact</p>
            </div>
            <div class="col-flex-center">
                <?php echo form_open('deletecontact/do_delete/'.$contact['id'], array('class' => 'delete-contact-form')); ?>

                <div class="w-100 form-fieldset edit-contact-img-container">
                    <img src="<?php echo base_url($contact['image_path']) ?>" alt="" class="edit-contact-img">
                </div>


                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Contact name</h5>
                    <input type="text" name="name" placeholder="John" class="w-100"
                        value="<?php echo $contact['contact_name'] ?>" disabled />
                </div>


                <div class="w-100 form-fieldset">
                    <h5 class="form-title">Contact number</h5>
                    <input type="number" name="number" placeholder="0123456789" class="w-100"
                        value="<?php echo $contact['contact_number'] ?>" disabled />
                </div>

                <!-- send data to post form -->
                <input type="text" value="<?php echo $userdata['id'] ?>" name="uid" hidden>
                <input type="text" value="<?php echo $contact['id'] ?>" name="cid" hidden>

                <div class="flex-center-box">
                    <input type="submit" value="Delete contact" class="delete-contact-submit-button"
                        onclick="return confirm('Are you sure you want to delete this contact?');" />
                </div>

                </form>
            </div>
        </div>
    </div>

</body>


</html>