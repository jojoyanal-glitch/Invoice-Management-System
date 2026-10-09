<?php

session_start();
include("../db_connect.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM invoices WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: view_invoices.php?msg=deleted");
        exit();
    } else {
        echo "
        <div class='container mt-5'>
            <div class='alert alert-danger'>
                Error deleting invoice.
            </div>
        </div>";
    }
} else {
    header("Location: view_invoices.php");
    exit();
}

?>