<?php
session_start();
include("../db_connect.php");

$result = mysqli_query($conn, "SELECT * FROM invoices");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Invoices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Manage Invoices</h2>

        <table class="table table-bordered">

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['status']; ?></td>

                    <td>

                        <a href="update_invoice.php?id=<?php echo $row['id']; ?>&status=Approved"
                            class="btn btn-success btn-sm">
                            Approve
                        </a>

                        <a href="update_invoice.php?id=<?php echo $row['id']; ?>&status=Rejected"
                            class="btn btn-danger btn-sm">
                            Reject
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>