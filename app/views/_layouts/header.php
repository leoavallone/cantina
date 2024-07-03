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
                <a href="/dashboard" data-link>
                    <img src="public/img/logo-branco-icone.png" alt="Sistema da Cantina" title="Sistema da Cantina">
                </a>
            </div>
      
            <ul class="nav-items menuDesktop">
                
            </ul>

            <ul class="nav-items">
                <li class="btlogin">
                    <div class="info">
                        <?php
                            if($_SESSION["login"]){
                                echo "<h5>".ucfirst($_SESSION["login"])."</h5>";
                            }else{
                                echo "<h5>Unknown user</h5>";
                            }
                        ?>
                        <a class="options" href="/dashboard">Configurações</a> |
                        <a class="options" href="/dashboard/logout">Sair</a>
                    </div>
                    <div class="avatar">
                        <a href="/login.php" data-link>
                        <span class="login-icon" uk-icon="user"></span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>