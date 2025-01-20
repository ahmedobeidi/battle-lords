<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warriors Display</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
        }

        header {
            background-color: #333;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .warrior-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .warrior-card {
            background-color: #444;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .warrior-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .warrior-image {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
            border-radius: 50%;
            border: 3px solid #fff;
        }

        .warrior-name {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .warrior-description {
            font-size: 1rem;
            line-height: 1.5;
            color: #ddd;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            background-color: #222;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
            color: #bbb;
        }

    </style>
</head>
<body>
    <header>
        <h1>Warriors of Wrestling</h1>
    </header>

    <div class="container">
        <div class="warrior-grid">
            <!-- Example Warrior Cards (replace with dynamic data) -->
            <div class="warrior-card">
                <img src="warrior1.jpg" alt="Warrior 1" class="warrior-image">
                <h2 class="warrior-name">Warrior 1</h2>
                <p class="warrior-description">A fierce competitor known for their strength and agility.</p>
            </div>

            <div class="warrior-card">
                <img src="warrior2.jpg" alt="Warrior 2" class="warrior-image">
                <h2 class="warrior-name">Warrior 2</h2>
                <p class="warrior-description">Specializes in high-flying moves and stunning techniques.</p>
            </div>

            <div class="warrior-card">
                <img src="warrior3.jpg" alt="Warrior 3" class="warrior-image">
                <h2 class="warrior-name">Warrior 3</h2>
                <p class="warrior-description">A tactical genius with unmatched precision in the ring.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Wrestling League. All rights reserved.</p>
    </footer>
</body>
</html>
