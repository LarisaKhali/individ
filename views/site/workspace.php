
<?php
if (app()->auth::check() && app()->auth->user()->role_id == 1):
    ?>
    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/workspace_admin') ?>" class="linkNavigation">Рабочая область</a>
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
            <input type="file" name="avatar" value="'../../uploads/avatar/default_avatar.png'" hidden>
            <button class="createWorkerButton">Создание</button>
        </form>
    </main>

    <main class="allWorkers">
        <h2 class="c-g fs-30px">Все сотрудники деканата</h2>
        <?php
        foreach ($allWorkers as $worker) {
            if ($worker->role_id == 2) {
                echo '<div class="worker">';
                echo '<img src="../../public/img/user_little_icon.png" alt="Нет изображения" class="userLittleIcon">';
                echo '<div class = "workerInfo">';
                echo '<p class="infoText">ФИО: ' . $worker->surname . ' ' . $worker->name . ' ' . $worker->patronymic . '</p>';
                echo '<p class="infoText">Логин: ' . $worker->nickname . '</p>';
                echo '<p class="infoText">Пароль: ' . $worker->password . '</p>';
                echo '</div>';
                echo '</div> <br><br>';
            }
        }
        ?>

    </main>

<?php
elseif (app()->auth::check()):

    ?>

    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/workspace_worker') ?>" class="linkNavigation">Рабочая область</a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="linkNavigation">Выход <img src="../../public/img/logout_icon.jpg" alt="Нет изображения" class="logoutIcon"></a>
    </header>

    <main class="addNewBuilding">
        <h2 class="c-g">Добавление нового здания</h2>
        <form method="POST" class="addNewBuildingForm">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <p>Название</p> <input type="text" name="name_building"><br>
            <p>Адрес</p> <input type="text" name="address_building"><br>
            <button class="createBuildingButton">Создание</button>
        </form>
    </main>

    <main class="allBuildings">
        <h2 class="c-g fs-30px allBuildingsText">Все здания</h2>
        <?php
        foreach ($allBuildings as $building) {
            echo '<div class="building">';
            echo '<img src="../../public/img/building_little_icon.png" alt="Нет изображения" class="userLittleIcon">';
            echo '<div class="buildingInfo">';
            echo '<p class="infoText">Название: ' . $building->name_building . '</p>';
            echo '<p class="infoText">Адрес: ' . $building->address_building . '</p>';
            echo '</div>';
            echo '<form method="GET" action="' . app()->route->getUrl('/room/' . $building->build_id). '">';
            echo '<button type="submit" class="moreDetails">Подробнее</button>';
            echo '</form>';
            echo '<button type="submit" class="calculationsButton">Подсчеты</button>';
            echo '</div><br><br>';
        }
        ?>
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