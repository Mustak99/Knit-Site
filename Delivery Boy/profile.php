<?php
include_once("commonMethod.php");

if (isset($_SESSION["user_id"])) {
	$user_id = $_SESSION["user_id"];
} else {
	// Redirect to login page if user is not logged in
	header("Location: login.php");
	exit();
}

$name = getFullNameByUserId(connection(), $user_id);

// Fetch user data from the database
$userData = getUserData(connection(), $user_id);

function getUserData($connection, $user_id)
{
	$query = "SELECT * FROM `delivery_boys` WHERE `id` = $user_id";
	$result = mysqli_query($connection, $query);

	if ($result && mysqli_num_rows($result) > 0) {
		return mysqli_fetch_assoc($result);
	}

	return null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Update Profile Form">
	<meta name="author" content="Your Name">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<title>Update Profile</title>

	<style>
		/* body {
			font-family: 'Inter', sans-serif;
			background-color: #f8f9fa;
		} */

		/* .wrapper {
			display: flex;
		} */

		/* .sidebar {
			width: 250px;
			background-color: #343a40;
			color: #ffffff;
			padding: 20px;
		} */

		/* .main {
			flex: 1;
			padding: 20px;
		} */

		/* .content {
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		} */

		/* h3 {
			color: #007bff;
		} */

		input[type="text"],
		input[type="date"],
		select {
			width: 100%;
			padding: 10px;
			margin: 5px 0;
			border: 1px solid #ced4da;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="radio"] {
			margin-right: 5px;
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #ffffff;
			padding: 10px 15px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #0056b3;
		}

		/* span {
			display: block;
			margin-top: 5px;
		} */

		span.error {
			color: red;
		}
	</style>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			// Check if the URL contains the 'update' parameter
			const urlParams = new URLSearchParams(window.location.search);
			const updateStatus = urlParams.get('update');

			// Display a dialog based on the 'update' parameter
			if (updateStatus === 'success') {
				alert('Profile updated successfully!');
			} else if (updateStatus === 'error') {
				alert('Failed to update profile. Please try again.');
			}
		});
	</script>
</head>

<body>
	<div class="wrapper">
		<?php include 'sidebar.php'; ?>
		<div class="main">
			<?php include 'head.php'; ?>

			<main class="content">
				<form name="updateProfileProcess.php" method="post" action="updateProfileProcess.php"
					onsubmit="return validateForm()">
					<h3>Personal Information:</h3>
					Full Name: <input type="text" name="full_name" onfocus="clearError('full_name')"
						value="<?= $userData['full_name'] ?>"><br>
					<span id="full_name_error" style="color: red;"></span><br>

					<h3>Contact Information:</h3>
					Phone Number: <input type="text" name="phone_number" onfocus="clearError('phone_number')"
						value="<?= $userData['phone_number'] ?>"><br>
					<span id="phone_number_error" style="color: red;"></span><br>

					Email Address: <input type="text" name="email" onfocus="clearError('email')"
						value="<?= $userData['email'] ?>"><br>
					<span id="email_error" style="color: red;"></span><br>

					<h3>Address:</h3>
					Street Address: <input type="text" name="street_address" onfocus="clearError('street_address')"
						value="<?= $userData['street_address'] ?>"><br>
					<span id="street_address_error" style="color: red;"></span><br>

					City: <input type="text" name="city" onfocus="clearError('city')"
						value="<?= $userData['city'] ?>"><br>
					<span id="city_error" style="color: red;"></span><br>

					State: <input type="text" name="state" onfocus="clearError('state')"
						value="<?= $userData['state'] ?>"><br>
					<span id="state_error" style="color: red;"></span><br>

					ZIP Code: <input type="text" name="zip_code" onfocus="clearError('zip_code')"
						value="<?= $userData['zip_code'] ?>"><br>
					<span id="zip_code_error" style="color: red;"></span><br>

					<h3>Date of Birth:</h3>
					<input type="date" name="date_of_birth" onfocus="clearError('date_of_birth')"
						value="<?= $userData['date_of_birth'] ?>"><br>
					<span id="date_of_birth_error" style="color: red;"></span><br>

					<h3>Gender:</h3>
					<input type="radio" name="gender" value="Male" <?= $userData['gender'] === 'Male' ? 'checked' : '' ?>>
					Male
					<input type="radio" name="gender" value="Female" <?= $userData['gender'] === 'Female' ? 'checked' : '' ?>> Female
					<input type="radio" name="gender" value="Other" <?= $userData['gender'] === 'Other' ? 'checked' : '' ?>> Other<br><br>

					<h3>Driver's License Information:</h3>
					Driver's License Number: <input type="text" name="license_number"
						onfocus="clearError('license_number')" value="<?= $userData['license_number'] ?>"><br>
					<span id="license_number_error" style="color: red;"></span><br>

					Issuing State: <input type="text" name="issuing_state" onfocus="clearError('issuing_state')"
						value="<?= $userData['issuing_state'] ?>"><br>
					<span id="issuing_state_error" style="color: red;"></span><br>

					Expiration Date: <input type="date" name="expiration_date" onfocus="clearError('expiration_date')"
						value="<?= $userData['expiration_date'] ?>"><br>
					<span id="expiration_date_error" style="color: red;"></span><br>

					<h3>Vehicle Information:</h3>
					Vehicle Type:
					<select name="vehicle_type" onfocus="clearError('vehicle_type')">
						<option value="">Select</option>
						<option value="Car" <?= $userData['vehicle_type'] === 'Car' ? 'selected' : '' ?>>Car</option>
						<option value="Motorcycle" <?= $userData['vehicle_type'] === 'Motorcycle' ? 'selected' : '' ?>>
							Motorcycle</option>
						<option value="Bicycle" <?= $userData['vehicle_type'] === 'Bicycle' ? 'selected' : '' ?>>Bicycle
						</option>
						<option value="Other" <?= $userData['vehicle_type'] === 'Other' ? 'selected' : '' ?>>Other</option>
					</select><br>
					<span id="vehicle_type_error" style="color: red;"></span><br>

					<input type="submit" name="submit" value="Update Profile">
				</form>
			</main>

			<footer class="footer">
			</footer>
		</div>
	</div>
</body>

</html>