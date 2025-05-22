<?php
$date = $_GET['date'];
$slot = $_GET['slot'];
?>
<form action="generate_pass.php" method="post">
  <h3>Pass Details</h3>
  <input type="hidden" name="date" value="<?= $date ?>">
  <input type="hidden" name="slot" value="<?= $slot ?>">
  Date: <?= $date ?><br>
  Time: <?= $slot ?><br>
  Members: <input type="number" name="members" value="1" min="1" max="5"><br>

  <h3>User Details</h3>
  Name: <input type="text" name="name"><br>
  Age: <input type="number" name="age"><br>
  Gender: <select name="gender"><option>Male</option><option>Female</option></select><br>
  ID Proof: <select name="id_proof"><option>Aadhar</option><option>PAN</option></select><br>
  ID Number: <input type="text" name="id_number"><br>
  Phone: <input type="text" name="phone"><br>
  Email: <input type="email" name="email"><br>
  <button type="submit">Continue</button>
</form>
