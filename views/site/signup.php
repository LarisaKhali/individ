<h2>Регистрация нового пользователя</h2>
<form method="post">
    <label>Фамилия <input type="text" name="surname" required></label><br><br>
    <label>Имя <input type="text" name="name" required></label><br><br>
    <label>Отчество <input type="text" name="patronymic"></label><br><br>
    <label>Роль <select name="role_id"><br><br>
            <option value="1">Администратор</option>
            <option value="2">Сотрудник деканата</option>
        </select></label><br><br>
    <label>Логин <input type="text" name="nickname" required></label><br><br>
    <label>Адрес электронной почты <input type="email" name="email"></label><br><br>
    <label>Пароль <input type="password" name="password" required></label><br><br>
    <button>Зарегистрироваться</button>
</form>