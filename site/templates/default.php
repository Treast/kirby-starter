<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= vite()->css('assets/js/app.css') ?>
</head>

<body>
    <h1 class="text-red-500 text-6xl"><?= $page->title() ?> World</h1>

    <?= vite()->js('assets/js/app.js') ?>
</body>

</html>