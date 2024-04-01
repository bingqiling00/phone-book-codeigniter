<html>

<head>
    <title>Register</title>
</head>

<body>

    <?php echo validation_errors(); ?>

    <?php echo form_open('register'); ?>

    <h5>Username</h5>
    <input type="text" name="username" value="" />

    <h5>Password</h5>
    <input type="text" name="password" value="" />

    <h5>Password Confirm</h5>
    <input type="text" name="passconf" value="" />

    <h5>Email Address</h5>
    <input type="text" name="email" value="" size="100" />

    <div><input type="submit" value="Submit" /></div>

    </form>

</body>

</html>