
<?php
if (app()->auth::check() && app()->auth->user()->role_id == 1):
    ?>
    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/workspace') ?>" class="linkNavigation">Рабочая область</a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="linkNavigation">Выход <img src="../../public/img/logout_icon.jpg" alt="Нет изображения" class="logoutIcon"></a>

    </header>
    <main class="addWorker">
        <h2 class="c-g">Добавление нового сотрудника</h2>
        <form method="post" class="addWorkerForm">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <div class="addWorkerForm1">
                <p>Логин</p> <input type="text" name="nickname"><br><br>
                <p>Пароль</p> <input type="password" name="password"><br><br>
            </div>
            <select name="role_id" hidden><br><br>
                <option value="2">Сотрудник деканата</option>
            </select>
            <div class="addWorkerForm2">
                <p>E-mail</p> <input type="email" name="email"><br><br>
                <p>Фамилия</p><input type="text" name="surname"><br><br>
            </div>
            <div class="addWorkerForm3">
                <p>Имя</p> <input type="text" name="name" ><br><br>
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

        </div>
        <div class="worker2">
            <img src="../../public/img/user_little_icon.png" alt="Нет изображения" class="userLittleIcon">
            <p class="userName">ФИО: Иванов Иван Иванович</p>
            <p class="userLogin">Логин: olia</p>
            <p class="userPassword">Пароль: olia12345</p>

        </div>
        <div class="worker3">
            <img src="../../public/img/user_little_icon.png" alt="Нет изображения" class="userLittleIcon">
            <p class="userName">ФИО: Иванов Иван Иванович</p>
            <p class="userLogin">Логин: olia</p>
            <p class="userPassword">Пароль: olia12345</p>

        </div>


    </main>

<?php
elseif (app()->auth::check()):

    ?>

    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/workspace') ?>" class="linkNavigation">Рабочая область</a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="linkNavigation">Выход <img src="../../public/img/logout_icon.jpg" alt="Нет изображения" class="logoutIcon"></a>
    </header>

    <main class="addNewBuilding">
        <h2 class="c-g">Добавление нового здания</h2>
        <form class="addNewBuildingForm">
            <p>Название</p> <input type="text" name="name" required><br>
            <p>Адрес</p> <input type="text" name="address" required><br>
            <button class="createBuildingButton">Создание</button>
        </form>
    </main>

    <main class="allBuildings">
        <h2 class="c-g fs-30px allBuildingsText">Все здания</h2>
        <div class="building1">
            <img src="../../public/img/building_little_icon.png" alt="Нет изображения" class="buildingLittleIcon">
            <p class="buildingName">Название: Биокорпус</p>
            <p class="buildingAddress">Адрес: ул.Уличная д.1</p>
            <a href="<?= app()->route->getUrl('/room') ?>"><button type="submit" class="moreDetails">Подробнее</button></a>

        </div>
        <div class="building2">
            <img src="../../public/img/building_little_icon.png" alt="Нет изображения" class="buildingLittleIcon">
            <p class="buildingName">Название: Биокорпус</p>
            <p class="buildingAddress">Адрес: ул.Уличная д.1</p>
            <a href="<?= app()->route->getUrl('/room') ?>"><button type="submit" class="moreDetails">Подробнее</button></a>

        </div>
        <img src="../../public/img/arrow-down.png" alt="Нет изображения" class="arrowDownIcon2">
    </main>

<?php

else:

    ?>
    <h3 class="youNotAuthorizedText">Вы не авторизованы</h3>
    <a href="/login"><input type="submit" class="submitInput" value="Авторизация"></a>

<?php
endif;
?>