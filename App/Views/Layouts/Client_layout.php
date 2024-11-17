<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Style.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Header.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Footer.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/LeftBar.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Post.css">
    <!-- Icon Font Awéome 5 -->
    <!-- <link href="<?php echo _WEB_ROOT ?>/Public/Assets/Fonts/fontawesome-free-6.6.0-web/css/fontawesome.css" rel="stylesheet" /> -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <title><?php echo ($title) ? $title :  "Web"  ?></title>
</head>
<body>
    <div id="wrapper">

        <?php
        //Call Header
        require_once _DIR_ROOT.'/App/Views/Blocks/Header.php';
        ?>

        <div id="main">

            
            <?php
            $this->render($_view_leftbar, $contents_leftbar);
            $this->render($_view_home, $contents_home);
            ?>
        
        </div>
        <?php
        //Call Footer
        // require_once _DIR_ROOT.'/App/Views/Blocks/Footer.php';
        ?>

    </div>

    <script type="" src="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/Js/Main.js" ></script>
</body>
</html>