<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/styles/equipment.css">
    <title>Photography Equipment</title>
</head>
<body>
<div style="text-align: center;">
            <img src="../images/photo_club_logo.png" alt="Logo" style="width:150px;height:150px;">
    <h1>Equipment For Rent</h1>  
    <a href="/controllers/addEquipment.php"><button>Add equipment</button></a>
    <form method="post">
    <input name="sign_out" type="submit" value="Sign Out">&nbsp;
    </form>
    </div>
    
    <hr/>
    <div id = "EquipmentCardContainer">
<?php

foreach ($equipment_list as $equipment)  {
    echo '<div class="EquipmentCard">';
    $member_id = $equipment['members_id'];
    echo '<img class="EquipmentImage" src="' . $equipment['image_url'] . '"/>';
    echo '<p>' . $equipment['name'] . '</p>';
    echo '<form method="post">';
    if ($member_id !== $logged_in_member_id && !$equipment['status']) {
        echo '<input type="text" name="equipment_id" value="' . $equipment['equipment_id'] . '" style="display:none">';
        echo '<input type="submit" name="borrow" value="Borrow">';
    } else if ($member_id === $logged_in_member_id && $equipment['status']) {
        echo '<input type="text" name="equipment_id" value="' . $equipment['equipment_id'] . '" style="display:none">';
        echo '<input type="submit" name="return" value="Mark As Returned">';
    } else if ($member_id === $logged_in_member_id && !$equipment['status']) {
        echo '<input type="text" name="equipment_id" value="' . $equipment['equipment_id'] . '" style="display:none">';
        echo '<input type="submit" name="delete" value="Remove Item">';
    } else if ($member_id !==$logged_in_member_id && $equipment['status']) {
        print("(Currently Being Borrowed)");
    }
    echo '</form>';
    echo '</div>';
}
?>
    </div>
</body>
</html>