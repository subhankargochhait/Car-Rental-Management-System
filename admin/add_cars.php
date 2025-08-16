<?php
// Make sure session is started only once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add_Cars</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #eef2ff, #c7d2fe);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .form1 {
            background: white;
            padding: 30px 25px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            width: 380px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form1:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1e293b;
            font-weight: 700;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #334155;
        }

        input, select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #6366f1;
            background: #fff;
            outline: none;
            box-shadow: 0 0 8px rgba(99, 102, 241, 0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #4f46e5, #3b82f6);
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background: linear-gradient(to right, #4338ca, #2563eb);
            transform: scale(1.02);
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">
        <?php include("admin_inc/sidebar.php") ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("admin_inc/top.php") ?>

                <div class="container-fluid">
                    <div class="form-wrapper">
                        <form action="add_car_ins.php" method="post" enctype="multipart/form-data">
                            <div class="form1">
                                <h2>Add New Car</h2>

                                <label for="car_name">Car Name</label>
                                <input type="text" name="car_name" id="car_name" placeholder="Enter car name" required>

                                <label for="car_type">Car Type</label>
                                <select name="car_type" id="car_type" required>
                                    <option value="">-- Select Car Type --</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Compact">Compact</option>
                                    <option value="Mid-size">Mid-size</option>
                                </select>

                                <label for="daily_rate">Daily Rate</label>
                                <input type="text" name="daily_rate" id="daily_rate" placeholder="Enter daily rate" required>

                                <label for="status">Status</label>
                                <select name="status" id="status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select>

                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" accept="image/*" required>

                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include("admin_inc/footer.php") ?>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("admin_inc/logout_modal.php") ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
