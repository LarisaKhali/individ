
<div class="container">
    <div class="frame b-w">
        <h2 class="authText b-w">Авторизация</h2><br><br>
        <div class="login_form b-w">
            <form method="post" class="b-w inputLoginForm">
                <label>Логин <input type="text" name="nickname"></label><br><br>
                <label>Пароль <input type="password" name="password"></label><br><br>
                <input type="submit" class="submitInput" value="Авторизация">
            </form>
            <?= $message ?? '' ?>

        </div>
    </div>
</div>