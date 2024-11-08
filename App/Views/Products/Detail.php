<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($title) ? $title : 'Abc' ?></title>
</head>
<body>
    <p>
        Thông tin sản phẩm có id = <?php echo $findId ?>
    </p>
    <h1>
        <?php
            echo ('<pre>');
            print_r($product);
            echo ('</pre>');
        ?>
    </h1>
</body>
</html>