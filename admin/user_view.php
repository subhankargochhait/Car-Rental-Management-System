<?php
include("../config/db.php");

// Get UID from URL
if (isset($_GET['uid']) && is_numeric($_GET['uid'])) {
    $uid = $_GET['uid'];
} else {
    die("Invalid or missing UID.");
}

// Fetch student details
$sql = "SELECT uid, full_name, email, phone, driver_license, address FROM signup WHERE uid = '$uid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Student not found.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #f1f5f9);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: #ffffff;
            max-width: 450px;
            width: 100%;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
            text-align: left;
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            color: #0f172a;
            font-size: 26px;
            margin-bottom: 25px;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
            color: #334155;
        }

        strong {
            color: #1e3a8a;
        }

        .back-btn {
            text-align: center;
            margin-top: 20px;
        }

        .back-btn a {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .back-btn a:hover {
            background: linear-gradient(to right, #1d4ed8, #1e40af);
            transform: translateY(-2px);
        }

        @media(max-width: 500px) {
            .card {
                padding: 20px;
            }
            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h2>User Details</h2>
    <p><strong>UID:</strong> <?= htmlspecialchars($row['uid']) ?></p>
    <p><strong>Full Name:</strong> <?= htmlspecialchars($row['full_name']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($row['phone']) ?></p>
    <p><strong>Driver's License:</strong> <?= htmlspecialchars($row['driver_license']) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($row['address']) ?></p>

    <div class="back-btn">
        <a href="all_users.php">⬅ Go Back</a>
    </div>
</div>

</body>
</html>
