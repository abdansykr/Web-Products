<?php

include('connec.php'); // Include the database connection

// Get username and password from form submission
$username = $_POST['username'];
$password = $_POST['pass']; 

if (empty($username) || empty($password)) { 
  echo "<script>alert('Username atau Password tidak boleh kosong');</script>";
  echo "<script>window.location.replace('login.html');</script>";
  exit();
}

// Prepare SQL statement with parameterized query to prevent SQL injection
$sql = "SELECT * FROM akun WHERE BINARY username = ? AND  BINARY pass = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username,$password); 

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
    header('Location: admin.php'); // Redirect to admin page
  } else {
    header('Location: index.html'); // Redirect to user page
  }
}else {
  // Password incorrect, display error message using JavaScript alert
  echo "<script>alert('Username atau Password salah.');</script>";
  echo "<script>window.location.replace('login.html');</script>";
  exit();
}

// Close connections
$stmt->close();
$conn->close();

?>