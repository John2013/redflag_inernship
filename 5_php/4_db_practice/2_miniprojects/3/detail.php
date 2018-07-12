<?
require "../../../base.php";
require "../Note.php";

use Michelf\MarkdownExtra;

/** @var Note $note */
$note = Note::load((int)$_REQUEST['id']);
?><html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?= $note->title ?></title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1><?= $note->title ?></h1>
	<p class="nav">
		<a href="index.php">на главную</a>
	</p>
	<div>
		<p class="date"><?= $note->get_date() ?></p>
		<?= MarkdownExtra::defaultTransform($note->text) ?>
		<p><a href="update.php?id=<?= $note->id ?>">Изменить</a></p>
	</div>
	<div>
		<a href="add.php" class="btn btn-danger btn-block">Добавить запись</a>
	</div>
</div>

</body>
</html>