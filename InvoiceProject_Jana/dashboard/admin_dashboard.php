<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">

        <div class="container-fluid">

            <span class="navbar-brand">
                Invoice Management System
            </span>

            <a href="../logout.php" class="btn btn-danger">
                Logout
            </a>

        </div>

    </nav>

    <div class="container mt-5">

        <h2>Welcome <?php echo $_SESSION['name']; ?></h2>

        <hr>

        <a href="../invoices/add_invoice.php" class="btn btn-primary">
            Add Invoice
        </a>

        <p>Role: <?php echo $_SESSION['role']; ?></p>

    </div>

</body>

</html>