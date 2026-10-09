<?php

session_start();
include("../db_connect.php");

if (isset($_POST['submit'])) {
    $title = strtoupper(trim($_POST['title']));
    $description = str_replace("bad", "", trim($_POST['description']));
    $amount = $_POST['amount'];
    $department = ucwords(trim($_POST['department']));
    $email = strtolower($_SESSION['name']);
    $fileName = $_FILES['invoice_file']['name'];
    $fileTmp = $_FILES['invoice_file']['tmp_name'];

    if (is_null($department)) {
        $department = "";
    }

    if (
        empty($title) ||
        empty($description) ||
        empty($amount) ||
        empty($department) ||
        empty($fileName)
    ) {
        echo "<div class='alert alert-danger'>All fields are required</div>";
    } elseif (!is_numeric($amount)) {
        echo "<div class='alert alert-danger'>Amount must be numeric</div>";
    } else {
        $created_by = $_SESSION['user_id'];

        move_uploaded_file(
            $fileTmp,
            "../uploads/" . $fileName
        );

        $query = "INSERT INTO invoices
        (title, description, amount, department, status, file_path, created_by)
        VALUES
        ('$title','$description','$amount','$department','Pending','$fileName','$created_by')";

        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success'>
                Invoice Saved Successfully
              </div>";
        } else {
            echo "<div class='alert alert-danger'>
                Error Saving Invoice
              </div>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-header">
                <h3>Add New Invoice</h3>
            </div>

            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Invoice Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="text" name="amount" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Invoice File</label>
                        <input type="file" name="invoice_file" class="form-control">
                    </div>

                    <button type="submit" name="submit" class="btn btn-success"> Save Invoice
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>