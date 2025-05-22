<?php
// available_pass_DB.php

include 'include/connection.php';

function getAvailablePasses($conn, $date) {
    $total_passes = 100;
    if (!$date) return $total_passes;

    $query = "SELECT COUNT(*) as total FROM bookings WHERE booking_date = ?";
    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) return $total_passes;

    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return max(0, $total_passes - $total);
}
?>
