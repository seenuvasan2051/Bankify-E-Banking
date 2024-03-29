<?php

require 'db_connect.php';
// start the session
session_start();
$user_id;
if (isset($_SESSION['loggedin']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: index.php");
    exit();
}

try {
    if (!isset($_SESSION['user_id']) && !isset($_POST['amount'])) {
        throw new Exception("Please enter all the fields");
    }

    $userID = $_SESSION['user_id'];
    $amount = $_POST['amount'];

    // Begin transaction
    $conn->begin_transaction();
    // Check if user exists
    $sql = "SELECT user_id FROM users WHERE user_id = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        throw new Exception("User does not exist.");
    }

    // Add amount to user's balance
    $sql = "INSERT INTO movements (user_id, amount) VALUES ($userID, $amount)";
    if (!$conn->query($sql)) {
        throw new Exception("Error adding amount to user's balance: " . $conn->error);
    }

    // Commit transaction
    $conn->commit();

    // Close the connection
    $conn->close();

    // Prepare success response
    $response = array(
        'status' => 'success',
        'message' => 'Amount deposited successfully.'
    );

} catch (Exception $e) {
    // Rollback transaction
    $conn->rollback();

    // Close the connection
    $conn->close();

    // Prepare error response
    $response = array(
        'status' => 'error',
        'message' => $e->getMessage()
    );
} finally {
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>