<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Ecobin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        section {
            margin: 20px 0;
        }

        .steps {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .step {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
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
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Ecobin</h1>
        <p>Your Smart Waste Management Solution</p>
    </header>

    <main>
        <section>
            <h2>About Ecobin</h2>
            <p>Ecobin is a smart waste management system designed to help communities efficiently manage waste collection and recycling. With Ecobin, you can monitor bin statuses, manage users, and receive real-time notifications from hardware sensors.</p>
        </section>

        <section>
            <h2>How It Works</h2>
            <div class="steps">
                <div class="step">
                    <h3>Step 1: Register</h3>
                    <p>Create an account to get started. Whether you're an admin or a household user, registration is quick and easy.</p>
                </div>
                <div class="step">
                    <h3>Step 2: Manage Bins</h3>
                    <p>Admins can register bins, assign them to households, and monitor their statuses in real-time.</p>
                </div>
                <div class="step">
                    <h3>Step 3: Receive Notifications</h3>
                    <p>Get alerts when bins are full or require maintenance, ensuring timely waste collection and a cleaner environment.</p>
                </div>
            </div>
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