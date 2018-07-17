<?
require "../../../base.php";

require "models/Question.php";
require "models/QuestionsVariant.php";

$question_id = 1;
$question = Question::load($question_id);
/** @var QuestionsVariant[] $variants */
$variants = $question->get_variants();
?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Опрос</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1>Опрос</h1>
	<div class="info alert alert-info">
		<?= $question ?>
	</div>
	<form action="check.php" method="POST">
		<input type="hidden" name="answer[q_id]" value="<?= $question_id ?>">
		<div class="note">
			<?
			foreach ($variants as $variant){
				?>
				<p>
					<input type="radio" name="answer[v_id]" value="<?= $variant->id ?>" id="v<?= $variant->id ?>">
					<label for="v<?= $variant->id ?>"><?= $variant ?></label>
				</p>
				<?
			}
			?>
		</div>
		<p><input type="submit" class="btn btn-success btn-block" value="Ответить"></p>
	</form>
</div>

</body>
</html>