<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Новая запись</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1>Новая запись</h1>
	<p class="nav">
		<a href="index.php">на главную</a>
	</p>
	<div>
		<form action="index.php" method="POST">
			<p><input class="form-control" placeholder="Название записи" name="add[title]"></p>
			<p><textarea class="form-control markdown-textarea" placeholder="Текст записи" name="add[text]"></textarea></p>
			<p><input type="submit" class="btn btn-danger btn-block" value="Сохранить"></p>
		</form>
	</div>
</div>

</body>
</html>