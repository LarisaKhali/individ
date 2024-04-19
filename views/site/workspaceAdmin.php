
<?php
if (app()->auth::check() && app()->auth->user()->role_id == 1):
    ?>
    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/admin') ?>" class="linkNavigation">Рабочая область</a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="linkNavigation">Выход <img src="../../public/img/logout_icon.jpg" alt="Нет изображения" class="logoutIcon"></a>

    </header>
    <main class="addWorker">
        <h2 class="c-g">Добавление нового сотрудника</h2>
        <form method="post" class="addWorkerForm">
            <div class="addWorkerForm1">
                <p>Логин</p> <input type="text" name="nickname" required><br><br>
                <p>Пароль</p> <input type="password" name="password" required><br><br>
            </div>
            <div class="addWorkerForm2">
                <p>E-mail</p> <input type="email" name="email"><br><br>
                <p>Фамилия</p><input type="text" name="surname" required><br><br>
            </div>
            <div class="addWorkerForm3">
                <p>Имя</p> <input type="text" name="name" required><br><br>
                <p>Отчество</p> <input type="text" name="patronymic"><br><br>
            </div>
            <button class="createWorkerButton">Создание</button>
        </form>
    </main>

    <main class="allWorkers">
        <h2 class="c-g fs-30px">Все сотрудники деканата</h2>
        <div class="worker1">
            <img src="../../public/img/user_little_icon.png" alt="Нет изображения" class="userLittleIcon">
            <p class="userName">ФИО: Иванов Иван Иванович</p>
            <p class="userLogin">Логин: olia</p>
            <p class="userPassword">Пароль: olia12345</p>
            <button type="submit" class="deleteWorker">Удалить сотрудника</button>
        </div>
        <div class="worker2">
            <img src="../../public/img/user_little_icon.png" alt="Нет изображения" class="userLittleIcon">
            <p class="userName">ФИО: Иванов Иван Иванович</p>
            <p class="userLogin">Логин: olia</p>
            <p class="userPassword">Пароль: olia12345</p>
            <button type="submit" class="deleteWorker">Удалить сотрудника</button>
        </div>
        <div class="worker3">
            <img src="../../public/img/user_little_icon.png" alt="Нет изображения" class="userLittleIcon">
            <p class="userName">ФИО: Иванов Иван Иванович</p>
            <p class="userLogin">Логин: olia</p>
            <p class="userPassword">Пароль: olia12345</p>
            <button type="submit" class="deleteWorker">Удалить сотрудника</button>
        </div>

    </main>

<?php
elseif (app()->auth::check()):

    ?>
    <h3 class="youNotAuthorizedText">Недоступно</h3>

<?php

else:

    ?>
    <h3 class="youNotAuthorizedText">Вы не авторизованы</h3>
    <a href="/login"><input type="submit" class="submitInput" value="Авторизация"></a>

<?php
endif;
?>