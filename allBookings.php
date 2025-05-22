<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/CSS/style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <title>Admin_Dashboard</title>

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

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #444;
            text-align: center;
        }

        th {
            background-color: #f2b632;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Trust</a></li>
            <li><a href="allBookings.php">All Booking</a></li>
            <li><button class="btnLogout"><a href="index.php">Logout</a></button></li>
        </ul>
    </nav>
    <div class="hero-text">
        <h2>श्री गजानन महाराज</h2>
        <h4>DARSHAN PASSES</h4>
    </div>
    <?php
    include 'include/connection.php';

    $query = "SELECT 
            users.name, 
            users.id_number, 
            bookings.booking_date, 
            bookings.time_slot
          FROM bookings
          INNER JOIN users ON bookings.user_id = users.id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    ?>

    <div class="hero-text">


        <table id="bookingTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>ID Number</th>
            <th>Booking Date</th>
            <th>Time Slot</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['id_number']); ?></td>
                <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                <td><?php echo htmlspecialchars($row['time_slot']); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

    </div>

    <script>
        $(document).ready(function() {
            $('#bookingTable').DataTable({
                order: [
                    [2, 'asc']
                ], 
                columnDefs: [{
                    targets: 2, 
                    type: 'date'
                }]
            });
        });
    </script>

    <?php include('include/footer.php') ?>
</body>

</html>