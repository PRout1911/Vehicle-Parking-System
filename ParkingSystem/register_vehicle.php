<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin-left: 100px;
            margin-top: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        h1{
            text-align: center;
            color: #3c763d;
        }
        .allocation-link{
            color: #0056b3;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<p class="success-message">User registered successfully!</p>';
        }
        ?>
        <?php
        // Check if the form is submitted
            // Connect to the database
            include 'db_connect.php';

            // Prepare and bind parameters
            $stmt = $conn->prepare("INSERT INTO vehicles (brand, model, license_plate, vin, owner, registration_date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $brand, $model, $license_plate, $vin, $owner, $registration_date);

            // Set parameters and execute
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $license_plate = $_POST['license_plate'];
            $vin = $_POST['vin'];
            $owner = $_POST['owner'];
            $registration_date = $_POST['registration_date'];

            if ($stmt->execute() === TRUE) {
                echo "<h1>Vehicle registered successfully!</h1>";
                echo '<div class="allocation-link"><a href="allocation.html"><h4>Click here to Allocate spot to your Vehicle.</h4></a></div>';
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();

        ?>
</body>
</html>