<?php

include('connec.php');  // Include the database connection

// Get username and password from form submission
$username = $_POST['username'];
$password= $_POST['pass'];

// Prepare SQL statement with parameterized query to prevent SQL injection
$sql = "SELECT * FROM akun WHERE username = ? AND pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password); // Bind parameters

// Execute the statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if username and password match
if ($result->num_rows > 0) {
  // User found, check access level
  $row = $result->fetch_assoc();
  $hak_akses = $row['hak-akses']; // Replace 'access_level' with your column name

  // Based on access level, redirect to appropriate page (replace with your logic)
  if ($hak_akses == "admin") {
    header('Location: admin.html'); // Redirect to admin page
  } else {
    header('Location: index.html'); // Redirect to user page
  }
} else {
  // Login failed, display error message
  echo "Invalid username or password";
}

// Close connections
$stmt->close();
$conn->close();

?>
