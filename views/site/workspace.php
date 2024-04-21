
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

    <div class="searchForm">
        <form method="GET" class="search">
            <p><input type="text" name="search" placeholder="Поиск по названию"></p>
            <button type="submit" class="searchButton">Найти</button>
        </form>
    </div>

    <main class="addNewBuilding">
        <h2 class="c-g">Добавление нового здания</h2>
        <form method="POST" class="addNewBuildingForm" enctype="multipart/form-data">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <p>Название</p> <input type="text" name="name_building"><br>
            <p>Адрес</p> <input type="text" name="address_building"><br>
            <p>Добавить фото</p>
            <div class="fileName"></div>
            <label for="file-upload" class="inputAvatarButton">
                Выберите файл
            </label>
            <input type="file" name="image_path" id="file-upload" />
            <button class="createBuildingButton">Создание</button>
        </form>
    </main>

    <main class="allBuildings">
        <h2 class="c-g fs-30px allBuildingsText">Все здания</h2>
        <?php if (isset($building)): ?>
            <div class="building">
                <img src="../../public/img/building_little_icon.png" alt="Нет изображения" class="userLittleIcon">
                <div class="buildingInfo">
                    <p class="infoText">Название: <?= $building->name_building ?></p>
                    <p class="infoText">Адрес: <?= $building->address_building ?></p>
                </div>
                <form method="GET" action="<?= app()->route->getUrl('/room/' . $building->build_id) ?>">
                    <button type="submit" class="moreDetails">Подробнее</button>
                    <input type="hidden" name="countAreaAndSeats" value="<?= $building->build_id ?>">
                </form>
            </div><br><br>
        <?php elseif (isset($allBuildings)): ?>
            <?php foreach ($allBuildings as $building): ?>
                <div class="building">
                    <img src="../../public/img/building_little_icon.png" alt="Нет изображения" class="userLittleIcon">
                    <div class="buildingInfo">
                        <p class="infoText">Название: <?= $building->name_building ?></p>
                        <p class="infoText">Адрес: <?= $building->address_building ?></p>
                    </div>
                    <form method="GET" action="<?= app()->route->getUrl('/room/' . $building->build_id) ?>">
                        <button type="submit" class="moreDetails">Подробнее</button>
                        <input type="hidden" name="countAreaAndSeats" value="<?= $building->build_id ?>">
                    </form>
                </div><br><br>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>


<?php

else:

    ?>
    <h3 class="youNotAuthorizedText">Вы не авторизованы</h3>
    <a href="/login"><input type="submit" class="submitInput" value="Авторизация"></a>

<?php
endif;
?>