<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* General page styling */
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        font-family: Arial, sans-serif;
    }

    /* Center container styling */
    .container {
        text-align: center;
        background: rgba(255, 255, 255, 0.8);
        padding: 20px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    /* H1 styling */
    h1 {
        margin: 0 0 20px;
        font-size: 24px;
        color: #333;
    }

    /* Button styling */
    button {
        background-color: #2575fc;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #6a11cb;
    }

    </style>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
    <div class="container">
        <h1>Account Created Successfully!</h1>
        <button onclick="window.location.href='login.php'">Login</button>
    </div>
</head>
<body>
    
</body>
</html>