<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Booking</title>

    <style>
        .hero-text {
            text-align: center;
            width: 95%;
            margin-left: 30px;
            background-color: rgba(184, 175, 175, 0.4);
            padding: 5px;
            border-radius: 10px;
            font-family: 'Segoe UI', sans-serif;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .hero-text h4 {
            color: orange;
        }
    </style>

</head>

<body>

    <!-- header -->
    <?php include('include/header.php'); ?>
    <!-- header -->

    <div class="hero-text">
        <h2>श्री गजानन महाराज</h2>
        <h4>DARSHAN PASS</h4>
    </div>
   <div class="hero-text">
    
  <h2>Select a Date and Time Slot</h2>
  <form method="get" action="booking_Reg.php">
    <label for="booking_date">Date:</label><br>
    <input type="date" name="booking_date" id="booking_date" required><br><br>

    <label for="time_slot">Time Slot:</label><br>
    <select name="time_slot" id="time_slot" required>
      <option value="">-- Select Time Slot --</option>
      <option value="8-10 AM">8:00 AM - 10:00 AM</option>
      <option value="10-12 PM">10:00 AM - 12:00 PM</option>
      <option value="2-4 PM">2:00 PM - 4:00 PM</option>
      <option value="4-6 PM">4:00 PM - 6:00 PM</option>
    </select><br><br>

    <button type="submit">Check Slots</button>
  </form>
</div>


    <!-- Footer -->
    <?php include('include/footer.php'); ?>
    <!-- Footer -->

</body>

</html>