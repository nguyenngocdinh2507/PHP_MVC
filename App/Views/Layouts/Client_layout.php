<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self';"> -->
    <link rel="stylesheet" href="/Public/Assets/Clients/CSS/Style.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Header.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Footer.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/LeftBar.css">
    <link rel="stylesheet" href="/Public/Assets/Clients/CSS/Post.css">

    <!-- Icon Font Awesome 6 -->
     
    <link href="/Public/Assets/Fonts/fontawesome-free-6.7.0-web/css/fontawesome.css" rel="stylesheet" />
    <link href="/Public/Assets/Fonts/fontawesome-free-6.7.0-web/css/brands.css" rel="stylesheet" />
    <link href="/Public/Assets/Fonts/fontawesome-free-6.7.0-web/css/solid.css" rel="stylesheet" />
    <!-- <link href="/Public/Assets/Fonts/fontawesome-free-6.7.0-web/css/sharp-thin.css" rel="stylesheet" />
    <link href="/Public/Assets/Fonts/fontawesome-free-6.7.0-web/css/duotone-thin.css" rel="stylesheet" />
    <link href="/Public/Assets/Fonts/fontawesome-free-6.7.0-web/css/sharp-duotone-thin.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
     <!-- Editor -->
     <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content', // ID của textarea
            menubar: false, // Ẩn menu
            plugins: 'lists link image preview', // Các plugin hỗ trợ
            toolbar: 'undo redo | bold italic underline | bullist numlist | alignleft aligncenter alignright alignjustify | link', // Thanh công cụ
            height: 300 // Chiều cao của editor
        });
    </script>
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
    <script type="" src="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/Js/Post.js" ></script>
</body>
</html>