<nav id ="main-topnav" class="topnav">

    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <div class="logo">
        <a href="index"><img alt="logo" src="public/img/main-page/logo-light.svg"></a>
    </div>

    <div class="topnav_menu">
        <div class="change-language">
            <img src="public/img/main-page/Polish_flag.png">
        </div>

        <?php if(isset($_COOKIE['user'])):?>
            <a href="#" class="topnav__login">Profil użytkownika</a>
            <form class="logout_form" method="get" action="logout">
                <button name="logout" value="true" class="logout_button">Wyloguj się</button>
            </form>
        <?php else: ?>
            <a href="login" class="topnav__login">Zaloguj sie</a>
        <?php endif; ?>
    </div>


</nav>