<?php
session_start();
include("../db_connect.php");


if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM invoices");
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Invoices</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>All Invoices</h2>

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>

                        <td><?php echo $row['id']; ?></td>

                        <td><?php echo $row['title']; ?></td>

                        <td><?php echo $row['amount']; ?></td>

                        <td><?php echo $row['department']; ?></td>

                        <td><?php echo $row['status']; ?></td>

                        <td><?php echo $row['created_at']; ?></td>

                        <td>
                            <a href="../uploads/<?php echo $row['file_path']; ?>"
                                class="btn btn-primary btn-sm"
                                target="_blank">
                                View File
                            </a>
                        </td>


                        <td>

                            <?php if ($_SESSION['role'] == 'admin') { ?>

                                <a href="delete_invoice.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this invoice?')">
                                    Delete
                                </a>

                            <?php } ?>

                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</body>

</html>