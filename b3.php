<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra số ngẫu nhiên</title>
</head>

<style>
    body {
        font-size: 24px;
        line-height: 1.5;
    }
</style>

<body><?php
        $so = rand(-100, 100);
        echo "<strong> So ngau nhien la: " . $so . " </strong></br>";
        if ($so > 0) {

            $so_uoc = 0;
            echo "Cac uoc so cua " . $so . " la ";
            for ($i = 1; $i <= $so / 2; $i++) {
                if ($so % $i == 0) {
                    echo $i . " ";
                    $so_uoc++;
                }
            }
            echo "</br>";

            if ($so === 1) {
                echo $so . " khong phai la so nguyen to" . "</br>";
            }

            if ($so_uoc > 0) {
                echo $so . " khong phai la so nguyen to" . "</br>";
            } else {
                echo $so . " la so nguyen to" . "</br>";
            }


            $snt = [];
            $dem = 0;
            for ($i = 2; $i < $so; $i++) {

                for ($j = 2; $j <= $i; $j++) {
                    if ($i % $j == 0) {
                        break;
                    } else {
                        $snt[] = $i;
                        $dem++;
                        break;
                    }
                }
            }
            if ($dem == 0) {
                echo "Khong co so nguyen to nao nho hon " . $so;
            } else {
                echo "Cac so nguyen to nho hon " . $so . " la: ";
                foreach ($snt as $value) {
                    echo "<strong>" . $value . "</strong> ";
                }
            }

            echo "</br>";
            if (sqrt($so) === floor(sqrt($so))) {
                echo $so . " la so chinh phuong";
            } else {
                echo $so . " khong phai la so chinh phuong";
            }
        }

        ?></body>

</html>