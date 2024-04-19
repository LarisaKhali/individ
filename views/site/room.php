
<?php
if (app()->auth::check() && app()->auth->user()->role_id == 2):
    ?>
    <header>
        <a href="<?= app()->route->getUrl('/profile') ?>" class="linkNavigation">Профиль</a>
        <a href="<?= app()->route->getUrl('/workspace') ?>" class="linkNavigation">Рабочая область</a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="linkNavigation">Выход <img src="../../public/img/logout_icon.jpg" alt="Нет изображения" class="logoutIcon"></a>

    </header>
    <main class="addNewRoom">
        <h2 class="c-g">Добавление нового помещения</h2>
        <form method="post" class="addRoomForm">
            <p>Название</p> <input type="text" name="name" required><br>
            <p>Номер</p> <input type="number" name="number" required><br>
            <p>Вид</p>
            <select class="selectType">
                <option value="1">Аудитория</option>
                <option value="2">Кабинет</option>
            </select>
            <p>Площадь</p> <input type="number" name="area" required><br><br>
            <p>Кол-во посадочных мест</p> <input type="number" name="number_of_seats" required><br><br>
            <button class="createRoomButton">Создание</button>
        </form>
    </main>

    <main class="editBuilding">
        <form class="editBuildingForm">
            <p class="noneLeft">Название</p> <input type="text" name="name" placeholder="Биокорпус" required><br><br>
            <p class="noneLeft">Адрес<br></p> <input type="text" name="address" placeholder="ул.Уличная д.1" required><br>
            <button class="createBuildingButton">Сохранить изменеия</button>
        </form>
    </main>
    <img src="../../public/img/room_icon.png" alt="Нет изображения" class="roomIcon"></a>

    <h2 class="c-g fs-30px allRoomsText">Все помещения</h2>
    <div class="room1">
        <p class="roomName">Название: Кабинет химии</p>
        <p class="roomNumber">Номер: 5</p>
        <p class="roomType">Вид: Аудитория</p>
        <p class="roomArea">Площадь: 50 кв. м.</p>
        <p class="roomNumberOfSeats">Кол-во посадочных мест: 32</p>
        <button type="submit" class="deleteRoom">Удалить</button>
        <img src="../../public/img/schoolbag_icon.png" alt="Нет изображения" class="schoolbagIcon"></a>
        <img src="../../public/img/arrow-down.png" alt="Нет изображения" class="arrowDownIcon3">
    </div>


<?php

else:

    ?>
    <h3 class="youNotAuthorizedText">Вы не авторизованы</h3>
    <a href="/login"><input type="submit" class="submitInput" value="Авторизация"></a>

<?php
endif;
?>