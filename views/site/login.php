<h2>Авторизация</h2>

<h3><?= app()->auth->user()->nickname ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <form method="post">
        <label>Имя пользователя <input type="text" name="nickname"></label><br><br>
        <label>Пароль <input type="password" name="password"></label><br><br>
        <button>Войти</button>
    </form>
<?php endif;