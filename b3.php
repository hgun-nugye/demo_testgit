<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $so = rand(-100, 100);
    echo " So ngau nhien la: " . $so . "</br>";
    if ($so > 0) {
        for ($i = 2; $i <= $so / 2; $i++) {
            if ($so % $i == 0) {
                echo $i . " ";
            }
        }
        echo "</br>";

        if ($so === 1) {
            echo $so . " khong phai la so nguyen to" . "</br>";
        }
        for ($i = 2; $i <= sqrt($so); $i++) {
            if ($so % $i == 0) {
                echo $so . " khong phai la so nguyen to" . "</br>";
                break;
            } else {
                echo $so . " la so nguyen to" . "</br>";
                break;
            }
        }


        for ($i = 2; $i < $so; $i++) {

            for ($j = 2; $j <= $i; $j++) {
                if ($i % $j == 0) {
                    break;
                } else {
                    echo $i . " ";
                    break;
                }
            }
        }

        echo "</br>";
        if (sqrt($so) === floor(sqrt($so))) {
            echo $so . " la so chinh phuong";
        } else {
            echo $so . " khong phai la so chinh phuong";
        }
    }

    ?>
</body>

</html>