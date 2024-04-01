<html>

<head>
    <title>Login</title>
</head>

<body>

    <?php echo validation_errors(); ?>
    <?php echo form_open('login'); ?>

    <h5>Username</h5>
    <input type="text" name="username" value="" size="30" />

    <h5>Password</h5>
    <input type="text" name="password" value="" size="100" />

    <div><input type="submit" value="Submit" /></div>

    </form>
    <?php 
        if ($this->session->flashdata('login_failed')) {
            echo '<div class="error">Invalid combination of username and passwords.</div>';
        }
    ?>
</body>

</html>