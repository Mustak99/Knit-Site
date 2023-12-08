<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    // Get the login_status value from the POST request
    $loginStatus = trim($_POST['login_status']);
    $user_id = 0;

    if (isset($_SESSION["user_id"])) {
        $user_id = trim($_SESSION["user_id"]);
    } else {
        die;
    }

    $conn = new mysqli('localhost', 'root', '', 'knitsite');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Modify the update query to set login_status to 1 when the toggle is on
    $sql = "UPDATE delivery_boys SET login_status = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $loginStatus, $user_id);
        $stmt->execute();
        $stmt->close();
    }


    if ($loginStatus == 0) {
        echo '<div class="p-4 text-white py-0">
        <p class="pt-4">Offline</p>
    </div>
    <div class="toggle-switch p-2 py-0">
        <label class="switch">
            <input type="checkbox" id="update-status-toogle" onchange="changeStatus(1);">
            <span class="slider"></span>
        </label>
    </div>';
    } else {
        echo '<div class="p-4 text-white py-0">
        <p class="pt-4">Online</p>
    </div>
    <div class="toggle-switch p-2 py-0">
        <label class="switch">
            <input type="checkbox" id="update-status-toogle" checked onchange="changeStatus(0);">
            <span class="slider"></span>
        </label>
    </div>';
    }

    $conn->close();
} else {
    echo "Invalid request method";
}
?>