<nav id ="main-topnav" class="topnav">
    <?php if(isset($_COOKIE['user'])):?>
        <form class="logout-mobile-icon" method="get" action="logout">
            <i class="fas fa-sign-out-alt"></i>
        </form>
    <?php endif; ?>
    <div class="logo">
        <a href="index"><img alt="logo" src="public/img/main-page/logo-light.svg"></a>
    </div>

    <div class="change-language">
        <img src="public/img/main-page/Polish_flag.png">
    </div>

    <?php if(isset($_COOKIE['user'])):?>
        <form class="logout_form" method="get" action="logout">
            <button name="logout" value="true" class="logout_button">Wyloguj się</button>
        </form>
    <?php else: ?>
        <a href="login" class="topnav__login">Zaloguj sie</a>
    <?php endif; ?>
</nav>