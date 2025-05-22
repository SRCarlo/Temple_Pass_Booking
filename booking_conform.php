<?php
$date = $_GET['booking_date'];
include 'db.php';

$slots = ['8-10 AM', '10-12 PM', '2-4 PM', '4-6 PM'];
foreach ($slots as $slot) {
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM bookings WHERE booking_date=? AND time_slot=?");
  $stmt->execute([$date, $slot]);
  $count = $stmt->fetchColumn();
  $remaining = 25 - $count;
  echo "<div>
          <h3>$slot - $remaining passes remaining</h3>
          <a href='confirm.php?date=$date&slot=$slot'>Book Now</a>
        </div>";
}
?>
