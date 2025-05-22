<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/CSS/style.css">
    <title></title>
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

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .form-row div {
            flex: 1;
            min-width: 200px;
        }

        .form-row label {
            display: block;
            margin-bottom: 5px;
        }

        .form-row input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .hero-text form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #1abc9c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hero-text form button:hover {
            background-color: #16a085;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include('include/header.php'); ?>
    <!-- header -->


    <div class="hero-text">
        <h2>श्री गजानन महाराज</h2>
        <h4>DARSHAN PASSES</h4>
    </div>
    <div class="hero-text">
        <?php
        include 'available_pass_DB.php';
        $date = $_GET['booking_date'] ?? null;
        $available_passes = getAvailablePasses($conn, $date);
        ?>

        <h2>Devotee Registration</h2>

        <div style="position: absolute; right:40px; top:250px;  color: red; padding: 10px 20px; border-radius: 8px;">
            <?php if ($date): ?>
                <strong>Available Passes:</strong> <?php echo $available_passes; ?>
            <?php else: ?>
                <strong>Select date to see available passes</strong>
            <?php endif; ?>
        </div>


        <?php
        $date = isset($_GET['booking_date']) ? $_GET['booking_date'] : '';
        $slot = isset($_GET['time_slot']) ? $_GET['time_slot'] : '';
        ?>

        <form method="post" action="booking_Reg_DB.php">

            <div class="form-row">
                <div>
                    <label>Full Name:</label>
                    <input type="text" name="full_name" required>
                </div>
            </div>


            <div class="form-row">
                <div>
                    <label>Age:</label>
                    <input type="number" name="age" min="1" max="120" required>
                </div>
                <div>
                    <label>Aadhar Number:</label>
                    <input type="text" name="aadhar" pattern="\d{12}" required placeholder="12-digit Aadhar">
                </div>
            </div>


            <div class="form-row">
                <div>
                    <label>Phone Number:</label>
                    <input type="text" name="phone" pattern="\d{10}" required placeholder="10-digit Phone">
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email">
                </div>
            </div>


            <div class="form-row">
                <div>
                    <label>Selected Date:</label>
                    <input type="text" name="booking_date" value="<?php echo htmlspecialchars($date); ?>" readonly>
                </div>
                <div>
                    <label>Selected Time Slot:</label>
                    <input type="text" name="time_slot" value="<?php echo htmlspecialchars($slot); ?>" readonly>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-row" style="justify-content: center;">
                <button type="submit">Book Now</button>
            </div>
        </form>

    </div>

    <!-- Footer -->
    <?php include('include/footer.php'); ?>
    <!-- Footer -->

</body>

</html>