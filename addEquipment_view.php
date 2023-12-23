<!DOCTYPE html>
<html>
<head>
    <title>Add Equipment</title>
</head>
<body>
    <div style="text-align: center;">
        <img src="../images/photo_club_logo.png" alt="Logo" style="width:150px;height:150px;">
        <form method="post">
    <input name="sign_out" type="submit" value="Sign Out">&nbsp;
    </form>
    </div>
    <form method="post" action="addEquipment.php?action=add">
        <fieldset>
            <legend>Add Equipment:</legend>
            <label for="name">Name of Equipment</label>
            <br>
            <input type="text" id="equipmentName" name="name" value="" size="50"><br>
            <label for="image_url">Image URL</label>
            <br>
            <input type="image URL" name="image_url" value="" size="50"><br>
            <p><i><?= $message; ?></i></p>
            <hr>
            <input type="submit" value="Add Equipment">&nbsp;
        </fieldset>
    </form>
</body>
</html>
