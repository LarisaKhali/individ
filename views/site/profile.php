<?php
if (app()->auth::check()):
    ?>
    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/admin') ?>" class="linkNavigation">Рабочая область</a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="linkNavigation">Выход <img src="../../public/img/logout_icon.jpg" alt="Нет изображения" class="logoutIcon"></a>

    </header>
    <main>
        <p class="FIOUser"><?= app()->auth::user()->surname ?> <?= app()->auth::user()->name ?> <?= app()->auth::user()->patronymic ?></p>
        <p class="roleUser">Роль: администратор/сотрудник</p>
        <img src="../../public/img/user_icon.png" alt="Нет изображения" class="userIcon">
        <form method="post" class="changeInfoForm">
            <div class="changeInfoForm1">
                <p>Логин</p> <input type="text" name="nickname"><br><br>
                <p>E-mail</p> <input type="email" name="email"><br><br>
                <p>Пароль</p> <input type="password" name="password"><br><br>
            </div>
            <div class="changeInfoForm2">
                <p>Фамилия</p><input type="text" name="surname"><br><br>
                <p>Имя</p> <input type="text" name="name"><br><br>
                <p>Отчество</p> <input type="text" name="patronymic"><br><br>
            </div>
            <div class="changeInfoForm3">
                <p>Изменить аватарку</p>
                <div class="fileName">Файл не выбран</div>
                <label for="file-upload" class="inputAvatarButton">
                    Выберите файл
                </label>
                <input id="file-upload" type="file" />

                <button class="saveChangesProfile">Сохранить изменения</button>
            </div>


        </form>
    </main>

<?php
else:
    ?>
    <h3 class="youNotAuthorizedText">Вы не авторизованы</h3>
    <a href="<?= app()->route->getUrl('/login'); ?>"><input type="submit" class="submitInput goToAuth" value="Авторизация"></a>

<?php
endif;
?>