
<?php
if (app()->auth::check() && app()->auth->user()->role_id == 2):
    ?>
    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/workspace_worker') ?>" class="linkNavigation">Рабочая область</a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="linkNavigation">Выход <img src="../../public/img/logout_icon.jpg" alt="Нет изображения" class="logoutIcon"></a>

    </header>
    <main class="addNewRoom">
        <h2 class="c-g">Добавление нового помещения</h2>
        <form method="POST" class="addRoomForm">
            <input type="hidden" name="build_id" value="<?= $building->build_id ?> ">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <p>Название</p> <input type="text" name="name" required><br>
            <p>Номер</p> <input type="number" name="number" required><br>
            <p>Вид</p>
            <select class="selectType" name="type_id">
                <?php foreach($types as $type): ?>
                    <option value="<?= $type->type_id ?>"><?= $type->name ?></option>
                <?php endforeach; ?>
            </select>
            <p>Площадь</p> <input type="number" name="area" required><br><br>
            <p>Кол-во посадочных мест</p> <input type="number" name="number_of_seats" required><br><br>
            <button class="createRoomButton">Создание</button>
        </form>
    </main>

    <main class="editBuilding">
        <form method="POST" class="editBuildingForm">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <input type="hidden" name="build_id" value="<?= $building->build_id ?> ">
            <p class="noneLeft">Название</p> <input type="text" name="name_building" value="<?= $building->name_building ?>" required><br><br>
            <p class="noneLeft">Адрес<br></p> <input type="text" name="address_building" value="<?= $building->address_building ?>" required><br>
            <button class="createBuildingButton">Сохранить изменеия</button>
        </form>
    </main>
    <img src="../../public/img/room_icon.png" alt="Нет изображения" class="roomIcon"></a>

    <h2 class="c-g fs-30px allRoomsText">Все помещения</h2>
    <?php
    foreach ($rooms as $room) {
        echo '<div class="room1">';
        echo '<p class="infoRoom1">Название: ' . $room->name . '</p>';
        echo '<p class="infoRoom1">Номер: ' . $room->number . '</p>';
        echo '<p class="infoRoom1">Тип: ' . $room->type_id . '</p>';
        echo '<p class="infoRoom2">Площадь: ' . $room->area . ' кв. м. ' . '</p>';
        echo '<p class="infoRoom2">Кол-во посадочных мест: ' . $room->number_of_seats . '</p>';
        echo '<img src="../../public/img/schoolbag_icon.png" alt="Нет изображения" class="schoolbagIcon"></a>';
        echo '</div><br><br>';
    }
    ?>
    <img src="../../public/img/arrow-down.png" alt="Нет изображения" class="arrowDownIcon3">

<?php

else:

    ?>
    <h3 class="youNotAuthorizedText">Вы не авторизованы</h3>
    <a href="/login"><input type="submit" class="submitInput" value="Авторизация"></a>

<?php
endif;
?>