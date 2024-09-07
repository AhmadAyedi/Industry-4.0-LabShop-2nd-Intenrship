<?php
/*include '../db_config/db_config.php';

$credentialsId = $_GET['credentials_id'] ?? null;

if (!$credentialsId) {
    die("No credentials ID provided.");
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all orders for the given credentials_id
$stmt = $conn->prepare("SELECT id, name, description FROM orders WHERE credentials_id = ?");
$stmt->bind_param("i", $credentialsId);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Progress</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Track Order Progress</h1>

    <?php
    foreach ($orders as $order) {
        $orderId = $order['id'];
        $stmt = $conn->prepare("SELECT * FROM manufacturing_progress WHERE order_id = ?");
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        $progress = $result->fetch_assoc();

        if ($progress) {
            echo "<h2>Order: " . htmlspecialchars($order['name']) . "</h2>";
            //echo "<p>Description: " . htmlspecialchars($order['description']) . "</p>";
            echo "<p>Station 1: " . htmlspecialchars($progress['station1_percentage']) . "%</p>";
            echo "<p>Station 2: " . htmlspecialchars($progress['station2_percentage']) . "%</p>";
            echo "<p>Station 3: " . htmlspecialchars($progress['station3_percentage']) . "%</p>";
            echo "<p>Station 4: " . htmlspecialchars($progress['station4_percentage']) . "%</p>";
            echo "<p>Station 5: " . htmlspecialchars($progress['station5_percentage']) . "%</p>";
            echo "<hr>";
        } else {
            echo "<p>No progress data available for Order ID: " . htmlspecialchars($orderId) . "</p><hr>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>

</html>*/


include '../db_config/db_config.php';

$credentialsId = $_GET['credentials_id'] ?? null;

if (!$credentialsId) {
    die("No credentials ID provided.");
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all orders for the given credentials_id
$stmt = $conn->prepare("SELECT id, name, description FROM orders WHERE credentials_id = ?");
$stmt->bind_param("i", $credentialsId);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Progress</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .progress-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .progress-card {
            width: 100%;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .progress-card h2 {
            text-align: center;
        }

        .circle-container {
            display: flex;
            justify-content: space-around;
            margin: 10px 0;
        }

        .circle-item {
            text-align: center;
            margin: 10px;
        }

        .circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: conic-gradient(#4bc0c0 0% 50%, #ddd 50% 100%);
            display: inline-block;
            position: relative;
        }

        .circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            font-weight: bold;
        }

        .station-name {
            margin-bottom: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Track Order Progress</h1>

    <div class="progress-container">
        <?php
        foreach ($orders as $order) {
            $orderId = $order['id'];
            $stmt = $conn->prepare("SELECT * FROM manufacturing_progress WHERE order_id = ?");
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $result = $stmt->get_result();
            $progress = $result->fetch_assoc();

            if ($progress) {
                echo "<div class='progress-card'>";
                echo "<h2>Order: " . htmlspecialchars($order['name']) . "</h2>";
                echo "<div class='circle-container'>";
                foreach ($progress as $station => $percentage) {
                    if (strpos($station, 'station') === 0) {
                        $stationName = ucfirst(str_replace('_', ' ', $station));
                        echo "<div class='circle-item'>";
                        echo "<div class='station-name'>" . htmlspecialchars($stationName) . "</div>";
                        echo "<div class='circle' style='background: conic-gradient(#4bc0c0 0% {$percentage}%, #ddd {$percentage}% 100%);'><span>{$percentage}%</span></div>";
                        echo "</div>";
                    }
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='progress-card'>";
                echo "<p>No progress data available for Order ID: " . htmlspecialchars($orderId) . "</p>";
                echo "</div>";
            }

            $stmt->close();
        }

        $conn->close();
        ?>
    </div>
</body>

</html>