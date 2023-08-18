<?php

if (isset($_POST["EnterNewPassword"]) && isset($_POST["confirmPassword"])) {
    session_start();
    $email_id = trim($_SESSION["forgotUserEmailIdPassChange"]);
    $new_password = md5(trim($_POST["EnterNewPassword"]));

    unset($_SESSION["forgotUserEmailIdPassChange"]);

    include_once 'database.php';
    $connection = connection(connection());

    $sql = "UPDATE customerregistration SET password = ? WHERE EmailAddress = ?";
    $sql2 = "UPDATE sellerregistration SET password = ? WHERE EmailAddress = ?";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("ss", $pwd, $email);
        $pwd = $new_password;
        $email = $email_id;
        $stmt->execute();
    }

    $stmt->close();

    if ($stmt = $connection->prepare($sql2)) {
        $stmt->bind_param("ss", $pwd, $email);
        $pwd = $new_password;
        $email = $email_id;
        $stmt->execute();
    }

    $stmt->close();
    $connection->close();
    session_destroy();

    header("Location: login.php");
} else {
    header("Location: index.php");
}



?>