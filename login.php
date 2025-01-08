<?php
require_once("connection.php");
session_start(); // Start the session


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL to fetch user details based on the provided email
    $sql = "SELECT Password FROM UserLogin WHERE Username = ?";

    // Prepare the statement
    $params = [$username];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Fetch the result
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($row) {
        // Verify the password
        $storedPassword = $row['Password'];

        // Convert the input password to its hashed version for comparison
        //$inputPasswordHash = hash('sha256', $password); // Match your hashing method

        if ($storedPassword === $password) {
            $_SESSION['username'] = $username;

            header("Location: index.php");
        } else {
            echo "<script>alert(Invalid username or password.);</script>";
        }
    } else {
        echo "User not found.";
    }

    // Free the statement resource
    sqlsrv_free_stmt($stmt);
}

?>














<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* General styling for the login page */
    body {
    margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
        font-family: Arial, sans-serif;
    }

    /* Login container styling */
    .login-container {
        text-align: center;
        background: white;
        padding: 30px 50px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

/* Form group styling */
.form-group {
    margin-bottom: 20px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
}

    input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Button styling */
    button {
        background-color: #ff7e5f;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #feb47b;
    }

    /* Signup text styling */
    .signup-text {
        margin-top: 20px;
        font-size: 14px;
    }

    .signup-text a {
        color: #ff7e5f;
        text-decoration: none;
        font-weight: bold;
    }

    .signup-text a:hover {
        text-decoration: underline;
    }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
        <p class="signup-text">Don't have an account? <a href="registration.php">Sign Up</a></p>
    </div>
</body>
</html>
