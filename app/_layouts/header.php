<nav class="navbar">
            <div id="menuToggle">
                <!--
                A fake / hidden checkbox is used as click reciever,
                so you can use the :checked selector on it.
                -->
                <input type="checkbox" />
                
                <!--
                Some spans to act as a hamburger.
                
                They are acting like a real hamburger,
                not that McDonalds stuff.
                -->
                <span></span>
                <span></span>
                <span></span>
                
                <!--
                Too bad the menu has to be inside of the button
                but hey, it's pure CSS magic.
                -->
                <ul id="menu">
                    <a href="#"><li>Home</li></a>
                    <a href="#"><li>About</li></a>
                    <a href="#"><li>Info</li></a>
                    <a href="#"><li>Contact</li></a>
                    <a href="https://erikterwan.com/" target="_blank"><li>Show me more</li></a>
                </ul>
            </div>
            <div class="logo">
                <a href="./index.php" data-link>
                    <img src="./img/logo-branco-icone.png" alt="Sistema da Cantina" title="Sistema da Cantina">
                </a>
            </div>
      
            <ul class="nav-items menuDesktop">
                
            </ul>

            <ul class="nav-items">
                <li class="btlogin">
                    <div class="info">
                        <h5>Leonardo Avallone</h5>
                        <a class="options" href="./login.php">Configurações</a> |
                        <a class="options" href="./login.php">Sair</a>
                    </div>
                    <div class="avatar">
                        <a href="/login.php" data-link>
                        <span class="login-icon" uk-icon="user"></span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>