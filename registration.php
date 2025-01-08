<?php
require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>User Registration Form</title>
</head>
<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $address = $_POST['address'];
            $phoneno = $_POST['phonenumber'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $sql = "
            DECLARE @CustomerID INT;
        
            INSERT INTO Customer (Name, Address, PhoneNumber, Email, Exposure)
            VALUES (?, ?, ?, ?, 0);
        
            SET @CustomerID = SCOPE_IDENTITY();
        
            INSERT INTO UserLogin (CustomerID, Username, Password)
            VALUES (@CustomerID, ?, ?);
            ";

            // Define parameters
            $params = [$name, $address, $phoneno, $email, $username, $password];
            
            // Execute the query
            $stmt = sqlsrv_query($conn, $sql, $params);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            } else {
                header("Location: success.php");
            }

            
        
            // Redirect to a success page or login page
            //header("Location: success.php"); // Change to your success page
            exit();
        }

        sqlsrv_close($conn);
        
        ?>
    </div>
    <div>
        <form action="registration.php" method="post">
            <div class="container">
                <h1>Registration Form</h1>
                <p>Fill up the form with correct values</p>
                <label for="name"><b>Full Name</b></label>
                <input type="text" name="name" required>

                <label for="name"><b>Username</b></label>
                <input type="text" name="username" required>

                <label for="address"><b>Address</b></label>
                <input type="text" name="address" required>
                
                <label for="phonenumber"><b>Phone Number</b></label>
                <input type="text" name="phonenumber" required>
                
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" required>
                
                <label for="password"><b>Password</b></label>
                <input type="password" name="password" required>

                <input type="submit" name="create" value="Sign Up">
            </div>
        </form>
    </div>
</body>
</html>