<?php
session_start();
include("../db_connect.php");

$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM invoices"))['total'];

$paid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM invoices WHERE status='Paid'"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Treasurer Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<div class="row">

<div class="col-md-4">
<div class="card">
<div class="card-body">
<h4>Total Invoices</h4>
<h2><?php echo $total; ?></h2>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body">
<h4>Paid Invoices</h4>
<h2><?php echo $paid; ?></h2>
</div>
</div>
</div>

</div>

<br>

<a href="../invoices/view_invoices.php" class="btn btn-success">
View Invoices
</a>

<a href="../logout.php" class="btn btn-danger">
Logout
</a>

</div>

</body>
</html>