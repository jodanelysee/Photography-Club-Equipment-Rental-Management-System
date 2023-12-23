<html>
<head>
    <title>Login</title>
    <script type="text/javascript" src="../scripts/login.js">
</script>
</head>
    <body>
        <div style="text-align: center;">
            <img src="../images/photo_club_logo.png" alt="Logo" style="width:150px;height:150px;">
        </div>
        <form method="post" action="login.php?action=login" onSubmit="return validateLogin(this)">
            <fieldset>
                <legend>Photography Club Account 
                    Login</legend>
                <label for="email">Email</label>
                <br>
                <input type="text" id="email" name="email" value="" size="50"><br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" value="" size="50"><br>
                <p><i>
                        <?= $message; ?>
                    </i></p>
                <hr>
                <input type="submit" value="Login">&nbsp;
            </fieldset>
        </form>
        <br style="width:40vw;" />
        <button> <a href="/controllers/register.php"> Register for an account</a></button>
    </body>
</html>