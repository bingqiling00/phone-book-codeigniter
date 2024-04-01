<html>

<head>
    <title>Home page</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
</head>

<body>
    <div class="center-container">
        <div class="flex-center-box title-box">
            <h1 class="w-100">Phone-Book</h1>
        </div>
        <div class="flex-center-box welcome-text">
            <p>Welcome back, <?php echo $userdata['username'] ?></p>
        </div>
        <div class="col-flex-center">
            <div class="flex-center-box w-100"><a href="<?php echo base_url() ?>index.php/addcontact"
                    class="function-box w-100">Add new
                    Contact</a></div>
            <div class="flex-center-box w-100"><a href="" class="function-box w-100">Contact List</a></div>
        </div>
        <div class="flex-center-box">
            <a href="<?php base_url() ?>user/logout" class="logout-button w-100">Logout</a>
        </div>


    </div>
</body>

</html>