<div class="mid-login">
</div>
<div class="main-login">       
    <div class="right-login">
        <div class="card-login">
            <div class="logo"> 
                <img src="public/img/logo.jpeg" alt="LOGO" class="img-logo">
            </div>
            <form id="login-form">
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input id="email" name="email" class="uk-input" type="text" aria-label="Not clickable icon" placeholder="E-mail:">
                    </div>
                </div>
            
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input id="password" name="password" type="password" class="uk-input" aria-label="Not clickable icon" placeholder="Senha:">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <button id="login-button" class="btn-login">Login</button>
                    </div>
                </div>
            </form>
        </div>  
    </div>
</div>

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
                pos: "top-left",
                timeout: 2000
            })
            return;
        }

        if(!validateEmail(email)){
            UIkit.notification({
                message: "E-mail invalido",
                status: "danger",
                pos: "top-left",
                timeout: 2000
            })
            return;
        }

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

        var urlencoded = new URLSearchParams();
        urlencoded.append("email", email);
        urlencoded.append("password", password);

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };

        fetch("http://localhost:90/login/auth", requestOptions)
        .then(response => response.json())
        .then(json => {
            if(json.error){
                UIkit.notification({
                    message: `Erro: ${json.error}`,
                    status: "danger",
                    pos: "top-left",
                    timeout: 2000
                })
                return
            }
            UIkit.notification({
                message: `Bem vindo ${json.username}`,
                status: "success",
                pos: "top-left",
                timeout: 2000
            })

            setTimeout(() => {
                window.location.href = 'http://localhost:90/dashboard';
            }, "2000");
        })
        .catch(error => {
            console.log('error', error)
        });
    })
</script>
