<?php
if (!app()->auth::check()):
    ?>
    <div class="container">
        <div class="frame b-w">
            <div class="login_form b-w">
                <h2 class="authText b-w">Авторизация</h2><br><br>
                <form method="post" class="b-w inputLoginForm">
                    <label>Логин <input type="text" name="nickname"></label><br><br>
                    <label>Пароль <input type="password" name="password"></label><br><br>
                    <button>Авторизация</button>
                </form>
            </div>
        </div>
    </div>
<?php endif;