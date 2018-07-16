<?
require "../../../base.php";
require "models/TopicsAnswer.php";
require "models/Topic.php";
require "../pagination.php";

use Michelf\MarkdownExtra;

$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 0;
$page_size = 3;

$topic_id = $_REQUEST['id'] ?: Topic::get_first_id();

if ($_REQUEST['add']) {
	$add_array = array_map("map_htmlspecialchars", $_REQUEST['add']);
	$new_answer = new TopicsAnswer($add_array['author'], $add_array['text'], $topic_id);
	$answer_added = $new_answer->save();
}

$topic = Topic::load($topic_id);
$title = "Тема №" . ($topic->id + 1);

$add_array = [];
$answer_added = null;

$answers = $topic->get_answers($page, $page_size);
$answers_count = TopicsAnswer::get_count($topic->id);
?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1><?= $title ?></h1>
	<p>
		<span class="subheader">Создана:</span>
		<?= $topic->get_date() ?>.
		<span class="subheader">Автор:</span>
		<?= $topic->author ?>.
		<br>
		<span class="subheader">Количество ответов:</span>
		<?= $topic->answers_count ?>.
		<a href="./">Перейти на список тем.</a>
	</p>
	<p class="title"><?= $topic->title ?></p>
	<div class="desc">
		<p><?= MarkdownExtra::defaultTransform($topic->description) ?></p>
	</div>
	<h2>Ответы</h2>
	<?
	if(count($answers) < 1){
		?>
		<div class="info alert alert-warning">
			Ответов пока нет
		</div>
		<?
	}
	foreach ($answers as $answer){
		?>
		<div class="note">
			<p>
				<span class="date"><?= $answer->get_date() ?></span>
				<span class="name"><?= $answer->author ?></span>
			</p>
			<p><?= MarkdownExtra::defaultTransform($answer) ?></p>
		</div>
		<?
	}
	?>

	<div>
		<?= get_pagination($page, $page_size, $answers_count) ?>
	</div>
	<?
	if ($answer_added !== null && $answer_added !== false){
		?>
		<div class="info alert alert-info">
			Запись успешно сохранена!
		</div>
		<?
	}
	?>

	<div id="form">
		<form action="#form" method="POST">
			<p><input class="form-control" name="add[author]" value="<?= $add_array['author'] ?>"
			          placeholder="Ваше имя"></p>
			<p><textarea class="form-control" name="add[text]"
			             placeholder="Ваше сообщение"><?= $add_array['text'] ?></textarea></p>
			<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
		</form>
	</div>
</div>

</body>
</html>