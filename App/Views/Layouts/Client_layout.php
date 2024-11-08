<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/style.css">
    <title><?php echo ($title) ? $title :  "Web"  ?></title>
</head>
<body>
    <?php
    //Call Header
    require_once _DIR_ROOT.'/App/Views/Blocks/Header.php';

    
    $this->render($_view, $contents);
    
    
    //Call Footer
    require_once _DIR_ROOT.'/App/Views/Blocks/Footer.php';
    ?>


    <script type="" src="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/Js/Main.js" ></script>
</body>
</html>