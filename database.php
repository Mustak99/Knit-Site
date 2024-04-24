<?php

function connection()
{
    $connection = mysqli_connect("localhost", "root", "", "knitsite");
    return $connection;
}
if (mysqli_errno(connection())) {
    die("Connection Doesn't took place");
}
function closeConnection($connection)
{
    mysqli_close($connection);
}
?>