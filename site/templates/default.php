<!doctype html>
<html lang="<?= $kirby->language()?->code() ?? 'de' ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $page->title()->esc() ?> | <?= $site->title()->esc() ?></title>
	<?= vite()->css('src/css/app.css') ?>
	<?= vite()->js('src/js/app.js') ?>
</head>
<body>
	<h1><?= $page->title()->esc() ?></h1>
</body>
</html>
