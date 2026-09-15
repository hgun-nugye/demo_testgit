<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $i = rand(0, 100);

    if (isset($i)) {

        echo "<h3>Các số chẵn nhỏ hơn " . $i . " là: </h3>";
        for ($j = 1; $j < $i; $j++) {
            if ($j % 2 == 0) {
                echo $j . " ";
            }
        }
    }

    ?>
</body>

</html>