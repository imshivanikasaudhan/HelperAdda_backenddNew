<?php
// Include necessary configuration and database connection files
require_once('config.php');
require_once('ast_backend');
// Start a session (if not already started)
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the form
    $fname = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $organization = $_POST['organization'];
    $phone_number = $_POST['phone_number'];
    $state = $_POST['state'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
    // Add more fields as needed
    // Validate and sanitize user input (to prevent SQL injection and other security issues)
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $email = mysqli_real_escape_string($conn, $email);
    $organization = mysqli_real_escape_string($conn, $organization );
    $phone_number= mysqli_real_escape_string($conn, $phone_number);
    $state = mysqli_real_escape_string($conn, $state );
    // Add more validation and sanitization as needed
    // Get the user's ID from the session or another source
    $user_id = $_SESSION['user_id']; // Modify this based on your authentication system
    // Update the user's profile in the database
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $user_id";
    if (mysqli_query($conn, $sql)) {
        // Profile updated successfully
        // Redirect the user to their updated profile page or another appropriate page
        header("Location: profile.php");
        exit();
    } else {
        // Handle the error (e.g., display an error message)
        echo "Error updating profile: " . mysqli_error($conn);
    }
    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle cases where the form was not submitted via POST
    // Redirect or display an error message as needed
}
?>