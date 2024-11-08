<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/Assets/Clients/CSS/Products/List.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        <?php
            foreach($products as $key => $value){
        ?>

        <tr>
            <td><?php echo htmlspecialchars($value->id) ?></td>
            <td><?php echo $value->name ?></td>
        </tr>

        <?php
            }
        ?>

    </table>
    
</body>
</html>