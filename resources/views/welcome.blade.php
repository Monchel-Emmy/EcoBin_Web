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
            background-color: #BCCEF1;
            color: #333;
        }

        header {
            /* background-color: #FFBC0F; */
            color: white;
            padding: 7px;
            text-align: center;
            display: flex;
            justify-content: space-between;
        }

        main {
            padding: 20px;
            /* text-align: center; */
            background-color: #51C8BC;
            margin-left: 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            margin-top: 4px;
            border-radius: 26px;
        }

        section {
            margin: 20px 0;
            text-align: center;

        }

        .steps {
            display: flex;
            flex-direction: row;
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
            background-color: #51C8BC;
            color: white;
            /* text-align: center; */
            padding-top: 100px;
            padding-left: 400px;
            /* position: fixed; */
            margin-left: 150px;
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
        .part1{
            background-color:rgb(255, 255, 255);
            padding: 7rem;
            margin: 25px;

        }
        .ste{
            background-color: #51C8BC;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
    <img src="{{ asset('ECO.png') }}" alt="Ecobin Logo" style="width: 65px; height: 65px;">
    <div>
    <a href="{{ route('register') }}" class="btn">Register</a>
    <a href="{{ route('login') }}" class="btn">Login</a>
    </div>
    </header>

    <main>
        <div class="part1">
            <h2 style="color: #4CAF4F;"> Ecobin with Ai  </h2>
            <p style="font-family: 'Times New Roman', Times, serif ">EcoBin AI – Smart Sorting, Cleaner Future! 🚮♻️<br><br>
             The EcoBin AI Project is a smart waste management system that uses Artificial Intelligence (AI) and the Internet of Things (IoT) to create intelligent bins. These bins can automatically identify, sort, and manage different types of waste. The project helps solve problems like overflowing bins, poor waste sorting, and high collection costs. With features like automated sorting, real-time monitoring, touchless operation, and data tracking, EcoBin AI improves recycling and makes waste management more efficient and sustainable.</p>
       </br> <a href="{{ route('register') }}" class="btn">Register</a> </div>
    

        <section>
            <h2>Our Clients</h2><br>
            <p>We have been working with some Institutions 500+ clients</p>
            <div class="steps">
                
                <div class="ste">UR</div>
                <div class="ste">RWACOM</div>
                <div class="ste">KCC</div>
            </div>
            <h2>How It Works</h2>
            <div class="steps">
                <div class="step">
                    <h3>Step 1: User Disposes Waste</h3>
                    <p>Throw waste into the EcoBin AI smart bin.</p>
                </div>
                <div class="step">
                    <h3>Step 2: AI Identifies & Sorts Waste</h3>
                    <p>The bin automatically detects and separates plastic, paper, organic, and other waste types.</p>
                </div>
                <div class="step">
                    <h3>Step 3: IoT Sensors Monitor Bin Levels</h3>
                    <p>Sensors measure the fill level and send real-time updates.</p>
                </div>
                <div class="step">
                    <h3>Step 4: Data Sent to Cloud System</h3>
                    <p>Waste data is stored and analyzed for better waste management.</p>
                </div>
                <div class="step">
                    <h3>Step 5: Dashboard & Reports for Monitoring</h3>
                    <p>Admins can track waste levels, collection efficiency, and recycling rates.</p>
                </div>
            </div>
        </section>

    <footer>
        <p>Copyright &copy 2025 Ecobin<br> All rights reserved.</p>
        <img src="{{ asset('facebook-.png') }}" alt="Ecobin Logo" style="width: 200px; height: 100px;">
    </footer>
    </main>

</body>
</html>