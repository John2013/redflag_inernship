<?
require "../../../base.php";
require "../Note.php";

$note = Note::load((int)$_REQUEST['id']);

$update_success = null;
if ($_REQUEST['update']){
	$update_array = array_map("map_htmlspecialchars", $_REQUEST['update']);

	$note->title = $update_array['title'];
	$note->text = $update_array['text'];
	$note->time = strtotime($update_array['time']);

	$update_success = $note->save();
}

?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Редактировать запись</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1>Редактировать запись</h1>
	<p class="nav">
		<a href="index.php">на главную</a>
	</p>
	<!--
		После сохранения выдает сообщение об успехе.
	-->
	<?
	if($update_success){
		?>
		<div class="info alert alert-success">
			Запись успешно сохранена!
		</div>
		<?
	}
	if(!$update_success && isset($update_success)){
		?>
		<div class="info alert alert-danger">
			Ошибка сохранения записи!
		</div>
		<?
	}
	?>
	<div>
		<form method="POST">
			<input type="hidden" name="update[id]" value="<?= $note->id ?>">
			<p><input type="date" class="form-control" name="update[time]"
			          value="<?= $note->get_date('Y-m-d') ?>" title="Дата"></p>
			<p><input class="form-control" name="update[title]" value="<?= $note->title ?>" title="заголовок"></p>
			<p>
				<textarea class="form-control markdown-textarea" name="update[text]"
				          title="текст"><?= $note->text ?></textarea>
			</p>
			<p><input type="submit" class="btn btn-danger btn-block" value="Сохранить"></p>
		</form>
	</div>
</div>

</body>
</html>