<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    echo "<table border='1' width='full' cellspacing='0' cellpadding='10px'>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<th>" . "<h2> Chương " . $i . "</h2>" . "</th>";
    }

    echo "<tr>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<td>";
        for ($j = 1; $j <= 10; $j++) {
            echo "$i " . "*" . " $j" . " = " .  $i * $j . "<br>";
        }
        echo "</td>";
    }
    echo "</tr>";

    ?>
</body>

</html> -->

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Cửu Chương</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #3dacd7;
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
        }

        .card-body {
            padding: 15px;
            line-height: 1.8;
            font-size: 16px;
            color: #030303;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>Bảng Cửu Chương</h1>

    <div class="container">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <div class="card">
                <div class="card-header">Chương <?php echo "=" . $i ?></div>
                <div class="card-body">
                    <?php
                    for ($j = 1; $j <= 10; $j++) {
                        echo $i . " x " . $j;
                        echo "<strong> = " . $i * $j . "</strong>" . "</br>";
                    }
                    ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>

</body>

</html>