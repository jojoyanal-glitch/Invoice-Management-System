<?php

session_start();
include("../db_connect.php");

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $query = "UPDATE invoices
              SET status='$status'
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: manage_invoice.php");
        exit();
    } else {
        echo "Error Updating Invoice";
    }
}
