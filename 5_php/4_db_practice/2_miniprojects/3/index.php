<?
require "../../../base.php";
require "../Note.php";

if($_REQUEST['add']){
	$add_array = array_map("map_htmlspecialchars", $_REQUEST['add']);
	$new_note = new Note($add_array['title'], $add_array['text']);
	$res = $new_note->save();
}

if($_REQUEST['change']){
	$change_array = array_map("map_htmlspetialchars", $_REQUEST['add']);
	$updating_note =
		new Note($change_array['title'], $change_array['text'], $change_array['time'], $change_array['id']);
	$updating_note->save();
}

/** @var Note[] $notes */
$notes = Note::load();
?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Список записей</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1>Список записей</h1>
	<?
	foreach ($notes as $note){
		?>
		<div class="note">
			<p>
				<span class="date"><?= $note->get_date() ?></span>
				<a href="detail.php?id=<?= $note->id ?>"><?= $note->title ?></a>
			</p>
			<p><?= $note->get_short_text() ?></p>
		</div>
		<?
	}
	?>
	<div>
		<a href="add.php" class="btn btn-danger btn-block">Добавить запись</a>
	</div>
</div>

</body>
</html>
