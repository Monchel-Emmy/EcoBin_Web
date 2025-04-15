<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecobin Admin - Landing Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f4f4f9;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
        }

        main {
            padding: 20px;
        }

        section {
            margin: 20px 0;
        }

        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #f1f1f1;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body style="background-color: #BCCEF1"> 
    <header>
        <h1>Welcome to Ecobin Admin</h1>
        <p>Manage your bins, users, and notifications efficiently.</p>
    </header>

    <main>
        <section>
            <h2>About Ecobin</h2>
            <p>Ecobin is a smart waste management system designed to help you monitor and manage bins effectively.</p>
        </section>

        <section>
            <h2>Get Started</h2>
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn">Sign Up</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Ecobin. All rights reserved.</p>
    </footer>
</body>
</html>