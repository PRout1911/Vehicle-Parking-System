<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocate Parking Spot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: hsla(179, 83%, 64%, 1);
            background: linear-gradient(90deg, hsla(179, 83%, 64%, 1) 0%, hsla(338, 75%, 64%, 1) 50%, hsla(14, 92%, 86%, 1) 100%);
            background: -moz-linear-gradient(90deg, hsla(179, 83%, 64%, 1) 0%, hsla(338, 75%, 64%, 1) 50%, hsla(14, 92%, 86%, 1) 100%);
            background: -webkit-linear-gradient(90deg, hsla(179, 83%, 64%, 1) 0%, hsla(338, 75%, 64%, 1) 50%, hsla(14, 92%, 86%, 1) 100%);
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#58EFEC", endColorstr="#E85C90", GradientType=1 );            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 500px;
            height: 300px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-decoration: underline;
            display: block;
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        p {
            margin: 0 0 10px;
            color: #555;
        }
        .allocated-spot {
            font-weight: bold;
            color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Allocating Parking Spot</h1>
        <?php
        // Define available spots for each vehicle type
        $available_spots = array(
            "Car" => array("A", "B", "C"),
            "Motorcycle" => array("P", "Q", "R"),
            "Cycle" => array("A1", "B1", "C1")
        );

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Collect form data
            $vehicle_type = $_POST["vehicle_type"];

            // Check if there are available spots for the selected vehicle type
            if (isset($available_spots[$vehicle_type]) && count($available_spots[$vehicle_type]) > 0) {
                // Allocate the first available spot for the selected vehicle type
                $allocated_spot = array_shift($available_spots[$vehicle_type]);

                // Display allocation message
                echo "<p>Parking spot allocated for <b>$vehicle_type:</p>";
                echo "<p>Allocated Spot: <span class='allocated-spot'>$allocated_spot</span></p>";

                echo "<h4 style='color:red; font-size:16px;'>Please park your vehcile at the allocated spot only!!</h4>";

                // Display remaining available spots for the selected vehicle type
                echo "<p>Remaining spots for $vehicle_type:</p>";
                echo "<ul>";
                foreach ($available_spots[$vehicle_type] as $spot) {
                    echo "<li>Spot: <span class='allocated-spot'>$spot</span></li>";
                }
                echo "</ul>";
            } else {
                // No available spots for the selected vehicle type
                echo "<p>No available spots for $vehicle_type. Please try again later.</p>";
            }
        }
        ?>
    </div>
</body>
</html>