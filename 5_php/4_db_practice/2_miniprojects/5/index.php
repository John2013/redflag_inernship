<?
require "../../../base.php";
require "models/TopicsAnswer.php";
require "models/Topic.php";
require "../pagination.php";


$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 0;
$page_size = 3;

$add_array = [];
$topic_added = null;
if ($_REQUEST['add']) {
	$add_array = array_map("map_htmlspecialchars", $_REQUEST['add']);
	$new_topic = new Topic($add_array['author'], $add_array['title'], $add_array['description']);
	$topic_added = $new_topic->save();
}
$topics = Topic::load(null, $page, $page_size);

$topics_count = Topic::get_count();

?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Форум</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1>Наш форум</h1>
	<div class="note">
		Наш супер крутой форум посвящен phasellus gravida fermentum pellentesque. Aenean non neque mollis nisl dapibus
		eleifend. Sed interdum dui nec dictum elementum. Proin eget semper dolor, ut commodo nibh.
		Quisque vitae pharetra ligula. Sed dictum, sem sed pellentesque aliquam, tellus sapien dapibus magna, eu
		suscipit lacus augue sed velit. Ut vehicula sagittis nulla, et aliquet elit. Quisque tincidunt sem nibh, finibus
		dictum nisl vulputate quis. In vitae nisl et lacus pulvinar ornare id ac libero. Morbi pharetra fringilla erat
		ut lacinia.
	</div>
	<h2>Темы форума</h2>
	<?
	foreach ($topics as $topic) {
		?>
		<div class="note">
			<p class="topic">
				<a href="topic.php?topic=<?= $topic->id ?>"><?= $topic->title ?></a>
			</p>
			<p>
				<span class="subheader">Создана:</span>
				<?= $topic->get_date() ?>.
				<span class="subheader">Автор:</span>
				<?= $topic->author ?>.
				<br>
				<span class="subheader">Количество ответов:</span>
				<?= $topic->answers_count ?>
			</p>
		</div>
		<?
	}
	?>
	<div>
		<?= get_pagination($page, $page_size, $topics_count) ?>
	</div>
	<h2>Создать тему</h2>
	<? if($topic_added !== null && $topic_added !== false){
		?><div class="info alert alert-info">
			Тема успешно создана!
		</div><?
	} ?>
	<?
	if ($topic_added === false){
		?>
		<div class="info alert alert-danger">
			Тема с таким названием уже существует!
		</div>
		<?
	}
	?>
	<div id="form">
		<form action="#form" method="POST">
			<p><input class="form-control" name="add[author]" placeholder="Ваше имя"></p>
			<p><input class="form-control" name="add[title]" placeholder="Название темы"></p>
			<p><textarea class="form-control" name="add[description]" placeholder="Описание темы"></textarea></p>
			<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
		</form>
	</div>
</div>

</body>
</html>