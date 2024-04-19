<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

<?php
if (!app()->auth::check()):
    ?>
    <main>
        <img src="../../public/img/girl_picture.png" alt="Нет изображения" class="girlPicture">
        <h2 id="siteForWhat">Сайт для работы с работниками</h2>
        <h3 id="siteForWhatAbout">Удобный интерфейс, всё находится под рукой, быстрая загрузка страниц, вам точно понравится!</h3>
        <a href="/login"><input type="submit" class="submitInput goToAuthInput" value="Авторизация"></a>
    </main>
<?php
else:
    app()->route->redirect('/profile');
    ?>

<?php
endif;
?>

</body>
</html>