<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script type="text/javascript" src="../scripts/register.js">
</script>
</head>
<body>
    <div style="text-align: center;">
        <img src="../images/photo_club_logo.png" alt="Logo" style="width:150px;height:150px;">
    </div>
    <form method="post" onSubmit="return validateRegistration(this)">
        <fieldset>
            <legend>Photography Club Account Registration</legend>
            <label for="first_name">First Name</label>
            <br>
            <input type="text" id="first_name" name="first_name" value="" size="50"><br>
            <label for="last_name">Last Name</label>
            <br>
            <input type="text" id="last_name" name="last_name" value="" size="50"><br>
            <label for="email">Email</label>
            <br>
            <input type="text" id="email" name="email" value="" size="50"><br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" value="" size="50"><br>
            <p><i><?= $message; ?></i></p>
            <hr>
            <input type="submit" value="Register">&nbsp;
        </fieldset>
    </form>
    <?php
    echo '<p>' . $message . '</p>';
    ?>
</body>
</html>
