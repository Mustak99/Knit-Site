<?php
session_start();
?>
<?php

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}

include_once("database.php");
$con = connection();

// fetch user name 
function getFullNameByUserId($con, $user_id)
{
    $name = '';
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT full_name FROM delivery_boys WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['full_name'];
    }

    $stmt->close();
    return $name;
}

// if (isset($user_id)) {
//     $name = getFullNameByUserId($con, $user_id);
//     echo $name;
// } else {
//     echo "User ID is not set.";
// }
?>
