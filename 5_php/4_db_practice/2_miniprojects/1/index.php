<?
require '../../../base.php';
require 'GuestNote.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Гостевая книга</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<?
$add_array = [];
$note_added = false;
if($_REQUEST['add']){
	$add_array = array_map("map_htmlspecialchars", $_REQUEST['add']);
	$new_guest_note = new GuestNote($add_array['name'], $add_array['text']);
	$new_guest_note->save();
	$note_added = true;
}

/** @var GuestNote[] $notes */
$notes = GuestNote::load()
?>
<div id="wrapper">
	<h1>Гостевая книга</h1>
	<?
	foreach ($notes as $note){
		?>
		<div class="note">
			<p>
				<span class="date"><?= $note->get_time() ?></span>
				<span class="name"><?= $note->guest_name ?></span>
			</p>
			<p><?= $note ?></p>
		</div>
		<?
	}
	if ($note_added){
		?><div class="info alert alert-info">Запись успешно сохранена!</div><?
	}
	?>
	<div id="form">
		<form action="#form" method="post">
			<p><input class="form-control" name="add[name]" placeholder="Ваше имя" value="<?= $add_array['name'] ?>"></p>
			<p><textarea class="form-control" name="add[text]" placeholder="Ваш отзыв"><?= $add_array['text'] ?></textarea></p>
			<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
		</form>
	</div>
</div>

</body>
</html>