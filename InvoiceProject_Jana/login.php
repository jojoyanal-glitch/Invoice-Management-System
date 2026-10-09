<?php
session_start();
include("db_connect.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['full_name'];

        if ($user['role'] == 'admin') {
            header("Location: dashboard/admin_dashboard.php");
        } elseif ($user['role'] == 'chair') {
            header("Location: dashboard/chair_dashboard.php");
        } elseif ($user['role'] == 'manager') {
            header("Location: dashboard/manager_dashboard.php");
        } elseif ($user['role'] == 'treasurer') {
            header("Location: dashboard/treasurer_dashboard.php");
        }

        exit();
    } else {
        echo "Invalid Email or Password";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>

                    <div class="card-body">

                        <form method="POST">

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" name="login" class="btn btn-primary w-100">
                                Login
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>