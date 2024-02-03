<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Space Burger</title>
        <link rel="stylesheet" href="public/css/style.css">
        <!-- <link rel="stylesheet" href="public/css/globals.css"> -->
        <link rel="stylesheet" href="public/css/uikit.min.css" />
        <script src="public/js/uikit.min.js"></script>
        <script src="public/js/uikit-icons.min.js"></script>
        <link rel="icon" href="public/img/favicon.ico">
    </head>
    <body>
        <?php
            require_once "app/views/{$view}.php"
        ?>
    </body>
</html>