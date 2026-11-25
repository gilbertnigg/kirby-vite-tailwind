<?php
/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 */
?><!doctype html>
<html lang="<?= $kirby->language()?->code() ?? 'de' ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page->title()->esc() ?> | <?= $site->title()->esc() ?></title>
    <?= vite()->css('src/css/app.css') ?>
    <?= vite()->js('src/js/app.js') ?>
</head>

<body>
    <h1>
			<?= $page->title() ?>
		</h1>
    <?php if ($image = $page->cover()->toFile()) : ?>
    <p>
        <img src="<?= $image->url() ?>" alt="<?= $image->description()->esc() ?>">
    </p>
    <?php endif ?>
    <?= $page->text() ?>
</body>

</html>
