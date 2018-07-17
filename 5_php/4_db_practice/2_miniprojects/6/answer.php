<?
require "../../../base.php";

require "models/UsersAnswer.php";

$q_id = (int)($_REQUEST['answer']['q_id'] ?: 1);

if(isset($_REQUEST['answer']['v_id'])){
	$new_answer = new UsersAnswer($q_id, (int)$_REQUEST['answer']['v_id']);
	$new_answer->save();
}
$answers = UsersAnswer::get_count_array($q_id);
$answers_count = array_reduce($answers, function ($count, $answer) {
	return $count + $answer['count'];
});
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Результат опроса</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1>Результат опроса</h1>
	<div class="info alert alert-info">
		Общее количество опрошенных: <b><?= $answers_count ?></b>.
		<? foreach ($answers as $key => $answer){
			?>
			<br>
			<b><?= $key + 1 ?>.</b>
			Ответили "<?= $answer['text'] ?>":
			<b><?= $answer['count'] ?></b> человек, <b><?= $answer['percent'] ?>%</b> опрошенных.
			<?
		} ?>
	</div>
	<div class="note">
		<?
		foreach ($answers as $key => $answer){
			?>
			<p class="answer">Ответ "<?= $answer['text'] ?>":</p>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
				     style="width: <?= $answer['percent'] ?>%;">
					<?= $answer['percent'] ?>%
				</div>
			</div>
			<?
		}
		?>
	</div>
</div>

</body>
</html>