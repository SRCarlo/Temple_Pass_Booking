<?php
include 'include/connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['full_name'];
  $age = $_POST['age'];
  $aadhar = $_POST['aadhar'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $date = $_POST['booking_date'];
  $slot = $_POST['time_slot'];

  // Prepare and bind for users table
  $query1 = "INSERT INTO users (name, age, id_proof_type, id_number, phone, email) VALUES (?, ?, 'Aadhar', ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query1);
  if ($stmt === false) {
      die('Prepare failed: ' . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "sisss", $name, $age, $aadhar, $phone, $email);
  mysqli_stmt_execute($stmt);

  // Get last inserted user id
  $user_id = mysqli_insert_id($conn);

  mysqli_stmt_close($stmt);

  // Prepare and bind for bookings table
  $query2 = "INSERT INTO bookings (user_id, booking_date, time_slot, members) VALUES (?, ?, ?, 1)";
  $stmt2 = mysqli_prepare($conn, $query2);
  if ($stmt2 === false) {
      die('Prepare failed: ' . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt2, "iss", $user_id, $date, $slot);
  mysqli_stmt_execute($stmt2);

  // Get last inserted booking id
  $booking_id = mysqli_insert_id($conn);

  mysqli_stmt_close($stmt2);

  // Redirect to pass_generate.php with booking_id
  header("Location: pass_generate.php?booking_id=$booking_id");
  exit;
}
?>
