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
        <script type="text/javascript">
            const loginForm = document.getElementById("login-form");
            const loginButton = document.getElementById("login-button");
            
            const validateEmail = (email) => {
                return email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)
            }

            loginButton.addEventListener("click",(e) => {
                e.preventDefault();

                const email = loginForm.email.value;
                const password = loginForm.password.value;

                if(email ==="" || password ===""){
                    UIkit.notification({
                        message: "E-mail ou senha não poder ser vazios",
                        status: "danger",
                        pos: "top-center",
                        timeout: 2000
                    })
                    return;
                }

                if(!validateEmail(email)){
                    UIkit.notification({
                        message: "E-mail invalido",
                        status: "danger",
                        pos: "top-center",
                        timeout: 2000
                    })
                    return;
                }

                fetch("http://localhost/login/auth",{
                    method:"POST",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'email=email&password=password'
                }).then(response => response.json())
            })
        </script>
    </body>
</html>