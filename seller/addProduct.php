<?php include_once 'sellerHeader.php'; ?>
<!doctype html>
<html lang="en">
<head>    
  <style>
    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
  <script>
    function validateForm() {
      // Reset previous error messages
      clearErrorMessages();

      // Initialize error flag
      var hasErrors = false;

      // Validate shoe name
      var shoeName = document.getElementById("name").value;
      var shoeNameRegex = /^[a-zA-Z\s]+$/;
      if (!shoeNameRegex.test(shoeName)) {
        displayErrorMessage("name", "Invalid name. Only alphabets are allowed.");
        hasErrors = true;
      }

      // Validate description
      var description = document.getElementById("description").value;
      if (description.length > 150) {
        displayErrorMessage("description", "Description cannot exceed 150 characters.");
        hasErrors = true;
      }

      // Validate brand
      var brand = document.getElementById("brand").value;
      var brandRegex = /^[a-zA-Z\s]+$/;
      if (!brandRegex.test(brand)) {
        displayErrorMessage("brand", "Invalid brand name. Only alphabets are allowed.");
        hasErrors = true;
      }

      // If there are errors, prevent form submission
      if (hasErrors) {
        return false;
      }

      return true;
    }

    // Function to display error message below a field
    function displayErrorMessage(fieldId, message) {
      var field = document.getElementById(fieldId);
      var errorContainer = document.createElement("div");
      errorContainer.classList.add("error-message");
      errorContainer.textContent = message;
      field.parentNode.appendChild(errorContainer);
    }

    // Function to clear all error messages
    function clearErrorMessages() {
      var errorMessages = document.getElementsByClassName("error-message");
      while (errorMessages.length > 0) {
        errorMessages[0].remove();
      }
    }
  </script>
<div class="row" >
  <div class="col-md-12">
    <div class="p-4 shadow rounded">
      <h2 class="text-center mb-4">Upload Product</h2>
      <form action="uploadProcessing.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="row mb-3">
          <div class="col-md-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label for="brand" class="form-label">Brand:</label>
            <input type="text" id="brand" name="brand" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label for="category" class="form-label">Category:</label>
            <select id="category" name="category"class="form-control"   required>
              <option value="Mens">Men's</option>
              <option value="Womens">Women's</option>
              <option value="Childrens">Children's</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" required>
          </div>
        </div>
        <div class="row mb-3">
          
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description:</label>
          <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image (JPEG, max 2MB):</label>
          <input type="file" id="image" name="image" accept=".jpg, .jpeg" class="form-control" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
