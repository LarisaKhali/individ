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
<header>
    <nav>
        <a href="<?= app()->route->getUrl('/hello') ?>" class="t-d-n">Главная</a>
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/login') ?>" class="t-d-n">Вход</a>
        <?php
        else:
            ?>
            <a href="<?= app()->route->getUrl('/signup') ?>" class="t-d-n">Добавить пользователя   </a>
            <a href="<?= app()->route->getUrl('/logout') ?>" class="t-d-n">Выход (<?= app()->auth::user()->nickname ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>