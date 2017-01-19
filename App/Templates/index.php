<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

    <ul>
        <?php foreach ($news as $article) { ?>
            <li>
                <a href="/index.php?action=One&id=<?php echo $article->id; ?>">
                    <?php echo $article->title; ?>
                </a>
            </li>
        <?php } ?>
    </ul>

</body>
</html>