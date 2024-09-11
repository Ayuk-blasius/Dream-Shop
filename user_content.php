<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Grid</title>
    <style>
      .maindiv {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 20px;
            padding: 0 15px;
        }
        .card {
            background-color: gainsboro;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
        }
        .card .title {
            color: #ffc800;
            font-weight: bold;
            font-size: 24px;
        }
        .card .value {
            color: black;
            font-weight: bold;
            font-size: 24px;
        }
        @media (max-width: 768px) {
            .maindiv {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="maindiv">
    <div class="card">
    <div class="card-header">
        <p class="title">Total Balance</p>
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addFundsModal">
            <i class="fas fa-plus"></i> Add Funds
        </button>
    </div>
    <div class="card-body">
        <p class="value">
        <?php
include 'connect.php'; // Include your database connection script

// Fetch total balance
$sql = "SELECT total_balance FROM balance_table LIMIT 1"; // Adjust as needed if there's only one row
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_balance = $row['total_balance'];
} else {
    // Initialize total balance if not fetched from DB
    $total_balance = 0.00; // Default value or initialization logic
}

echo number_format($total_balance, 2) . ' FCFA';
?>

        </p>
    </div>
</div>

<!-- Modal for adding funds -->
<div class="modal fade" id="addFundsModal" tabindex="-1" role="dialog" aria-labelledby="addFundsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFundsModalLabel">Add Funds</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addFundsForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Amount to Add (FCFA)</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Bank Transfer">Bitcoin</option>
                            <option value="Momo">MTN Mobile Money</option>
                            <option value="Om">Orange Mobile Money</option>
                            <option value="Cashapp">Cashapp</option>
                            <option value="Zelle">Zelle</option>
                            <option value="Paypal">Paypal</option>
                            <option value="Apple pay">Apple pay</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Funds</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
    <div class="card-body">
        <p class="value">
           
        </div>
        </div>
    </div>
</body>
</html>
