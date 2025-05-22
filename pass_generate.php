<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <title>Shri Sant Gajanan Maharaj</title>
    <link rel="stylesheet" href="include/CSS/style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f2f2;

        }

        .pass-container {

            height: 300px;
            width: 700px;
            margin: auto;
            margin-top: 45px;

            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pass-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .pass-header h2 {
            margin: 0;
            color: #d35400;
        }

        .reg-no {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .pass-title {
            text-align: center;
            font-size: 24px;
            color: green;
            font-weight: bold;
            margin: 15px 0;
            border-top: 1px dashed #ccc;
            border-bottom: 1px dashed #ccc;
            padding: 10px 0;
        }

        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: flex-start;
        }

        .info {
            flex: 1;
        }

        .info p {
            margin: 8px 0;
            font-size: 16px;
        }

        .god-image {
            width: 160px;
            height: 160px;
            border-radius: 50%;

            margin-left: 20px;
        }

        .footer-msg {
            text-align: center;
            margin-top: 30px;
            font-weight: bold;
            color: #555;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include('include/header.php'); ?>
    <!-- header -->


    <?php
    include 'include/connection.php';

    if (!isset($_GET['booking_id'])) {
        echo "Booking ID not provided!";
        exit;
    }

    $booking_id = $_GET['booking_id'];

    // Fetch booking and user details using JOIN
    $query = "
    SELECT 
        u.name, u.age, u.id_number, b.booking_date, b.time_slot 
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    WHERE b.booking_id = ?
";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $booking_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $name, $age, $aadhar, $booking_date, $time_slot);

    if (mysqli_stmt_fetch($stmt)) {
        // Success
    } else {
        echo "No record found!";
        exit;
    }
    mysqli_stmt_close($stmt);
    ?>


    <div class="pass-container">
        <div class="pass-header">
            <h2>श्री गजानन महाराज संस्थान, शेगाव</h2>
        </div>
        <div class="reg-no">नोंदणी क्र.: 000000</div>
        <div class="pass-title">Darshan Pass</div>

        <div class="details">
            <div class="info">
                <p><strong>Full Name:</strong> <?php echo htmlspecialchars($name); ?></p>
                <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
                <p><strong>Aadhar Number:</strong> <?php echo htmlspecialchars($aadhar); ?></p>
                <p><strong>Booking Date:</strong> <?php echo htmlspecialchars($booking_date); ?></p>
                <p><strong>Time Slot:</strong> <?php echo htmlspecialchars($time_slot); ?></p>
            </div>
            <img src="include/img/for_pass.jpg" alt="Shri Gajanan Maharaj" class="god-image">
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <button onclick="downloadPDF()">Download as PDF</button>
            <button onclick="downloadImage()">Download as Image</button>
        </div>

        <div class="footer-msg">
            कृपया वेळेवर मंदिरात हजर राहा. – संस्थान प्रशासन
        </div>
    </div>

    <script>
        function downloadPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const pass = document.querySelector('.pass-container');

            html2canvas(pass).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);
                pdf.save('Darshan_Pass.pdf');
            });
        }

        function downloadImage() {
            const pass = document.querySelector('.pass-container');
            html2canvas(pass).then(canvas => {
                const link = document.createElement('a');
                link.download = 'Darshan_Pass.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        }
    </script>


    <!-- Footer -->
    <div style="margin-top: 100px;">
        <?php include('include/footer.php'); ?>
    </div>
    <!-- Footer -->
</body>

</html>