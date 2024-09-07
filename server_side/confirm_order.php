<?php
/*include '../db_config/db_config.php'; // Adjust the path if necessary

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderData = json_decode($_POST['order'], true);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert credentials into the credentials table
    $stmt = $conn->prepare("INSERT INTO credentials (first_name, last_name, email, phone, country, address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $country, $address);

    if ($stmt->execute()) {
        $credentialsId = $stmt->insert_id;
    } else {
        echo "Error: " . $stmt->error;
        exit();
    }

    $stmt->close();

    // Insert each order and corresponding manufacturing progress
    foreach ($orderData as $order) {
        $name = $order['name'];
        $description = $order['description'];
        $price = $order['price'];
        $imageUrl = $order['imageUrl'];
        $quantity = $order['quantity'];

        // Insert order into orders table
        $stmt = $conn->prepare("INSERT INTO orders (name, description, price, imageUrl, quantity, credentials_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdssi", $name, $description, $price, $imageUrl, $quantity, $credentialsId);

        if ($stmt->execute()) {
            $orderId = $stmt->insert_id;

            // Insert manufacturing progress entry
            $stmt_progress = $conn->prepare("INSERT INTO manufacturing_progress (order_id) VALUES (?)");
            $stmt_progress->bind_param("i", $orderId);
            $stmt_progress->execute();
            $stmt_progress->close();
        } else {
            echo "Error: " . $stmt->error;
            exit();
        }

        $stmt->close();
    }

    // Redirect to the order_success.html with credentials_id as a query parameter
    header("Location: ../client_side/order_success.html?credentials_id=$credentialsId");
    exit();
}

$conn->close();
*/

include '../db_config/db_config.php'; // Adjust the path if necessary

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderData = json_decode($_POST['order'], true);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert credentials into the credentials table
    $stmt = $conn->prepare("INSERT INTO credentials (first_name, last_name, email, phone, country, address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $country, $address);

    if ($stmt->execute()) {
        $credentialsId = $stmt->insert_id;
    } else {
        echo "Error: " . $stmt->error;
        exit();
    }

    $stmt->close();

    // Insert each order and corresponding manufacturing progress
    foreach ($orderData as $order) {
        $name = $order['name'];
        $description = $order['description'];
        $price = $order['price'];
        $imageUrl = $order['imageUrl'];
        $quantity = $order['quantity'];

        // Insert order into orders table
        $stmt = $conn->prepare("INSERT INTO orders (name, description, price, imageUrl, quantity, credentials_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdssi", $name, $description, $price, $imageUrl, $quantity, $credentialsId);

        if ($stmt->execute()) {
            $orderId = $stmt->insert_id;

            // Insert manufacturing progress entry
            $stmt_progress = $conn->prepare("INSERT INTO manufacturing_progress (order_id) VALUES (?)");
            $stmt_progress->bind_param("i", $orderId);
            $stmt_progress->execute();
            $stmt_progress->close();
        } else {
            echo "Error: " . $stmt->error;
            exit();
        }

        $stmt->close();
    }

    // Redirect to the order_success.html with credentials_id as a query parameter
    header("Location: ../client_side/order_success.html?credentials_id=$credentialsId");
    exit();
}

$conn->close();
