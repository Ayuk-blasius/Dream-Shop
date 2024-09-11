<?php
include 'connect.php'; // Include your database connection script

// Initialize response array
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $user_id = $_POST['user_id'];
    $payment_method = $_POST['payment_method'];
    $transaction_date = date('Y-m-d H:i:s'); // Current date and time

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO transactions (user_id, amount, payment_method, transaction_date) 
                            VALUES (?, ?, ?, ?)");
    $stmt->bind_param("idss", $user_id, $amount, $payment_method, $transaction_date);

    if ($stmt->execute() === TRUE) {
        // Update total balance in balance_table
        $update_sql = "UPDATE balance_table SET total_balance = total_balance + ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("d", $amount);

        if ($update_stmt->execute() === TRUE) {
            $response['status'] = 'success';
            $response['total_balance'] = number_format(getTotalBalance($conn), 2);
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating total balance: ' . $conn->error;
        }

        $update_stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error adding transaction: ' . $conn->error;
    }

    $stmt->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

// Function to fetch total balance
function getTotalBalance($conn) {
    $sql = "SELECT total_balance FROM balance_table LIMIT 1";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_balance'];
    } else {
        return 0.00; // Default or handle error as needed
    }
}

$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
