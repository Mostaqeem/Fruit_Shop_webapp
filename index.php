<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    // If no username is set in the session, redirect to the login page
    header("Location: login.php");
    exit();
}

// Get the logged-in user's username
$username = htmlspecialchars($_SESSION['username']); // Use htmlspecialchars to avoid XSS
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome, <?php echo $username; ?>!
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Some Action</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>




    <div class="container">
        <header>

            <div class="title">PRODUCT LIST</div>

            <div class="cart-icon">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z"
                        clip-rule="evenodd" />
                </svg>
                <span>0</span>

            </div>
        </header>

        <div class="listProduct">
            <div class="item">
                <img src="1.jpg" alt="">
                <h2>Strawberry</h2>
                <div class="price">$5</div>
                <button class="addCart">Add Item</button>
            </div>
        </div>
    </div>

    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
            <div class="item">
                <div class="totalPriceSummary">

                </div>
            </div>
        </div>
        <div class="btn">
            <button class="checkOut">Check Out</button>
            <button class="close">Close</button>
        </div>
    </div>

    <script src="app.js"></script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>